@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Contact Page</h5>
    <div class="card-body">
    <form method="post" action="{{route('contacts.update')}}">
        @csrf 
        {{-- @method('PATCH') --}}
        {{-- {{dd($data)}} --}}
        <div class="form-group">
          <label for="description" class="col-form-label">Description <span class="text-danger">*</span></label>
          <textarea class="form-control" id="description" name="description">{{$data->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
       
       <div class="form-group">
          <label for="opening" class="col-form-label">Opening Hours <span class="text-danger">*</span></label>
          <textarea class="form-control" id="opening" name="opening_hours">{{$data->opening_hours}}</textarea>
          @error('opening_hours')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
    

       <div class="form-group">
          <label for="description" class="col-form-label">contact <span class="text-danger">*</span></label>
          <textarea class="form-control" id="contact" name="contact_detail">{{$data->contact_detail}}</textarea>
          @error('contact_detail')
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
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(function() {
    $('#opening').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });

    $(document).ready(function() {
      $('#contact').summernote({
        placeholder: "Write short Quote.....",
          tabsize: 2,
          height: 150
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