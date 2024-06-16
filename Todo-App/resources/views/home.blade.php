@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h4>
                        Go to main page
                        <a class="btn btn-sm btn-info" href="{{ route('index') }}">
                            Main Page
                        </a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
