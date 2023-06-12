@extends('layouts.admin')

@section('content')
    <div class="container text-center">


        <h1 class="my-3">Modifica nome di: <p class="tiping"> {{ $technology->name_technologies }} </p> </h1>
        <div class="">

            <form action="{{ route('admin.technologies.update', $technology->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class=" my-5form-group w-50 mx-auto mt-5">
                    <label for="name_technologies">MODIFICA TITOLO</label>
                    <input type="text" name="name_technologies" id="name_technologies"
                        class="form-control @error('name_technologies') is-invalid @enderror"
                        value="{{ old('name_technologies', $technology->name_technologies) }}">
                    @error('name_technologies')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="submit" value="Salva" class="btn btn-primary my-3 ">
                <a class="btn my-5 btn-success" href="{{ route('admin.technologies.index') }}">Annulla</a>
            </form>

            <form action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger deletBtn">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>


        </div>

    </div>
    @include('admin.projects.delete')

@endsection
