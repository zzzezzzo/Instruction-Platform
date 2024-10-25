@extends('layout.master')
@section('title-page', 'new-course')

@section('content-page')
<h1 class="display-1  text-primary text-center">New courses</h1>
<form class="row" action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf {{-- Cross-Site Request Forgery --}}
    <div class="col-12">
        <label for="image">courses Image:</label>
        <input type="file" name="image" id="image" class="form-control mt-2 mb-3">
    </div>
    <div class="col-12">
        <label for="name">courses Name:</label>
        <input type="text" name="name" id="name" class="form-control mt-2 mb-3">
    </div>
    <div class="col-12">
        <label for="description">courses Description</label>
        <textarea name="description" id="description" cols="10" rows="10" class="form-control mt-2 mb-3"></textarea>
    </div>
    <div class="col-4">
        <label for="price">courses Price</label>
        <input type="text" name="price" id="price" class="form-control mt-2 mb-3">
    </div>
    <div class="col-4">
        <label for="category_id">courses Category</label>
        <select name="category_id" id="category_id" class="form-select mt-2 mb-3">
            <option value="">Select a Product Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 d-flex justify-content-center align-items-center mb-5 mt-3">
        <button type="submit" class="btn btn-outline-success col-3 me-2">Add Product</button>
        <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary col-3 ms-2">Back to List</a>
    </div>
</form>
@stop