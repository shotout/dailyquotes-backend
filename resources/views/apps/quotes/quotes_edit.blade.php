@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('datta-able/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
<!-- Main content -->
<div class="col-sm-12" id="edit-customer-container">
  <div class="card">
    <div class="card-header">
      <h5> <a href="{{ url('quotes/list') }}">{{ __('Quote') }}</a> >> {{ $quotes->title }}</h5>
      <div class="card-header-right">

      </div>
    </div>
    <div class="card-body p-0" id="no_shadow_on_card">

      <div class="col-sm-12 m-t-20 form-tabs">
        <ul class="nav nav-tabs " id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('Quote Information') }}</a>
          </li>
        </ul>
        <div class="col-sm-12 tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form action='{{ url("quotes/update") }}' method="post" class="form-horizontal" id="editadmin" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
              <input type="hidden" value="{{ $quotes->id }}" name="id">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="group_name" class="col-sm-3 control-label">{{ __('Category') }}</label>
                    <div class="col-sm-8">
                      <select name="group_name" class="form-control " id="group_name">
                        @foreach($group_names as $group_name)
                        <option value="{{ $group_name->id }}" {{ $group_name->id == $quotes->category_id ? 'selected' : '' }}>{{ $group_name->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="first_name" class="col-sm-3 control-label require">{{ __('Quote') }}</label>
                    <div class="col-sm-8">
                      <textarea name="quote" class="form-control" id="quote" placeholder="{{ __('Quote') }}"  rows="4">{{ $quotes->title }}</textarea>
                    </div>
                  </div>
                  <div class="col-sm-8 pl-sm-3-custom px-0 mobile-margin">
                    <button class="btn btn-primary custom-btn-small custom-variant-title-validation" type="submit" id="btnSubmit">{{ __('Update')  }}</button>
                    <a href="{{ url('quotes/list') }}" class="btn btn-danger custom-btn-small">{{ __('Cancel') }}</a>
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