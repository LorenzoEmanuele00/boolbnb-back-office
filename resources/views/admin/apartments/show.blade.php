@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="card border border-0 text-center col-8 p-2">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold mt-2 mb-2">{{ $apartment->title }}</h5>
                    <h6 class="card-subtitle text-muted">{{ $apartment->address }}</h6>
                    <p class="mb-4 text-muted">({{ $apartment->latitude }} , {{ $apartment->longitude }})</p>
                    <p>Prezzo: <span class="text-danger">{{ $apartment->price }}$</span></p>
                    <p>Dimensione: <span class="text-primary">{{ $apartment->dimension_mq }} mq</span></p>
                    <p>{{ $apartment->rooms_number }} camere da letto - {{ $apartment->beds_number }} letti -
                        {{ $apartment->bathrooms_number }} bagni</p>
                        <div class="mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i> Torna Indietro
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
