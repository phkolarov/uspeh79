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
                            <h3>Промяна на статия</h3>
                            <br>
                            <form id="current-article-form" method="post" enctype="multipart/form-data"
                                  action="{{route('save-current-article',['id'=> $articleId])}}">

                                @if($imageUpload)
                                    <h5>Снимка на новина* (задължително поле)</h5>

                                    @if($article->article_image != '')
                                        <div id="sized-thubnail-wrapper">
                                            <img id="image-thumbnail" src="img/articles/{{$article->article_image}}"
                                                 style="max-width: 400px">
                                        </div>
                                        <br>
                                        <br>
                                        <input type="file" name="image_thumbnail" id="newImage" class="btn btn-primary">
                                        <br>
                                    @else

                                        <div id="sized-thubnail-wrapper">
                                            <img id="image-thumbnail" src="" style="max-width: 400px">
                                        </div>

                                        <br>
                                        <br>
                                        <input type="file" name="image_thumbnail" id="newImage" class="btn btn-primary" required>
                                        <br>
                                    @endif


                                @endif
                                <input type="hidden" id="article-value" value="123" name="article-value">
                                {{csrf_field()}}
                                @if($id == 'new')
                                        <div id="title" class="form-group">
                                            <label>Заглавие на новина</label>
                                            <input class="form-control" type="text" name="title" required>
                                        </div>
                                    @endif
                                <div id="editor">
                                    {!!$article->content!!}
                                </div>

                                <br>
                                <button class="btn btn-primary" id="submit" type="submit">Запази</button>
                            </form>
                            @if($news)
                            <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#deleteNews">Изтрий новина</button>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteNews" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Изтриване на новина</h4>
                </div>
                <div class="modal-body">
                    <p>Сигурен ли сте че искате да изтриете тази новина?</p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{route('delete-article',['id'=> $article->id])}}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" >Да</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Не</button>
                    </form>
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

            let editor = CKEDITOR.replace('editor');

	    editor.config.baseHref = "http://avtoshkolabg.com/public/";            
            editor.config.height = 500;
            editor.config.extraPlugins = 'imagebrowser'
            editor.config.imageBrowser_listUrl = 'images.json';

            $('#current-article-form').submit(function (event) {


                for (instance in CKEDITOR.instances) {

                    console.log();

                    $('#article-value').val(CKEDITOR.instances[instance].getData())
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