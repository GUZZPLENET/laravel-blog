@extends('layouts.app')

@section('content')
    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- =======================
        Post edit START -->
        <section class="py-4">
            <div class="container">
                <div class="row pb-4">
                    <div class="col-12">
                        <!-- Title -->
                        <h1 class="mb-0 h2">Hesap ayarları</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Chart START -->
                        <div class="card border h-100">
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Form START -->
                                <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Main form -->
                                    <div class="row">
                                        <div class="col-12 mt-4">
                                            <div class="mb-3">
                                                <!-- Image -->
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-4 col-md-2">
                                                        <div class="position-relative">
                                                            <img class="rounded" src="{{ asset('upload/'.Auth::user()->image) }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8 col-md-10 position-relative">
                                                        <h6 class="my-2">Blog resmi düzenle</h6>
                                                        <label class="w-100" style="cursor:pointer;">
                                                            <span>
                                                                <input class="form-control stretched-link" type="file" name="image">
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <p class="small mb-0 mt-2"><b>Not:</b> Resim yüklemezseniz eski resim kalır.</p>
                                            </div>
                                        </div>
                                        <!-- Crate post button -->
                                        <div class="col-md-12 text-start">
                                            <button class="btn btn-primary" type="submit">Güncelle</button>
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
        Post edit END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->
@endsection
