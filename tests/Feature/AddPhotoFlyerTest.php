<?php

//namespace Tests\Feature;
namespace App;
use App\AddPhotoFlyer;
use App\Flyer;
use App\Thumbnail;
use Mockery as m;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddPhotoFlyerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function it_shows_the_form_to_create_a_new_flyer()
    {
       //return $this->get('/project-flyer/public/flyers/create');
       
       $flyer=factory(Flyer::class)->create();
       $file=m::mock(UploadedFile::class, [
          'getClientOriginalName'=>'foo',
          'getClientOriginalExtension'=>'jpg' 
       ]);
       $file->shouldReceive('move')->once()->with('images/photos', 'nowfoo.jpg');
       $thumbnail=m::mock(Thumbnail::class);
       $thumbnail->shouldReceive('make')->once()->with('images/photos/nowfoo.jpg', 'images/photos/tn-nowfoo.jpg');
     (new AddPhotoFlyer($flyer, $file, $thumbnail))->save();
       return $this->assertCount(1, $flyer->photos); 
        //return $this->assertTrue(true);
    }
}
function time(){
  return 'now';
}
function sha1($path){return $path;}