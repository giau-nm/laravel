@extends('layouts.master')

@section('content')
<script type="text/javascript" src="{{ URL::to('/') }}/application/assets/js/jquery.elevatezoom.js"></script>
	<div class="main-wrap">
   <section class="row_section">
      <div class="container">
         <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <section class="clearfix">
                        <section class="breadcrumbs clearfix">
                           <a href="http://demo61.websieuviet.com" title="Trang chủ">Trang chủ</a>
                           &nbsp;&nbsp;/&nbsp;&nbsp;<a href="http://demo61.websieuviet.com/store/dien-tu-c18785p">Điện tử</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="http://demo61.websieuviet.com/store/tivi-c18786p">Tivi</a>								
                        </section>
                     </section>
                  </div>
               </div>
               <div class="row">
                  <article class="detail">
                     <div class="img-blog col-lg-4 col-md-5 col-sm-5 col-xs-12" id="gallery_01">
                        <div style="height:236px;width:236px;" class="zoomWrapper"><img id="zoom_01" class="zoom-show" src="{{ Config::get('site.uploads_dir') .'images/' . $product->image }}" data-zoom-image="{{ Config::get('site.uploads_dir') .'images/' . $product->image }}" width="240" height="240" style="position: absolute;"></div>
                        <div id="gal1">
                           <a href="#" class="elevatezoom-gallery" data-update="" data-image="{{ Config::get('site.uploads_dir') .'images/' . $product->image }}" data-zoom-image="{{ Config::get('site.uploads_dir') .'images/' . $product->image }}">
                           <img src="{{ Config::get('site.uploads_dir') .'images/' . $product->image }}" width="100" id="zoom_01" class="zoom-mini-show"></a>
                        </div>
                        <script>
                           //initiate the plugin and pass the id of the div containing gallery images
                           $("#zoom_01").elevateZoom({ gallery: 'gal1', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: '' });
                           //pass the images to Fancybox
                           $("#zoom_01").bind("click", function (e) { var ez = $('#zoom_01').data('elevateZoom'); $.fancybox(ez.getGalleryList()); return false; });
                            
                        </script>
                     </div>
                     <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                        <h2>{{$product->name}} </h2>
						<div class="price">
							<span class="price-value price-new">
								@if($product->price >0)
									{{number_format($product->price,0,".",",")}} đ
								@else
									Liên hệ
								@endif
							</span>
						</div>
                        <div class="des ">{{$product->content_short}}</div>
                     </div>
                  </article>
               </div>
           
               <section id="product-tab">
                  <ul class="tabs">
                     <li class="selected"><a class="item_tabs" tab_id="1">Giới thiệu</a></li>
                  </ul>
                  <ul id="tb_1" class="tab" style="display: block;">
                     {{$product->description}}
                  </ul>
               </section>
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <section id="product-listitem" class="clearfix">
                        <div class="listitem">
                           <h2>
                              <span>Sản phẩm cùng chuyên mục</span>
                           </h2>
                           <div class="row">
						   @foreach ($aProductsRelates as $aItem)													
                              <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col94 mg">
								@include('products.list-products',['aItem' => $aItem])
                              </div>
							  @endforeach
							</div>
                        </div>
                     </section>
                  </div>
               </div>
            </div>
			@include('layouts.sidebar')
		</div>
      </div>
   </section>
</div>

@stop
