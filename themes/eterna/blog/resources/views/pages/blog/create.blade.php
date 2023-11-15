@extends('layouts.app')

@section('content')
    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- =======================
        Main contain START -->
        <section class="py-4">
            <div class="container">
                <div class="row pb-4">
                    <div class="col-12">
                        <!-- Title -->
                        <h1 class="mb-0 h2">Blog oluştur</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Chart START -->
                        <div class="card border">
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Form START -->
                                <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Main form -->
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Post name -->
                                            <div class="mb-3">
                                                <label class="form-label">Başlık</label>
                                                <input name="title" type="text" class="form-control" value="{{ old('title') }}" placeholder="Gönderi başlığı">
                                                @error('title')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Short description -->
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Kısa açıklama</label>
                                                <textarea class="form-control" rows="3" name="description">{{ old('description') }}</textarea>
                                                @error('description')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Main toolbar -->
                                        <div class="col-md-12">
                                            <!-- Subject -->
                                            <div class="mb-3">
                                                <label class="form-label">Konu</label>
                                                <textarea class="form-control" rows="6" name="content">{{ old('content') }}</textarea>
                                                @error('content')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <!-- Image -->
                                                <div class="position-relative">
                                                    <h6 class="my-2">Kapak resmi</h6>
                                                    <label class="w-100" style="cursor:pointer;">
                                                        <span>
                                                            <input class="form-control stretched-link" type="file" name="image">
                                                        </span>
                                                    </label>
                                                </div>
                                                <p class="small mb-0 mt-2"><b>Not:</b> Sadece JPG, JPEG veya PNG. Tavsiye edilen ölçüler 600px * 450px şeklindedir. Daha büyük ölçüdeki resimler kırpılacaktır..</p>
                                                @error('image')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            @if(count($categories) > 0)
                                                <!-- Message -->
                                                <div class="mb-3">
                                                    <label class="form-label">Kategori</label>
                                                    <select class="form-select" name="category" aria-label="Default select example">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            @else
                                                <div class="alert alert-warning">Henüz kategori eklenmemiş. Yöneticiden kategori eklemesini isteyin</div>
                                            @endif
                                        </div>
                                        <!-- Create post button -->
                                        <div class="col-md-12 text-start">
                                            <button class="btn btn-primary w-100" type="submit">Create post</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Form END -->
                            </div>
                        </div>
                        <!-- Chart END -->
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Main contain END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->
@endsection
