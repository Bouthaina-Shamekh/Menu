@extends('admin.master')

@section('title', 'menus | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">All menus</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($menus as $menu)
        <tr>
            <td>{{ $menu->id}}</td>
            <td>{{ $menu->title}}</td>
            <td><img width="80" src="{{ asset('uploads/menus/'.$menu->image) }}" alt=""></td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.menus.edit', $menu->id) }} "><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
  {{ $menus->links() }}
  @stop

