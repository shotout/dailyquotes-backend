@extends('layouts.app')
@section('css')
@endsection

@section('content')
<!-- Main content -->
<div class="col-sm-12" id="import-customer-container">
  <div class="card Recent-Users">
    <div class="card-header">
      <h5><a href="{{ url('quotes/list') }}">{{ __('Quotes') }}</a> >> {{ __('Import Quotes') }}</h5>
      <div class="card-header-right">

      </div>
    </div>
    <div class="card-body p-0">
      <div class="col-sm-12">
        <div class="card-block pt-2">
          <hr>
          <p>{{ __('Your Excel data should be in the format below. The first line of your Excel file should be the column headers as in the table example. Also make sure that your file is UTF-8 to avoid unnecessary encoding problems.') }}</p>
        
          <div class="table-responsive col-sm-6">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="star-sign">{{ __('Quotes') }}<span class="color_ff2d42">*</span></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Your Quotes Here </td>
                </tr>
              </tbody>
            </table>
          </div>
          <span class="badge badge-info mt-3">{{ __('Note') }}</span> <small class="text-info">{{ __('Required field is mendatory') }}</small>

          <br><br>

          <form action="{{ url('quotes/importcsv') }}" method="post" id="myform1" class="form-horizontal" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
              <div class="form-group row">
                <label for="group_name" class="col-sm-2 control-label pt-1">{{ __('Category') }}
                  <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                  <select name="group_name" class="form-control " id="group_name" required>
                    <option value="">{{ __('Select Category') }}</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
                <label class="col-md-2 control-label pt-1">{{ __('Choose Excel File') }}
                  <span class="text-danger">*</span>
                </label>
                <div class="custom-file col-md-4">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="csv_file" id="validatedCustomFile">
                    <label class="custom-file-label overflow_hidden" for="validatedCustomFile">{{ __('Upload Excel File...') }}</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 control-label note"></label>
              <div class="col-md-8" id='note_txt_1'>
                <span class="badge badge-info note-style">{{ __('Note') }}</span> <small class="text-info">{{ __('Allowed File Extensions: xls,xlsx') }}</small>
              </div>
              <div class="col-md-8" id='note_txt_2'>
              </div>
            </div>

            <!-- /.box-body -->
            <div class="col-sm-8 px-0 mt-3">
              <button class="btn btn-primary custom-btn-small" type="submit" id="submit">{{ __('Submit') }}</button>
              <a href="{{ url('quotes/list') }}" class="btn btn-danger custom-btn-small">{{ __('Cancel') }}</a>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="{{ asset('dist/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('dist/js/custom/customer.min.js') }}"></script>
@endsection