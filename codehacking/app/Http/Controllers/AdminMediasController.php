<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    public function index(){

        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }

    public function create(){
        return view('admin.media.create');
    }

    public function store(Request $request){
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('uploads', $name);
        Photo::create(['file'=>$name]);
    }

    public function destroy($id){

        $photo = Photo::findOrFail($id);

        unlink(public_path() .  $photo->file);

        $photo->delete();

//        Session::flash('deleted_photo', '&nbsp; * The photo has been deleted.');

        return redirect(route('admin.media.index'));
    }
}
