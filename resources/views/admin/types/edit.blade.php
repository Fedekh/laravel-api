@extends('layouts.admin')

@section('content')
    <div class="container text-center">


        <h1 class="my-3">Modifica il tuo progetto {{ $type->name }}: </h1>
        <div class="">

            <form action="{{ route('admin.types.update', $type->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class=" my-5form-group w-50 mx-auto mt-5">
                    <label for="name">MODIFICA TITOLO TIPO</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $type->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="submit" value="Salva" class="btn btn-primary my-3 ">
                <a class="btn my-5 btn-success" href="{{ route('admin.types.index') }}">Annulla</a>
            </form>

            <form action="{{ route('admin.types.destroy', $type->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn my-5 btn-danger deletBtn">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>


        </div>

    </div>
    @include('admin.projects.delete')

@endsection
