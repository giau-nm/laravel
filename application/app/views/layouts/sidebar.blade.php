<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	  <section class="box-category">
		 <div>
			<div class="heading">
			   <span><i class="fa fa-th-list"></i> Danh mục</span>
			</div>
			<div class="list-group panelvmenu">
				<?php $categories = Category::orderBy('order', 'ASC')->where('id','!=', 1)->get(); ?>
				@foreach ($categories as $category)
				  <a class="list-group-item-vmenu" href="{{ URL::to('product_category') . '/' . strtolower($category->name) }}"><i class="fa fa-caret-right"></i>{{ $category->name }}</a>
				@endforeach
			   <script>
				  var url_cat=document.URL;	
				  $(".panelvmenu a[href='"+url_cat+"']").addClass('active');
			   </script>
			</div>
		 </div>
	  </section>
	  <div>
		 <section class="box-category">
			<div class="heading">
			   <span>Sản phẩm bán chạy</span>
			</div>
			<div class="main">
				<?php
					// sản phẩm bán chạy
					$aProductFeaturedHot = Product::get_products(array('limit'=> 4, 'hot'=> 1, 'featured'=> 1));
				?>
			   <ul class="list">
				@foreach ($aProductFeaturedHot as $aItem)													
				  <li>
					 <a href="{{ URL::to('products') . '/' . strtolower($aItem->alias) }}" title="{{ $aItem->name }}">
						<img src="{{ Config::get('site.uploads_dir') .'images/' . $aItem->image }}" alt="{{ $aItem->name }}">						
						<p>{{ $aItem->name }}</p>
						<span class="price-value price-new">
						@if($aItem->price >0)
								{{number_format($aItem->price,0,".",",")}} đ
							@else
								Liên hệ
							@endif
						</span>
					 </a>
				  </li>
				  @endforeach
				  </ul>
			</div>
		 </section>
	  </div>
	  <div>
		 <section class="box-category">
			<div class="heading">
			   <span>Tin tức mới nhất</span>
			</div>
			<div class="main">
			   <ul class="list-post-latest list_post">
				  <li>
					 <a href="http://demo61.websieuviet.com/store/ban-se-giat-minh-khi-doc-lai-bai-review-nem-da-iphone-vao-nam-2007-cn537a1981" title="Bạn sẽ giật mình khi đọc lại bài review " ném="" đá"="" iphone="" vào="" năm="" 2007"="">  
					 <div class="img-overflow">  
						<img src="http://demo61.websieuviet.com/file/pic/newsletter/2016/04/37940b69f9df1e12e5710145a8a8cbc9_640.jpg" alt="">					
					 </div>
					 <p>Bạn sẽ giật mình khi đọc lại bài review "ném đá" iPhone vào năm 2007</p>
					 <span>23/04/2016  </span>
					 </a>
				  </li>
				  <li>
					 <a href="http://demo61.websieuviet.com/store/cau-chuyen-cam-dong-ve-lao-nong-xu-han-quoc-va-chiec-galaxy-s5-cn537a1980" title="Câu chuyện cảm động về lão nông xứ Hàn Quốc và chiếc Galaxy S5">
						<div class="img-overflow">  
						   <img src="http://demo61.websieuviet.com/file/pic/newsletter/2016/04/82394b480080145fd36281408e3abd5f_640.jpg" alt="">					
						</div>
						<p>Câu chuyện cảm động về lão nông xứ Hàn Quốc và chiếc Galaxy S5</p>
						<span>23/04/2016  </span>
					 </a>
				  </li>
				  <li>
					 <a href="http://demo61.websieuviet.com/store/thoi-ki-huy-hoang-cua-smartphone-da-di-qua-cn537a1979" title="Thời kì huy hoàng của smartphone đã đi qua?">
						<div class="img-overflow">  
						   <img src="http://demo61.websieuviet.com/file/pic/newsletter/2016/04/2b23b3fa32b137e871eb34d44be6239e_640.jpg" alt="">					
						</div>
						<p>Thời kì huy hoàng của smartphone đã đi qua?</p>
						<span>23/04/2016  </span>
					 </a>
				  </li>
			   </ul>
			</div>
		 </section>
	  </div>
	  <div>
		 <section class="box-category hidden-sm hidden-xs">
			<div class="heading">
			   <span>Quảng cáo</span>
			</div>
			<div>
				<?php $aBanner3 = Media::where('active', '=', 1)->where('category_id', '=', 2)->where('location', '=', 3)->first() ?>
	  <a href="{{$aBanner3['link_url']}}" title="{{$aBanner3['title']}}" target="_blank">
	  <img src="{{ Config::get('site.uploads_dir') .'images/' . $aBanner3['pic_url']}}" alt="{{$aBanner3['title']}}" class="banner-store"></a>
			   
			</div>
		 </section>
	  </div>
	  <div>
		 <section class="box-category">
			<div class="heading">
			   <span>Tags</span>
			</div>
			<div>
			   <ul class="tags-footer">
				  <li class="li_class"><a href="http://demo61.websieuviet.com/store/tag/iphone">Iphone</a></li>
				  <li class="li_class"><a href="http://demo61.websieuviet.com/store/tag/iphone-6">iphone 6</a></li>
				  <li class="li_class"><a href="http://demo61.websieuviet.com/store/tag/iphone-6-plus">Iphone 6 Plus</a></li>
			   </ul>
			</div>
		 </section>
	  </div>
   </div>