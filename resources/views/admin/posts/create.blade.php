@extends('layouts.app')

@section('content')
<div class="">
    @include('partials.success')
    <h1>Inserisci nuovo prodotto(riga della tabella products)</h1>
    <form id='form' action="{{route('admin.posts.store')}}" method="post">

        @csrf{{-- token --}}
        <div class="">
            <label>Title</label>
            <input type="text" name="title">
        </div>
        <div class="">
            <label>Content</label>
            <textarea name="content" rows="4" cols="50"></textarea>
        </div>

        <div class="btn-group">
            <button type="submit" name='submit' value='index_view'>Salva post e visualizza tabella</button>

            <button type="submit" name='submit' value='create_view'>Salva post e aggiungine un altro</button>
        </div>
    </form>
</div>
@endsection
