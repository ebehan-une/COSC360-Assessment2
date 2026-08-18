<!-- Use Defined Dashboard Layout -->
@extends('layouts.app')
<!-- Define Page Title -->
@section('title', '{{ $header }}')
<!-- Unique Page Content -->
@section('content')
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">{{ $header }}</h2>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Return without Saving</a>
    </div>
    <!-- Post Create Form -->
    <form method="POST" action="{{ route('admin.categories.save') }}" style="width: 100%">
        @csrf

        <!-- Retain Old Values (Failed Submission) -->
        @if($category->exists)
            <input type="hidden" name="id" value={{ $category->id }}/>
        @endif

        <!-- Name -->
        <label class="blog-label">
            Name @error('name') <span class="error-asterisk">*</span> @enderror
        </label>
        <br>
        <input type="text" name="name" maxlength="50" style="width: 50%" value={{ old('name', $category->title) }}>
        <br>

        <!-- Content -->
        <label class="blog-label">
            Content @error('content') <span class="error-asterisk">*</span> @enderror
        </label><br>
        <textarea rows="4" name="content" class="blog-textarea">{{ old('content', $category->content) }}</textarea><br>

        <!-- Submission Button -->
        <input type="submit" value="Submit Category">
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