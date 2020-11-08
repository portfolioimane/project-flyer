<?php

namespace App\Http\Controllers;
use App\Photo;
use App\Flyer;
use App\AddPhotoFlyer;
use Illuminate\Http\Request;
use App\Http\Requests\AddPhotoRequest;

class PhotosController extends Controller
{
    
    public function store($zip, $street, AddPhotoRequest $request){
        //$photo=Photo::fromFile($request->file('photo'));
        //Flyer::locatedAt($zip, $street)->addPhoto($photo);
        $flyer=Flyer::locatedAt($zip, $street);
        $photo=$request->file('photo');
        (new AddPhotoFlyer($flyer, $photo))->save();
    }
    public function destroy($id){
    	Photo::findOrFail($id)->delete();
    	return back();
    }
}
