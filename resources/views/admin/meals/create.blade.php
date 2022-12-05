@extends('admin.master')

@section('title', 'Create Meal | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Create New Meal</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif
 @include('admin.errors')

<form action="{{ route('admin.meals.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label> Name </label>
        <input type="text" name="name" placeholder="Name Meal" class="form-control" />
    </div>

    <div class="mb-3">
        <label> Content </label>
        <input type="text" name="content" placeholder="Content" class="form-control" />
    </div>

    <div class="mb-3">
        <label> Price </label>
        <input type="number" name="price" placeholder="Price" class="form-control" />
    </div>

    <div class="mb-3">
        <label> Calories</label>
        <input type="number" name="calories" placeholder="Calories" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image_icon1" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image_icon2" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image_icon3" class="form-control" />
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option value="">Select</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name}}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success px-5">Add</button>


</form>

@stop
