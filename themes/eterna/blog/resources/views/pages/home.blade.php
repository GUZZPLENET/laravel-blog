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
                <div class="col-lg-9">
                    <!-- Title -->
                    <div class="mb-4">
                        <h2 class="m-0"><i class="bi bi-hourglass-top me-2"></i>Son paylaşımlar</h2>
                        <p>Gündem hakkında bilgi edin.</p>
                    </div>
                    <div class="row gy-4">
                        <x-posts :posts="$posts"></x-posts>
                    </div>
                </div>
                <!-- Main Post END -->
                <!-- Sidebar START -->
                <div class="col-lg-3 mt-5 mt-lg-0">
                    <div data-sticky data-margin-top="80" data-sticky-for="767">

                        <!-- Trending topics widget START -->
                        <div>
                            <h4 class="mt-4 mb-3">Kategoriler</h4>
                            <x-category :categories="$categories"></x-category>
                            <!-- View All Category button -->
                            <div class="text-center mt-3">
                                <a href="{{ route('categories') }}" class="fw-bold text-body text-primary-hover"><u>Tüm kategorileri görüntüle</u></a>
                            </div>
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
<!-- **************** MAIN CONTENT END **************** -->
@endsection()
