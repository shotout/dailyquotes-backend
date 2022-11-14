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
    <div class="card-body table-border-style">
      <div class="form-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('Category Information') }}</a>
          </li>
        </ul>
        <form action="{{ url('quotes/save') }}" method="post" id="CategoryAdd" class="form-horizontal" enctype="multipart/form-data">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active mb-3" id="home" role="tabpanel" aria-labelledby="home-tab">
              <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
              <div class="form-group row">
                <label for="category_name" class="col-sm-2 control-label">{{ __('Category') }}</label>
                <div class="col-sm-6">
                  <select name="category_name" class="form-control " id="category_name">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $category->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="first_name" class="col-sm-2 control-label require">{{ __('Quote') }}</label>
                <div class="col-sm-6">
                  <textarea name="quote" class="form-control" id="quote" placeholder="{{ __('Quote') }}" rows="4"></textarea>
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
<!-- [ Customer ] end -->

@endsection
@section('js')
<script src="{{ asset('datta-able/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('dist/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('dist/js/custom/customer.js') }}"></script>
@endsection