@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h1 class="my-3">Inserisci una nuova tecnologia : </h1>


        <form action="{{ route('admin.technologies.store') }}" method="POST">
            @csrf

            <div class="form-group w-75 mx-auto my-5 ">
                <label for="technology">Inserisci nome della tecnologia</label>
                <input type="text" name="name_technologies" class="@error('name_technologies') is-invalid @enderror form-control mx-auto my-3 w-50 @error('technology') is-invalid @enderror"
                    id="technology" placeholder="Inserisci titolo" value="{{ old('technology') }}">
                @error('name_technologies')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success" href="{{ route('admin.technologies.index') }}">Ritorna nella lista</a>

        </form>
    </div>
@endsection
