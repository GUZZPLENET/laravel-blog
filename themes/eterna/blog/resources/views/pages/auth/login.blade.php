@extends('layouts.app')

@section('content')
    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <!-- ======================= Inner intro START -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                        <div class="p-4 p-sm-5 bg-primary bg-opacity-10 rounded">
                            <h2>Hesabına giriş yap</h2>
                            <!-- Form START -->
                            <form class="mt-4" action="{{ route('login') }}" method="POST">
                                @csrf
                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail" name="email">
                                    @error('email') {{ $message }} @enderror()
                                </div>
                                <!-- Password -->
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Şifre</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="*********" name="password">
                                    @error('password') {{ $message }} @enderror()
                                </div>
                                <!-- Checkbox -->
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" value="true" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Beni hatırla</label>
                                </div>
                                <!-- Button -->
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-success">Giriş yap</button>
                                    </div>
                                    <div class="col-sm-8 text-sm-end">
                                        <span>Hesabın yok mu? <a href="{{ route('register') }}"><u>Kayıt ol</u></a></span>
                                    </div>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======================= Inner intro END -->
    </main>
    <!-- **************** MAIN CONTENT END **************** -->
@endsection
