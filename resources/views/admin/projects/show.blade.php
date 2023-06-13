@extends('layouts.admin')

@section('content')
    <h1 class="text-center my-4"><span class="tiping"> Progetto : </span>{{ $project->title }}</h1>
    <h4 class="text-start my-3"> <span class="tiping"> Lo slug è:</span> {{ $project->slug }} </h4>
    <h4 class="my-4"><span class="tiping">La descrizione è :</span> {{ $project->content }}</h4>

    @if ($project->type)
        <h4><span class="tiping my-4">Tipologia:</span> {{ $project->type->name }}</h4>
    @else
        <h4><span class="tiping my-4">Nessuna Tipologia </span></h4>
    @endif


    <div class="tecno d-flex my-5 gap-4">
        <h4 class="tiping">Tecnologie usate:</h4>

        @forelse ($project->technologies as $item)
            {{-- il forelse è un foreach che se non trova nulla esegue il blocco empty --}}
            <h5>{{ $item->name_technologies }}</h5>
        @empty
            <h5>Nessuna tecnologia usata</h5>
        @endforelse
    </div>


    {{-- Post image --}}
    @if ($project->image)
        <div class="w-50 mt-4">
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid">
        </div>
    @else
        <div class="p-5 bg-secondary text-white">
            NO IMAGE
        </div>
    @endif


    <div class="cta d-flex gap-3 my-4">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-success">
            Torna dietro
        </a>
        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger deletBtn">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>

    </div>
    @include('admin.projects.delete')
@endsection
