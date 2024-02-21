@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header red-bg text-light">{{ __('Dashboard') }}</div>

                    <div class="card-body gray-bg">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Sei dentro!') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="collapse" id="user-info-popup">
            <div id="popup-block">
                <a class="dropdown-item" data-bs-toggle="collapse" data-bs-target="#user-info-popup" aria-expanded="false" aria-controls="user-info-popup"><i class="fa-solid fa-circle-xmark"></i></a>

            <div>
                <h5>Nome:</h5>
                <span>{{ Auth::user()->name }}</span>
            </div>
            <div>
                <h5>E-mail:</h5>
                <span>{{ Auth::user()->email }}</span>
            </div>
            </div>
        </div>
    </div>
@endsection
