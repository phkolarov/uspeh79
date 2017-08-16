
    <div class="col-sm-4 col-md-3 sidebar">
        <div class="mini-submenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
        <div class="list-group">
        <span href="#" class="list-group-item active">
            Меню
            <span class="pull-right" id="slide-submenu">
                {{--<i class="fa fa-times"></i>--}}
            </span>
        </span>
            <a href="{{route('change-article')}}" class="list-group-item">
                <i class="fa fa-file-text-o"></i> Промени статии
            </a>
            <a href="{{route('course-information-administration')}}" class="list-group-item">
                <i class="fa fa-credit-card"></i> Информация за курсове
            </a>
            <a href="{{route('change-prices')}}" class="list-group-item">
                <i class="fa fa-credit-card"></i> Промяна на цени
            </a>
            <a href="{{route('slider')}}" class="list-group-item">
                <i class="fa fa-image"></i> Слайдър
            </a>
            <a href="{{route('gallery-administration')}}" class="list-group-item">
                <i class="fa fa-picture-o"></i> Галерия
                {{--<span class="badge">14</span>--}}
            </a>
            {{--<a href="#" class="list-group-item">--}}
                {{--<i class="fa fa-info"></i> Обща информация--}}
            {{--</a>--}}
            {{--<a href="#" class="list-group-item">--}}
                {{--<i class="fa fa-envelope"></i> Модул имейли--}}
            {{--</a>--}}
        </div>
    </div>
