<!-- Use Defined Dashboard Layout -->
@extends('layouts.app')
<!-- Define Page Title -->
@section('title', 'Create New Blog Post')
<!-- Unique Page Content -->
@section('content')
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Blog History</h2>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">+ Create New Post</a>
    </div>
    <!-- Post Table -->
    <table class="table table-bordered table-striped">
        <!-- Table Header -->
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th>Created At</th>
                <th style="width: 150px;">Actions</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody>
            <!-- Display all Posts -->
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->category->name ?? 'Uncategorised' }}</td>
                    <td>{{ $post->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this post?');">
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