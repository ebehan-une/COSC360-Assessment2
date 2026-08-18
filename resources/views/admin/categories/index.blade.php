<!-- Use Defined Dashboard Layout -->
@extends('layouts.app')
<!-- Define Page Title -->
@section('title', 'Create New Blog Post')
<!-- Unique Page Content -->
@section('content')
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">List of Categories</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">+ Add New Category</a>
    </div>
    <!-- Post Table -->
    <table class="table table-bordered table-striped">
        <!-- Table Header -->
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Content</th>
                <th>Created At</th>
                <th style="width: 150px;">Actions</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody>
            <!-- Display all Posts -->
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->content }}</td>
                    <td>{{ $category->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection