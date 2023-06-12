@extends('layouts.admin')

@section('content')
    <div class="container text-center">


        <h1 class="my-3">Modifica il tuo progetto : <p class="tiping">{{ $project->title }} </p> </h1>
        <div class="">

            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- serve per sovrascrivere il metodo post dato che il form supporta solo get e post -->
                <!-- il value è per far si che quando si tenta di modificare un dato, questo rimanga salvato -->
                <div class="form-group w-50 mx-auto mt-5">
                    <label class="tiping my-3" for="title">Title</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $project->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group w-50 mx-auto mt-5">
                    <label class="tiping my-3" for="type">Tipologia</label>
                    <select class="form-select mx-auto w-25" id="type" name="type_id">
                        <option value=""></option>
                        @foreach ($types as $type)
                            <option @selected($type->id == old('type_id', $project->type?->id)) value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group my-5 ">
                    <h4 class="tiping my-3 " for="tecn">Tecnologie usate: </h4>
                    <div class="d-flex justify-content-center my-3 gap-3">

                        @foreach ($technologies as $key => $technology)

                            {{-- al primo caricamento della pagina devo selezionare i checkbox che sono salvati nel db e ho una collection di tecnologie
                            se c'è un errore al submit, devo selezionare i checkbox che sono stati selezionati dallutente nella pagina precedente, quindi ho array preso da old --}}

                            <label for="technology-{{ $technology->id }}">{{ $technology->name_technologies }}</label>
                            <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"
                                value="{{ $technology->id }}" @checked(old('technologies')
                                        ? in_array($technology->id, old('technologies', []))
                                        : $project->technologies->contains($technology))>

                            @error('technologies')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endforeach
                    </div>

                </div>

                <div class="form-group w-50 mx-auto my-5">
                    <label for="description" class="tiping my-4">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description', $project->description) }}</textarea>

                </div>
                <div class="cta d-flex-gap-3">
                    <input type="submit" value="Salva" class="btn btn-primary">
                    <a class="btn btn-success mx-2" href="{{ route('admin.projects.index') }}">Annulla</a>
                </div>
            </form>
            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn my-2 btn-danger deletBtn">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>


        </div>

    </div>

    @include('admin.projects.delete')
@endsection
