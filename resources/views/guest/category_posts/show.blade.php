@extends('layouts.app')
@section('content')
    <body>

        <div class="container">

                <h1>FrontOffice</h1>
                <h1>view = guest.category_posts.show</h1>


                <h2>Category:{{$category->name}}</h2>
                <ul>
                    @foreach ($category->posts as $category_post)
                        <li>
                            <a href="{{route('public_posts.show',['slug' => $category_post->slug])}}">
                                {{$category_post->title}}
                            </a>
                        </li>
                    @endforeach
                </ul>


        </div>

    </body>
@endsection
