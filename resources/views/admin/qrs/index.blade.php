@extends('admin.master')

@section('title', 'Qrs | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">All Qrs</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Link</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($qrs as $qr)
        <tr>
            <td>{{ $qr->id}}</td>
            <td>{{ $qr->link}}</td>
            <td><img width="80" src="{{ asset('uploads/qrs/'.$qr->image) }}" alt=""></td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.qrs.edit', $qr->id) }} "><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{ route('admin.qrs.destroy', $qr->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
  {{ $qrs->links() }}
  @stop
