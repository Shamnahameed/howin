@extends('welcome')

@section('title')
    Recent
@endsection
@section('content')
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_recent">
        Add
    </button>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">NAME</th>
                <th scope="col" class="text-center">DESCRIPTION</th>
                <th scope="col" class="text-center">IMAGE</th>
                <th scope="col" class="text-center">ACTION</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($recents as $recent)
                <tr>
                    <td scope="row">{{ $recent->id }}</td>
                    <td>{{ $recent->name }}</td>
                    <td>{{ $recent->description }}</td>
                    <td>
                        <img src="{{ asset($recent->image) }}" alt="image" style="height:10vw;width:10vw" />
                    </td>

                    <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#edit_recent{{ $recent->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete_recent{{ $recent->id }}">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="add_recent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger" id="add_recent">Add Recent</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- add recent --}}
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.addRecent') }}"enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-success-emphasis">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label class="text-success-emphasis">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Enter Description">
                        </div>
                        <div class="form-group">
                            <label class="text-success-emphasis">Image</label>
                            <input type="file" name="image" class="form-control" placeholder="Enter image" required>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($recents as $recent)
        <div class="modal fade" tabindex="-1" role="dialog" id="edit_recent{{ $recent->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit recent Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- update recent --}}
                    <form method="POST" action="{{ route('admin.updateRecent') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="id" value="{{ $recent->id }}">
                            <div class="form-group">
                                <label class="text-success-emphasis">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $recent->name }}"
                                    placeholder="Edit Name">
                            </div>
                            <div class="form-group">
                                <label class="text-success-emphasis">Description</label>
                                <input type="text" name="description" class="form-control"
                                    value="{{ $recent->description }}" placeholder="Enter description">
                            </div>
                            <div class="form-group">
                                <label class="text-success-emphasis">Current Image</label>
                                <img src="{{ asset($recent->image) }}" alt="image" style="height:10vw;width:10vw" />
                            </div>
                            <div class="form-group">
                                <label class="text-success-emphasis">IMAGE</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="delete_recent{{ $recent->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete recent</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        Do you really want to delete
                    </div>
                    <div class="modal-footer">
                        <a type="submit" class="btn btn-primary"
                            href="{{ route('admin.deleteRecent', $recent->id) }}">Delete
                        </a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection
