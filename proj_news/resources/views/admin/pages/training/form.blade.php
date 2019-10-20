<form action="{{url('admin/training/submit')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{CSRF_Token()}}">
<input type="file" name="file">

<input type="submit" value="upload">
</form>

<div>
    <a href="{{url('admin/training/export')}}/csv"> Download as CSV file</a>
</div>

<div>
    <a href="{{url('admin/training/export')}}/xls"> Download as xls file </a>
</div>

<div>
    <a href="{{url('admin/training/export')}}/xlsx"> Download as xlsx file </a>
</div>

<div>
    <a href="{{url('admin/training/export')}}/txt"> Download as txt file </a>
</div>