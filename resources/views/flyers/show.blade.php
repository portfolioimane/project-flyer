  
@extends('layouts.app')
@section('content')
     <div class="row">
       <div class="col-md-4">
        <h1>{{ $flyer->street }}</h1>
        <h2>{{ $flyer->price }}</h2>
        <hr>
         <div class="description">{!! nl2br($flyer->description) !!}</div>
       </div>
       <div class="col-md-8 gallery">
        @foreach($flyer->photos->chunk(4) as $set)
            <div class="row">
                @foreach($set as $photo)
                  <div class="col-md-3 gallery__image">
                    {!! link_to('Update the Photo', "/project-flyer/public/photos/{$photo->id}", 'DELETE') !!}
                   <!-- form method="POST" action="/project-flyer/public/photos/{{$photo->id}}">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit">Delete</button>
                    </form> -->
                    <a href="/project-flyer/public/{{$photo->path}}" data-lity>
                      <img src="/project-flyer/public/{{$photo->thumbnail_path}}" alt="">
                    </a>
                  </div>
                @endforeach
            </div>
        @endforeach
           <hr>
          @if($user && $user->owns($flyer))
         <form id="addPhotoForm" 
         action="{{route('store_photo_path', [$flyer->zip, $flyer->street])}}"
          method="POST" 
          class="dropzone" >
          {{csrf_field()}}
         </form>
         @endif
       </div>
     </div>
  
@endsection
@section('scripts.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js"></script>
<script>
Dropzone.options.addPhotoForm = {
  paramName: "photo", // The name that will be used to transfer the file
  maxFilesize: 3, // MB
  acceptedFiles:'.jpg, .jpeg, .png, .bmp',
};
</script>
@endsection