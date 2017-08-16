@extends('layouts.app')
@section('mainmenu')
    @include('partials.main-menu')
@endsection
@section('slider')
    @include('partials.slider');
@endsection
@section('content')
    <div class="container">


        <div class="row">
            <div id="presenterMessage" class="col-md-9">
                <h1>
                    <span style="color: rgb(0,125,210);">Гаранция за качество и успех при всеки наш курс!</span>
                </h1>
                <p style="font-size: 22px">
                    Автошкола  Успех - 79 гарантира на всички свои курсисти високо качество на обучение, отлична материална база и
                    коректност без скрити такси и комисионни.
                    Разгледайте нашите курсове и изберете най-подходящият за Вас.
                </p>
            </div>
            <div class="col-md-3 col-xs-6">
                <img src="img/signs.png" id="signs-present">

                <a class="btn btn-info" href="#candidate" id="candidate_route">КАНДИДАТСТВАЙ СЕГА!</a>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div id="tree-row-section">

                <div class="col-md-4 reveal">

                    <img alt="" width="50"
                         src="http://www.nicdarkthemes.com/themes/education/html/demo/drive/img/icons/icon-award-color.svg">
                    <div id="first-row-present-info">
                        <h2><strong>Висока успеваемост</strong></h2>
                        <div class="nicdark_section nicdark_height_20"></div>
                        <p><strong>"Успех - 79" има 98% успеваемост при всички провеждани курсове.</strong></p>
                        {{--<div class="clearfix">--}}
                        {{--<canvas class="loader"></canvas>--}}
                        {{--<script>--}}
                        {{--$(document).ready(function() {--}}
                        {{--$('.loader').ClassyLoader({--}}
                        {{--percentage: 96,--}}
                        {{--speed: 20,--}}
                        {{--fontSize: '30px',--}}
                        {{--diameter: 40,--}}
                        {{--lineColor: 'rgb(0, 125, 210)',--}}
                        {{--remainingLineColor: 'rgba(200,200,200,0.4)',--}}
                        {{--lineWidth: 10,--}}
                        {{--float: 'right'--}}
                        {{--});--}}
                        {{--});--}}
                        {{--</script>--}}
                        {{--<br />--}}
                        {{--</div>--}}
                    </div>


                </div>

                <div class="col-md-4 reveal">

                    <img alt="" width="50"
                         src="http://www.nicdarkthemes.com/themes/education/html/demo/drive/img/icons/icon-graduation-color.svg">
                    <div id="second-row-present-info">
                        <h2><strong>Професионална компетентност</strong></h2>
                        <div class="nicdark_section nicdark_height_20"></div>
                        <p><strong>Високо квалифицирани преподаватели отнасящи се с внимание и отношение къв всеки курсист.</strong></p>
                    </div>


                </div>

                <div class="col-md-4 reveal">

                    <img alt="" width="50"
                         src="http://www.nicdarkthemes.com/themes/education/html/demo/drive/img/icons/icon-graph-color.svg">
                    <div id="third-row-present-info">
                        <h2><strong>Избор на курсове</strong></h2>
                        <div class="nicdark_section nicdark_height_20"></div>
                        <p>- <strong>Ние провеждаме курсове за категории: <br>&nbsp;&nbsp;А, А1, А2, B, B+E, C,
                                D</strong></p>
                        <p>- <strong>Възстановяване на контролни точки</strong></p>
                        <p>- <strong>"ADR" Опасни товари</strong></p>

                    </div>
                </div>


            </div>
        </div>
        <br>
        <br>

        <div class="row">
            <div id="candidate" class="col-md-5 reveal">
                <form id="candidate" method="post" class="form">
                    <h3>КАНДИДАТСТВАЙ СЕГА!</h3>
                    <div class="form-group">
                        <input class="form-control" type="text" id="name" placeholder="ИМЕ" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="email" placeholder="EMAIL" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="phone" placeholder="ТЕЛЕФОН" required>
                    </div>
                    <div class="form-group">
                        <select id="selected-category" class="form-control">
                            <option> КАТЕГОРИЯ "А"</option>
                            <option> КАТЕГОРИЯ "А1"</option>
                            <option> КАТЕГОРИЯ "А2"</option>
                            <option> КАТЕГОРИЯ "B"</option>
                            <option> КАТЕГОРИЯ "C"</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea id="question" class="form-control" type="text"
                                  placeholder="ДОПЪЛНИТЕЛНИ ВЪПРОСИ"></textarea>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LfxdhAUAAAAAG2_RfgqVLZtKz-umzVmF9-OS0D1"></div>
                    <br>
                    <input type="submit" value="КАНДИДАТСТВАЙ" class="btn btn-info">
                </form>
            </div>
            <div class="col-md-6 reveal">
                <img src="img/front-car-image.png" id="front-car-image">
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div id="courses-presenter-wrapper">
                <div class="col-md-3 reveal">

                    <a href="category-{{strtolower($aCategory->type)}}">
                        <div class="category-presenter" id="a1-category">
                            <div class="icon-wrapper">
                                <img src="css/icons/icon-5.png">
                            </div>
                            <div class="category-info">
                                <h4> "A" КАТЕГОРИЯ </h4>
                                <p>работен обем над 50 см3</p><br>

                                <ul>
                                    <li><span class="front-price @if($aCategory->promotion) promotion @endif">{{$aCategory->new_price}}
                                            @if($aCategory->promotion)
                                                <img class="promoImage" src="css/icons/promo.png">
                                            @endif
                                                <span class="currency">лв</span></span></li>
                                    <li>
                                        Гъвкаво обучение
                                    </li>
                                    <li>
                                        Здравна застраховка
                                    </li>
                                    <li>
                                        Проверка преди заключителен изпит.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-md-3 reveal">

                    <a href="category-{{strtolower($bCategory->type)}}">

                        <div class="category-presenter" id="b-category">
                            <div class="icon-wrapper">
                                <img src="css/icons/icon-6.png">
                            </div>
                            <div class="category-info">
                                <h4>

                                    "B" КАТЕГОРИЯ

                                </h4>
                                <p>максимална маса до 3500 кг и 8 места за сядане</p>
                                <ul>
                                    <li><span class="front-price @if($bCategory->promotion) promotion @endif">{{$bCategory->new_price}}
                                            @if($bCategory->promotion)
                                                <img class="promoImage" src="css/icons/promo.png">
                                            @endif
                                            <span
                                                    class="currency">лв</span></span></li>
                                    <li>
                                        Гъвкаво обучение
                                    </li>
                                    <li>
                                        Здравна застраховка
                                    </li>
                                    <li>
                                        Проверка преди заключителен изпит.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 reveal">
                    <a href="category-{{strtolower($cCategory->type)}}">
                        <div class="category-presenter" id="c-category">
                            <div class="icon-wrapper">
                                <img src="css/icons/icon-8.png">

                            </div>
                            <div class="category-info">
                                <h4>
                                    "C" КАТЕГОРИЯ

                                </h4>
                                <p>допустима максимална маса над 3500 кг</p>


                                <ul>
                                    <li><span class="front-price @if($cCategory->promotion) promotion @endif">{{$cCategory->new_price}}
                                            @if($cCategory->promotion)
                                                <img class="promoImage" src="css/icons/promo.png">
                                            @endif
                                            <span
                                                    class="currency">лв</span></span></li>
                                    <li>
                                        Гъвкаво обучение
                                    </li>
                                    <li>
                                        Здравна застраховка
                                    </li>
                                    <li>
                                        Проверка преди заключителен изпит.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-md-3 reveal">
                    <a href="category-{{strtolower($cCategory->type)}}">
                        <div class="category-presenter" id="c-category">
                            <div class="icon-wrapper">
                                <img style="width: 95px;    height: auto;   margin-top: 10px;" src="css/icons/icon-10.png">
                            </div>
                            <div class="category-info">
                                <h4>
                                    "C+E" КАТЕГОРИЯ
                                </h4>
                                <p> МПС от категория "C" и ремарке с допустима маса над 750 кг.</p>
                                <ul>
                                    <li style="    padding-top: 0px;    padding-bottom: 7px;"><span class="front-price @if($cCategory->promotion) promotion @endif">{{$cCategory->new_price}}
                                            @if($cCategory->promotion)
                                                <img class="promoImage" src="css/icons/promo.png">
                                            @endif
                                            <span
                                                    class="currency">лв</span></span></li>
                                    <li>
                                        Гъвкаво обучение
                                    </li>
                                    <li>
                                        Здравна застраховка
                                    </li>
                                    <li>
                                        Проверка преди заключителен изпит.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-12 reveal">
                <div class="row">
                    <br>
                    <br>
                    <div class="col-md-2 col-centered">
                        <a class="btn btn-info" href="{{route('prices')}}">Виж всички цени</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 reveal">
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6 latest-news-presenter">
                        <h4>Последни новини</h4>
                        @foreach($latest_news as $article)
                            <a class="news" href="{{route('current-article',['id'=> $article->id,'title'=> $article->title])}}">
                                <h5>
                                    {{$article->title}}
                                </h5>
                                <img src="img/articles/{{$article->article_image}}">


                                <div>
                                {!!mb_substr( strip_tags($article->content),0,250) !!}

                                    @if(strlen(strip_tags( $article->content))> 250)...
                                    @endif

                                </div>
                            </a>

                        @endforeach


                    </div>
                    <div class="col-md-6">

                        <div class="cal1" id="course-calendar"></div>
                        <p>*Отбелязаните дати важат за всички провеждани курсове.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@section('javascript')
    <script>

        $(document).ready(function () {

            let monday = moment().startOf('month').day("Monday");
            let eventArray = [];

            if (monday.date() > 7)
                monday.add(8, 'd');

            let month = monday.month();

            let counter = 1;
            while (month === monday.month()) {
                if (counter % 2 != 0) {
                    eventArray.push({
                        title: "Стартиране на курсови групи",
                        date: monday.format('MM-DD-YYYY')
                    });
                }
                counter++;
                monday.add(7, 'd');
            }

            $('#course-calendar').clndr({
                events: eventArray,
            });

            $('.month').text('Дати на стартиращи курсови групи през месец ' + $('.month').text());
            $('.clndr-control-button').remove();
        })

        $('#candidate').on('submit', submitMail)

        function submitMail(evt) {
            if (evt) {
                evt.preventDefault();
            }

            let name = $('#name').val();
            let phone = $('#phone').val();
            let email = $('#email').val();
            let question = $('#question').val();
            let category = $('#selected-category').val();
            let grecaptchaTok = $('#g-recaptcha-response').val()
            let token = $('[name=csrf-token]').val();

            let headers = {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            };

            let mailData = {
                fullname: name,
                phone: phone,
                email: email,
                question: question || '',
                category: category,
                'g-recaptcha-response': grecaptchaTok,
            };

            app.system.request('send-email', 'POST', headers, mailData, function (data) {
				
				console.log(123);
                $("form").trigger('reset');
                grecaptcha.reset();
                app.system.message(data)
            });
        }


    </script>
@endsection