<!-- Use Defined Dashboard Layout -->
@extends('layouts.app')
<!-- Define Page Title -->
@section('title', 'Create New Blog Post')
<!-- Unique Page Content -->
@section('content')
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Create New Blog Post</h2>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Return without Saving</a>
    </div>
    <!-- Post Create Form -->
    <form method="POST" action="{{ route('posts.save') }}" style="width: 100%">
        @csrf
        <!-- Title -->
        <label style="font-weight: bold">Title</label><br>
        <input type="text" name="title" maxlength="50" style="width: 50%"><br>
        <!-- Content -->
        <label style="font-weight: bold">Content</label><br>
        <textarea rows="4" name="content" style="width: 100%"></textarea><br>
        <!-- Category -->
        <br>
        <input type="submit" value="Submit Post">
    </form>
@endsection