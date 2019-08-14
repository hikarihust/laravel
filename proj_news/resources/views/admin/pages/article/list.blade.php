@php
    use App\Helpers\Template as Template;
    use App\Helpers\Highlight as Highlight;
@endphp

<div class="x_content">
  <div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
      <thead>
        <tr class="headings">
          <th class="column-title">#</th>
          <th class="column-title">Article Info</th>
          <th class="column-title">Thumb</th>
          <th class="column-title">Category</th>
          <th class="column-title">Trạng thái</th>
          <th class="column-title">Tạo mới</th>
          <th class="column-title">Chỉnh sửa</th>
          <th class="column-title">Hành động</th>
        </tr>
      </thead>
      <tbody>
        @if (count($items) > 0)
          @foreach ($items as $key => $val)
            @php
              $index       = $key + 1;
              $class       = ($index%2 === 0) ? 'even' : 'odd';
              $id          = $val->id;
              $name        = Highlight::show($val->name, $params['search'], 'name');
              $content = Highlight::show($val->content, $params['search'], 'content');
              $thumb       = Template::showItemThumb($controllerName, $val->thumb, $val->name);
              $categoryName = $val['categoryName'];
              $status      = Template::showItemStatus($controllerName, $id, $val->status);
              $createdHistory   = Template::showItemHistory($val->created_by, $val->created);
              $modifiedHistory  = Template::showItemHistory($val->modified_by, $val->created);
              $listBtnAction    = Template::showButtonAction($controllerName, $id);
            @endphp
            <tr class="{{ $class }} pointer">
            <td> {{ $index }} </td>
              <td width="30%">
                <p><strong>Name:</strong> {!! $name !!} </p>
                <p><strong>Content:</strong>{!! $content !!}</p>
              </td>
              <td width="14%">{!! $thumb !!}</td>
              <td>{!! $categoryName !!}</td>
              <td>{!! $status !!}</td>
              <td>{!! $createdHistory !!}</td>
              <td>{!! $modifiedHistory !!}</td>
              <td class="last">{!! $listBtnAction !!}</td>
            </tr>
          @endforeach
        @else
          @include('admin.templates.list_empty', ['colspan' => 10])
        @endif
      </tbody>
    </table>
  </div>
</div>