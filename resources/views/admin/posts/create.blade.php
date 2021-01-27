@extends('layouts.app')

@section('content')
<div class="">
    @include('partials.success')
    <h1>Inserisci nuovo prodotto(riga della tabella products)</h1>
    <form id='form' action="{{route('admin.posts.store')}}" method="post">

        @csrf{{-- token --}}
        <div class="">
            <label class='col-1'>Title:</label>
            <input type="text" name="title">
        </div>
        <div class="">
            <label class='col-1'>Content:</label>
            <textarea name="content" rows="4" cols="50"></textarea>
        </div>

        <div class="">
            <label class='col-1'>Category:</label>
            <select class="" name="category_id">
                <option value="">
                    >>Seleziona categoria<<
                </option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="btn-group">
            <button type="submit" name='submit' value='index_view'>Salva post e visualizza tabella</button>

            <button type="submit" name='submit' value='create_view' class=''>Salva post e aggiungine un altro</button>
        </div>
    </form>
</div>
@endsection
