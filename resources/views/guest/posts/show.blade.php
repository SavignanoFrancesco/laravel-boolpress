@extends('layouts.app')
@section('content')
    <body>

        <div class="container">

                <h1>FrontOffice</h1>
                <h1>view = guest.categories.show</h1>

                <h2>[Posts pubblico]</h2>
                <h3>{{$post->title}}</h3>
                <p>{{$post->content}}</p>
                {{-- laravel trova la corrispondenza fra post e categoria (category è la funzione del model Post)--}}
                {{-- {{dd($post->category)}} --}}

                {{-- link per vedere i posts associati ad una categoria, se non cè la categoria non deve essere cliccabile --}}
                <p>Category:
                    @if ($post->category)
                        <a href="{{route('category_posts.show', ['slug' => $post->category->slug])}}">
                            {{$post->category->name}}
                        </a>
                    @else
                        Non disponibile
                    @endif
                </p>
                <p>Tags:
                    
                </p>


        </div>

    </body>
@endsection
