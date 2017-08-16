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
                            <h3>Промяна на курсове</h3>
                            <br>
                            <form id="current-course-form" method="post" enctype="multipart/form-data"
                                  action="{{route('save-course-information',['id'=> $courseInformation->id])}}">


                                <input type="hidden" id="course-info-value" value="123" name="course-info-value">
                                {{csrf_field()}}

                                <div id="editor">
                                    {!!$courseInformation->content!!}
                                </div>

                                <br>
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
        if (CKEDITOR.env.ie && CKEDITOR.env.version < 9)
            CKEDITOR.tools.enableHtml5Elements(document);

        // The trick to keep the editor in the sample quite small
        // unless user specified own height.
        CKEDITOR.config.height = 150;
        CKEDITOR.config.width = 'auto';


        $(document).ready(function () {

            let editor = CKEDITOR.replace('editor');			editor.config.baseHref = "http://avtoshkolabg.com/public/";
            editor.config.height = 500;
            editor.config.extraPlugins = 'imagebrowser'
            editor.config.imageBrowser_listUrl = 'images.json';


            $('#current-course-form').submit(function (event) {
                for (instance in CKEDITOR.instances) {
                    $('#course-info-value').val(CKEDITOR.instances[instance].getData())
                    CKEDITOR.instances[instance].updateElement();
                }
                return true;
            });


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