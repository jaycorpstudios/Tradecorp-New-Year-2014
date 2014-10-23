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
            <div class='text'></div>
        </section>
            <section id="sky">
                <div class="sun"
                    data-0="transform: translateX(0px) translateY(0px);"
                    data-1000="transform: translateX(600px) translateY(-200px);"
                    data-5000="transform: translateX(2800px) translateY(400px);">
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
            </div>
            </section>
            <section id="front-field" data-1000="transform: translateY(100%);" data-2000="transform: translateY(0%);">
            <div class="center-wrap">
                <div class="corn-group">
                    <div class="corn corn-left"></div>
                    <div class="corn corn-center"></div>
                    <div class="corn corn-right"></div>
                    <div class="corn-ground"></div>
                </div>
            </div>
            <div class="ground"></div>
            </section>
        </div>
    </body>
</html>