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
                <div class="container slider-information-wrapper">
                    <div class="row">
                        @include('partials.admin-side-menu')
                        <div class="col-md-9">
                            <h3>Слайдър</h3>


                            <div class="">
                                <h3>Активни изображения</h3>


                                <div class="col-md-12 slidesWrapper">
                                    @foreach($slides as $slide)
                                        <div class="currentSlideWrapper">
                                            <img class="slide" src="img/slider/{{$slide->slide}}"/>
                                            <a class="btn btn-danger btn-sm deleteSlide" href="{{route('remove-slide',['id'=>$slide->id])}}">премахни</a>
                                        </div>
                                    @endforeach

                                </div>
                                <h3>Налични файлове</h3>

                                <div id="images-files">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Качи снимка</h5>

                                            <form method="post" action="{{route('slider-image-upload')}}"
                                                  enctype="multipart/form-data">
                                                <input id="newImage" type="file" name="new-image"
                                                       class="btn btn-primary">
                                                {{csrf_field()}}
                                                <br>
                                                <ul id="files-list">
                                                    @foreach($files as $file)
                                                        <li data="{{$file}}">
                                                            <i class="fa fa-file-image-o fa-2x">&nbsp;</i><span>{{strlen($file) > 25 ? substr($file,0,25).'...': $file}}</span>
                                                            <a class="btn btn-xs btn-danger"
                                                               href="{{route('delete-slider-image',['name'=>$file])}}">изтрий</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <button href="" type="submit" id="upload-image" class="btn btn-primary">Качи снимка
                                                </button>
                                            </form>
                                        </div>

                                        <div class="col-md-6">
                                            <h5>Преглед на снимка</h5>
                                            <img id="slider-file-presenter" src="css/icons/image-presenter.png">
                                            <br>
                                            <br>
                                            <a type="submit" href="" id="load-to-slider" class="btn btn-primary">Зареди в слайдър</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function () {

            $('#load-to-slider').hide();
            $('#upload-image').hide();

            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#slider-file-presenter').attr('src', e.target.result);
                        $('#load-to-slider').hide();
                        $('#upload-image').show();

                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#files-list li').on('click', function () {
                let uri = 'img/slider/' + $(this).attr('data');
                $('#slider-file-presenter').attr('src', uri);
                $('#load-to-slider').show();

                let url = 'administrator/loadToSlider/';

                $('#load-to-slider').attr('href', url + $(this).attr('data'));
            });

            $("#newImage").change(function () {
                readURL(this);
            });
        })


    </script>
@endsection
@section('footer')
    @include('partials.footer')
@endsection