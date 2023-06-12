@extends('layouts.admin')

@section('content')
    @include('partials.messages')


    <h3>Il capo: <span class="number text-decoration-underline"> {{ Auth::user()->name }}</span> </h3>
    <h4>La lista delle tecnologie: <span class="number">{{ $count }}</span> </h4>

    <div class="text-end mb-5">
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-info">Aggiungi tecnologia</a>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-info">Torna alla lista progetti</a>
        <a href="{{ route('admin.types.index') }}" class="btn btn-info">Tipi disponibili</a>
    </div>

    <table class="table table-hover text-white rounded">

        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <td>{{ $technology->name_technologies }}</td>
                    <td>{{ $technology->slug }}</td>
                    <td class="d-flex gap-3">
                        <a href="{{ route('admin.technologies.show', $technology->slug) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.technologies.edit', $technology->slug) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <form action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger deletBtn" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('admin.projects.delete')
@endsection
