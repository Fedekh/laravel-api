@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h1 class="my-3 tiping">Inserisci il tuo project : </h1>


        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group w-75 mx-auto my-5 ">
                <label for="title" class="tiping">Inserisci titolo</label>
                <input type="text" name="title"
                    class="form-control mx-auto my-3 w-50 @error('title') is-invalid @enderror" id="title"
                    placeholder="Inserisci titolo" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group w-25 mx-auto my-5 ">
                <label for="type" class="tiping my-3">Inserisci la tipologia</label>
                <select class="form-select w-50 mx-auto" id="type" name="type_id">
                    <option value=""></option>
                    @foreach ($types as $type)
                        <option class="text-center" @selected(old('type_id') == $type->id) value="{{ $type->id }}">
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group my-5 ">
                <h3 for="type" class="tiping">Tecnologie usate</h3>
                @foreach ($technologies as $technology)
                    <div class="d-flex tech mx-auto flex-wrap my-3 gap-3">

                        {{-- l'input deve essere selezionato solo se technology->Id è contenuto nell array old(technologies) --}}

                        <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"
                            value="{{ $technology->id }}" @checked(in_array($technology->id, old('technologies', [])))>
                        <label for="">{{ $technology->name_technologies }}</label>

                    </div>
                @endforeach


            </div>


            <div class="form-group my-5 mx-auto tiping w-50">
                <label for="content">Inserisci descrizione</label>
                <textarea name="content" id="content"class="form-control" cols="30" rows="10">{{ old('content') }}</textarea>
            </div>

            {{-- immagine --}}
            <div class="my-3 w-50 mx-auto">
                <label for="image-input" class="form-label">Carica immagine</label>
                <input type="file" class="form-control" id="image-input" name="image">
                {{-- preview --}}
                <div class="d-flex justify-content-center my-3">
                    <img class="d-none" id="image-preview" src="" alt="">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success" href="{{ route('admin.projects.index') }}">Ritorna nella lista</a>

        </form>

    </div>

    
@endsection
