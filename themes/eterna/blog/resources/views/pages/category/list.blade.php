@extends('layouts.app')

@section('content')
    <main>
        <!-- =======================
        Main content START -->
        <section class="position-relative">
            <div class="container" data-sticky-container>
                <div class="row">
                    <!-- Sidebar START -->
                    <div class="col-lg-12 mt-5 mt-lg-0">
                        <div data-sticky data-margin-top="80" data-sticky-for="767">

                            <!-- Trending topics widget START -->
                            <div>
                                <h4 class="mt-4 mb-3">Kategoriler</h4>
                                @if($categories->count() > 0)
                                    @foreach($categories as $category)
                                        <!-- Category item -->
                                        <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded bg-dark-overlay-4 " style="background-image:url({!! Theme::asset('images/blog/4by3/01.jpg') !!}); background-position: center left; background-size: cover;">
                                            <div class="p-5 my-3">
                                                <a href="{{ route('category', $category->id) }}" class="stretched-link btn-link fw-bold text-white h4">{{ $category['title'] }}</a>
                                            </div>
                                        </div>
                                        <!-- Category item -->
                                    @endforeach
                                @else
                                    <div class="alert alert-warning">Henüz kategori eklenmemiş.</div>
                                @endif
                            </div>
                            <!-- Trending topics widget END -->
                        </div>
                    </div>
                    <!-- Sidebar END -->
                </div> <!-- Row end -->
            </div>
        </section>
        <!-- =======================
        Main content END -->
    </main>
@endsection
