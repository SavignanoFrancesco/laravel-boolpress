@extends('layouts.app')
@section('content')
    <body>

        <div class="container">
            <h1>FrontOffice</h1>
            <h1>view = guest.posts.index</h1>

            <h2>[Posts pubblici]</h2>
            <ul>
                @foreach ($posts as $post)
                    <li>
                        <a href='{{route('public_posts.show', ['slug' => $post->slug])}}'>
                            Title: {{$post->title}}
                        </a>
                    </li>

                @endforeach
            </ul>
        </div>

    </body>
@endsection
