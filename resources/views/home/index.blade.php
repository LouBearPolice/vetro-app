@extends('layouts.app')

@section('content')
    <div class="flex justify-center bg-grey">
        
        <form class="mb-4 mt-4 p-4 bg-light border border-1 rounded" action="{{ route('home') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="post_content" id="post_content" class="form-control @error('post_content') border-red @enderror" col="30" rows="4" placeholder="Post"></textarea>
                
                @error('post')
                    <span class="text-red mt-2 text-small">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>    
        </form>

        <!-- Chech if we have posts: -->
        @if ($posts->count())
        <div>
            @foreach($posts as $post)

                <div class="card mb-4">
                    <div class="card-header">
                        <span>
                            <span class="fw-bold">{{ $post->user->name }} </span> | 
                            <span class="fw-light text-small">{{ $post->created_at->diffForHumans() }}</apsn>
                        </span> 

                        @if($post->ownedBy(auth()->user()))
                            <div class="d-inline-block float-end">
                                <form action="{{ route('posts.delete', $post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="">Delete Post</button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->post_content }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <!-- If user liked the post -->
                        @auth
                            @if(!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.like', $post) }}" method="post" class="d-block float-start">
                                    @csrf
                                    <button type="submit" class="text-blue">Like</button>
                                </form>
                            @else
                                <form action="{{ route('posts.like', $post) }}" method="post" class="d-block float-start">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue">Unlike</button>
                                </form>
                            @endif
                        @endauth

                        <span class="d-block ms-2 mt-1 float-start">{{ $post->likes->count() }} {{ Str::plural('Like', $post->likes->count()) }}</span>
                    </div>
                </div>

            @endforeach

            {{ $posts->links() }}
        </div>
        @else

        @endif

    </div>
@endsection