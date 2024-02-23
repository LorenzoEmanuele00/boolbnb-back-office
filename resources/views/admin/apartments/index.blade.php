@extends('layouts.admin')

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-danger my-2">
                {{ session('message') }}
            </div>
        @endif
        <div class="text-end my-4">
            <a class="btn btn-success" href="{{route('admin.apartments.create')}}">Crea nuovo appartamento</a>
        </div>

        {{-- <form action="{{route('apartments.search')}}" method="GET">
            <input type="text" name="search" placeholder="Search Products">
            <button type="submit">Cerca...</button>
        </form> --}}

        @if (count($apartments) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Titolo</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Disponibilità</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apartment)
                        <tr>
                            <th scope="row">{{$apartment->title}}</th>
                            <td>
                                {{$apartment->price}}$
                            </td>
                            <td>
                                {{$apartment->is_visible === 1 ? 'Disponibile' : 'Non disponibile'}}
                            </td>
                            <td>
                                <a class="btn btn-primary" style="width: 40px" href="{{ route('admin.apartments.show', ['apartment' => $apartment->slug]) }}"><i class="fa-solid fa-info"></i></a>
                                <a class="btn btn-warning text-light" style="width: 40px" href="{{ route('admin.apartments.edit', ['apartment' => $apartment->slug]) }}"><i class="fa-solid fa-pencil"></i></a>
                                <form action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->slug]) }}" class="d-inline-block" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-delete" style="width: 40px" type="submit" data-title="{{ $apartment->title }}"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @include('partials.delete_modal')
        @else
            <h2 class="py-2">Inserisci qui i tuoi Appartamenti</h2>
        @endif

        {{-- @if (count($results) > 0)
            <ul>
                @foreach ($results as $result)
                <li>{{$result->name}}</li>
                @endforeach
            </ul>
            @else
                <p>Suca</p>
            @endif --}}
    </div>
@endsection