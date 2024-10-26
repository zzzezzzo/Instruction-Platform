@extends('layout.master')
@section('title-page', 'new-course')

@section('content-page')

    <h1 class="display-1  text-primary text-center">New courses</h1>
    <form class="row" action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf {{-- Cross-Site Request Forgery --}}
        <div class="col-12">
            <label for="image">courses Image:</label>
            <input type="file" name="image" id="image" class="form-control mt-2 mb-3" required>
        </div>
        <div class="col-12">
            <label for="name">courses Name:</label>
            <input type="text" name="name" id="name" class="form-control mt-2 mb-3" required>
        </div>
        <div class="col-12">
            <label for="description">courses Description</label>
            <textarea name="description" id="description" cols="10" rows="10" required class="form-control mt-2 mb-3"></textarea>
        </div>
        <div class="col-4">
            <label for="price">courses Price</label>
            <input type="text" name="price" id="price" class="form-control mt-2 mb-3" required>
        </div>
        <div class="col-5">
            <label for="category_id">courses Category</label>
            <div class="content" style="display: flex ; justify-content:space-between  ">
                <select name="category_id" id="category_id" class="form-select mt-2 mb-3" required>
                    <option value="">Select a Product Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary ms-4 mt-2" style="width: 40px; height:35px"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>

        </div>
        <div class="col-12 d-flex justify-content-center align-items-center mb-5 mt-3">
            <button type="submit" class="btn btn-outline-success col-3 me-2">Add Product</button>
            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary col-3 ms-2">Back to List</a>
        </div>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">new category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="name">Category Name:</label>
                        <input type="text" name="name" id="name" class="form-control mt-2 mb-3">
                        <label for="description">Category description:</label>
                        <input type="text" name="description" id="description" class="form-control mt-2 mb-3">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="aleart" id="alert" style="width: 330px; position: fixed; bottom: 0; right:5px;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                role="img" aria-label="Warning:" style="width: 15px; color:red;">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>{{ $error }}
                        </li>
                        @endforeach
                        <div class="d-flex align-items-center" id="break-line"></div>
                </ul>
            </div>
        @endif
    </div>
@stop
