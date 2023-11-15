@extends('layouts.app')

@section('content')
    <main>
        <section class="py-4">
            <div class="container">
                <div class="row g-4">

                    <div class="col-12">
                        <!-- Counter START -->
                        <div class="row g-4">

                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-body border p-3">
                                    <div class="d-flex align-items-center">
                                        <!-- Icon -->
                                        <div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <!-- Content -->
                                        <div class="ms-3">
                                            <h3>{{ $users }}</h3>
                                            <h6 class="mb-0">Kullanıcı</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-body border p-3">
                                    <div class="d-flex align-items-center">
                                        <!-- Icon -->
                                        <div class="icon-xl fs-1 bg-primary bg-opacity-10 rounded-3 text-primary">
                                            <i class="bi bi-file-earmark-text-fill"></i>
                                        </div>
                                        <!-- Content -->
                                        <div class="ms-3">
                                            <h3>{{ $posts }}</h3>
                                            <h6 class="mb-0">Blog</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-body border p-3">
                                    <div class="d-flex align-items-center">
                                        <!-- Icon -->
                                        <div class="icon-xl fs-1 bg-danger bg-opacity-10 rounded-3 text-danger">
                                            <i class="bi bi-suit-heart-fill"></i>
                                        </div>
                                        <!-- Content -->
                                        <div class="ms-3">
                                            <h3>{{ $newsletters }}</h3>
                                            <h6 class="mb-0">Email bildirimleri</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-body border p-3">
                                    <div class="d-flex align-items-center">
                                        <!-- Icon -->
                                        <div class="icon-xl fs-1 bg-info bg-opacity-10 rounded-3 text-info">
                                            <i class="bi bi-bar-chart-line-fill"></i>
                                        </div>
                                        <!-- Content -->
                                        <div class="ms-3">
                                            <h3>{{ $comments }}</h3>
                                            <h6 class="mb-0">Blog yorumları</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Counter END -->
                    </div>
                        <div class="container pt-4">
                            <div class="row pb-4">
                                <div class="col-12">
                                    <!-- Title -->
                                    <h1 class="mb-0 h2">Site ayarları</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">{{ session('message') }}</div>
                                    @endif
                                    <!-- Chart START -->
                                    <div class="card border">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <!-- Form START -->
                                            <form action="{{ route('dashboard') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <!-- Main form -->
                                                <div class="row">
                                                    <div class="col-6">
                                                        <!-- Post name -->
                                                        <div class="mb-3">
                                                            <label class="form-label">SMTP sunucu</label>
                                                            <input name="smtp-host" type="text" class="form-control" value="{{ $settings->smtpHost }}">
                                                            @error('smtp-host') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <!-- Post name -->
                                                        <div class="mb-3">
                                                            <label class="form-label">SMTP port</label>
                                                            <input name="smtp-port" type="text" class="form-control" value="{{ $settings->smtpPort }}">
                                                            @error('smtp-port') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <!-- Post name -->
                                                        <div class="mb-3">
                                                            <label class="form-label">SMTP kullanıcı adı</label>
                                                            <input name="smtp-username" type="text" class="form-control" value="{{ $settings->smtpUsername }}">
                                                            @error('smtp-username') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <!-- Post name -->
                                                        <div class="mb-3">
                                                            <label class="form-label">SMTP şifre</label>
                                                            <input name="smtp-password" type="text" class="form-control" value="{{ $settings->smtpPassword }}">
                                                            @error('smtp-password') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <!-- Post name -->
                                                        <div class="mb-3">
                                                            <label class="form-label">SMTP mail</label>
                                                            <input name="smtp-email" type="text" class="form-control" value="{{ $settings->smtpEmail }}">
                                                            @error('smtp-email') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <!-- Post name -->
                                                        <div class="mb-3">
                                                            <label class="form-label">SMTP şifreleme</label>
                                                            <input name="smtp-encryption" type="text" class="form-control" value="{{ $settings->smtpEncryption }}">
                                                            @error('smtp-encryption') {{ $message }} @enderror
                                                        </div>
                                                    </div>

                                                    <!-- Short description -->
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Footer açıklama</label>
                                                            <textarea class="form-control" rows="3" name="footer-text">{{ $settings->footerText }}</textarea>
                                                            @error('footer-text') {{ $message }} @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-4">
                                                        <div class="mb-3">
                                                            <!-- Image -->
                                                            <div class="row align-items-center mb-2">
                                                                <div class="col-4 col-md-2">
                                                                    <div class="position-relative">
                                                                        <img class="rounded" src="{{ asset('upload/'.$settings->headerLogo) }}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-8 col-md-10 position-relative">
                                                                    <h6 class="my-2">Header logo düzenle</h6>
                                                                    <label class="w-100" style="cursor:pointer;">
                                                                        <span>
                                                                            <input class="form-control stretched-link" type="file" name="header-logo">
                                                                            @error('header-logo') {{ $message }} @enderror
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <p class="small mb-0 mt-2"><b>Not:</b> Resim yüklemezseniz eski resim kalır.</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <div class="mb-3">
                                                            <!-- Image -->
                                                            <div class="row align-items-center mb-2">
                                                                <div class="col-4 col-md-2">
                                                                    <div class="position-relative">
                                                                        <img class="rounded" src="{{ asset('upload/'.$settings->footerLogo) }}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-8 col-md-10 position-relative">
                                                                    <h6 class="my-2">Footer logo düzenle</h6>
                                                                    <label class="w-100" style="cursor:pointer;">
                                                                        <span>
                                                                            <input class="form-control stretched-link" type="file" name="footer-logo">
                                                                            @error('footer-logo') {{ $message }} @enderror
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <p class="small mb-0 mt-2"><b>Not:</b> Resim yüklemezseniz eski resim kalır.</p>
                                                        </div>
                                                    </div>

                                                    <!-- Create post button -->
                                                    <div class="col-md-12 text-start">
                                                        <button class="btn btn-primary w-100" type="submit">Güncelle</button>
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
                </div>
            </div>
        </section>

    </main>
@endsection
