<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$idea->user->getImageUrl()}}" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('users.show', $idea->user->id)}}"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                @auth

                    @if (Auth::user()->id == $idea->user_id)
                        <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a class="ms-1" href="{{ route('ideas.show', $idea->id) }}">view</a>

                            <a class="ms-1" href="{{ route('ideas.edit', $idea->id) }}">edit</a>

                            <button class="btn ms-1 btn-danger btn-sm">X</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="idea" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark mb-2"> edit </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at }} </span>
            </div>
        </div>
        <div>

            @include('shared.comments-box')
        </div>
    </div>
</div>
