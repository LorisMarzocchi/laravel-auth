@extends('admin.layouts.base')

@section('contents')
    {{-- <h1 class="text-center text-danger p-3">Comics List:</h1>
    @if (session('delete_success'))
        @php $comic = session('delete_success') @endphp
        <div class="alert alert-danger">
            Comic '{{ $comic->title }}' has been cancelled
            <form action="{{ route('comics.restore', ['comic' => $comic]) }}" method="POST">
                @csrf
                <button class="btn btn-warning">Restore</button>
            </form>
        </div>
    @endif

    @if (session('restore_success'))
        @php $comic = session('restore_success') @endphp
        <div class="alert alert-success">
            Comic '{{ $comic->title }}' has been restored
        </div>
    @endif
    <a class="btn btn-primary m-3" href="{{ route('comics.create') }}">Add New Comic</a>
    <a class="btn btn-primary m-3" href="{{ route('comics.trashed') }}">Trash</a> --}}



    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Link image</th>
                <th scope="col">Description</th>
                <th scope="col">Languages</th>
                <th scope="col">Link Github</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->title }}</th>
                    <td>{{ $project->url_image }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->languages }}</td>
                    <td>{{ $project->link_github }}</td>
                    <td class="d-flex">
                        <a class="btn btn-primary me-2" href="{{ route('admin.projects.show', ['project' => $project->id]) }}">View</a>
                        <a class="btn btn-warning me-2" href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">Edit</a>
                        <form class=" d-inline-block " action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                            method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $projects->links() }}

    {{--
    paginator noBootstrap
    <div>
        <ul>
            @for ($i = 1; $i <= $comics->lastPage(); $i++)
            <li>
                <a href="/comics?page={{ $i }}">{{ $i }}</a>
            </li>
            @endfor
        </ul>
  </div> --}}
@endsection
