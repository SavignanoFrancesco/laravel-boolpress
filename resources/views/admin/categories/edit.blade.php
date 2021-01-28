@extends('layouts.dashboardLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Edit category {{ $category->id }}</h1>
            </div>
            @if($user_mistake)
                <h2>La categoria che hai provato a inserire esiste già</h2>
            @endif
            <form action="{{route('admin.categories.update' , ['category' => $category->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="">
                    <label class='col-1'>Name:</label>
                    <input type="text" name="name" value="{{$category->name}}">
                </div>

                <div class="">
                    <button type="submit">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
