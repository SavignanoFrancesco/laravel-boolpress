@if(session('success'))
    {{session('success')}}
@else
    {{session('error')}}
@endif
