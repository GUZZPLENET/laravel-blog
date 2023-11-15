@extends('layouts.app')

@section('content')
    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- ======================= Inner intro START -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                        <div class="bg-primary bg-opacity-10 rounded p-4 p-sm-5">
                            <h2>Hesap oluştur</h2>
                            <!-- Form START -->
                            <form class="mt-4" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="name">Ad</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Ad" value="{{ old('name') }}">
                                    @error('name') {{ $message }} @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="surname">Soyad</label>
                                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Soyad" value="{{ old('surname') }}">
                                    @error('surname') {{ $message }} @enderror
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="E-mail" name="email" value="{{ old('email') }}">
                                    @error('email') {{ $message }} @enderror
                                </div>
                                <!-- Password -->
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Şifre</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="*********">
                                    @error('password') {{ $message }} @enderror
                                </div>
                                <!-- Password -->
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputPassword2">Şifreni doğrula</label>
                                    <input type="password" class="form-control" id="exampleInputPassword2" name="re-password" placeholder="*********">
                                    @error('re-password') {{ $message }} @enderror
                                </div>
                                <!-- Button -->
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-success">Kayıt ol</button>
                                    </div>
                                    <div class="col-sm-8 text-sm-end">
                                        <span>Zaten hesabın var mı? <a href="{{ route('login') }}"><u>Giriş yap</u></a></span>
                                    </div>
                                </div>
                            </form>
                            <!-- Form END -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======================= Inner intro END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

@endsection
