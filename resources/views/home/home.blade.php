@extends('welcome')

@section('title')
    Home
@endsection
@section('content')

<div class="flex items-center">
    <div class="text-lg leading-7 font-semibold">
        <a type="button" href="{{route('admin.viewRecent')}}" class="btn btn-warning">Recent</a>

    </div>
    <div class="ml-4 text-lg leading-7 font-semibold">
        <a type="button" href="{{route('admin.viewMovie')}}" class="btn btn-info">MOVIE</a>

    </div>
</div>
@endsection