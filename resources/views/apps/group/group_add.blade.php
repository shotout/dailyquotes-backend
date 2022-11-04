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
        <h5><a href="{{ url('group/list') }}">{{ __('Group Category') }}</a> >> {{ __('New Group Category') }}</h5>
        <div class="card-header-right">
        </div>
      </div>
      <div class="card-body table-border-style" >
        <div class="form-tabs">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('Group Information') }}</a>
            </li>
          </ul>
          <form action="{{ url('group/save') }}" method="post" id="groupAdd" class="form-horizontal">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active mb-3" id="home" role="tabpanel" aria-labelledby="home-tab">
              <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                    
                <div class="form-group row">
                  <label for="first_name" class="col-sm-2 control-label require">{{ __('Group Name') }}</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="group_name" name="group_name" value="{{ old('group_name') }}" placeholder="{{ __('Group Name') }}">
                  </div>
                </div>             
              </div>
              </br>
              </br>
               <div class="col-sm-8 px-0">
                  <button class="btn btn-primary custom-btn-small" type="submit" id="submitBtn"><i class="comment_spinner spinner fa fa-spinner fa-spin custom-btn-small display_none"></i><span id="spinnerText">{{ __('Submit') }}</span></button>   
                  <a href="{{ url('group/list') }}" class="btn btn-info custom-btn-small">{{ __('Cancel') }}</a>
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
<script src="{{ asset('dist/js/custom/customer.min.js') }}"></script>
@endsection