<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Newsletter;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'users' => User::all()->count(),
            'posts' => Blog::all()->count(),
            'newsletters' => Newsletter::all()->count(),
            'comments' => Comment::all()->count()
        ];

        return view('pages.dashboard.home', $data);
    }

    public function store(Request $request) {

        $request->validate([
            'smtp-host' => 'required',
            'smtp-port' => 'required',
            'smtp-username' => 'required',
            'smtp-password' => 'required',
            'smtp-encryption' => 'required',
            'smtp-email' => 'required',
            'footer-text' => 'required',
            'header-logo' => 'nullable|image',
            'footer-logo' => 'nullable|image',
        ]);


        $settings = Settings::firstOrFail();

        $path = public_path('upload/');

        $headerLogo = $settings->headerLogo;
        $footerLogo = $settings->footerLogo;

        if ($request->has('header-logo')) {
            $headerLogo = time() . '.' . $request->file('header-logo')->extension();
            ResizeImage::make($request->file('header-logo'))->save($path . $headerLogo);
        }

        if ($request->has('footer-logo')) {
            $footerLogo = time() . '.' . $request->file('footer-logo')->extension();
            ResizeImage::make($request->file('footer-logo'))->save($path . $footerLogo);
        }

        Settings::first()->update([
            'smtpHost' => $request->input('smtp-host'),
            'smtpPort' => $request->input('smtp-port'),
            'smtpUsername' => $request->input('smtp-username'),
            'smtpPassword' => $request->input('smtp-password'),
            'smtpEncryption' => $request->input('smtp-encryption'),
            'smtpEmail' => $request->input('smtp-email'),
            'footerText' => $request->input('footer-text'),
            'headerLogo' => $headerLogo,
            'footerLogo' => $footerLogo,
        ]);

        return back()->with('message', 'Site ayarları başarıyla güncellendi.');
    }
}
