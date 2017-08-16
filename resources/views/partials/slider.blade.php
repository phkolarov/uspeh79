<div id="jssor_1"
     style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:400px;overflow:hidden;visibility:hidden;">
    <!-- Loading Screen -->
    <div data-u="loading"
         style="position:absolute;top:0px;left:0px;background:url('img/loading.gif') no-repeat 50% 50%;background-color:rgba(0, 0, 0, 0.7);"></div>
    <div data-u="slides"
         style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:400px;overflow:hidden;">
        @foreach(\App\Http\Controllers\InformationController::Slides() as $slide)
            <div>
                <img data-u="image" src="img/slider/{{$slide->slide}}"/>
            </div>
        @endforeach
    </div>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
        <!-- bullet navigator item prototype -->
        <div data-u="prototype" style="width:16px;height:16px;"></div>
    </div>
    <!-- Arrow Navigator -->
    <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:40px;height:58px;"
          data-autocenter="2"></span>
    <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px;"
          data-autocenter="2"></span>
</div>

<script>
    $(document).ready(function () {

        jssor_1_slider_init = function () {

            var jssor_1_SlideoTransitions = [
                [{b: 900, d: 2000, x: -379, e: {x: 7}}],
                [{b: 900, d: 2000, x: -379, e: {x: 7}}],
                [{b: -1, d: 1, o: -1, sX: 2, sY: 2}, {
                    b: 0,
                    d: 900,
                    x: -171,
                    y: -341,
                    o: 1,
                    sX: -2,
                    sY: -2,
                    e: {x: 3, y: 3, sX: 3, sY: 3}
                }, {b: 900, d: 1600, x: -283, o: -1, e: {x: 16}}]
            ];

            var jssor_1_options = {
                $AutoPlay: 1,
                $SlideDuration: 800,
                $SlideEasing: $Jease$.$OutQuint,
                $CaptionSliderOptions: {
                    $Class: $JssorCaptionSlideo$,
                    $Transitions: jssor_1_SlideoTransitions
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
        jssor_1_slider_init();
    })
</script>