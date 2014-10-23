<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?
            Base::importarBloque('head_general');
        ?>
    </head>
    <body>
        <div id="tracking">00</div>
        <div id="wrapper">
        <section id="texts">
            <div class='text' data-0="opacity: 1; transform: scale(1);" data-1000="opacity: 0; transform: scale(0);"></div>
            <div class='text'
                data-1000="opacity: 0; transform: scale(0) translateY(0px);"
                data-1200="opacity: 1; transform: scale(1) translateY(0px);"
                data-2000="opacity: 0; transform: scale(1) translateY(-500px);"></div>
            <div class='text' data-2000="opacity: 0; top: 180px;"data-2250="opacity: 1" data-4750="opacity: 1" data-5000="opacity: 0"></div>
        </section>
            <section id="sky">
                <div class="sun"
                    data-0="transform: translateX(0px) translateY(0px);"
                    data-1000="transform: translateX(600px) translateY(-200px);"
                    data-2500="transform: translateX(2800px) translateY(400px);">
                </div>
                <div class="cloud-1" id="cloud1"
                    data-10="transform: translateY(0px);"
                    data-2000="transform: translateY(-500px);">
                </div>
                <div class="cloud-2" id="cloud2"
                    data-20="transform: translateY(0px);"
                    data-2000="transform: translateY(-400px);">
                </div>
                <div class="cloud-1" id="cloud3"
                    data-30="transform: translateY(0px);"
                    data-2000="transform: translateY(-300px);">
                </div>
                <div class="cloud-2" id="cloud4"
                    data-40="transform: translateY(0px);"
                    data-2000="transform: translateY(-500px);">
                </div>
                <div class="cloud-1" id="cloud5"
                    data-50="transform: translateY(0px);"
                    data-3500="transform: translateY(-600px);">
                </div>
                <div class="cloud-small" id="cloud6"
                    data-60="transform: translateY(0px);"
                    data-2000="transform: translateY(-450px);">
                </div>
                <div class="cloud-small" id="cloud7"
                    data-70="transform: translateY(0px);"
                    data-2000="transform: translateY(-600px);">
                </div>
            </section>
            <section id="fields"
                        data-500="transform: translateY(100%);" data-1000="transform: translateY(0%);"
                        data-1800="transform: translateY(0%);" data-2000="transform: translateY(-32%);">
            <div class="base-fields">
                <div class="field-1" data-500="bottom: -100px" data-1000="bottom: 0px"></div>
                <div class="field-2" data-500="bottom: -160px" data-1000="bottom: 120px"></div>
                <div class="field-3" data-500="bottom: -800px" data-1000="bottom: 0px"></div>
                <div class="field-1-summer" data-500="bottom: -100px" data-1000="bottom: 0px" data-2000="opacity: 0;"data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                <div class="field-2-summer" data-500="bottom: -160px" data-1000="bottom: 120px" data-2000="opacity: 0;"data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                <div class="field-3-summer" data-500="bottom: -800px" data-1000="bottom: 0px" data-2000="opacity: 0;"data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
            </div>
            </section>
            <section id="front-field" data-1000="transform: translateY(100%);" data-2000="transform: translateY(0%);">
                <div class="hot-sun" data-2000="opacity: 0;"data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                <div class="hot-filter" data-2000="opacity: 0;"data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                <div class="sad-filter" data-3000="opacity: 0;"data-3500="opacity: 1" data-4000="opacity: 1" data-4500="opacity: 0"></div>
                <div class="rain-filter" data-3500="opacity: 0;"data-4000="opacity: .4" data-4500="opacity: 0"></div>
                <div class="center-wrap">
                    <div class="corn-group" data-1000="transform: translateY(-150px);" data-2000="transform: translateY(0px);">
                        <div class="corn corn-left" data-3500="transform: scale(.5);" data-5000="transform: scale(1);"></div>
                        <div class="corn corn-center" data-3500="transform: scale(.5);" data-5000="transform: scale(1);"></div>
                        <div class="corn corn-right" data-3500="transform: scale(.5);" data-5000="transform: scale(1);"></div>
                        <div class="corn-summer corn-left"  data-2000="opacity: 0; transform: scale(.5);" data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                        <div class="corn-summer corn-center" data-2000="opacity: 0; transform: scale(.5);" data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                        <div class="corn-summer corn-right" data-2000="opacity: 0; transform: scale(.5);" data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                        <div class="corn-ground"></div>
                    </div>
                    <div class="personaje">
                        <div class="head">
                            <div class="gorra"></div>
                            <div class="sudor"></div>
                            <div class="paja"></div>
                            <div class="head-front"></div>
                            <div class="exp-preocupado" data-2499="opacity: 0" data-2500="opacity: 1" data-3499="opacity: 1" data-3500="opacity: 0"></div>
                            <div class="exp-feliz" data-2499="opacity: 1" data-2500="opacity: 0" data-4499="opacity: 0" data-4500="opacity: 1"></div>
                            <div class="exp-triste" data-3499="opacity: 0" data-3500="opacity: 1" data-4499="opacity: 1" data-4500="opacity: 0"></div>
                            <div class="head-back"></div>
                        </div>
                        <div class="body"></div>
                        <div class="brazo-izq"
                            data-1700="transform: rotate(60deg);"
                            data-2000="transform: rotate(0deg);"></div>
                        <div class="brazo-der"
                            data-1700="transform: rotate(-60deg);"
                            data-2000="transform: rotate(0deg);"></div>
                        <div class="shadow"></div>
                    </div>
                </div>
                <div class="ground"></div>
            </section>
        </div>
    </body>
</html>