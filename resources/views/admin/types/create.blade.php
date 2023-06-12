@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h1 class="my-3">Inserisci il tuo tipo nuovo : </h1>


        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf

            <div class="form-group w-75 mx-auto my-5 ">
                <label for="name">Inserisci titolo tipo</label>
                <input type="text" name="name" class="form-control mx-auto my-3 w-50 @error('name') is-invalid @enderror"
                    id="name" placeholder="Inserisci titolo" value="{{ old('type') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success" href="{{ route('admin.types.index') }}">Ritorna nella lista</a>

        </form>

    </div>
@endsection
