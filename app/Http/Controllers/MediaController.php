<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function upload(Request $request)
    {
        if (config('app.env') === 'local') {
            $path = storage_path('tmp/uploads');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file = $request->file('file');

            $name = uniqid() . '_' . trim($file->getClientOriginalName());

            $file->move($path, $name);
        } else if (config('app.env') === 'production') {
        }

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName()
        ]);
    }
}
