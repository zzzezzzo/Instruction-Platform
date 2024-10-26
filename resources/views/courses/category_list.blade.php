@extends('layout.master')
@section('title-page','category list')
@section('content-page')
    <div class="contaner">
        @foreach ($categories as $category)
            <h1>{{ $category->name }}</h1>
        @endforeach
    </div>
@stop