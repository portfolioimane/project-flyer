<?php
namespace App\Http\Controllers\Traits;
use App\Flyer;
use Auth;
use Illuminate\Http\Request;
trait AuthorizeUsers{
	    protected function userCreatedFlyer($request){
        return Flyer::where([
            'zip'=>$request->zip,
            'street'=>$request->street,
            'user_id'=>Auth::user()->id
        ])->exists();
    }
    protected function unauthorized(Request $request){
         if($request->ajax()){
            return response(['message' => 'No way.'], 403);
        }
        flash('No way.');
        return redirect('/');
       }
}