@extends('layouts.app')
@section('content')
    <body>

        <div class="container">

                <h1>FrontOffice</h1>
                <h1>view = guest.tag_posts.show</h1>


                <h2>Tag:{{$tag->name}}</h2>
                <ul>
                    @foreach ($tag->posts as $tag_post)
                        <li>
                            <a href="{{route('public_posts.show',['slug' => $tag_post->slug])}}">
                                {{$tag_post->title}}
                            </a>
                        </li>
                    @endforeach
                </ul>


        </div>

    </body>
@endsection
