<?php

namespace App\Http\Controllers;

use App\Models\Recent;
use Illuminate\Http\Request;

class RecentController extends Controller
{
    public function viewRecent()
    {
        $recents = Recent::get();

        return view('recent.viewRecent', compact('recents'));
    }
    public function addRecent(Request $request)
    {
        $recents = new Recent();
        $recents->name = $request->name;
        $recents->description = $request->description;
        if ($request->file('image')) {
            $image_var = $request->file('image');
            $filename = time() . $image_var->getClientOriginalName();
            $image_var->move(public_path('/film/'), $filename);
            $recents->image = 'film/' . $filename;
        }

        $recents->save();
        return redirect()->back();
    }

    public function updateRecent(Request $request)
    {
        $recents = Recent::where('id', $request->id)->first();
        $recents->name = $request->name;
        $recents->description = $request->description;
        if ($request->image) {
            if ($recents->image) {
                @unlink(public_path($recents->image));
                $image_var = $request->file('image');
                $filename = time() . $image_var->getClientOriginalName();
                $image_var->move(public_path('/film/'), $filename);
                $recents->image = 'film/' . $filename;
            } else {
                $image_var = $request->file('image');
                $filename = time() . $image_var->getClientOriginalName();
                $image_var->move(public_path('/film/'), $filename);
                $recents->image = 'film/' . $filename;
            }
        }


        $recents->save();
        return redirect()->back();
    }
    public function deleteRecent($id)
    {
        $recents = Recent::where('id', $id)->first();
        $recents->delete();
        return redirect()->back();
    }
}
