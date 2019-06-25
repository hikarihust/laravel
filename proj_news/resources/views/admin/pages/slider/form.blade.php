@extends('admin.main')
@php
  use App\Helpers\Form as FormTemplate;
  $formInputClass = config('zvn.template.form_input.class');
  $formLabelClass = config('zvn.template.form_label.class');

  $elements = [
    [
      'label' => Form::label('name', 'Name', ['class' => $formLabelClass]),
      'element' => Form::text('name', $item['name'], ['class' => $formInputClass])
    ],
    [
      'label' => Form::label('description', 'Description', ['class' => $formLabelClass]),
      'element' => Form::text('description', $item['description'], ['class' => $formInputClass])
    ]
  ];

@endphp
@section('content')
@include('admin.templates.page_header', ['pageIndex' => false])

<!--box-lists-->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
      @include('admin.templates.x_title', ['title' => 'Form'])
      <div class="x_content">
        {{ Form::open([
                        'method' => 'POST',
                        'url' => route("$controllerName/save"),
                        'accept-charset' => 'UTF-8',
                        'enctype' => 'multipart/form-data',
                        'class' => 'form-horizontal form-label-left',
                        'id' => 'main-form'
                      ]) }}
            {!! FormTemplate::show($elements); !!}
        {{ Form::close() }}
        {{-- 
          <div class="form-group">
            <label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control col-md-6 col-xs-12" id="status" name="status">
                <option value="default">Select status</option>
                <option value="active">Kích hoạt</option>
                <option value="inactive" selected="selected">Chưa kích hoạt</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="link" class="control-label col-md-3 col-sm-3 col-xs-12">Link</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input class="form-control col-md-6 col-xs-12" name="link" type="text" value="https://zendvn.com/uu-dai-hoc-phi-tai-zendvn/" id="link">
            </div>
          </div>
          <div class="form-group">
            <label for="thumb" class="control-label col-md-3 col-sm-3 col-xs-12">Thumb</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input class="form-control col-md-6 col-xs-12" name="thumb" type="file" id="thumb">
              <p style="margin-top: 50px;"><img src="http://lar_prepare.xyz/images/slider/LWi6hINpXz.jpeg" alt="Ưu đãi học phí" class="zvn-thumb"></p>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input name="id" type="hidden" value="3">
              <input name="thumb_current" type="hidden" value="LWi6hINpXz.jpeg">
              <input class="btn btn-success" type="submit" value="Save">
            </div>
          </div>
        --}}
      </div>
		</div>
	</div>
</div>
@endsection