@extends('admin.main')

@section('content')
@include('admin.templates.page_header', ['pageIndex' => false])
@include('admin.templates.error')


@if ($item['id'])
  @include('admin.pages.user.form_info')  
@else
  @include('admin.pages.user.form_add')
@endif

@endsection