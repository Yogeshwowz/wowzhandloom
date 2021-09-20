@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Settings</h5>
    <div class="card-body">
    <form method="post" action="{{route('settings.update')}}">
        @csrf 
        {{-- @method('PATCH') --}}
        {{-- {{dd($data)}} --}}
        <div class="form-group">
          <label for="short_des" class="col-form-label">Short Description <span class="text-danger">*</span></label>
          <textarea class="form-control" id="quote" name="short_des">{{$data->short_des}}</textarea>
          @error('short_des')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="description" class="col-form-label">Footer Copyright <span class="text-danger">*</span></label>
          <textarea class="form-control" name="description">{{$data->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Logo <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail1" class="form-control" type="text" name="logo" value="{{$data->logo}}">
        </div>
        <div id="holder1" style="margin-top:15px;max-height:100px;"></div>

          @error('logo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

          <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Sticky Logo <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm7" data-input="thumbnail7" data-preview="holder7" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail7" class="form-control" type="text" name="stickylogo" value="{{$data->stickylogo}}">
        </div>
        <div id="holder7" style="margin-top:15px;max-height:100px;"></div>

          @error('stickylogo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Home section2 background <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail2" class="form-control" type="text" name="home_section2_background" value="{{$data->home_section2_background}}">
        </div>
        <div id="holder2" style="margin-top:15px;max-height:100px;"></div>

          @error('home_section2_background')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

     <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Recipes Section background <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm6" data-input="thumbnail6" data-preview="holder6" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail6" class="form-control" type="text" name="recipes_background" value="{{$data->recipes_background}}">
        </div>
        <div id="holder6" style="margin-top:15px;max-height:100px;"></div>

          @error('home_section2_background')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Home section3 background <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm3" data-input="thumbnail3" data-preview="holder3" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail3" class="form-control" type="text" name="home_section3_background" value="{{$data->home_section3_background}}">
        </div>
        <div id="holder3" style="margin-top:15px;max-height:100px;"></div>

          @error('home_section3_background')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

         <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Footer background <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm4" data-input="thumbnail4" data-preview="holder4" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail4" class="form-control" type="text" name="footer_background" value="{{$data->footer_background}}">
        </div>
        <div id="holder4" style="margin-top:15px;max-height:100px;"></div>

          @error('footer_background')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
       <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Page Banners <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm5" data-input="thumbnail5" data-preview="holder5" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail5" class="form-control" type="text" name="page_banners" value="{{$data->page_banners}}">
        </div>
        <div id="holder5" style="margin-top:15px;max-height:100px;"></div>

          @error('footer_background')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$data->photo}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>

          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="address" required value="{{$data->address}}">
          @error('address')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="email" required value="{{$data->email}}">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone" class="col-form-label">Phone Number <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="phone" required value="{{$data->phone}}">
          @error('phone')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <h3>Social Media footer</h3>
        <div class="form-group">
          <label for="fb" class="col-form-label">Facebook </label>
          <input type="text" class="form-control" name="fb" value="{{$data->fb}}">
          
        </div>
         <div class="form-group">
          <label for="pinterest" class="col-form-label">Pinterest </label>
          <input type="text" class="form-control" name="pinterest" value="{{$data->pinterest}}">
          
        </div>

          <div class="form-group">
                  <label for="twitter" class="col-form-label">Twitter </label>
                  <input type="text" class="form-control" name="twitter" value="{{$data->twitter}}">
                
                </div>
                
            <div class="form-group">
                  <label for="instagram" class="col-form-label">Instagram</label>
                  <input type="text" class="form-control" name="instagram" value="{{$data->instagram}}">
                
                </div>
                
                <div class="form-group">
                  <label for="youtube" class="col-form-label">Youtube</label>
                  <input type="text" class="form-control" name="youtube" value="{{$data->youtube}}">
                  
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
    $('#lfm7').filemanager('image');
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