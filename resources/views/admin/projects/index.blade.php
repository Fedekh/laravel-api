@extends('layouts.admin')

@section('content')
    @include('partials.messages')


    <h3>Il capo: <span class="number text-decoration-underline"> {{ Auth::user()->name }}</span> </h3>
    @if ($butt == false)
        <h4>La lista dei tuoi tipi sono: <span class="number">{{ $count }}</span> </h4>
    @else
        <h4>La lista dei progetti: <span class="number">{{ $count }}</span> </h4>
    @endif


    <div class="text-end mb-5">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-info">Crea un nuovo progetto</a>
        <a href="{{ route('admin.types.index') }}" class="btn btn-info">Monitora i tuoi tipi</a>
        @if ($butt == false)
            <a href="{{ route('admin.types.create') }}" class="btn btn-info">Aggiungi un tipo</a>
        @endif


    </div>

    <table class="table table-hover text-white rounded">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    @if ($project->title)
                        <td>{{ $project->title }}</td>
                    @else
                        <td>{{ $project->name }}</td>
                    @endif

                    <td>{{ $project->slug }}</td>
                    <td class="d-flex gap-3">
                        @if ($butt == true)
                            <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        @else
                            <a href="{{ route('admin.types.show', $project->slug) }}" class="btn btn-success">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        @endif

                        @if ($butt == true)
                            <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning">
                            @else
                                <a href="{{ route('admin.types.edit', $project->slug) }}" class="btn btn-warning">
                        @endif
                        <i class="fa-solid fa-gear"></i>
                        </a>
                        @if ($project->title)
                            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger deletBtn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.types.destroy', $project->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger deletBtn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        @endif

                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
    <div>
        {{ $projects->links() }}
    </div>
    @include('admin.projects.delete')
@endsection
