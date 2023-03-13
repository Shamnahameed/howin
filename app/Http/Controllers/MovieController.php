<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function viewMovie()
    {
        $movies = Movie::get();
      
            return view('movie.viewMovie', compact('movies'));
    }

    public function addMovie(Request $request)
    {
        $movies = new Movie();
        $movies->name = $request->name;
        $movies->type = $request->type;
        if ($request->file('image')) {
            $image_var = $request->file('image');
            $filename = time() . $image_var->getClientOriginalName();
            $image_var->move(public_path('/movi/'), $filename);
            $movies->image = 'movi/' . $filename;
        }

        $movies->save();
        return redirect()->back();
    }
    public function updateMovie(Request $request)
    {
        $movies = Movie::where('id', $request->id)->first();
        $movies->name = $request->name;
        $movies->type = $request->type;
        if ($request->image) {
        if ($movies->image) {
            @unlink(public_path($movies->image));
            $image_var = $request->file('image');
            $filename = time() . $image_var->getClientOriginalName();
            $image_var->move(public_path('/movi/'), $filename);
            $movies->image = 'movi/' . $filename;
        } else {
            $image_var = $request->file('image');
            $filename = time() . $image_var->getClientOriginalName();
            $image_var->move(public_path('/movi/'), $filename);
            $movies->image = 'movi/' . $filename;
        }
    }

        $movies->save();
        return redirect()->back();
    }
    public function deleteMovie($id)
    {
        $movies = Movie::where('id', $id)->first();
        $movies->delete();
        return redirect()->back();
    }
    public function togglemovie($id)
    {

        $movies = Movie::where('id', $id)->first();
        $movies->is_active = !$movies->is_active;
        $movies->save();
        return redirect()->back();
    }
}
