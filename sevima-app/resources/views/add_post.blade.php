@extends('sidebar')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0 rounded-4">
          <div class="card-body p-4">
            <h4 class="mb-4 text-center">Add New Post</h4>
            <form action="{{route('post')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="mb-3">
                <label for="postImage" class="form-label">Upload Image</label>
                <input class="form-control" type="file" name="file_upload" id="postImage" accept="image/*">
              </div>
              <div class="mb-3">
                <label for="caption" class="form-label">Caption</label>
                <textarea class="form-control" name="caption" id="caption" rows="3" placeholder="Write something..."></textarea>
              </div>
              <button type="submit" class="btn btn-primary w-100">Post</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection