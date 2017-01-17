@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ URL::to('/') }}/application/assets/js/tagsinput/jquery.tagsinput.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/application/assets/js/jquery-minicolors/jquery.minicolors.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/application/assets/css/admin.css" />
@stop

@section('outer-content')

	<h2 class="subheader">
		<div class="container">
			<i class="fa fa-coffee"></i> {{ Lang::get('lang.admin_functionality') }}</h2>
		</div>
	</h2>

@stop

@section('content')


<div class="container admin">

	<div class="col-md-3 col-lg-3 admin-left">
		
		<div class="row">
			<div class="col-md-12">
				<a class="admin-block rounded-top-left rounded-top-right @if(!Input::get('section') || Input::get('section') == 'media') active @endif" data-section="media" href="{{ URL::to('admin/media') }}">
					<i class="fa fa-picture-o"></i><span>Hình ảnh</span>
				</a>
			</div>
			<div class="col-md-12">
				<a class="admin-block @if(Input::get('section') == 'users') active @endif" data-section="users" href="{{ URL::to('admin/users') }}">
					<i class="fa fa-user"></i><span>Người dùng ({{ count(User::all()) }})</span>
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<a class="admin-block @if(Input::get('section') == 'categories') active @endif" data-section="categories" href="{{ URL::to('admin/categories') }}">
					<i class="fa fa-list"></i><span>Danh mục ({{ count(Category::all()) }})</span>
				</a>
			</div>
			<div class="col-md-12">
				<a class="admin-block @if(Input::get('section') == 'products') active @endif" data-section="products" href="{{ URL::to('admin/products') }}">
					<i class="fa fa-list"></i><span>Sản phẩm ({{ count(Product::all()) }})</span>
				</a>
			</div>

			<div class="col-md-12">
				<a class="admin-block @if(Input::get('section') == 'pages') active @endif" data-section="pages" href="{{ URL::to('admin/pages') }}">
					<i class="fa fa-file"></i><span>Quản lý trang</span>
				</a>
			</div>

			<div class="col-md-12">
				<a class="admin-block @if(Input::get('section') == 'settings') active @endif" data-section="settings" href="{{ URL::to('admin/settings') }}">
					<i class="fa fa-cog"></i><span>Cấu hình chung</span>
				</a>
			</div>
		</div>
		
	</div>

	<div id="admin_section" class="col-md-9">

	</div>

	@if(Input::get('sort') != '' && Input::get('order') != '')
		<input type="hidden" id="sort_order" value="{{ '?sort=' . Input::get('sort') . '&order=' . Input::get('order') }}" />
	@else
		<input type="hidden" id="sort_order" value="" />
	@endif

</div>

@stop

@section('javascript')

	<script type="text/javascript">

		$('document').ready(function(){
			$('a.admin-block').bind('click', function(e) {
				$('a.admin-block.active').removeClass('active');
				$(this).addClass('active');
				//window.location.href = '/?section=comments';
			  var url = $(this).attr('href');
			  $('div#admin_section').load(url + $('#sort_order').val()); // load the html response into a DOM element
			  e.preventDefault(); // stop the browser from following the link
			});

			$('a.admin-block.active').trigger('click');
		});

	</script>

@stop

