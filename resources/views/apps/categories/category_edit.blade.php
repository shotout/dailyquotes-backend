@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('datta-able/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
<!-- Main content -->
<div class="col-sm-12" id="edit-customer-container">
  <div class="card">
    <div class="card-header">
      <h5> <a href="{{ url('categories/list') }}">{{ __('Category') }}</a> >> {{ $category->name }}</h5>
      <div class="card-header-right">

      </div>
    </div>
    <div class="card-body p-0" id="no_shadow_on_card">

      <div class="col-sm-12 m-t-20 form-tabs">
        <ul class="nav nav-tabs " id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('Category Information') }}</a>
          </li>
        </ul>
        <div class="col-sm-12 tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form action='{{ url("categories/update/$category->id") }}' method="post" class="form-horizontal" id="editadmin" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
              <input type="hidden" value="{{ $category->id }}" name="id">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="first_name" class="col-sm-3 control-label require">{{ __('Category Name') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->name }}" placeholder="{{ __('Category Name') }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="group_name" class="col-sm-3 control-label">{{ __('Group Category') }}</label>
                    <div class="col-sm-8">
                      <select name="group_name" class="form-control " id="group_name">
                        @foreach($group_names as $group_name)
                        <option value="{{ $group_name->id }}" {{ $group_name->id == $category->group_id ? 'selected' : '' }}>{{ $group_name->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="is_free" class="col-sm-3 control-label">{{ __('Available on Package') }}</label>
                    <div class="col-sm-8">
                      <select name="is_free" class="form-control " id="is_free">
                        <option value="0" {{ $category->is_free == 0 ? 'selected' : '' }}>Paid Package</option>
                        <option value="1" {{ $category->is_free == 1 ? 'selected' : '' }}>Free Package</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-xs-2">
                    <label class="col-sm-3 control-label">{{ __('Category Icon')  }}</label>
                    <div class="custom-file col-sm-8 pl-sm-3-custom">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="validatedCustomFile1">
                        <label class="custom-file-label overflow-hidden" for="validatedCustomFile">{{ __('Upload File')  }}</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-8 offset-sm-3" id='note_txt_1'>
                      <span class="badge badge-danger">{{ __('Note')  }}!</span> {{ __(' Allowed File Extensions: SVG') }} || {{__('Max File Size : 8 Mb') }}
                    </div>
                  </div>
                  <div class="col-sm-8 pl-sm-3-custom px-0 mobile-margin">
                    <button class="btn btn-primary custom-btn-small custom-variant-title-validation" type="submit" id="btnSubmit">{{ __('Update')  }}</button>
                    <a href="{{ url('categories/list') }}" class="btn btn-danger custom-btn-small">{{ __('Cancel') }}</a>
                  </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layouts.includes.message_boxes')

@endsection
@section('js')
<script src="{{ asset('datta-able/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('dist/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('dist/js/custom/customer.js') }}"></script>
@endsection