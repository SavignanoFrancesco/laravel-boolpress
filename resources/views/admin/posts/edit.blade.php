@extends('layouts.dashboardLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Edit post {{ $post->id }}</h1>
            </div>
            <form action="{{route('admin.posts.update' , ['post' => $post->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class='col-1'>Title:</label>
                    <input type="text" name="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label class='col-1'>Content:</label>
                    <textarea  name="content" rows="4" cols="50" required>{{ $post->content }}</textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
