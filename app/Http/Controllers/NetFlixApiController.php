<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Recent;
use Illuminate\Http\Request;

class NetFlixApiController extends Controller
{
    public function getRecentMovies()
    {
        $recents = Recent::get();
        if ($recents->count() > 0) {
            $response = [
                "success" => true,
                "recent_movies" => $recents,
            ];
        } else {
            $response = [
                "success" => false,
                "recent_movies" => "No Data Found",
            ];
        }
        return response()->json($response);
    }

    public function getMovieAction(Request $request)
    {
        $actions=Movie::where('type','ACTION')->where('is_active','1')->get();
        if($actions->count() > 0){
            $response = [
                "success" => true,
                "movies"=>$actions,
            ];
        }else{
            $response=[
                "success" => false,
                "movies" => "No Data Found",
            ];  
        }
        return response()->json($response);
    }

    public function getMovieHorror()
    {
        $horrors=Movie::where('type','HORROR')->where('is_active','1')->get();
        if($horrors->count()>0){
            $response = [
                "success" => true,
                "movies"=>$horrors,
            ];
        }else{
            $response=[
                "success" => false,
                "movies" => "No Data Found",
            ];  
        }
        return response()->json($response);
    }

    
    public function getMovieComedy()
    {
        $comedies=Movie::where('type','COMEDY')->where('is_active','1')->get();
        if($comedies->count()>0){
            $response = [
                "success" => true,
                "movies"=>$comedies,
            ];
        }else{
            $response=[
                "success" => false,
                "movies" => "No Data Found",
            ];  
        }
        return response()->json($response);
    }
    
    public function getMovieToggle()
    {
        $movies=Movie::where('is_active','1')->get();
        if($movies->count()>0){
            $response = [
                "success" => true,
                "movies"=>$movies,
            ];
        }else{
            $response=[
                "success" => false,
                "movies" => "No Data Found",
            ];  
        }
        return response()->json($response);
    }


    
    public function getMovieRomance()
    {
        $romances=Movie::where('type','ROMANCE')->where('is_active','1')->get();
        if($romances->count()>0){
            $response = [
                "success" => true,
                "movies"=>$romances,
            ];
        }else{
            $response=[
                "success" => false,
                "movies" => "No Data Found",
            ];  
        }
        return response()->json($response);
    }


}
