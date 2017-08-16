@extends('layouts.app')
@section('mainmenu')
    @include('partials.main-menu')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="category-sub-banner">
                <div class="container">
                    <h2>Новини</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="container news-information-wrapper">
                    <div class="col-md-12 reveal">
                        @foreach($news as $article)

                            <div class="row">
                                <a class="col-md-12 news-list" href="{{route('current-article',['id'=> $article->id,'title'=>$article->title])}}">
                                    <h3>
                                        {{$article->title}}
                                    </h3>
                                    <img class="artile_thumbnail" src="img/articles/{{$article->article_image}}">

                                    <p>
                                     {!!mb_substr ( strip_tags($article->content),0,350) !!}

                                    </p>
                                    <p class="news-date">
                                        публикувана на: {{$article->creation_date->format("Y-m-d")}}
                                    </p>
                                </a>
                            </div>

                            @endforeach


                    </div>

                    {{ $news->links() }}
                </div>
                <div class="col-md-12">
                    <br>
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
@section('javascript')


@endsection