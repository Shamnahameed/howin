@extends('welcome')

@section('title')
    Movie
@endsection
@section('content')
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_movie">
        Add
    </button>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">NAME</th>
                <th scope="col" class="text-center">TYPE</th>
                <th scope="col" class="text-center">IMAGE</th>
                <th scope="col" class="text-center">ACTION</th>
                <th scope="col" class="text-center">ISACTIVE</th>


            </tr>
        </thead>

        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td scope="row">{{ $movie->id }}</td>
                    <td>{{ $movie->name }}</td>
                    <td>{{ $movie->type }}</td>
                    <td>
                        <img src="{{ asset($movie->image) }}" alt="image" style="height:10vw;width:10vw" />
                    </td>

                    <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#edit_movie{{ $movie->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete_movie{{ $movie->id }}">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                    <td>
                        <a href="{{ route('admin.togglemovie', $movie->id) }}" type='button'
                            class="@if ($movie->is_active == 1) btn btn-success @else btn btn-danger @endif">
                            <i class="bi bi-power"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="add_movie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger" id="add_movie">Add Movie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- add recent --}}
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.addMovie') }}"enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-success-emphasis">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="ACTION">Action</option>
                                <option value="HORROR">Horror</option>
                                <option value="COMEDY">Comedy</option>
                                <option value="ROMANCE">Romance</option>

                            </select>
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
    @foreach ($movies as $movie)
        <div class="modal fade" tabindex="-1" role="dialog" id="edit_movie{{ $movie->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit movie Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- update movie --}}
                    <form method="POST" action="{{ route('admin.updateMovie') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="id" value="{{ $movie->id }}">
                            <div class="form-group">
                                <label class="text-success-emphasis">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $movie->name }}"
                                    placeholder="Edit Name">
                            </div>

                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-select" name="type" aria-label="Default select example">
                                    <option value="ACTION" @if ('ACTION' == $movie->type) selected @endif>ACTION </option>
                                    <option value="HORROR" @if ('HORROR' == $movie->type) selected @endif>HORROR</option>
                                    <option value="COMEDY" @if ('COMEDY' == $movie->type) selected @endif>COMEDY</option>
                                    <option value="ROMANCE" @if ('ROMANCE' == $movie->type) selected @endif>ROMANCE</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label class="text-success-emphasis">Current Image</label>
                                <img src="{{ asset($movie->image) }}" alt="image" style="height:10vw;width:10vw" />
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

        <div class="modal fade" tabindex="-1" role="dialog" id="delete_movie{{ $movie->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete movie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        Do you really want to delete
                    </div>
                    <div class="modal-footer">
                        <a type="submit" class="btn btn-primary"
                            href="{{ route('admin.deleteMovie', $movie->id) }}">Delete
                        </a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection
