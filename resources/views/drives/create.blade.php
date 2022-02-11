@extends('layouts.app')

@section('content')
    @if (Auth::user()->role == 1)
    <h1 class="text-center text-dark">Create New Drive</h1>
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
                <form action="{{ route('drives.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Upload File</label>
                        <input type="file" name="inputfile" class="form-control pb-4">
                    </div>
                    <button class="btn btn-light">Upload</button>
                </form>
            </div>
        </div>
    </div>
@else
<img class="rounded mx-auto d-block" src="{{asset("img/409.png")}}" alt="">
@endif
@endsection