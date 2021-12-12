<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use App\Http\Requests\UserRequest;
use App\Traits\Authorizable;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {

        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->merge(['password' => bcrypt($request->get('password'))]);


        if ($user = User::create($request->except('roles', 'permissions'))) {
            $this->syncPermissions($request, $user);
            foreach ($request->input('document', []) as $file) {
                $user->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('avatar');
            }
            flash('User has been created');
        } else {
            flash()->error('Unable to create user.');
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all('name', 'id');

        return view('users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->except('roles', 'permissions', 'password'));

        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $this->syncPermissions($request, $user);

        if ($user->update()) {
            if (count($user->getMedia('avatar')) > 0) {
                foreach ($user->getMedia('avatar') as $media) {
                    if (!in_array($media->file_name, $request->input('document', []))) {
                        $media->delete();
                    }
                }
            }

            $media = $user->getMedia('avatar')->pluck('file_name')->toArray();

            foreach ($request->input('document', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $user->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('avatar');
                }
            }

            flash()->success('User has been updated');
        } else {
            flash()->error('Unable to update user');
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::user()->id === $user->id) {
            flash()->warning('Deletion of currently logged in user is not allowed :(')->important();
            return redirect()->back();
        }

        if ($user->delete()) {
            flash()->success('User has been deleted');
        } else {
            flash()->error('User not deleted');
        }

        return redirect()->back();
    }

    private function syncPermissions(UserRequest $request, $user)
    {
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        $roles = Role::find($roles);

        if (!$user->hasAllRoles($roles)) {
            $user->permissions()->sync([]);
        } else {
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }
}
