@extends('layouts.app')

@section('content')
    <h1 class="text-center text-dark">Drive ID : {{ $drive->id }}</h1>
    <div class="container col-md-6">
        <div class="card bg-dark text-white">
            <img src="{{ asset("uploads/$drive->file") }}" class="card-img-top" alt="...">
            <div class="card-body bg-dark text-white">
                <div class="card-body">
                    <h2 class="card-title text-light text-center">Title : {{ $drive->title }}</h2>
                    <p class="card-text text-center text-muted">Description : {{ $drive->description }}</p>
                    <div class="container d-flex justify-content-around">
                        <a href="{{ route('drives.edit', $drive->id) }}" class="w-25 btn btn-success"><i class="text-light fa-solid fa-pen-to-square"></i> | Edit</a>
                        <a href="{{ route('drives.download', $drive->id) }}" class="w-25 btn btn-warning"><i class="text-dark fas fa-download"></i> | Download</a>
                        <a href="{{ route('drives.destroy', $drive->id) }}" class="w-25 btn btn-danger"><i class="text-light fa-solid fa-trash"></i> | Delete</a>
                        <a href="{{ route('drives.index') }}" class="w-25 btn btn-light"><i class="text-dark fas fa-next"></i> | Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
