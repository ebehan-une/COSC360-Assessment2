@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Blog History</h2>
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
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection