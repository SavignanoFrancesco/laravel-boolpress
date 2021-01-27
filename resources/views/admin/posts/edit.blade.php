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
                <div class="">
                    <label class='col-1'>Title:</label>
                    <input type="text" name="title" value="{{$post->title}}">
                </div>
                <div class="">
                    <label class='col-1'>Content:</label>
                    <textarea  name="content" rows="4" cols="50" required>{{ $post->content }}</textarea>
                </div>

                <div class="">
                    <label class='col-1'>Category:</label>
                    <select class="" name="category_id">
                        <option value="">
                            Non disponibile
                        </option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected=selected' : ''}}>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <button type="submit">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
