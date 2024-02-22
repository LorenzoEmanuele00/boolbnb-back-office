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
                    <p>{{ $apartment->rooms_number }} camere da letto - {{ $apartment->beds_number }} letti - {{ $apartment->bathrooms_number }} bagni</p>

                    @if (count($apartment->services) > 0)
                        <p>
                            Servizi disponibili:
                            <div>
                                @foreach ($apartment->services as $service)
                                    <span class="badge border text-dark">
                                        <i class="{{ $service->icon }}"></i>  {{ $service->name }}
                                    </span>
                                @endforeach
                            </div>
                        </p>
                    @endif
                    
                    @if ($apartment->images)
                        <div class="d-flex">
                            @foreach ($apartment->images as $image)
                            <img class="w-25 py-4 m-auto" src="{{ asset('storage/' . $image->image_path) }}" alt="">
                            @endforeach
                        </div>
                    @else
                        <p>Nessuna immagine presente</p>
                    @endif

                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Cognome</th>
                                    <th scope="col">Leggi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leads as $lead)
                                    <tr>
                                        <th scope="row">{{$lead->first_name}}</th>
                                        <td>
                                            {{$lead->last_name}}
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" style="width: 40px" href="{{ route('admin.leads.show', ['lead' => $lead->id]) }}"><i class="fa-solid fa-info"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
