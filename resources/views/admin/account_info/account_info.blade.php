@extends('layouts.dashboardLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Account info</h1>
            <h1>BackOffice</h1>
            <h1>view = admin.account_info.account_info</h1>
            <div class="card">

                <div class="card-body">
                    <dl>
                        <dt>Name:</dt>
                        <dd>{{ Auth::user()->name }}</dd>
                        <dt>Email:</dt>
                        <dd>{{ Auth::user()->email }}</dd>
                        <dt>API Bearer Token:</dt>
                        @if (Auth::user()->api_token)
                            <dd>{{ Auth::user()->api_token }}</dd>
                        @else
                            <form class="" action="{{route('admin.token_generator')}}" method="post">
                                @csrf
                                <button type="submit" name="button">
                                    Genera api_token
                                </button>
                            </form>
                        @endif
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
