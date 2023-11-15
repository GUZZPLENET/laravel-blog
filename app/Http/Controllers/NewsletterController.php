<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(NewsletterRequest $request){
        $newsletter = new Newsletter();
        $newsletter->fill($request->all());
        $newsletter->save();

        return back()->with('newsletter-message', 'Email servisine başarıyla kayıt oldunuz.');
    }
}
