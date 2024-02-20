@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Torna Indietro
            </a>
        </div>
        <h1 class="text-center">Crea un Appartamento</h1>

        <div class="row justify-content-center mt-5">
            <div class="col-6 mb-5">
                <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 has-validation">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" minlength="5" maxlength="150" required
                            class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            value="{{ old('title') }}">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">
                            <div>{{ $message }}</div>
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="number" required step=".01"
                            class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                            value="{{ old('price') }}">
                    </div>
                    @error('price')
                        <div class="alert alert-danger">
                            <div>{{ $message }}</div>
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="address" class="form-label">Indirizzo</label>
                        <input type="text" required class="form-control @error('address') is-invalid @enderror"
                            id="address" name="address" value="{{ old('address') }}">
                    </div>
                    @error('address')
                        <div class="alert alert-danger">
                            <div>{{ $message }}</div>
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="dimension_mq" class="form-label">Dimensione m²</label>
                        <input type="number" required class="form-control @error('dimension_mq') is-invalid @enderror"
                            id="dimension_mq" name="dimension_mq" value="{{ old('dimension_mq') }}">
                    </div>
                    @error('dimension_mq')
                        <div class="alert alert-danger">
                            <div>{{ $message }}</div>
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="rooms_number" class="form-label">Numero di Camere</label>
                        <input type="number" required class="form-control @error('rooms_number') is-invalid @enderror"
                            id="rooms_number" name="rooms_number" value="{{ old('rooms_number') }}">
                    </div>
                    @error('rooms_number')
                        <div class="alert alert-danger">
                            <div>{{ $message }}</div>
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="beds_number" class="form-label">Numero di Letti</label>
                        <input type="number" required class="form-control @error('beds_number') is-invalid @enderror"
                            id="beds_number" name="beds_number" value="{{ old('beds_number') }}">
                    </div>
                    @error('beds_number')
                        <div class="alert alert-danger">
                            <div>{{ $message }}</div>
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="bathrooms_number" class="form-label">Numero di Bagni</label>
                        <input type="number" required class="form-control @error('bathrooms_number') is-invalid @enderror"
                            id="bathrooms_number" name="bathrooms_number" value="{{ old('bathrooms_number') }}">
                    </div>
                    @error('bathrooms_number')
                        <div class="alert alert-danger">
                            <div>{{ $message }}</div>
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="is_visible">Disponibilità</label>
                        <select class="form-select" required name="is_visible" id="is_visible">
                            <option @selected(!old('is_visible')) value="">Nessuna tipologia</option>
                            <option @selected(old('is_visible') === 0) value="0">Disponibile</option>
                            <option @selected(old('is_visible') === 1) value="1">Non Disponibile</option>
                        </select>
                    </div>

                    @error('is_visible')
                        <div class="alert alert-danger">
                            <div>{{ $message }}</div>
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Immagine</label>
                        <input class="form-control" type="file" multiple id="cover_image" name="cover_image[]" value="{{ old('cover_image') }}">
                        <p class="alert alert-warning p-2 mt-2">Per selezionare più file, tenere premuto il tasto Ctrl (o Cmd su Mac) mentre si selezionano i file.</p>
                    </div>

                    <button class="btn btn-success" type="submit">Salva</button>

                </form>
            </div>
        </div>

    </div>
@endsection
