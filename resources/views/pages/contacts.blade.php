@extends('layouts.app')
@section('mainmenu')
    @include('partials.main-menu')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="category-sub-banner">
                <div class="container">
                    <h2>{{$contacts->title}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="container about-us-information-wrapper">
                    <div class="col-md-12 reveal">
                        {{--{!! $contacts->content !!}--}}
                        <br>
                        <p><strong>Моля, попълнете полетата със звездичка!</strong></p>
                        <div class="row">
                            <div class="col-lg-8 col-xs-12">

                                <form class="form" id="sendMailForm" action="{{route('send-mail')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="label label-black">Име и фамилия*</label>
                                        <input id="name" class="form-control" type="text" placeholder="Въведете име"
                                               name="fullname" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label label-black">Телефон за връзка*</label>
                                        <input id="phone" class="form-control" type="text"
                                               placeholder="Въведете телефон"
                                               name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label label-black">E-mail*</label>
                                        <input id="email" class="form-control" type="text" placeholder="Въведете e-mail"
                                               name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label label-black">Запитване*</label>
                                        <textarea id="question" class="form-control" required
                                                  style="max-width: 730px; min-height: 75px" name="question"></textarea>
                                    </div>
                                    <div class="g-recaptcha"
                                         data-sitekey="6LfxdhAUAAAAAG2_RfgqVLZtKz-umzVmF9-OS0D1"></div>
                                    <br>
                                    <input type="submit" id="sendEmail" value="Изпрати" class="btn btn-primary">
                                </form>
                            </div>
                            <div class="col-lg-4 col-xs-12" id="ask_address">

                                <p class="tel backgr_stripped">
                                     <a href="tel:+359{{\App\Http\Controllers\InformationController::getBaseInfo()->phone1}} ">&nbsp;   <i
                                                class="fa fa-phone"></i> {{\App\Http\Controllers\InformationController::getBaseInfo()->phone1}}
                                    </a>
                                    <br>
                                    <a href="tel:+359{{\App\Http\Controllers\InformationController::getBaseInfo()->phone2}} "><i
                                                class="fa fa-phone"></i> {{\App\Http\Controllers\InformationController::getBaseInfo()->phone2}}
                                    </a>
                                </p>
                                <p class="tel email backgr_stripped"><a href="mailto:imigix@imigix.com"><i
                                                class="fa fa-envelope"></i> {{\App\Http\Controllers\InformationController::getBaseInfo()->email}}
                                    </a></p>
                                <p class="tel address backgr_stripped">
                                    <a>{{\App\Http\Controllers\InformationController::getBaseInfo()->address}}</a></p>
                            </div>
                        </div>

                    </div>
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
    <script>
        function initMap() {
            var location = new google.maps.LatLng(42.644312, 23.336709);

            var map = new google.maps.Map(document.getElementById('map'), {
                center: location,
                zoom: 18,
                scrollwheel: false,
            });

            var coordInfoWindow = new google.maps.InfoWindow();
            coordInfoWindow.setContent(createInfoWindowContent(location, map.getZoom()));
            coordInfoWindow.setPosition(location);
            coordInfoWindow.open(map);

            map.addListener('zoom_changed', function () {
                coordInfoWindow.setContent(createInfoWindowContent(location, map.getZoom()));
                coordInfoWindow.open(map);
            });
        }

        var TILE_SIZE = 256;

        function createInfoWindowContent(latLng, zoom) {
            var scale = 1 << zoom;

            var worldCoordinate = project(latLng);

            var pixelCoordinate = new google.maps.Point(
                Math.floor(worldCoordinate.x * scale),
                Math.floor(worldCoordinate.y * scale));

            var tileCoordinate = new google.maps.Point(
                Math.floor(worldCoordinate.x * scale / TILE_SIZE),
                Math.floor(worldCoordinate.y * scale / TILE_SIZE));

            return [
                'Успех - 79',
                'Главен офис'
            ].join('<br>');
        }

        // The mapping between latitude, longitude and pixels is defined by the web
        // mercator projection.
        function project(latLng) {
            var siny = Math.sin(latLng.lat() * Math.PI / 180);

            // Truncating to 0.9999 effectively limits latitude to 89.189. This is
            // about a third of a tile past the edge of the world tile.
            siny = Math.min(Math.max(siny, -0.9999), 0.9999);

            return new google.maps.Point(
                TILE_SIZE * (0.5 + latLng.lng() / 360),
                TILE_SIZE * (0.5 - Math.log((1 + siny) / (1 - siny)) / (4 * Math.PI)));
        }


        $('#sendMailForm').on('submit', submitMail)

        function submitMail(evt) {
            if (evt) {
                evt.preventDefault();
            }

            let name = $('#name').val();
            let phone = $('#phone').val();
            let email = $('#email').val();
            let question = $('#question').val();
            let grecaptchaTok = $('#g-recaptcha-response').val()
            let token = $('[name=csrf-token]').val();

            let headers = {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            };

            let mailData = {
                fullname: name,
                phone: phone,
                email: email,
                question: question,
                'g-recaptcha-response': grecaptchaTok,
            };


            app.system.request('send-email', 'POST', headers, mailData, function (data) {
                $("#sendMailForm").trigger('reset');
                grecaptcha.reset();
                app.system.message(data)
            });
        }


    </script>
    <script defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn36AlMlolEce6Aaclc42575Eae6xReVA&callback=initMap"></script>

@endsection