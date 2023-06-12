@extends('layouts.admin')

@section('content')
    <div class="container text-center ">

        <h3><span class="tiping my-5">Tipologia:</span> {{ $type->name }}</h3>

        <div class="cta d-flex justify-content-center my-5 gap-5">
            <div class="catin">
                <a href="{{ route('admin.types.index') }}" class="btn btn-success"> Torna dietro </a>
            </div>

            <form action="{{ route('admin.types.destroy', $type->slug) }}" method="POST">
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