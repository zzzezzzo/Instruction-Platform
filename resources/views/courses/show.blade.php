@extends('layout.master')
@section('title-page', 'show')

@section('content-page')
    <h1 class="display-1 text-primary text-center mb-3">show single course</h1>

    <div class=" border border-3 rounded-2 p-4 "
        style="display: flex; justify-content:end; background-color:rgb(219, 220, 221);">
        <div class="image" style="width: 650px">
            <img style="width: 50%" src="{{ asset('public/courses/' . $course->image) }}">
        </div>

        <div class="description">
            <p class="fs-5"><span class="text-danger">course name:</span> {{ $course->name }}</p>
            <p class="fs-5"><span class="text-danger">course description:</span> {{ $course->description }}</p>
            <p class="fs-5"><span class="text-danger">course price:</span> {{ $course->price }}</p>
            {{-- <p>This is the category: {{ $course->category->name }}</p> --}}
            <a class="btn btn-outline-info" href="#">Edit</a>
            <form action="{{ route('courses.destroy', $course->id) }}" style="display: inline-block" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger" type="submit">Delete</button>
            </form>

        </div>
    </div>
    <div class="text-center my-3">
        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline-primary ">Add lesson</a>
    </div>
    <div class="content" style="">
        <div class="container">
            @foreach ($lessons as $lesson)
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-{{ $lesson->id }}" aria-expanded="false"
                                aria-controls="flush-{{ $lesson->id }}">
                                {{ $lesson->title }}
                            </button>
                        </h2>
                        <div id="flush-{{ $lesson->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body display-flex" style="display: flex; justify-content:space-around; align-items:center;">
                                <p style="width: 300px">{{ $lesson->description }}</p>
                                <video width="220" height="200" controls>
                                    <source src="{{ asset('public/videos/'. $lesson->content)}}" type="video/mp4">
                                </video>

                            </div>
                            <hr style="height:4px; background-color:rgb(99, 98, 98); ">    
                            <div class="footer" style=" margin:auto;display:flex;justify-content:center;">
                                <form action="#" style="display: inline-block" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                                </form>
                                <a href="#" class="btn btn-outline-info">Edit</a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <div class="model text-center">

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add lesson</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('lesson.store', $course->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form">
                                <div class="row">
                                    <div style="text-align: left;">
                                        <div class="col">
                                            <label for="lesson_name">Lesson Name:</label>
                                            <input type="text" name="title" id="lesson_name"
                                                class="form-control mt-2 mb-3">
                                        </div>
                                        <label for="lesson_description">Lesson Description:</label>
                                        <textarea name="description" id="lesson_description" cols="5" rows="5" class="form-control mt-2 mb-3"></textarea>
                                        <label for="lesson_video_url">Lesson Video content:</label>
                                        <input type="file" name="content" id="lesson_video_url"
                                            class="form-control mt-2 mb-3">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">save</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
