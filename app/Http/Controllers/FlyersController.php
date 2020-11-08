<?php

namespace App\Http\Controllers;
use App\Flyer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AuthorizeUsers;
use App\Http\Requests\FlyerRequest;
use App\Http\Requests\AddPhotoRequest;
use Illuminate\Http\Request;
use App\Photo;
use App\User;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Auth;
class FlyersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //use AuthorizeUsers;
    public function __construct(){
        parent::__construct();
        $this->middleware('auth', ['except'=>['show']]);
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //flash('Hello World', 'this is the message');


         flash()->overlay('Welcome Abroad', 'Thank you for signing up.');
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\FlyerRequest $request)
    {
        // create the flyer
        // $request->all()
       // $validator=$this->validate();
    //validation was succesful show sweetalert and return
       $flyer=$this->user->publish(
            new Flyer($request->all())
        );
         // Flyer::create($request->all()); 
         flash()->success('Success!', 'Your flyer has been created.');
        //return redirect($flyer->zip . '/' . str_replace(' ', '-', $flyer->address));
         return redirect(flyer_path($flyer));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
           $flyer= Flyer::locatedAt($zip, $street);
           $user=$this->user; 
           return view('flyers.show', compact('flyer', 'user'));
    }


    //protected function userCreatedFlyer($request){
      //  return Flyer::where([
      //      'zip'=>$request->zip,
      //      'street'=>$request->street,
      //      'user_id'=>Auth::user()->id
     //   ])->exists();
    //}
    //protected function unauthorized(Request $request){
       //  if($request->ajax()){
       //     return response(['message' => 'No way.'], 403);
       // }
       // flash('No way.');
      //  return redirect('/');
     //  }
    //protected function makePhoto(UploadedFile $file){
       // return Photo::named($file->getClientOriginalName())->move($file);
    //}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
