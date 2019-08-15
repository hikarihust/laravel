@extends('news.main')
@section('content')
<!-- Content -->
<div class="section-category">
	@include('news.block.breadcrumb')
	<div class="content_container container_category">
		<div class="featured_title">
			<div class="container">
				<div class="row">
					<!-- Main Content -->
					<div class="col-lg-9">
							@include('news.pages.category.child-index.category', ['item' => $itemCategory[0]])
					</div>
					<!-- Sidebar -->
					<div class="col-lg-3">
						<div class="sidebar">
						<!-- Latest Posts -->
						@include('news.block.latest_posts', ['items' => $itemsLatest])
						<!-- Advertisement -->
						@include('news.block.advertisement', ['itemsAdvertisement' => array()])
						<!-- Most Viewed -->
						@include('news.block.most_viewed', ['itemsMostViewed' => array()])
						<!-- Tags -->
						@include('news.block.tags', ['itemsTags' => array()])
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Content -->
@endsection