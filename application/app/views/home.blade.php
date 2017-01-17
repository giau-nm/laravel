@extends('layouts.master')
<?php $settings = Setting::first(); ?>
@section('content')

						   <section class="row-section top-product_category top-menu ">
							  <div class="container">
								 <div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									   <div class="hidden-sm hidden-xs">
										  <nav id="nav">
											 <ul class="nav navbar-nav">
												<li>
												   <a href="http://demo61.websieuviet.com/" title="Trang chủ">
												   <span>Trang chủ</span>
												   </a>
												</li>
												<li>
												   <a href="http://demo61.websieuviet.com/store/gioi-thieu" title="Giới thiệu">
												   <span>Giới thiệu</span>
												   </a>
												</li>
												<li>
												   <a href="http://demo61.websieuviet.com/store/san-pham" title="Sản phẩm">
												   <span>Sản phẩm</span>
												   </a>
												</li>
												<li>
												   <a href="http://demo61.websieuviet.com/store/tin-tuc" title="Tin tức">
												   <span>Tin tức</span>
												   </a>
												</li>
												<li>
												   <a href="http://demo61.websieuviet.com/store/lien-he" title="Liên hệ">
												   <span>Liên hệ</span>
												   </a>
												</li>
											 </ul>
										  </nav>
									   </div>
									</div>
								 </div>
							  </div>
						   </section>
						   <section class="row-section top-html top-slideshow " style=" padding:20px 0px 5px 0px !important; ">
							  <div class="container">
								 <div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hidden-sm hidden-xs">
									   <section class="custom-html">
											<?php $aBanner1 = Media::where('active', '=', 1)->where('category_id', '=', 2)->where('location', '=', 1)->first() ?>
										  <a href="{{$aBanner1['link_url']}}" title="{{$aBanner1['title']}}" target="_blank">
										  <img src="{{ Config::get('site.uploads_dir') .'images/' . $aBanner1['pic_url']}}" alt="{{$aBanner1['title']}}" class="banner-store"></a>
										  
									   </section>
									</div>
									<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
									   <div id="myCarousel_4452581434017930" class="carousel slide carousel-fade" data-ride="carousel">
										  <div class="carousel-inner">
											@foreach ($aSlideshows as $key=>$item)
											  <div class="item @if($key == 0) active @endif">
												<a href="{{ URL::to('') . '/' . strtolower($item->link_url) }}" title="{{ $item->name }}">	
												<img src="{{ Config::get('site.uploads_dir') .'images/' . $item->pic_url }}" alt="" data-fullwidthcentering="on"></a>
											 </div>
											@endforeach
										  </div>
										  <a class="left carousel-control" href="#myCarousel_4452581434017930" role="button" data-slide="prev"><img src="http://demo61.websieuviet.com/theme/frontend/default/style/default/image/store/left-demo06.png" alt=""></a>
										  <a class="right carousel-control" href="#myCarousel_4452581434017930" role="button" data-slide="next"><img src="http://demo61.websieuviet.com/theme/frontend/default/style/default/image/store/right-demo06.png" alt=""></a>
									   </div>
									</div>
								 </div>
							  </div>
						   </section>
						   <div class="main-wrap">
							  <section class="row_section">
								 <div class="container">
									<div class="row">
									   @include('layouts.sidebar')
									   <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										  <div class="row">
											 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<section id="products-featured">
												   <div class="itemfeatured">
													  <h2><span>Sản phẩm mới nhất</span></h2>
													  <div class="row">
														
														 <div>
															@foreach ($aProductNew as $aItem)													
															<div class="col94 item col-lg-3 col-md-6 col-sm-6 col-xs-6">
																@include('products.list-products',['aItem' => $aItem])
															  </div>
															@endforeach
															</div>
													  </div>
												   </div>
												</section>
											 </div>
										  </div>
										  <div class="row">
											 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<section id="products-featured">
												   <div class="itemfeatured">
													  <h2><span>Sản phẩm nổi bật</span></h2>
													  <div class="row">
														
														 <div>
															@foreach ($aProductFeatured as $aItem)													
															<div class="col94 item col-lg-3 col-md-6 col-sm-6 col-xs-6">
																@include('products.list-products',['aItem' => $aItem])
															  </div>
															@endforeach
															</div>
													  </div>
												   </div>
												</section>
											 </div>
										  </div>
										  <div class="row">
											 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<section id="products-featured">
												   <div class="itemfeatured">
														<h2><span>Sản phẩm Hot</span></h2>
														<div class="row">
														
														 <div>
															@foreach ($aProductHot as $aItem)	
															<div class="col94 item col-lg-3 col-md-6 col-sm-6 col-xs-6">
																@include('products.list-products',['aItem' => $aItem])
															  </div>
															@endforeach
														</div>
														</div>
												   </div>
												</section>
											 </div>
										  </div>
										</div>
									</div>
								 </div>
							  </section>
						   </div>

							  <section class="row-section footer-html footer-newsletters footer-banner row_0">
								 <div class="container">
									<div class="row">
									   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										  <section class="intro">
											 <p></p>
											 <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
											 <p></p>
										  </section>
									   </div>
									   <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-sm hidden-xs">
										  <section class="box-category">
											 <div class="banner-small">
												<?php $aBanner2 = Media::where('active', '=', 1)->where('category_id', '=', 2)->where('location', '=', 2)->first() ?>
													<a href="{{$aBanner2['link_url']}}" title="{{$aBanner2['title']}}" target="_blank">
												  <img src="{{ Config::get('site.uploads_dir') .'images/' . $aBanner2['pic_url']}}" alt="{{$aBanner2['title']}}" class="banner-store"></a>
											 </div>
										  </section>
									   </div>
									   <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										  <!--footer-->
										  <section class="clearfix footer">
											 <h3><span>Fanpage shop</span></h3>
											 <iframe src="//www.facebook.com/plugins/likebox.php?href={{$settings->facebook_page_id}}&#10;&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=459719444132113" scrolling="no" frameborder="0" style="border:none; overflow:hidden; min-height:300px;" allowtransparency="true"></iframe>
										  </section>
										  <!--footer-->      
									   </div>
									</div>
								 </div>
							  </section>
					  
<section class="row-section footer-post_latest row_1">
								 <div class="container">
									<section id="news" class="news clearfix">
									   <div class="itemnews">
										  <h2><span>Tin tức nổi bật</span>
											 <a href="http://demo61.websieuviet.com/store/tin-tuc" title="" class="all">Xem tất cả</a>
										  </h2>
										  <div class="row">
											 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 news-col124 mg">
												<article>
												   <a href="http://demo61.websieuviet.com/store/cau-chuyen-cam-dong-ve-lao-nong-xu-han-quoc-va-chiec-galaxy-s5-cn537a1980" title="Câu chuyện cảm động về lão nông xứ Hàn Quốc và chiếc Galaxy S5">
													  <div class="image">
														 <img src="http://demo61.websieuviet.com/file/pic/newsletter/2016/04/82394b480080145fd36281408e3abd5f_640.jpg" alt="">										 
													  </div>
												   </a>
												   <div class="title-news">
													  <h3>
														 <a href="http://demo61.websieuviet.com/store/cau-chuyen-cam-dong-ve-lao-nong-xu-han-quoc-va-chiec-galaxy-s5-cn537a1980" title="Câu chuyện cảm động về lão nông xứ Hàn Quốc và chiếc Galaxy S5">Câu chuyện cảm động về lão nông xứ Hàn Quốc và chiếc Galaxy S5</a>
													  </h3>
													  <p>Tôi, một bác nông dân thật thà, chất phác, gom góp cho bằng được khoản tiền để sắm chiếc điện thoại Galaxy S5. Tôi cũng chẳng biết Galaxy S5 nó hoạt động thế nào đâu, chỉ nghe...</p>
												   </div>
												</article>
											 </div>
											 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 news-col124 mg">
												<article>
												   <a href="http://demo61.websieuviet.com/store/dong-ho-gia-re-cn537a1978" title="Đồng hồ giá rẻ">
													  <div class="image">
														 <img src="http://demo61.websieuviet.com/file/pic/newsletter/2016/04/c53babb307577d973de0c7ae169341aa_640.jpg" alt="">										 
													  </div>
												   </a>
												   <div class="title-news">
													  <h3>
														 <a href="http://demo61.websieuviet.com/store/dong-ho-gia-re-cn537a1978" title="Đồng hồ giá rẻ">Đồng hồ giá rẻ</a>
													  </h3>
													  <p>CSS3 allows web designers to specify multiple background images for box elements, using nothing more</p>
												   </div>
												</article>
											 </div>
											 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 news-col124 mg">
												<article>
												   <a href="http://demo61.websieuviet.com/store/dong-ho-gia-re-cn537a1977" title="Đồng hồ giá rẻ">
													  <div class="image">
														 <img src="http://demo61.websieuviet.com/file/pic/newsletter/2016/04/1af80caa65df361363e6dcf7883e26b1_640.jpg" alt="">										 
													  </div>
												   </a>
												   <div class="title-news">
													  <h3>
														 <a href="http://demo61.websieuviet.com/store/dong-ho-gia-re-cn537a1977" title="Đồng hồ giá rẻ">Đồng hồ giá rẻ</a>
													  </h3>
													  <p>CSS3 allows web designers to specify multiple background images for box elements, using nothing more</p>
												   </div>
												</article>
											 </div>
											 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 news-col124 mg">
												<article>
												   <a href="http://demo61.websieuviet.com/store/bi-quyet-mua-dong-ho-de-bao-duong-sua-chua-cn536a1975" title="Bí quyết mua đồng hồ dễ bảo dưỡng sửa chữa">
													  <div class="image">
														 <img src="http://demo61.websieuviet.com/file/pic/newsletter/2016/04/ad418651d868541dabcff3cec34156c2_640.jpg" alt="">										 
													  </div>
												   </a>
												   <div class="title-news">
													  <h3>
														 <a href="http://demo61.websieuviet.com/store/bi-quyet-mua-dong-ho-de-bao-duong-sua-chua-cn536a1975" title="Bí quyết mua đồng hồ dễ bảo dưỡng sửa chữa">Bí quyết mua đồng hồ dễ bảo dưỡng sửa chữa</a>
													  </h3>
													  <p>Mỗi khi mua một chiếc đồng hồ, ngoài bộ máy ra thì người mua còn thường quan tâm đến mặt kính của đồng hồ. Với mặt kính sapphire thì khả năng chống trầy cao hơn. Chính vì vậy, khi...</p>
												   </div>
												</article>
											 </div>
										  </div>
									   </div>
									</section>
								 </div>
							  </section>
  <section class="row-section footer-slideshow  row_2" style="background:#313131 !important;">
								 <div class="container">
									<section id="customer" class="clearfix">
									   <div class="itemcus">
										  <h2><span>Khách hàng</span></h2>
										  <div id="slide_336401461060790" class="owl-carousel cus owl-theme" style="opacity: 1; display: block;">
											 <div class="owl-wrapper-outer">
												<div class="owl-wrapper" style="width: 2280px; left: 0px; display: block;">
												   <div class="owl-item" style="width: 285px;">
													  <div class="item">
														 <a href="" title="dt 5"><img src="http://demo61.websieuviet.com/file/pic/ad/2016/04/7b131ecde97bb307f0833294695bff10.png" alt=""></a>
													  </div>
												   </div>
												   <div class="owl-item" style="width: 285px;">
													  <div class="item">
														 <a href="" title="dt 4"><img src="http://demo61.websieuviet.com/file/pic/ad/2016/04/4c5d8a088579774663a14306be496b26.png" alt=""></a>
													  </div>
												   </div>
												   <div class="owl-item" style="width: 285px;">
													  <div class="item">
														 <a href="" title="dt3"><img src="http://demo61.websieuviet.com/file/pic/ad/2016/04/85253b447dbc4e8f84defe91e35bafb9.png" alt=""></a>
													  </div>
												   </div>
												   <div class="owl-item" style="width: 285px;">
													  <div class="item">
														 <a href="" title="dt1"><img src="http://demo61.websieuviet.com/file/pic/ad/2016/04/e9e10cdb2d082b1c2720202106e15abc.png" alt=""></a>
													  </div>
												   </div>
												</div>
											 </div>
											 <div class="owl-controls clickable" style="display: none;">
												<div class="owl-pagination">
												   <div class="owl-page active"><span class=""></span></div>
												</div>
											 </div>
										  </div>
									   </div>
									</section>
								 </div>
							  </section>
							  @stop