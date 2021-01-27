@extends('layouts.dashboardLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Visualizzazione post id: {{ $post->id }}</h1>
            </div>
            <dl>
                <dt>Titolo</dt>
                <dd>{{ $post->title }}</dd>
                <dt>Slug</dt>
                <dd>{{ $post->slug }}</dd>
                <dt>Contenuto</dt>
                <dd>{{ $post->content }}</dd>
            </dl>
        </div>
    </div>
</div>
@endsection
