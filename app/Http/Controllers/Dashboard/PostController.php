<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Mail\NewsletterEmail;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image as ResizeImage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.dashboard.posts.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $name = time() . '.' . $request->file('image')->extension();
        ResizeImage::make($request->file('image'))->resize(600, 450)->save(public_path('upload/') . $name);

        $blog = Blog::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'image' => $name,
            'category' => $request->input('category'),
            'creator' => Auth::id()
        ]);

        $subscribers = Newsletter::all();
        $settings = Settings::firstOrFail();

        /*config([
            'mail.mailers.smtp.host' => $settings->smtpHost,
            'mail.mailers.smtp.port' => $settings->smtpPort,
            'mail.mailers.smtp.username' => $settings->smtpUsername,
            'mail.mailers.smtp.password' => $settings->smtpPassword,
            'mail.mailers.smtp.encryption' => $settings->smtpEncryption,
            'mail.from.address' => $settings->smtpEmail,
        ]);

        foreach ($subscribers as $subscriber) {
            Mail::mailer('smtp')->to($subscriber->email)->send(new NewsletterEmail($subscriber, $blog));
        }*/

        return redirect()->route('dashboard.posts')->with('message', 'Blog başarıyla oluşturuldu.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();

        return view('pages.dashboard.posts.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Blog $blog)
    {
        $name = $blog->image;

        if ($request->has('image')) {
            $path = public_path('upload/');

            $name = time() . '.' . $request->file('image')->extension();
            ResizeImage::make($request->file('image'))->resize(600, 450)->save($path . $name);
        }

        $blog->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'image' => $name,
            'category' => $request->input('category')
        ]);

        return redirect()->route('dashboard.posts')->with('message', 'Blog bilgileri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->deleteOrFail();

        return back()->with('message', 'Blog başarıyla silindi.');
    }
}
