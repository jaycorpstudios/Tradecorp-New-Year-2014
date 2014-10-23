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
            <section id="sky">
                <div class="sun"></div>
                <div class="cloud-1" id="cloud1"></div>
                <div class="cloud-2" id="cloud2"></div>
                <div class="cloud-1" id="cloud3"></div>
                <div class="cloud-2" id="cloud4"></div>
                <div class="cloud-1" id="cloud5"></div>
                <div class="cloud-small" id="cloud6"></div>
                <div class="cloud-small" id="cloud7"></div>
            </section>
            <section id="fields" data-1000="-webkit-transform: translateY(800px);" data-2000="-webkit-transform: translateY(0px);">
            <div class="base-fields">
                <div class="field-1" data-1000="bottom: -100px" data-2000="bottom: 0px"></div>
                <div class="field-2" data-1000="bottom: -160px" data-2000="bottom: 120px"></div>
                <div class="field-3" data-1000="bottom: -800px" data-2000="bottom: 0px"></div>
            </div>
            </section>
            <section id="front-field">
                <!-- <div class="ground"></div> -->
            </section>
        </div>
    </body>
</html>