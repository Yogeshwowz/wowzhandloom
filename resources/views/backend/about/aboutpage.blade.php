@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">About Page</h5>
    <div class="card-body">
    <form method="post" action="{{route('about.update')}}">
        @csrf 
        {{-- @method('PATCH') --}}
        {{-- {{dd($data)}} --}}
        
       

        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Our Story Background <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail1" class="form-control" type="text" name="story_background" value="{{$data->story_background}}">
        </div>
        <div id="holder1" style="margin-top:15px;max-height:100px;"></div>

          @error('story_background')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

         <div class="form-group">
          <label for="description" class="col-form-label">Our Story Description <span class="text-danger">*</span></label>
          <textarea class="form-control" name="our_story">{{$data->our_story}}</textarea>
          @error('our_story')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>




        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Section2 Background <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail2" class="form-control" type="text" name="section2_background" value="{{$data->section2_background}}">
        </div>
        <div id="holder2" style="margin-top:15px;max-height:100px;"></div>

          @error('section2_background')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


       <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Section2 image <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm3" data-input="thumbnail3" data-preview="holder3" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail3" class="form-control" type="text" name="side_image" value="{{$data->side_image}}">
        </div>
        <div id="holder3" style="margin-top:15px;max-height:100px;"></div>

          @error('side_image')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="name" required value="{{$data->name}}">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email" class="col-form-label">Position <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="position" required value="{{$data->position}}">
          @error('position')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Section2 Description <span class="text-danger">*</span></label>
          <textarea class="form-control" name="descreption">{{$data->descreption}}</textarea>
          @error('descreption')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');
    $('#lfm1').filemanager('image');
    $('#lfm2').filemanager('image');
    $('#lfm3').filemanager('image');
    $('#lfm4').filemanager('image');
    $('#lfm5').filemanager('image');
    $('#lfm6').filemanager('image');
    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });

    $(document).ready(function() {
      $('#quote').summernote({
        placeholder: "Write short Quote.....",
          tabsize: 2,
          height: 100
      });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>
@endpush