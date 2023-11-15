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
                        <h1 class="mb-0 h2">Kategori oluştur</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Chart START -->
                        <div class="card border h-100">
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Form START -->
                                <form action="{{ route('dashboard.categories.store') }}" method="POST">
                                    @csrf
                                    <!-- Main form -->
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Post name -->
                                            <div class="mb-3">
                                                <label class="form-label">Başlık</label>
                                                <input name="title" type="text" class="form-control">
                                                @error('title') {{ $message }} @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-start">
                                            <button class="btn btn-primary" type="submit">Oluştur</button>
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
