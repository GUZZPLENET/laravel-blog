@extends('layouts.app')

@section('content')
    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <!-- =======================
        Main content START -->
        <section class="position-relative">
            <div class="container" data-sticky-container>
                <div class="row">
                    <!-- Main Post START -->
                    <div class="col-lg-12">
                        <!-- Top highlights START -->
                        <div class="mb-4">
                            <h2 class="m-0"><i class="bi bi-hourglass-top me-2"></i><span class="text-primary">{{ $user->name }}</span> kişisinin blogları</h2>
                        </div>

                        <!-- Divider -->
                        <div class="border-bottom border-primary border-2 opacity-1 my-4"></div>

                        <!-- Small card 6X6 START -->
                        <div class="row">
                            <div class="col-12">
                                @if(count($posts) > 0)
                                    @foreach($posts as $post)
                                        <!-- Card item START -->
                                        <div class="card mb-3">
                                            <div class="row g-3">
                                                <div class="col-4">
                                                    <img class="rounded" src="{{ asset('upload/'.$post->image) }}" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <h5><a href="{{ route('post', $post->id) }}" class="btn-link stretched-link text-reset">{{ $post->title }}</a></h5>
                                                    <p>{{ $post->description }}</p>
                                                    <!-- Card info -->
                                                    <ul class="nav nav-divider align-items-center mt-3 small">
                                                        <li class="nav-item">
                                                            <div class="nav-link">
                                                                <div class="d-flex align-items-center position-relative">
                                                                    <div class="avatar avatar-xs">
                                                                        <img class="avatar-img rounded-circle" src="{{ asset('upload/'.$post->user->image) }}" alt="avatar">
                                                                    </div>
                                                                    <span class="ms-2"><a href="#" class="stretched-link text-reset btn-link">{{ $user->name }}</a></span>
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
                                @else
                                    <div class="alert alert-warning">{{ $user->name }} kişisi henüz blog paylaşmamış.</div>
                                @endif
                            </div>
                        </div><!-- Row END -->
                        <!-- Small card 6X6 END -->
                    </div>
                    <!-- Main Post END -->
                </div> <!-- Row end -->
            </div>
        </section>
        <!-- =======================
        Main content END -->
@endsection
