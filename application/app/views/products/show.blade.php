@extends('layouts.master')

@section('content')
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
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <section id="product-listitem" class="clearfix">
                        <div class="listitem">
                           <h2>
                              <span>{{$cat_name}}</span>
                           </h2>
                           <div class="row">
						   @foreach ($aProducts as $aItem)													
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
