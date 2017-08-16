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
                <div class="container gallery-information-wrapper">
                    <div class="row">
                        @include('partials.admin-side-menu')
                        <div class="col-md-9">
                            <br>
                            <h3>Галерия</h3>
                            <br>
                            <div class="row">

                                <div class="col-md-6">
                                    <h4>Категория</h4>
                                    <select class="form-control" id="gallery-categories">
                                        <option value="all">Всички</option>
                                        @foreach($categories as $category)
                                            @if($filter == $category->name)

                                                <option selected
                                                        value="{{$category->name}}">{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->name}}">{{$category->name}}</option>
                                            @endif


                                        @endforeach
                                    </select>
                                    <br>
                                    <div class="gallery-outer-wrapper">
                                        <table class="table" id="gallery-files-list">
                                            @foreach($images as $image)
                                                <tr image-id="{{$image->id}}" data="{{$image->uri}}">
                                                    <td>
                                                        <i class="fa fa-file-image-o fa-2x">&nbsp;</i><span>{{strlen($image->uri) > 25 ? substr($image->uri,0,25).'...': $image->uri}}</span>
                                                        <a class="btn btn-xs btn-danger"
                                                           href="{{route('delete-gallery-image',['id'=>$image->id])}}">изтрий</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <h4>Избор на снимка</h4>

                                    <form method="post" action="{{route('upload-gallery-image')}}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="file" id="newImage" name="new-image" class="btn btn-primary form-control" required>

                                        <br>
                                        <input type="hidden" name="category-name" id="categoryName" value="{{$filter}}">
                                        <img id="gallery-file-presenter" src="css/icons/image-presenter.png">
                                        <br>
                                        <br>
                                        <button type="submit"  id="upload-to-gallery" class="btn btn-primary">Изпрати
                                            в галерия</button>
                                    </form>
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

            $('#upload-to-gallery').hide();
            $('#categoryName').val();


            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#gallery-file-presenter').attr('src', e.target.result);

                        if ($('#categoryName').val() != 'all') {
                            $('#upload-to-gallery').show();
                        }
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#gallery-files-list tr').on('click', function () {
                let uri = 'img/gallery/' + $(this).attr('data');
                $('#gallery-file-presenter').attr('src', uri);
                $('#newImage').val('');
                $('#upload-to-gallery').hide();

            });


            $('#gallery-files-list tr').on('click', function () {
                $('#gallery-files-list tr').removeClass('selected-row');
                $(this).addClass('selected-row')

            });

            $('#gallery-categories').on('change', function () {
            
            	console.log('administrator/gallery/' + $(this).val());
                location.href = window.location.origin+'/public/administrator/gallery/' + $(this).val();
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