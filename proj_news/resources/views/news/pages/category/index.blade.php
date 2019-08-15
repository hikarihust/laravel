@extends('news.main')
@section('content')
  <!-- Content -->
  <div class="section-category">
		<div class="home">
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/footer.jpg') }}"
					data-speed="0.8"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">Thể thao</div>
								<div class="breadcrumbs">
									<ul class="d-flex flex-row align-items-start justify-content-start">
										<li><a href="">Trang chủ</a></li>
										<li>Thể thao</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content_container container_category">
			<div class="featured_title">
				<div class="container">
					<div class="row">
						<!-- Main Content -->
						<div class="col-lg-9">
							<div class="posts">
								<div class="post_item post_h_large">
									<div class="row">
										<div class="col-lg-5">
											<div class="post_image"><img src="images/article/e7YyFZJCc8.jpeg"
																			alt="images/article/e7YyFZJCc8.jpeg"
																			class="img-fluid w-100"></div>
										</div>
										<div class="col-lg-7">
											<div class="post_content">
												<div class="post_category cat_technology  d-none ">
													<a href="the-loai/the-thao-1.html">Thể thao</a>
												</div>
												<div class="post_title"><a
														href="bai-viet/ha-noi-vao-vong-knock-out-afc-cup-14.html">Hà Nội
													vào vòng knock-out AFC Cup</a></div>
												<div class="post_info d-flex flex-row align-items-center justify-content-start">
													<div class="post_author d-flex flex-row align-items-center justify-content-start">
														<div class="post_author_name"><a
																href="the-loai/the-thao-1.html#">Lưu Trường Hải Lân</a>
														</div>
													</div>
													<div class="post_date"><a href="the-loai/the-thao-1.html#">10/05/2019</a>
													</div>
												</div>
												<div class="post_text">
													<p>ĐKVĐ V-League đánh bại&nbsp;Tampines Rovers 2-0 vào chiều 15/5 để
														đứng đầu bảng F.
														Tiếp đối thủ đến từ Singapore trong tình thế buộc phải thắng để
														tự quyết vé đi tiếp, Hà Nội đã có trận đấu dễ dàng. Có thể nói,
														kết quả của trận đấu được định...
													</p>
												</div>
											</div>
										</div>
									</div>
                </div>
							</div>
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