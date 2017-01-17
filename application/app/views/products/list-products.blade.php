<div class="product">
	  <div class="image">
		 <div class="img-overflow">
			<a href="{{ URL::to('products') . '/' . strtolower($aItem->alias) }}" title="{{ $aItem->name }}">
			<img src="{{ Config::get('site.uploads_dir') .'images/' . $aItem->image }}" alt="{{ $aItem->name }}">			</a>
			<div class="ImageOverlayBe"></div>
			<div class="CStyle">{{ $aItem->content_short }}
			</div>
		 </div>
	  </div>
	  <div class="des-product">
		 <a href="{{ URL::to('products') . '/' . strtolower($aItem->alias) }}" title="{{ $aItem->name }}">
			<h3 class="trans-hover">{{ $aItem->name }}</h3>
		 </a>
		 <div class="price">
			<span class="price-value price-new">
			@if($aItem->price >0)
				{{number_format($aItem->price,0,".",",")}} d
			@else
				Liên hệ
			@endif
			</span>
		 </div>
	  </div>
   </div>