@if(count($comments) > 0)
    @foreach($comments as $comment)
        <div class="my-4 d-flex">
            <img class="avatar avatar-md rounded-circle float-start me-3" src="{{ asset('upload/'.$comment->user->image) }}" alt="avatar">
            <div>
                <div class="mb-2">
                    <h5 class="m-0">{{ $comment->user->name }} {{ $comment->user->surname }}</h5>
                    <span class="me-3 small">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <p>{{ $comment->message }}</p>
            </div>
        </div>
    @endforeach
@else
    <div class="alert alert-warning">Henüz yorum yapılmamış</div>
@endif
