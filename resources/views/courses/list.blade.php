@extends('layout.master')
@section('title-page', 'product-list')


@section('content-page')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="fs-1 text-center text-primary">Courses List</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-secondary opacity-7">discription</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Price</th>
                                    <th class="text-secondary opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img style="width:70px" src="{{ asset('public/courses/' . $course->image) }}" 
                                                        class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                {{-- <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $course->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{  $course->category->name  }}</p>
                                                </div>
                                            </div> --}}
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $course->name }} </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $course->description }}  </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-success">{{ $course->price }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="courses/{{ $course->id }}" class="btn btn-outline-warning">View</a>
                                            {{-- <a href="#"
                                                class="btn btn-outline-info">Edit</a>
                                            <form style="display: inline-block;" action="{{ route('courses.destroy',$course->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
