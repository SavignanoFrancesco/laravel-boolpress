@extends('layouts.dashboardLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Categories</h1>
            <h1>BackOffice</h1>
            <h1>view = admin.categories.index</h1>
            <table class='table'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <a href="{{route('admin.categories.create')}}">Create(add new category)</a>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>
                                <a href="{{route('admin.categories.edit',$category)}}">Edit</a>
                            </td>

                            {{-- <td>
                                <a href="{{route('admin.categories.show',['post' => $post])}}">Show</a>
                            </td>
                            <td>
                                <form class="d-inline-block" action="{{ route('admin.categories.destroy', ['post' => $post->id]) }}" method="post">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" >
                                      Destroy
                                   </button>
                               </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
