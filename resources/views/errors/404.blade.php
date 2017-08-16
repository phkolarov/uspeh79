@extends('layouts.app')
@section('mainmenu')
    @include('partials.main-menu')
@endsection
{{--@section('slider')--}}
{{--@include('partials.slider');--}}
{{--@endsection--}}
@section('content')
    <div class="container">
        <br>
        <br> <br>
        <br> <br>
        <br>
        <h3 style="text-align: center">Съжаляваме, но страницата, която се опитвате да достъпите не беше открита!</h3>
        <br>
        <br> <br>
        <img src="http://znak-bg.com/files/thumb3_lOr6iG.jpg" width="400" style="margin: 0 auto; display: block;">

        <br> <br>
        <br>
        <br>
        <br> <br>
        <br> <br>
        <br>       <br>
        <br> <br>
        <br> <br>
        <br>
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
                $("form").trigger('reset');
                grecaptcha.reset();
                app.system.message(data)
            });
        }


    </script>
@endsection