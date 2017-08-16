@extends('layouts.app')
@section('mainmenu')
    @include('partials.main-menu')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="category-sub-banner">
                <div class="container">
                    <h2>{{$article->title}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="container article-information-wrapper">
                    <div class="col-md-12 reveal">

                        <img src="img/articles/{{$article->article_image}}">

                        <div id="article-content">
                            {!! $article->content !!}
                            <br><br>
                            <p> <b>дата на публикуване: {{$article->creation_date}}</b></p>
                            <hr>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection