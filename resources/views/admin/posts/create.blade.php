<!-- Use Defined Dashboard Layout -->
@extends('layouts.app')
<!-- Define Page Title -->
@section('title', '{{ $header }}')
<!-- Unique Page Content -->
@section('content')
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">{{ $header }}</h2>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Return without Saving</a>
    </div>
    <!-- Post Create Form -->
    <form method="POST" action="{{ route('admin.posts.save') }}" style="width: 100%">
        @csrf

        <!-- Retain Old Values (Failed Submission) -->
        @if($post->exists)
            <input type="hidden" name="id" value={{ $post->id }}/>
        @endif

        <!-- Title -->
        <label class="blog-label">
            Title @error('title') <span class="error-asterisk">*</span> @enderror
        </label>
        <br>
        <input type="text" name="title" maxlength="50" style="width: 50%" value={{ old('title', $post->title) }}>
        <br>

        <!-- Content -->
        <label class="blog-label">
            Content @error('content') <span class="error-asterisk">*</span> @enderror
        </label><br>
        <textarea rows="4" name="content" class="blog-textarea">{{ old('content', $post->content) }}</textarea><br>

        <!-- Category -->
        <label class="blog-label">
            Category @error('category_id') <span class="error-asterisk">*</span> @enderror
        </label>
        <br>
        <select name="category_id">
            <option value="">(Choose a Category)</option>
            <!-- Dynamic Category List -->
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (old('category_id', $post->category_id ?? '') == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select><br><br>

        <!-- Submission Button -->
        <input type="submit" value="Submit Post">
    </form>

    @if ($errors->any())
    <div class="error-message">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection