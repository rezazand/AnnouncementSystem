<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\directoryExists;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $input)
    {
        $this->validate($input, [
            'avatar' => 'image',
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $update = [
            'name' => $input->name,
            'email' => $input->email,
        ];

        if ($input->avatar != null) {
            $uploadedFile = $input->file('avatar');
            $folder = '_'.str_split(hash('sha256', auth()->user()->id), 6)[0] . "_" . str_split(Hash::make(auth()->user()->id, ['rounds' => 12,]), 6)[0];

            if (Storage::exists("avatars/$folder/avatar.png"))
                Storage::delete("avatars/$folder/avatar.png");

            $x = Storage::disk('public')->putFileAs('avatars/' . $folder, $uploadedFile, 'avatar.png');
            $update['avatar'] = Storage::url($x);
        }

        auth()->user()->update($update);

        return back();
    }
}
