@extends('layouts.app')

@section('title', 'Types')

@section('content')
    <div class="container" id="types">

        @if (session('message-text'))
            <div class="alert {{ session('message-status') }} alert-dismissible fade show my-4" role="alert">
                {{ session('message-text') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1 class="my-3">Types</h1>

        <a href="{{ route('admin.types.create') }}" class="btn btn-primary my-3">Add a Type</a>

        <table class="table">
            <thead>
                <tr>
                    <th class="text-uppercase">id</th>
                    <th class="text-uppercase">label</th>
                    <th class="text-uppercase">color</th>
                    <th class="text-uppercase">badge</th>
                    <th class="text-uppercase">action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->label }}</td>
                        <td>{{ $type->color }}</td>
                        <td>{!! $type->getTypeLabel() !!}</td>
                        <td>
                            <a class="btn btn-warning text-uppercase" href="{{ route('admin.types.edit', $type) }}">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-danger text-uppercase" data-bs-toggle="modal"
                                data-bs-target="#destroy-modal-{{ $type->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">No Types Founded</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection

@section('destroy-modal')

    @foreach ($types as $type)
        <!-- Modal -->
        <div class="modal fade" id="destroy-modal-{{ $type->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        If you delete {{ $type->label }} every project which has this type will be deleted.<br>
                        You confirm?

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                            @csrf

                            @method('DELETE')

                            <input type="submit" value="Delete Type" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
