@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="text-end my-3">
            <a class="btn btn-primary" href="{{route('admin.apartments.create')}}">Nuovo Appartamento</a>
        </div>
        @if (count($apartments) > 0)
            <table class="table table-striped border border-2 w-75 m-auto">
                <thead>
                    <tr>
                        
                        <th scope="col">Titolo</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col" >Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apartment)
                        <tr>
                            <th scope="row">{{$apartment->title}}</th>
                            <td>{{$apartment->price}}</td>
                            <td>
                                <a class="btn btn-success index_btn" href="{{ route('admin.apartments.show', ['apartment' => $apartment->slug]) }}"><i class="fa-solid fa-info"></i></a>
                                <a class="btn btn-warning index_btn" href="{{ route('admin.apartments.edit', ['apartment' => $apartment->slug]) }}"><i class="fa-solid fa-pencil"></i></a>
                                <form action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->slug]) }}" class="d-inline-block" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger index_btn" type="submit"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h2 class="py-2">Inserisci qui i tuoi Appartamenti</h2>
        @endif
    </div>
@endsection