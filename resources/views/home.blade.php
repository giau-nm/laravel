@extends('layouts.master')
@section('page_title')
@section('extents_css')

@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            {!! Breadcrumb::render('home') !!}
        </section>
    </div>
@endsection

@section('extents_js')
@endsection
