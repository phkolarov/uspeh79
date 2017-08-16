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
                            <br>
                            <h3>Промяна цена на курс</h3>
                            <form id="current-price-information-form" method="post" enctype="multipart/form-data"
                                  action="
{{route('save-current-price',['id'=> $priceInformation->id])}}
                                          ">
                                {{csrf_field()}}
                                <h3 style="text-align: left" > {{$priceInformation->name}}</h3>
                                <h5>Снимка на превозно средство</h5>
                                @if($priceInformation->icon_uri != '')
                                    <div id="sized-thubnail-wrapper">
                                        <img id="image-thumbnail"
                                             src="img/price-images/{{$priceInformation->icon_uri}}"
                                             style="max-width: 400px">
                                    </div>
                                    <br>
                                    <br>
                                    <input type="file" name="icon_uri" id="newImage" class="btn btn-primary">
                                    <br>
                                @else
                                    <div id="sized-thubnail-wrapper">
                                        <img id="image-thumbnail" src="" style="max-width: 400px">
                                    </div>
                                    <br>
                                    <br>
                                    <input type="file" name="icon_uri" id="newImage" class="btn btn-primary"
                                           required>
                                    <br>
                                @endif
                                <div class="form-group">
                                    <label>Цена на курс</label>
                                    <input name="new_price" class="form-control" type="text" value="{{$priceInformation->new_price}}" required>
                                </div>
                                <div class="form-group">

                                    <label>Промоционална цена</label>
                                    <select name="promotion" class="form-control"  required>
                                        @if($priceInformation->promotion)
                                            <option value="1" selected>ДА</option>
                                            <option value="0">НЕ</option>
                                        @else
                                            <option value="1">ДА</option>
                                            <option value="0" selected>НЕ</option>
                                        @endif
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Часове</label>
                                    <input name="hours" class="form-control" type="text" value="{{$priceInformation->hours}}">
                                </div>
                                <div class="form-group">
                                    <label>Име на превозно средство</label>
                                    <input name="vehicle" class="form-control" type="text" value="{{$priceInformation->vehicle}}">
                                </div>
                                <div class="form-group">
                                    <label>Изисквания</label>
                                    <textarea name="requirements" class="form-control">{{$priceInformation->requirements}}</textarea >
                                </div>
                                <div class="form-group">
                                    <label>Документи</label>
                                    <textarea name="documents" class="form-control">{{$priceInformation->documents}}</textarea>
                                </div>


                                {{--<input type="hidden" id="article-value" value="123" name="article-value">--}}
                                {{--@if($id == 'new')--}}
                                {{--<div id="title" class="form-group">--}}
                                {{--<label>Заглавие на новина</label>--}}
                                {{--<input class="form-control" type="text" name="title" required>--}}
                                {{--</div>--}}
                                {{--@endif--}}
                                {{--<div id="editor">--}}
                                {{--{!!$priceInformation->content!!}--}}
                                {{--</div>--}}
                                {{--<br>--}}
                                <button class="btn btn-primary" id="submit" type="submit">Запази</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="js/library/ckeditor/ckeditor.js"></script>
    <script>

        $(document).ready(function () {

            //
            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image-thumbnail').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#newImage").change(function () {
                readURL(this);
            });
        })

    </script>
@endsection
@section('footer')
    @include('partials.footer')
@endsection