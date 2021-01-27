@extends('layouts.app')
@section('content')
    <body>

        <div class="container">

                <h1>FrontOffice</h1>
                <h1>view = guest.posts.show</h1>

                <h2>[Posts pubblico]</h2>
                <h3>{{$post->title}}</h3>
                <p>{{$post->content}}</p>

        </div>

    </body>
@endsection
