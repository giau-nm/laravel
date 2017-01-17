<div class="white_container">
		
		<h2 style="margin-bottom:20px; float:left;"><i class="fa fa-list"></i><span> Quản lý sản phẩm</span></h2>
		<div class="btn btn-color" style="margin-left:20px;" data-toggle="modal" data-target="#new-product"><span class="fa fa-plus"></span> Đăng sản phẩm</div>
		<div style="clear:both"></div>
		<div class="table-responsive">
			<table class="table table-condensed">
				<tr>
					<th>Tên sản phẩm</th>
					<th>Danh mục</th>
					<th>Ảnh</th>
					<th>Giá</th>
					<th>Thứ tự</th>
					<th>Quản lý</th>
					@foreach($products as $product)

							<tr>
								<td>
									{{ $product->name }}
								</td>
								<td>
								@if($product->category)<a href="{{ URL::to('category') . '/' . strtolower($product->category->name) }}">{{ $product->category->name }}</a>@endif
								</td>
								<td>
									<img src="{{ Config::get('site.uploads_dir') .'images/' . $product->image }}" width="50px">
								</td>
								<td>
									{{ $product->price }}
								</td>
								<td>
									{{ $product->ordering }}
								</td>
								<td style="width:190px;">
									<a href="#" data-toggle="modal" data-target="#edit-{{ $product->id }}" class="btn btn-xs btn-primary edit-product" style="margin-right:10px;"><span class="fa fa-edit"></span> Sửa</a>
									<a href="{{ URL::to('product/delete') . '/' . $product->id }}" class="btn btn-xs btn-danger"><span class="fa fa-trash-o"></span> Xoá</a>
								</td>
								
							</tr>
							
					@endforeach
			</table>
		</div>
		
	</div>
	{{ $products->appends(array('sort' => Input::get('sort'), 'order' => Input::get('order')))->links() }}
	
	<script>
$(document).ready(function(){
	$('.active-toggle').click(function(){
		if($(this).hasClass('btn-danger')){
			$(this).removeClass('btn-danger').addClass('btn-success');
			$(this).children('span.fa').removeClass('fa-minus-circle').addClass('fa-plus-circle');
			$(this).children('span.text').text("{{ Lang::get('lang.set_active') }}");
			active_class = '.active-' + $(this).data('id');
			$(active_class).text(0);
		} else {
			$(this).removeClass('btn-success').addClass('btn-danger');
			$(this).children('span.fa').removeClass('fa-plus-circle').addClass('fa-minus-circle');
			$(this).children('span.text').text("{{ Lang::get('lang.set_inactive') }}");
			active_class = '.active-' + $(this).data('id');
			$(active_class).text(1);
		}

	});

	$('.pagination a').click(function(e) {
		e.preventDefault();
	  	var url = $(this).attr('href');
	 	$('div#admin_section').load(url, function(data){
	 		console.log('hit');
	 	}); // load the html response into a DOM element
	});
});

function confirm_delete(obj){
	var delete_link = $(obj).data('href');
	var result = confirm("{{ Lang::get('lang.delete_item_confirm') }}");
	if(result){
		location.href=delete_link;
	}
}

function toggle_active(obj){
	url = $(obj).data('href');
	$.get(url);
}
</script>


	<div class="modal fade" id="new-product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Đăng sản phẩm</h4>
			</div>
		    <form method="POST" action="{{ URL::to('products') }}" accept-charset="UTF-8" enctype="multipart/form-data">
		    <div class="modal-body">
				<p>
				<select name="category_id" id="category_id" class="form-control">
				<option value="1">Chọn danh mục</option>
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
				</p>
				<p><input name="name" type="text" class="form-control" id="name" placeholder="Tên sản phẩm"></p>
				<p>Chọn ảnh: </p>
				<p style="margin-left:65px; margin-bottom:6px;"><input type="file" multiple="true" id="image" name="image"/></p>
				<p><input name="price" type="text" class="form-control" id="price" placeholder="Giá"></p>
				<p><input name="ordering" type="text" class="form-control" id="ordering" placeholder="Thứ tự"></p>
				<p>
					<label for="featured">Nổi bật:</label>
					<div class="onoffswitch">
						{{ Form::checkbox('featured', '', '', array('class' => 'onoffswitch-checkbox', 'id' => 'featured')) }}
						<label class="onoffswitch-label" for="featured">
							<div class="onoffswitch-inner"></div>
							<div class="onoffswitch-switch"></div>
						</label>
					</div>

				</p>
				<p>
					<label for="hot">Hot:</label>
					<div class="onoffswitch">
						{{ Form::checkbox('hot', '', '', array('class' => 'onoffswitch-checkbox', 'id'=> 'hot')) }}
						<label class="onoffswitch-label" for="hot">
							<div class="onoffswitch-inner"></div>
							<div class="onoffswitch-switch"></div>
						</label>
					</div>
				</p>
				<p>
					<label for="content_short">Mô tả ngắn</label>
					<textarea class="textarea" placeholder="Mô tả ngắn" name="content_short" id="content_short"></textarea>
				</p>
				<p>
					<textarea class="textarea" placeholder="Nội dung" name="description" id="description"></textarea>
				</p>
		      	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
				<input type="submit" class="btn btn-color" value="Cập nhật" />
			</div>
				</form>

	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	@foreach($products as $product)
	<!-- Modal -->
	<div class="modal fade" id="edit-{{ $product->id }}" data-id="{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">{{ Lang::get('lang.editing') }} {{ $product->name }}</h4>
			</div>
			<form method="POST" action="{{ URL::to('products/update') . '/' . $product->id }}" accept-charset="UTF-8" enctype="multipart/form-data">
		    <div class="modal-body">
		      
		      	
					<ul>
				        <li>
				        	<label for="name">Chọn danh mục</label>
							<select name="category_id" id="category_id" class="form-control">
							<option value="1">Chọn danh mục</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}" 
									@if($product->category_id == $category->id) 
										selected
									@endif
									>{{ $category->name }}</option>
								@endforeach
							</select>
				        </li>
						<li>
				        	<label for="name">Tên sản phẩm</label>
		           			<input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" />
				        </li>
						<li>
				        	<label for="name">Chọn ảnh</label>
							<input type="file" multiple="true" id="image" name="image"/>
							<img src="{{ Config::get('site.uploads_dir') .'images/' . $product->image }}" width="50px".>
				        </li>

				        <li>
				        	<label for="ordering">Giá</label>
		           			<input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}" />
				        </li>
						<li>
				        	<label for="ordering">Thứ tự</label>
		           			<input type="number" class="form-control" name="ordering" id="ordering" value="{{ $product->ordering }}" />
				        </li>
						<li>
							<label for="featured{{$product->id}}">Nổi bật:</label>
							<div class="onoffswitch">
							@if(isset($product->featured))<?php $featured = $product->featured ?>@else<?php $featured = 1 ?>@endif
							<?php $isField = 'featured'. $product->id; ?>
								{{ Form::checkbox($isField, '', $featured, array('class' => 'onoffswitch-checkbox', 'id' => $isField)) }}
								<label class="onoffswitch-label" for="{{$isField}}">
									<div class="onoffswitch-inner"></div>
									<div class="onoffswitch-switch"></div>
								</label>
							</div>

						</li>
						<li>
							<label for="hot{{$product->id}}">Hot:</label>
							<div class="onoffswitch">
							@if(isset($product->hot))<?php $hot = $product->hot ?>@else<?php $hot = 1 ?>@endif
							<?php $isField = 'hot'. $product->id; ?>
								{{ Form::checkbox($isField, '', $hot, array('class' => 'onoffswitch-checkbox', 'id' => $isField)) }}
								<label class="onoffswitch-label" for="{{$isField}}">
									<div class="onoffswitch-inner"></div>
									<div class="onoffswitch-switch"></div>
								</label>
							</div>

						</li>
						<li>
				        	<label for="content_short">Mô tả ngắn</label>
							<textarea class="textarea" placeholder="Mô tả ngắn" name="content_short" id="content_short{{$product->id}}">{{ $product->content_short }}</textarea>
				        </li>
						<li>
				        	<label for="description">Nội dung</label>
							<textarea class="textarea" placeholder="Nội dung" name="description" id="description{{$product->id}}">{{ $product->description }}</textarea>
				        </li>
					</ul>
			</div><!-- .modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
				<input type="submit" class="btn btn-color" value="Cập nhật" />
			</div>
			</form>

	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->



	@endforeach

<script type="text/javascript" src="{{ URL::to('/') }}/application/assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">

	//attach_tiny_mce($('textarea'));

	$(document).ready(function(){
		$('.edit-product').click(function(){
			var target = $(this).data('target');
			console.log(target);
			tinymce.init({
				relative_urls: false,
			    selector: 'textarea'+target,
			    toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media | forecolor backcolor ",
			    plugins: [
			         "advlist autolink link image code lists charmap print preview hr anchor pagebreak spellchecker code fullscreen",
			         "save table contextmenu directionality emoticons template paste textcolor code"
			   ],
			   menubar:false,
			 });
		});

		$(document).on('focusin', function(e) {
		    if ($(event.target).closest(".mce-window").length) {
		        e.stopImmediatePropagation();
		    }
		});
	});
	



	tinymce.init({
	    selector: 'textarea',
	    relative_urls: false,
	    toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media | forecolor backcolor ",
	    plugins: [
	         "advlist autolink link image code lists charmap print preview hr anchor pagebreak spellchecker code fullscreen",
	         "save table contextmenu directionality emoticons template paste textcolor code"
	   ],
	   menubar:false,
	 });


</script>

