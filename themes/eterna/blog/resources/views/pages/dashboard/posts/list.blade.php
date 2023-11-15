@extends('layouts.app')

@section('content')
    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- =======================
        Post list START -->
        <section class="py-4">
            <div class="container">
                <div class="row pb-4">
                    <div class="col-12">
                        <!-- Title -->
                        <div class="d-sm-flex justify-content-sm-between align-items-center">
                            <h1 class="mb-2 mb-sm-0 h2">Bloglar <span class="badge bg-primary bg-opacity-10 text-primary">{{ $posts->count() }}</span></h1>
                            <a href="{{ route('dashboard.posts.create') }}" class="btn btn-sm btn-primary mb-0"><i class="fas fa-plus me-2"></i>Blog ekle</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Post list table START -->
                        <div class="card border bg-transparent rounded-3">

                            <!-- Card body START -->
                            <div class="card-body p-3">

                                @if(session()->has('message'))
                                    <div class="alert alert-warning">{{ session('message') }}</div>
                                @endif

                                <!-- Post list table START -->
                                <div class="table-responsive border-0">
                                    <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                                        <!-- Table head -->
                                        <thead class="table-dark">
                                        <tr>
                                            <th scope="col" class="border-0 rounded-start">Başlık</th>
                                            <th scope="col" class="border-0">Açan</th>
                                            <th scope="col" class="border-0">Tarih</th>
                                            <th scope="col" class="border-0">Kategori</th>
                                            <th scope="col" class="border-0 rounded-end">İşlemler</th>
                                        </tr>
                                        </thead>

                                        <!-- Table body START -->
                                        <tbody class="border-top-0">
                                        @foreach($posts as $post)
                                            <tr>
                                                <!-- Table data -->
                                                <td>
                                                    <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="{{ route('post', $post->id) }}">{{ $post->title }}</a></h6>
                                                </td>
                                                <!-- Table data -->
                                                <td>
                                                    <h6 class="mb-0"><a href="{{ route('posts.user', $post->user->id) }}">{{ $post->user->name }}</a></h6>
                                                </td>
                                                <!-- Table data -->
                                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                                <!-- Table data -->
                                                <td>
                                                    <a href="{{ route('category', $post->categor->id) }}" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $post->categor->title }}</a>
                                                </td>
                                                <!-- Table data -->
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <form action="{{ route('dashboard.posts.destroy', $post->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="bi bi-trash"></i></button>
                                                        </form>
                                                        <a href="{{ route('dashboard.posts.edit', $post->id) }}" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <!-- Table body END -->
                                    </table>
                                </div>
                                <!-- Post list table END -->

                                {{ $posts->links() }}
                            </div>
                        </div>
                        <!-- Post list table END -->
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Main contain END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->
@endsection
