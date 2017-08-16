@extends('layouts.app')
@section('mainmenu')
    @include('partials.main-menu')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="category-sub-banner">
                <div class="container">
                    <h2>АДМИН ПАНЕЛ</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="container article-information-wrapper">
                    <div class="row">
                        @include('partials.admin-side-menu')
                        <div class="col-md-9">
                            <h3>Информация за курсове</h3>

                            <div class="row">
                                <div class="col-md-3">
                                    {{--<select id="article-filter" class="form-control">--}}
                                        {{--@if('all' != $filter)--}}
                                            {{--<option value="all">Избери категория</option>--}}
                                        {{--@else--}}
                                            {{--<option selected value="all">Избери категория</option>--}}
                                        {{--@endif--}}

                                        {{--@foreach($categories as $category)--}}

                                            {{--@if($category->name != $filter)--}}
                                                {{--<option value="{{$category->name}}">{{$category->name}}</option>--}}
                                            {{--@else--}}
                                                {{--<option selected--}}
                                                        {{--value="{{$category->name}}">{{$category->name}}</option>--}}

                                            {{--@endif--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                </div>

                                {{--@if( $filter == 'Новини')--}}
                                    {{--<div class="col-md-2 pull-right">--}}
                                        {{--<a class="btn btn-primary" href="{{route('change-current-article',['id'=> 'new'])}}">Нова новина</a>--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                            </div>
                            <br>
                            <table class="table list-of-articles">
                                <thead>
                                <tr>
                                    <th>Заглавие</th>
                                    <th>Съдържание</th>
                                    <th>Категория</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)

                                    <tr>
                                        <td>{{$article->title}}</td>
                                        <td>{{$article->content}}</td>
                                        <td>{{$article->type}}</td>
                                        <td><a href="{{route('change-course-information',['id'=> $article->id])}}"
                                               class="btn btn-primary">ПРОМЕНИ</a></td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
{{--                            {{$articles->links()}}--}}

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>

        $('#article-filter').on('change', function () {
            location.href = "http://localhost/uspeh79/public/administrator/change-article/" + $(this).val();
        });


    </script>
@endsection
@section('footer')
    @include('partials.footer')
@endsection