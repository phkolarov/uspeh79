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
                            <h3>Промяна на цени</h3>
                            <table class="table list-of-course-prices">
                                <thead>
                                <tr>
                                    <th>Категория</th>
                                    <th>Снимка</th>
                                    <th>Цена</th>
                                    <th>Промоция</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($prices as $price)

                                    <tr>
                                        <td>{{$price->name}}</td>
                                        <td><img src="img/price-images/{{$price->icon_uri}}"></td>
                                        <td><span>{{$price->new_price}} лв.</span></td>
                                        <td>
                                            @if($price->promotion)
                                                <span ><b style="color: red">Промоция</b></span>

                                            @else
                                                <span><b>Без промоция</b></span>
                                            @endif
                                        </td>

                                        <td><a href="{{route('change-current-price',['id'=> $price->id])}}" class="btn btn-primary">Промяна</a></td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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