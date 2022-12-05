@extends('admin.master')

@section('title', 'Create Category | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Create New Category</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif
 @include('admin.errors')

<form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label> Name </label>
        <input type="text" name="name" placeholder="Name Category" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
    </div>

    <button class="btn btn-success px-5">Add</button>


</form>

@stop
