@extends('layouts.app')

@section('content')
<div class="">
    @include('partials.success')
    <h1>Inserisci nuova categoria(riga della tabella categories)</h1>
    <form id='form' action="{{route('admin.categories.store')}}" method="post">

        @csrf{{-- token --}}

        @if($user_mistake)
            <h2>La categoria che hai provato a inserire esiste già</h2>
        @endif

        <div class="">
            <label class='col-1'>Name:</label>
            <input type="text" name="name">
        </div>

        </div>

        <div class="btn-group">
            <button type="submit" name='submit' value='index_view'>Salva post e visualizza tabella</button>

            <button type="submit" name='submit' value='create_view' class=''>Salva post e aggiungine un altro</button>
        </div>
    </form>
</div>
@endsection
