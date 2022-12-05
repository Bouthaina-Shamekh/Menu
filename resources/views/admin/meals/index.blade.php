@extends('admin.master')

@section('title', 'Meals | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">All Meals</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Content</th>
            <th>Price</th>
            <th>Calories</th>
            <th>image meal</th>
            <th>image_icon1</th>
            <th>image_icon2</th>
            <th>image_icon3</th>
            <th>Category</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>

        @foreach ($meals as $meal)

        <tr>
            <td>{{ $meal->id}}</td>
            <td>{{ $meal->name}}</td>
            <td>{{ $meal->content}}</td>
            <td>{{ $meal->price}}</td>
            <td>{{ $meal->calories}}</td>
            <td><img width="80" src="{{ asset('uploads/meals/'.$meal->image) }}" alt=""></td>
            <td><img width="80" src="{{ asset('uploads/meals/'.$meal->image_icon1) }}" alt=""></td>
            <td><img width="80" src="{{ asset('uploads/meals/'.$meal->image_icon2) }}" alt=""></td>
            <td><img width="80" src="{{ asset('uploads/meals/'.$meal->image_icon3) }}" alt=""></td>
            <td>{{ $meal->category->name}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.meals.edit',  $meal->id) }}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{ route('admin.meals.destroy',  $meal->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
  <div style="height: 100px;width:100%">{{ $meals->links() }} </div>
@stop
