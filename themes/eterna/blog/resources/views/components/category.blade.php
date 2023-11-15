@if($categories->count() > 0)
    @foreach($categories as $category)
        <!-- Category item -->
        <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded bg-dark-overlay-4 " style="background-image:url({!! Theme::asset('images/blog/4by3/01.jpg') !!}); background-position: center left; background-size: cover;">
            <div class="p-3">
                <a href="{{ route('category', $category['id']) }}" class="stretched-link btn-link fw-bold text-white h5">{{ $category['title'] }}</a>
            </div>
        </div>
        <!-- Category item -->
    @endforeach
@else
    <div class="alert alert-warning">Henüz kategori eklenmemiş</div>
@endif
