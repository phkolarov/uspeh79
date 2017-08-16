@extends('layouts.app')
@section('mainmenu')
    @include('partials.main-menu')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="category-sub-banner">
                <div class="container ">
                    <h2>{{$category->title}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="container category-information-wrapper">
                   <div class="col-md-12 reveal">
                           {!! $category->content !!}
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection