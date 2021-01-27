@extends('layouts.dashboardLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>BackOffice</h1>
            <h1>view = admin.posts.index</h1>
            <table class='table'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <a href="{{route('admin.posts.create')}}">Create(add new post)</a>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->slug}}</td>
                            <td>{{$post->content}}</td>
                            <td>{{$post->category ? $post->category->name : 'Non disponibile'}}</td>
                            <td>
                                <a href="{{route('admin.posts.show',['post' => $post])}}">Show</a>
                            </td>
                            <td>
                                <a href="{{route('admin.posts.edit',$post)}}">Edit</a>
                            </td>
                            <td>
                                <form class="d-inline-block" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" >
                                      Destroy
                                   </button>
                               </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
