<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg mb-5">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg leading-6 font-medium text-gray-900">
        {{$title}}
      </h3>
      {{-- <p class="mt-1 max-w-2xl text-sm text-gray-500">
        Personal details and application.
      </p> --}}
    </div>
    <div class="border-t border-gray-200 grid grid-cols-4 gap-4 p-4">
        @foreach ($permissions as $perm)
        @php
            $per_found = null;
                if(isset($role)) {
                    $per_found = $role->hasPermissionTo($perm->name);
                }

                if (isset($user)) {
                    $per_found = $user->hasDirectPermission($perm->name);
                }
        @endphp
            <div class="flex items-center">
                <input
                  id="{{Str::slug($title)}}-{{$perm->id}}"
                  name="permissions[]"
                  type="checkbox"
                  value="{{$perm->name}}"
                  @if ($per_found)
                      checked
                  @endif
                  class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                  @if ($disabled === 'true')
                      disabled="true"
                  @endif
                  >
                <label for="{{Str::slug($title)}}-{{$perm->id}}" class="ml-2 block text-sm text-gray-900">
                  {{$perm->name}}
                </label>
              </div>


        @endforeach
    </div>
  </div>
