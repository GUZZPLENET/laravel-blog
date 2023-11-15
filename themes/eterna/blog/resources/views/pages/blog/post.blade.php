@extends('layouts.app')

@section('content')
    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <!-- Divider -->
        <div class="border-bottom border-primary border-1 opacity-1"></div>

        <!-- =======================
        Inner intro START -->
        <section class="pb-3 pb-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('category', $post->categor->id) }}" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $post->categor->title }}</a>
                        <h1>{{ $post->title }}</h1>
                    </div>
                    <p class="lead">{{ $post->description }}</p>
                </div>
            </div>
        </section>
        <!-- =======================
        Inner intro END -->

        <!-- =======================
        Main START -->
        <section class="pt-0">
            <div class="container position-relative" data-sticky-container>
                <div class="row">
                    <!-- Left sidebar START -->
                    <div class="col-lg-3">
                        <div class="text-start text-lg-center mb-5" data-sticky data-margin-top="80" data-sticky-for="991">
                            <!-- Author info -->
                            <div class="position-relative">
                                <div class="avatar avatar-xl">
                                    <img class="avatar-img rounded-circle" src="{{ asset('upload/'.$post->user->image) }}" alt="avatar">
                                </div>
                                <a href="#" class="h5 stretched-link mt-2 mb-0 d-block">{{ $post->user->name }} {{ $post->user->surname }}</a>
                            </div>
                            <hr class="d-none d-lg-block">
                            <!-- Card info -->
                            <ul class="list-inline list-unstyled">
                                <li class="list-inline-item d-lg-block my-lg-2">{{ $post->created_at->diffForHumans() }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Left sidebar END -->
                    <!-- Main Content START -->
                    <div class="col-lg-9 mb-5">
                        <p>{{ $post->content }}</p>

                        <!-- Divider -->
                        <hr>
                        <div>
                            <h3>{{ $post->comments->count() }} yorum</h3>
                            <x-comments :comments="$post->comments"></x-comments>
                        </div>

                        <hr>

                        <div>
                            <h3>Yorum yap</h3>
                            <small>Email adresin paylaşılmayacak.</small>
                            @auth()
                                @if(session()->has('message'))
                                    <div class="alert alert-success">{{ session('message') }}</div>
                                @endif
                                <form class="row g-3 mt-2" action="{{ route('post.comment', $post->id) }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Yorumun</label>
                                        <textarea class="form-control" rows="3" name="message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Yorumu gönder</button>
                                    </div>
                                </form>
                            @endauth
                            @guest()
                                <div class="alert alert-warning">Yorum yapmak için giriş yapmalısın. <a href="{{ route('login') }}">Giriş yap</a></div>
                            @endguest
                        </div>
                        <!-- Reply END -->
                    </div>
                    <!-- Main Content END -->

                </div>
            </div>
        </section>
        <!-- =======================
        Main END -->
    </main>
    <!-- **************** MAIN CONTENT END **************** -->
@endsection
