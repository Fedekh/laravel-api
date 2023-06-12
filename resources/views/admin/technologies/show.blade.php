
@extends('layouts.admin')

@section('content')
    <div class="container text-center ">

        <h3><span class="tiping my-5">Tecnologia: </span> <p>{{ $technology->name_technologies }}</p> </h3>

        <div class="cta d-flex justify-content-center my-5 gap-5">
            <div class="catin">
                <a href="{{ route('admin.technologies.index') }}" class="btn btn-success"> Torna dietro </a>
            </div>
            <a href="{{ route('admin.technologies.edit', $technology->slug) }}" class="btn btn-warning">
                <i class="fa-solid fa-pencil"></i>
            </a>

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
