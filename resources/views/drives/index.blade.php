@extends('layouts.app')

@section('content')
    <h1 class="text-center text-dark">Drives List</h1>

    @if (Session::has('done'))
        <div class="alert alert-success mx-auto w-50">
            <h5>{{ Session::get('done') }}</h5>
        </div>
    @endif
    <div class="container col-md-8">
        <div class="card bg-dark text-white">
            <div class="card-body bg-dark text-white">
                <table class="table table-dark table-striped">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Image</th>
                        <th class="text-center" colspan="4">Action</th>
                    </tr>
                    @foreach ($drives as $data)
                        <tr>
                            <th class="text-center">{{ $data->id }}</th>
                            <th class="text-center">{{ $data->title }}</th>
                            <th class="text-center"><img width="100px" height="100px" src="{{ asset("uploads/$data->file") }}"
                                    alt="..."></th>
                            <th class="text-center"><a href="{{ route('drives.show', $data->id) }}"
                                    class="btn bg-light"><i class="text-dark fa-solid fa-eye"></i></a></th>
                            <th class="text-center"><a href="{{ route('drives.edit', $data->id) }}"
                                    class="btn btn-success"><i class="text-light fa-solid fa-pen-to-square"></i></a>
                            </th>
                            <th class="text-center"><a href="{{ route('drives.download', $data->id) }}"
                                    class="btn btn-warning"><i class="text-dark fas fa-download"></i></a>
                            </th>
                            <th class="text-center"><a href="{{ route('drives.destroy', $data->id) }}"
                                    class="btn btn-danger"><i class="text-light fa-solid fa-trash"></i></a></th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
