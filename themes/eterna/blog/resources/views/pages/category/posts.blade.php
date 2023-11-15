@extends('layouts.app')

@section('content')
    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <!-- =======================
        Inner intro START -->
        <section class="pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-dark-overlay-4 overflow-hidden card-bg-scale h-300 text-center" style="background-image:url({!! Theme::asset('images/blog/16by9/08.jpg') !!}); background-position: center left; background-size: cover;">
                            <!-- Card Image overlay -->
                            <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                <div class="w-100 my-auto">
                                    <div class="text-white mb-3">Aranan kategori:</div>
                                    <h1 class="text-white h2">
								<span class="badge text-bg-warning mb-2">
									<i class="fas fa-circle me-2 small fw-bold"></i>{{ $category->title }}</span>
                                    </h1>
                                    <div class="text-center position-relative">
                                        <span class="badge text-bg-info fs-6">{{ count($category->posts) }} içerik</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Inner intro END -->

        <!-- =======================
        Main content START -->
        <section class="position-relative pt-0">
            <div class="container" data-sticky-container>
                <div class="row">
                    <!-- Main Post START -->
                    <div class="col-lg-9">
                        <div class="row gy-4">
                            @foreach($category->posts as $post)
                            <!-- Card item START -->
                                <div class="col-sm-6">
                                    <div class="card">
                                        <!-- Card img -->
                                        <div class="position-relative">
                                            <img class="card-img" src="{{ asset('upload/'.$post->image) }}" alt="Card image">
                                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                                <!-- Card overlay bottom -->
                                                <div class="w-100 mt-auto">
                                                    <!-- Card category -->
                                                    <a href="{{ route('category', $post->categor->id) }}" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $post->categor->title }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-3">
                                            <h4 class="card-title"><a href="{{ route('post', $post->id) }}" class="btn-link text-reset fw-bold">{{ $post->title }}</a></h4>
                                            <p class="card-text">{{ $post->description }}</p>
                                            <!-- Card info -->
                                            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                                <li class="nav-item">
                                                    <div class="nav-link">
                                                        <div class="d-flex align-items-center position-relative">
                                                            <div class="avatar avatar-xs">
                                                                <img class="avatar-img rounded-circle" src="{!! Theme::asset('images/avatar/01.jpg') !!}" alt="avatar">
                                                            </div>
                                                            <span class="ms-3">by <a href="{{ route('posts.user', $post->user->id) }}" class="stretched-link text-reset btn-link">{{ $post->user->name }}</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">{{ $post->created_at->diffForHumans() }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card item END -->
                            @endforeach

                        </div>
                    </div>
                    <!-- Main Post END -->

                    <!-- Sidebar START -->
                    <div class="col-lg-3 mt-5 mt-lg-0">
                        <div data-sticky data-margin-top="80" data-sticky-for="767">
                            <!-- Categories -->
                            <div class="row g-2">
                                <h5>Diğer kategoriler</h5>
                                <x-category :categories="$categories"></x-category>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar END -->
                </div> <!-- Row end -->
            </div>
        </section>
        <!-- =======================
        Main content END -->
    </main>
    <!-- **************** MAIN CONTENT END **************** -->
@endsection
