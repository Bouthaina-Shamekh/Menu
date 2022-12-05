@extends('admin.master')

@section('title', 'Edit Qrs | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Qrs</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

@include('admin.errors')

<form action="{{ route('admin.qrs.update', $qr->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="mb-3">
        <label> Link </label>
        <input type="text" name="link" placeholder="Link Qrs" class="form-control" value="{{ $qr->link}}" />
    </div>

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
        <img width="80" src="{{ asset('uploads/qrs/'.$qr->image) }}" alt="">
    </div>

    <button class="btn btn-success px-5">Update</button>


</form>

@stop
