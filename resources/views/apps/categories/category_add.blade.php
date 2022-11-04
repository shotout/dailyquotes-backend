@extends('layouts.app')
@section('css')
{{-- Select2  --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('datta-able/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
<!-- Main content -->
  <div class="col-sm-12" id="add-customer-container">
    <div class="card">
      <div class="card-header">
        <h5><a href="{{ url('categories/list') }}">{{ __('Category') }}</a> >> {{ __('New Category') }}</h5>
        <div class="card-header-right">
        </div>
      </div>
      <div class="card-body table-border-style" >
        <div class="form-tabs">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('Category Information') }}</a>
            </li>
          </ul>
          <form action="{{ url('categories/save') }}" method="post" id="CategoryAdd" class="form-horizontal" enctype="multipart/form-data">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active mb-3" id="home" role="tabpanel" aria-labelledby="home-tab">
              <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                    
                <div class="form-group row">
                  <label for="first_name" class="col-sm-2 control-label require">{{ __('Category Name') }}</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="category_name" name="category_name" value="{{ old('category_name') }}" placeholder="{{ __('Category Name') }}">
                  </div>
                </div>
              <div class="form-group row">
                    <label for="category_group" class="col-sm-2 control-label require">{{ __('Category Group') }}</label>
                    <div class="col-sm-6">
                        <select class="form-control select2" name="category_group" id="category_group">
                            <option value="">{{ __('Select One') }}</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
              </div> 
              <div class="form-group row">
                    <label for="is_free" class="col-sm-2 control-label require">{{ __('Available on Package') }}</label>
                    <div class="col-sm-6">
                        <select class="form-control select2" name="is_free" id="is_free">
                            <option value="">{{ __('Select One') }}</option>
                            <option value="1">{{ __('Free Package') }}</option>
                            <option value="0">{{ __('Paid Package') }}</option>
                        </select>
                    </div>
              </div> 
              <div class="form-group row mb-xs-2">
                    <label class="col-sm-2 control-label">{{ __('Category Icon')  }}</label>
                    <div class="custom-file col-sm-6 pl-sm-3-custom">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="validatedCustomFile1">
                        <label class="custom-file-label overflow-hidden" for="validatedCustomFile">{{ __('Upload File')  }}</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-8 offset-sm-2" id='note_txt_1'>
                      <span class="badge badge-danger">{{ __('Note')  }}!</span> {{ __(' Allowed File Extensions: SVG') }} || {{__('Max File Size : 8 Mb') }}
                    </div>
                  </div>     
              </div>
              </br>
              </br>
               <div class="col-sm-8 px-0">
                  <button class="btn btn-primary custom-btn-small" type="submit" id="submitBtn"><i class="comment_spinner spinner fa fa-spinner fa-spin custom-btn-small display_none"></i><span id="spinnerText">{{ __('Submit') }}</span></button>   
                  <a href="{{ url('customer/list') }}" class="btn btn-info custom-btn-small">{{ __('Cancel') }}</a>
              </div>
            </div>
             
          </form> 
            </div>              
        </div>
      </div>
  </div>
<!-- [ Customer ] end -->

@endsection
@section('js')
<script src="{{ asset('datta-able/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('dist/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('dist/js/custom/customer.js') }}"></script>
@endsection