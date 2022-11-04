@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('datta-able/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
<!-- Main content -->
<div class="col-sm-12" id="edit-customer-container">
  <div class="card">
    <div class="card-header">
      <h5> <a href="{{ url('group/list') }}">{{ __('Group') }}</a> >> {{ $groupData->name }} >> {{ __('Edit') }}</h5>
      <div class="card-header-right">

      </div>
    </div>
    <div class="card-body p-0" id="no_shadow_on_card">

      <div class="col-sm-12 m-t-20 form-tabs">
        <ul class="nav nav-tabs " id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('Group Information') }}</a>
          </li>
        </ul>
        <div class="col-sm-12 tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form action='{{ url("group/update") }}' method="post" class="form-horizontal" id="editgroup">
              <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
              <input type="hidden" value="{{ $groupData->id }}" name="group_id">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="first_name" class="col-sm-3 control-label require">{{ __('Group Name') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="group_name" name="group_name" value="{{ $groupData->name }}" placeholder="{{ __('Group Name') }}">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-8 pl-sm-3-custom px-0 mobile-margin">
                <button class="btn btn-primary custom-btn-small custom-variant-title-validation" type="submit" id="btnSubmit">{{ __('Update')  }}</button>
                <a href="{{ url('group/list') }}" class="btn btn-danger custom-btn-small">{{ __('Cancel') }}</a>
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
<script src="{{ asset('dist/js/custom/customer.min.js') }}"></script>
@endsection