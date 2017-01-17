<div id="media_container">
<div class="white_container">

	<h2 style="margin-bottom:20px; float:left;"><i class="fa fa-picture-o"></i><span> Quản lý hình ảnh</span></h2>
	<div class="btn btn-color" style="margin-left:20px;" data-toggle="modal" data-target="#new-picture"><span class="fa fa-plus"></span> Đăng ảnh</div>
	<div class="col-sm-12" style="padding-left:0px; padding-right:0px;">

		<div class="table-responsive">
			<table class="table table-striped">
				<tr class="table-header">
					<th><a href="?sort=title&order=<?php if(isset($_GET['order']) && $_GET['order'] == 'ASC'){ echo 'DESC'; }else{ echo 'ASC'; } ?>">Tiêu đề <i class="fa fa-sort"></i></a></th>
					<th>Phân loại</th>
					<th>Vị trí</th>
					<th>Ảnh</th>
					<th style="min-width:100px;"><a href="?sort=active&order=<?php if(isset($_GET['order']) && $_GET['order'] == 'ASC'){ echo 'DESC'; }else{ echo 'ASC'; } ?>">Trạng thái <i class="fa fa-sort"></i></th>
					
					<th><a href="?sort=created_at&order=<?php if(isset($_GET['order']) && $_GET['order'] == 'ASC'){ echo 'DESC'; }else{ echo 'ASC'; } ?>">Ngày cập nhật <i class="fa fa-sort"></i></th>
					<th>Chức năng</th>
					@foreach($media as $item)
					<tr>
						<td><a href="{{ URL::to('media') . '/' . $item->slug }}" data-toggle="modal">
							<?php if(strlen($item->title) > 40){
									echo substr($item->title, 0, 40) . '...';
								  } else {
								  	echo $item->title;
								  }
							?>
							</a>
						</td>
						<td>
							@if($item->category_id == 1)
								Slideshow
							@else
								Banner
							@endif
						</td>
						<td>
							{{$item->location}}
						</td>
						<td><img src="{{ Config::get('site.uploads_dir') .'images/' . $item->pic_url }}" width="50px"></td>
						<td class="active-{{$item->id}}">{{ $item->active }}</th>
						<td>{{ date('M d, Y - h:ia', strtotime($item->created_at)) }}</td>
						<td style="min-width:152px;"><a href="#" data-toggle="modal" data-target="#edit-{{ $item->id }}" class="btn btn-xs btn-primary edit-media" style="margin-right:10px;"><span class="fa fa-edit"></span></a><a href="#_" data-href="{{ URL::to('media/delete') . '/' . $item->id }}" onclick="confirm_delete(this)" class="btn btn-xs btn-danger" style="margin-right:10px;"><span class="fa fa-trash-o"></span></a><a href="#_" data-id="{{ $item->id }}" data-href="{{ URL::to('admin/media/toggle_active') . '/' . $item->id }}" onclick="toggle_active(this)" class="btn btn-xs @if($item->active) btn-danger @else btn-success @endif active-toggle"><span class="fa fa-minus-circle"></span> <span class="text">@if($item->active) {{ Lang::get('lang.set_inactive') }} @else {{ Lang::get('lang.set_active') }} @endif</span></a></td>
						
					</tr>
					@endforeach
			</table>
		</div>

	</div>

	{{ $media->appends(array('sort' => Input::get('sort'), 'order' => Input::get('order')))->links() }}

</div>
</div>

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
	//$('.edit-media').confirmation();
</script>

<?php $categories = Category::orderBy('order', 'ASC')->get(); ?>
<?php $settings = Setting::first(); ?>

<div class="modal fade" id="new-picture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Đăng ảnh</h4>
			</div>
		    <form method="POST" action="{{ URL::to('media') }}" accept-charset="UTF-8" enctype="multipart/form-data">
			<input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
		    <div class="modal-body">
				<p>
				<select name="category_id" id="category_id" class="form-control">
					<option value="">Chọn kiểu</option>
					<option value="1">Slideshow</option>
					<option value="2">Banner</option>
				</select>
				</p>
				<p>
					<select name="location" id="location" class="form-control">
						<option value="">Chọn vị trí</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select>
				</p>
				<p><input name="title" type="text" class="form-control" id="title" placeholder="Tiêu đề"></p>
				<p>Chọn ảnh: </p>
				<p style="margin-left:65px; margin-bottom:6px;"><input type="file" multiple="true" id="pic_url" name="pic_url"/></p>
				<p><input name="link_url" type="text" class="form-control" id="link_url" placeholder="Liên kết"></p>				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
				<input type="submit" class="btn btn-color" value="Cập nhật" />
			</div>
				</form>

	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div>
	
<div class="modal-container">
	@foreach($media as $item)
	<!-- Modal -->
	<div class="modal fade edit-media-modal" id="edit-{{ $item->id }}" data-id="{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" style="min-height:700px;">
	    <div class="modal-content">
	      
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Cập nhật {{ $item->title }}</h4>
	      </div>

	      {{ Form::model($media, array('method' => 'PATCH', 'route' => array('media.update', $item->id), 'enctype'=> "multipart/form-data")) }}
		  <!-- <form method="POST" action="{{ URL::to('media') . '/' . $item->id }}" accept-charset="UTF-8"> -->
	      <div class="modal-body">
	      	
			<ul>
				<li>
		        	<label for="title">Kiểu banner</label>
					<select name="category_id" id="category_id" class="form-control">
						<option value="">Chọn kiểu</option>
						<option value="1" @if($item->category_id == 1) selected @endif>Slideshow</option>
						<option value="2" @if($item->category_id == 2) selected @endif>Banner</option>
					</select>
		        </li>
				<li>
		        	<label for="title">Vị trí</label>
					<select name="location" id="location" class="form-control">
						<option value="">Chọn vị trí</option>
						<option value="1" @if($item->location == 1) selected @endif>1</option>
						<option value="2" @if($item->location == 2) selected @endif>2</option>
						<option value="3" @if($item->location == 3) selected @endif>3</option>
						<option value="4" @if($item->location == 4) selected @endif>4</option>
						<option value="5" @if($item->location == 5) selected @endif>5</option>
						<option value="6" @if($item->location == 6) selected @endif>6</option>
					</select>
		        </li>
		        <li>
		            <label for="title">Tiêu đề</label>
		            <input type="text" class="form-control" name="title" id="title" value="{{ $item->title }}" />
		        </li>

		        
				<li>
					<label for="name">Chọn ảnh</label>
					<input type="file" multiple="true" id="pic_url" name="pic_url"/>
					<img src="{{ Config::get('site.uploads_dir') .'images/' . $item->pic_url }}" width="50px">
				</li>
				<li>
		            <label for="title">Liên kết</label>
		            <input type="text" class="form-control" name="link_url" id="link_url" value="{{ $item->link_url }}" />
		        </li>
			</ul>
			<input type="hidden" id="id" name="id" value="{{ $item->id }}" />
			<input type="hidden" id="redirect" name="redirect" value="{{ URL::to('admin') }}" />
	      </div>
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
	        <input type="submit" class="btn btn-color" value="Cập nhật" />
	      </div>
	      {{ Form::close() }}

	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->



	@endforeach
</div>

	<script type="text/javascript" src="{{ URL::to('/') }}/application/assets/js/tagsinput/jquery.tagsinput.js"></script>
	<script>

		$(document).ready(function(){

			$('.tags_input').tagsInput();
			$('.edit-media').click(function(){
				$(window).scrollTop(0);
			});
		});
	</script>