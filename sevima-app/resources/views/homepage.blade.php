@extends('sidebar')

@section('content')
    <style>
        .insta-card {
            max-width: 500px;
            margin: 20px auto;
        }

        .home-profile {
            width: 40px;
            height: 40px
        }

        .comment-section {
            padding: 10px 15px;
            border-top: 1px solid #eee;
        }

        .comment-box {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 8px 12px;
            margin-bottom: 5px;
        }

        .comment-form textarea {
            resize: none;
            height: 60px;
        }
    </style>

    <div class="container">
        @foreach ($listPosts as $post)
        <div class="d-flex">
            <div class="container mt-4">
                <div class="insta-card card shadow-sm">
                    <div class="card-header d-flex align-items-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png"
                            class="rounded-circle me-2 home-profile" alt="user">
                        <strong>{{ $post->username }}</strong>
                    </div>

                    <img src="{{ asset('assets/' . $post->img) }}" class="card-img-top" alt="Post image">

                    <div class="card-body">
                        <p class="card-text mb-1"><strong>{{ $post->username }}</strong> {{ $post->caption }}</p>
                        <p class="text-muted small">{{ $post->time_ago }}</p>
                    </div>

                    {{-- Comments --}}
                    <div class="comment-section">
                        {{-- Show comments --}}
                        @if (!empty($post->comments))
                            @foreach ($post->comments as $comment)
                                <div class="comment-box">
                                    <strong>{{ $comment->username }}:</strong> {{ $comment->comment }}
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted small">No comments yet.</p>
                        @endif

                        <form action="#" method="POST" class="mt-2 comment-form">
                            @csrf
                            <input type="hidden" name="postid" value="{{ $post->postid }}">
                            <div class="mb-2">
                                <textarea name="comment" class="form-control" placeholder="Add a comment..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-outline-primary">Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
