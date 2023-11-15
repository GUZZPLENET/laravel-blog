<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as ResizeImage;

class ProfileController extends Controller
{
    public function index() {
        return view('pages.user.profile');
    }

    public function store(ProfileRequest $request) {
        $name = time() . '.' . $request->file('image')->extension();
        ResizeImage::make($request->file('image'))->save(public_path('upload/'. $name));

        User::findOrFail(Auth::id())->update(['image' => $name]);

        return back()->with('message', 'Profil resmi başarıyla güncellendi.');
    }
}
