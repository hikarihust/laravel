@php
  $totalItems = $items->total();
  $totalPages = $items->lastPage();
  $totalItemsPerPage = $items->perPage();
@endphp

<div class="x_content">
  <div class="row">
    <div class="col-md-6">
      <p class="m-b-0">Số phần tử trên 1 trang:<span class="label label-info label-pagination">{{ $totalItemsPerPage }}</span>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tổng số phần tử: <span class="label label-success label-pagination">{{ $totalItems }}</span>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tổng số trang: <span class="label label-danger label-pagination">{{ $totalPages }}</span>
      </p>
    </div>
    <div class="col-md-6">
      {{ $items->links('admin.templates.pagination_zvn', ['paginator' => $items]) }}
      {{-- <nav aria-label="Page navigation example">
        <ul class="pagination zvn-pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">«</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">»</a>
          </li>
        </ul>
      </nav> --}}
    </div>
  </div>
</div>