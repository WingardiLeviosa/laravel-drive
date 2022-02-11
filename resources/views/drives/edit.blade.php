@extends('layouts.app')

@section('content')
    <h1 class="text-center text-dark">Edit Drive ID :{{ $drive->id }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger mx-auto w-50">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container col-md-6">
        <div class="card bg-dark text-white">
            <div class="card-body bg-dark text-white">
                <form action="{{ route('drives.update', $drive->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" value="{{ $drive->title }}" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" value="{{ $drive->description }}" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Upload File :
                            <img width="50px" src="{{ asset("uploads/$drive->file") }}" alt=""></label>
                        <input type="file" name="inputfile" class="form-control pb-4">
                    </div>
                    <button class="btn btn-light">Upload</button>
                </form>
            </div>
        </div>
    </div>

@endsection
