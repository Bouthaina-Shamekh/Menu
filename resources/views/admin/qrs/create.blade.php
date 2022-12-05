@extends('admin.master')

@section('title', 'Create Qrs | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Create New Qrs</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif
 @include('admin.errors')

<form action="{{ route('admin.qrs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label> Link </label>
        <input type="text" name="link" placeholder="Link Qrs" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
    </div>

    <button class="btn btn-success px-5">Add</button>


</form>

@stop
