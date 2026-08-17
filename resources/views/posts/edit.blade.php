<!-- Use Defined Dashboard Layout -->
@extends('layouts.app')
<!-- Define Page Title -->
@section('title', 'Create New Blog Post')
<!-- Unique Page Content -->
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Edit Existing Blog Post</h2>
        <a href="{{ route('index') }}" class="btn btn-primary">Return without Saving</a>
    </div>
    <!-- Post Edit Form -->
    <form method="POST" action="{{ route('save') }}" onsubmit="return confirm('Update this post?');">
        @csrf
        <!-- Reserve Post Id for Saving -->
        <input type="hidden" name="id" value={{ $post->id }}/>
        <!-- Title -->
        <label style="font-weight: bold">Title</label><br>
        <input type="text" name="title" maxlength="50" value="{{ $post->title }}" style="width: 50%"><br>
        <!-- Content -->
        <label style="font-weight: bold">Content</label><br>
        <textarea rows="4" name="content" style="width: 100%">{{ $post->content }}</textarea><br>
        <!-- Category -->
        <br>
        <input type="submit" value="Update Post">
    </form>
@endsection