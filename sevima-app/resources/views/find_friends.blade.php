@extends('sidebar')

@section('content')
    <div class="container row">
        @foreach ($listUser as $user)
            <div class="card follower-card shadow-sm border-0" style="width: 18rem; margin-left: 10px;">
                <div class="card-body text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" class="rounded-circle mb-3" alt="Avatar"
                        style="width: 50px; height: 50px;">
                    <h5 class="card-title mb-0">{{$user->username}}</h5>
                    <p class="text-muted small">{{"@" . $user->username}}</p>
                    {{-- <p class="fw-bold mb-2">12.7K Followers</p> --}}
                    @php
                    $isFollowing = false;
                @endphp
                
                @if (count($friends) > 0)
                    @foreach ($friends as $f)
                        @if ($user->userid == $f->userid2)
                            @php
                                $isFollowing = true;
                                break;
                            @endphp
                        @endif
                    @endforeach
                @endif
                
                @if ($isFollowing)
                    <form action="{{ route('unfollow') }}" method="post">
                        @csrf
                        <input type="hidden" name="friendid" value="{{ $user->userid }}">
                        <button class="btn btn-primary btn-sm">Unfollow</button>
                    </form>
                @else
                    <form action="{{ route('follow') }}" method="post">
                        @csrf
                        <input type="hidden" name="friendid" value="{{ $user->userid }}">
                        <button class="btn btn-outline-primary btn-sm">Follow</button>
                    </form>
                @endif
                

                </div>
            </div>
        @endforeach
    </div>
@endsection