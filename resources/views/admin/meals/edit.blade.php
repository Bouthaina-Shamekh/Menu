@extends('admin.master')

@section('title', 'Edit Meal | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Meal</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

@include('admin.errors')

<form action="{{ route('admin.meals.update', $meal->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="mb-3">
        <label> Name </label>
        <input type="text" name="name" placeholder="Name Meal" class="form-control" value="{{ $meal->name}}" />
    </div>
    <div class="mb-3">
        <label> Content </label>
        <input type="text" name="content" placeholder="Content" class="form-control" value="{{$meal->content}}" />
    </div>

    <div class="mb-3">
        <label> Price </label>
        <input type="number" name="price" placeholder="Price" class="form-control" value="{{$meal->price}}"/>
    </div>

    <div class="mb-3">
        <label> Calories</label>
        <input type="number" name="calories" placeholder="Calories" class="form-control" value="{{$meal->calories}}"/>
    </div>

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
        <img width="80" src="{{ asset('uploads/meals/'.$meal->image) }}" alt="">
    </div>

    <div class="mb-3">
        <label for="image">Image Icon1</label>
        <input type="file" id="image_icon1" name="image_icon" class="form-control" />
        <img width="80" src="{{ asset('uploads/meals/'.$meal->image_icon1) }}" alt="">
    </div>

    <div class="mb-3">
        <label for="image">Image Icon2</label>
        <input type="file" id="image_icon2" name="image_icon2" class="form-control" />
        <img width="80" src="{{ asset('uploads/meals/'.$meal->image_icon2) }}" alt="">
    </div>

    <div class="mb-3">
        <label for="image">Image Icon3</label>
        <input type="file" id="image_icon3" name="image_icon3" class="form-control" />
        <img width="80" src="{{ asset('uploads/meals/'.$meal->image_icon3) }}" alt="">
    </div>


    <div class="mb-3">
        <label>Category_Name</label>
        <select name="category_id" class="form-control">
            <option value="">Select</option>


            @foreach ($categories as $item)
                <option {{ $meal->category_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name}}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success px-5">Update</button>


</form>

@stop
