@extends('admin.main')
@php
  use App\Helpers\Form as FormTemplate;
  use App\Helpers\Template as Template;
  $formInputClass = config('zvn.template.form_input.class');
  $formLabelClass = config('zvn.template.form_label.class');

  $statusValue = ['default' => 'Select status', 
                  'active' => config('zvn.template.status.active.name'), 
                  'inactive' => config('zvn.template.status.inactive.name')];
  $elements = [
    [
      'label' => Form::label('name', 'Name', ['class' => $formLabelClass]),
      'element' => Form::text('name', $item['name'], ['class' => $formInputClass])
    ],
    [
      'label' => Form::label('description', 'Description', ['class' => $formLabelClass]),
      'element' => Form::text('description', $item['description'], ['class' => $formInputClass])
    ],
    [
      'label' => Form::label('status', 'Status', ['class' => $formLabelClass]),
      'element' => Form::select('status', $statusValue, $item['status'], ['class' => $formInputClass])
    ],   
    [
      'label' => Form::label('link', 'Link', ['class' => $formLabelClass]),
      'element' => Form::text('link', $item['link'], ['class' => $formInputClass])
    ],
    [
      'label' => Form::label('thumb', 'Thumb', ['class' => $formLabelClass]),
      'element' => Form::file('thumb', ['class' => $formInputClass]),
      'thumb' => (isset($item['thumb']) && ($item['thumb'])) ? Template::showItemThumb($controllerName, $item['thumb'], $item['name']) : null,
      'type' => 'thumb'
    ],
    [
      'element' => Form::submit('Save', ['class' => 'btn btn-success']),
      'type' => 'btn-submit' 
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
          <input name="id" type="hidden" value="3">
          <input name="thumb_current" type="hidden" value="LWi6hINpXz.jpeg">
        --}}
      </div>
		</div>
	</div>
</div>
@endsection