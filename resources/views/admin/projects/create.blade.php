@extends('layouts.app')

@section('title', 'Create Project')

@section('content')

    <div class="container">

        <h1 class="my-3">Add a new Project</h1>

        <form action="{{ route('admin.projects.store') }}" method="POST" class="row gy-4">
            @csrf

            <div class="col-12">
                <label for="title" class="form-label mb-2">Project's Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    placeholder="Project's Title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="github_reference" class="form-label mb-2">Github Link</label>
                <input type="url" name="github_reference" id="github_reference"
                    class="form-control @error('github_reference') is-invalid @enderror" placeholder="Project's Github Link"
                    value="{{ old('github_reference') }}">
                @error('github_reference')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="description" class="form-label mb-2">Project's Description</label>
                <textarea name="description" id="description" cols="30" rows="10"
                    class="form-control @error('description') is-invalid @enderror" placeholder="Project's Description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 d-flex gap-2">
                <input type="submit" value="Save" class="btn btn-success">
                <input type="reset" value="Clear" class="btn btn-warning">
            </div>
        </form>
    </div>

@endsection
