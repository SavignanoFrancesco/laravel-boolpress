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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->slug}}</td>
                            <td>{{$post->Content}}</td>
                            <td>
                                <a href="{{route('admin.posts.index')}}">Show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
