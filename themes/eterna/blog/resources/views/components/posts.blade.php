@if(count($posts) > 0)
    @foreach($posts as $post)
        <!-- Card item START -->
        <div class="col-sm-6">
            <div class="card">
                <!-- Card img -->
                <div class="position-relative">
                    <img class="card-img" src="{{ asset('upload/'.$post->image) }}" alt="Card image">
                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                        <!-- Card overlay bottom -->
                        <div class="w-100 mt-auto">
                            <!-- Card category -->
                            <a href="{{ route('category', $post->categor->id) }}" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $post->categor->title }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-3">
                    <h4 class="card-title mt-2"><a href="{{ route('post', $post->id) }}" class="btn-link text-reset fw-bold">{{ $post->title }}</a></h4>
                    <p class="card-text">{{ $post->description }}</p>
                    <!-- Card info -->
                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                        <li class="nav-item">
                            <div class="nav-link">
                                <div class="d-flex align-items-center position-relative">
                                    <div class="avatar avatar-xs">
                                        <img class="avatar-img rounded-circle" src="{{ asset('upload/'.$post->user->image) }}" alt="avatar">
                                    </div>
                                    <span class="ms-3">by <a href="{{ route('posts.user', $post->user->id) }}" class="stretched-link text-reset btn-link">{{ $post->user->name }}</a></span>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">{{ $post->created_at->diffForHumans() }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Card item END -->
    @endforeach

    {{ $posts->links() }}
@else
<div class="alert alert-warning">Henüz post oluşturulmamış</div>
@endif
