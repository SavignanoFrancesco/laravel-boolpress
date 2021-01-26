@extends('layouts.app')
@section('content')
    <body>

        <div class="container">
            <h1>FrontOffice</h1>
            <h1>view = guest.posts.index</h1>

            <h2>[Posts pubblici]</h2>
            @foreach ($posts as $post)
                <h3>Title: {{$post->title}}</h3>
                <p>Content: {{$post->content}}</p>
            @endforeach
        </div>

    </body>
@endsection
