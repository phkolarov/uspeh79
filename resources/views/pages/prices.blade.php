@extends('layouts.app')
@section('mainmenu')
    @include('partials.main-menu')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="category-sub-banner">
                <div class="container">
                    <h2>ЦЕНИ - {{$priceInformation->title}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="prices-container">
                <div class="container">

                    <div class="price-information reveal">
                        {!! $priceInformation->content !!}
                    </div>
                    <table class="table table-responsive">
                    {{--<div class="dropdown">--}}
                    {{--<button class="btn btn-default dropdown-toggle pull-right" type="button" data-toggle="dropdown"> <span class="glyphicon glyphicon-check"></span> &nbspMark/ UnMark All--}}
                    {{--<span class="caret"></span></button>--}}
                    {{--<ul class="dropdown-menu dropdown-menu-right" style="margin-top: 17px">--}}
                    {{--<li><a href="#">Mark All</a></li>--}}
                    {{--<li><a href="#">Unmark All</a></li>--}}
                    {{--</ul>--}}
                    {{--<a class="btn-top" style="margin-right: 15px;" href="#" class="btn btn-primary btn-success pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit All</a>--}}
                    {{--<a class="btn-top" style="margin-right: 15px;" href="#" class="btn btn-primary btn-success pull-right"> <span class="glyphicon glyphicon-plus"></span> &nbsp Create Table</a>--}}
                    {{--</div>--}}
                </div>
                <thead>
                <tr class="row-name">
                    <th>Превозно средство</th>
                    <th>Име на курс</th>
                    <th>Учебни часове</th>
                    {{--<th>Превозно средство</th>--}}
                    <th>Изисквания</th>
                    <th>Необходими документи</th>
                    <th>Цена</th>
                    <th>Информация</th>
                </tr>
                </thead>
                <tbody>
                @foreach($regularCourse as $course)
                    <tr class="row-content reveal">
                        {{--<span class="label label-default"> </span>--}}
                        <td>
                            <p ><b>{{$course->vehicle}}</b></p>
                            <img src="img/price-images/{{$course->icon_uri}}" width="230px" height="170px">
                        </td>
                        <td class="no-break"><br><b>{{$course->name}}</b></td>
                        <td><br>{{$course->hours}}</td>
                        {{--<td>{{$course->vehicle}}</td>--}}
                        <td><br>{{$course->requirements}} </td>
                        <td><br>{{$course->documents}}</td>
                        <td style="position: relative;" ><br><span class="price"  >{{$course->new_price}} </span><span class="currency-lv"><sub> @if(is_numeric($course->new_price))
                                        ЛВ.
                                    @endif
                                </sub></span>
								@if($course->promotion)
									
									<img src="http://avtoshkolabg.com/public/css/icons/promo.png" style="position: absolute;    width: 112px;    -ms-transform: rotate(7deg);    -webkit-transform: rotate(7deg);    transform: rotate(50deg);    offset-rotate: 10px;    top: -31px;    left: 148px;">
								@endif
								</td>
                        <td><br>
                            <a class="btn btn-info edit" href="category-{{strtolower($course->type)}}" aria-label="Settings">
                                Виж повече
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>

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