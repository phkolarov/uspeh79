@extends('layouts.app')
@section('mainmenu')
    @include('partials.main-menu')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="category-sub-banner">
                <div class="container">
                    <h2>Галерия</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="gallery-container">
                <div class="container">

                    <div id="filters" class="button-group reveal">
                        <button class="button btn btn-default is-checked" data-filter="*">Всички</button>
                        @foreach($categories as $category)
                            @if($category->type != 'sys')
                                <button class="button btn btn-default" data-filter=".{{$category->type}}">{{$category->name}}</button>
                            @endif
                        @endforeach
                        {{--<button class="button" data-filter=".transition">transition</button>--}}
                        {{--<button class="button" data-filter=".alkali, .alkaline-earth">alkali and alkaline-earth</button>--}}
                        {{--<button class="button" data-filter=":not(.transition)">not transition</button>--}}
                        {{--<button class="button" data-filter=".metal:not(.transition)">metal but not transition</button>--}}
                        {{--<button class="button" data-filter="numberGreaterThan50">number > 50</button>--}}
                        {{--<button class="button" data-filter="ium">name ends with &ndash;ium</button>--}}
                    </div>

                    <ul class="grid parent-container">
                        @foreach($images as $image)
                            <li class="grid-item {{$image->getCategory()->first()->type}}" data-category="{{$image->getCategory()->first()->name}}">
                                <div class="shower-wrapper reveal ">
                                    <img class="image " src="img/gallery/{{$image->uri}}" >
                                    <a class="shower test-popup-link" href="img/gallery/{{$image->uri}}">
                                        <img src="css/icons/small-camera.png" class="small-camera">
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('partials.footer')
@endsection
@section('javascript')
    <script>
        $(document).ready(function () {

            var $grid = $('.grid').isotope({
                // options
                itemSelector: '.grid-item',
                layoutMode: 'fitRows',
                getSortData: {
                    name: '.name',
                    symbol: '.symbol',
                    number: '.number parseInt',
                    category: '[data-category]',
                }
            });

            var filterFns = {
//                // show if number is greater than 50
//                numberGreaterThan50: function () {
//                    var number = $(this).find('.number').text();
//                    return parseInt(number, 10) > 50;
//                },
                // show if name ends with -ium
//                ium: function () {
//                    var name = $(this).find('.name').text();
//                    return name.match(/ium$/);
//                }
            };

            $('#filters').on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                // use filterFn if matches value
                filterValue = filterFns[filterValue] || filterValue;
                $grid.isotope({filter: filterValue});
            });


            $('.parent-container').magnificPopup({
                delegate: 'li div a', // child items selector, by clicking on it popup will open
                type: 'image',
                // other options,
                gallery:{
                    enabled:false
                }
            });

        });
    </script>
@endsection