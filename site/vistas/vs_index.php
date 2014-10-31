<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?
            Base::importarBloque('head_general');
            $detect = new Mobile_Detect;
        ?>
    </head>
    <body>
        <div id="wrapper">
            <section class="preloader">
                <div class="loading">
                    <img src="<?=URL_BASE.'imagenes/no-preload/isotipo.png'?>" alt="Loading">
                    <p>LOADING</p>
                </div>
            </section>
            <section class="vignette">
                <div class="scroll"
                data-0="transform: scale(1);"
                data-250="transform: scale(0);">
                    <div class="scroll-icon">
                        <div class="flecha"></div>
                    </div>
                    <p>Start to scroll slowly...</p>
                </div>
            </section>
            <section id="texts">
                <div class='text'
                    data-250="opacity: 0; transform: scale(0);"
                    data-500="opacity: 1; transform: scale(1);"
                    data-800="opacity: 1; transform: scale(1);"
                    data-1000="opacity: 0; transform: scale(0);">
                </div>
                <div class='text'
                    data-1000="opacity: 0; transform: scale(0) translateY(0px);"
                    data-1200="opacity: 1; transform: scale(1) translateY(0px);"
                    data-2000="opacity: 0; transform: scale(1) translateY(-500px);">
                </div>
                <div class='text'
                    data-2000="opacity: 0; transform: scale(0); top: 180px;" data-2250="opacity: 1; transform: scale(1);"
                    data-4000="opacity: 1" data-4500="opacity: 0">
                </div>
                <div class='text'
                    data-5000="opacity: 0; transform: scale(0); top: 180px;" data-5250="opacity: 1; transform: scale(1);"
                    data-6000="opacity: 1; transform: scale(1)" data-6250="opacity: 0; transform: scale(1);">
                </div>
                <div class='text'
                    data-6250="opacity: 0; transform: scale(0); top: 180px;" data-6500="opacity: 1; transform: scale(1);"
                    data-7500="opacity: 1; transform: scale(1)" data-8000="opacity: 0; transform: scale(1);">
                </div>
                <div class='text'
                    data-8000="opacity: 0; transform: scale(0); top: 180px;" data-8500="opacity: 1; transform: scale(1);"
                    data-9000="opacity: 1; transform: scale(1)" data-9500="opacity: 0; transform: scale(1);">
                </div>
                <div class='text'
                    data-9900="opacity: 0; transform: scale(0); margin-top: -80px;" data-10400="opacity: 1; transform: scale(1);">
                </div>
                <div class='logo-tradecorp'
                    data-9900="opacity: 0; transform: scale(0);" data-10400="opacity: 1; transform: scale(1);">
                </div>
            </section>
            <section id="sky" <?if($detect->isMobile()){
                echo 'data-9500="opacity: 1;" data-10500="opacity: .3;"';
                }?>>
                <div class="sun"
                    data-0="transform: translateX(0px) translateY(0px);"
                    data-1000="transform: translateX(600px) translateY(-200px);"
                    data-2500="transform: translateX(2800px) translateY(400px);">
                </div>
                <div class="cloud-1" id="cloud1"
                    data-10="transform: translateY(0px);"
                    data-2000="transform: translateY(-500px);"
                    data-9500="transform: translateY(-500px);"
                    data-10500="transform: translateY(10px);">
                </div>
                <div class="cloud-2" id="cloud2"
                    data-20="transform: translateY(0px);"
                    data-2000="transform: translateY(-400px);"
                    data-9500="transform: translateY(-400px);"
                    data-10500="transform: translateY(5px);">
                </div>
                <div class="cloud-1" id="cloud3"
                    data-30="transform: translateY(0px);"
                    data-2000="transform: translateY(-300px);"
                    data-9500="transform: translateY(-300px);"
                    data-10500="transform: translateY(5px);">
                </div>
                <div class="cloud-2" id="cloud4"
                    data-40="transform: translateY(0px);"
                    data-2000="transform: translateY(-500px);"
                    data-9500="transform: translateY(-500px);"
                    data-10500="transform: translateY(0px);">
                </div>
                <div class="cloud-1" id="cloud5"
                    data-50="transform: translateY(0px);"
                    data-3500="transform: translateY(-600px);"
                    data-9500="transform: translateY(-600px);"
                    data-10500="transform: translateY(5px);">
                </div>
                <div class="cloud-small" id="cloud6"
                    data-60="transform: translateY(0px);"
                    data-2000="transform: translateY(-450px);"
                    data-9500="transform: translateY(-450px);"
                    data-10500="transform: translateY(0px);">
                </div>
                <div class="cloud-small" id="cloud7"
                    data-70="transform: translateY(0px);"
                    data-2000="transform: translateY(-600px);"
                    data-9500="transform: translateY(-600px);"
                    data-10500="transform: translateY(6px);">
                </div>
            </section>
            <section id="fields"
                        data-500="transform: translateY(100%);" data-1000="transform: translateY(0%);"
                        data-1800="transform: translateY(0%);" data-2000="transform: translateY(-32%);"
                        data-9500="transform: translateY(-32%);" data-10000="transform: translateY(100%);">
                <div class="base-fields">
                    <div class="field-1" data-500="bottom: -100px" data-2000="bottom: 0px"></div>
                    <div class="field-2" data-500="bottom: -160px" data-2000="bottom: 120px"></div>
                    <div class="field-3" data-500="bottom: -800px" data-2000="bottom: 0px"></div>
                    <div class="field-1-summer" data-2000="bottom: 0px" data-2100="opacity: 0;" data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                    <div class="field-2-summer" data-2000="bottom: 120px" data-2100="opacity: 0;" data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                    <div class="field-3-summer" data-2000="bottom: 0px" data-2100="opacity: 0;" data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                </div>
            </section>
            <section id="front-field" data-1000="transform: translateY(100%);" data-2000="transform: translateY(0%);" data-9500="transform: translateY(0%);" data-10500="transform: translateY(100%);">
                <div class="hot-sun" data-2000="opacity: 0;" data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                <div class="hot-filter" data-2000="opacity: 0;" data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                <div class="sad-filter" data-3000="opacity: 0;" data-3500="opacity: 1" data-4000="opacity: 1" data-4500="opacity: 0"></div>
                <div class="rain-filter" data-3500="opacity: 0;" data-4000="opacity: .4" data-4500="opacity: 0"></div>
                <div class="center-wrap">
                    <div class="corn-group" data-1000="transform: translateY(-150px);" data-2000="transform: translateY(0px);">
                        <div class="corn corn-left" data-4500="transform: scale(.5);" data-5000="transform: scale(1);"></div>
                        <div class="corn corn-center" data-4500="transform: scale(.5);" data-5000="transform: scale(1);"></div>
                        <div class="corn corn-right" data-4500="transform: scale(.5);" data-5000="transform: scale(1);"></div>
                        <div class="corn-summer corn-left"  data-2000="opacity: 0; transform: scale(.5);" data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                        <div class="corn-summer corn-center" data-2000="opacity: 0; transform: scale(.5);" data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                        <div class="corn-summer corn-right" data-2000="opacity: 0; transform: scale(.5);" data-2500="opacity: 1" data-3000="opacity: 1" data-3500="opacity: 0"></div>
                        <div class="corn-ground"></div>
                    </div>
                    <div class="planta-izq" data-4500="transform: scale(.2);" data-6500="transform: scale(1);">
                        <div class="mini-corn-1" data-6000="transform: scale(0);" data-7000="transform: scale(1);"></div>
                        <div class="mini-corn-2" data-6000="transform: scale(0);" data-7000="transform: scale(1);"></div>
                    </div>
                    <div class="planta-der" data-4500="transform: scale(.2);" data-6500="transform: scale(1);">
                        <div class="mini-corn-3" data-6000="transform: scale(0);" data-7000="transform: scale(1);"></div>
                        <div class="mini-corn-4" data-6000="transform: scale(0);" data-7000="transform: scale(1);"></div>
                    </div>
                    <div class="personaje" data-5000="left: 100px;" data-5250="left: 20px;">
                        <div class="head" data-8000="@class:head" data-8800="@class:head head-animated;">
                            <div class="gorra"></div>
                            <div class="sudor" data-2000="display: none;" data-2250="display: inline-block;" data-3199="display: inline-block;" data-3200="display: none;"></div>
                            <div class="sudor" data-2000="display: none; left:60px;" data-2250="display: inline-block;" data-3199="display: inline-block;" data-3200="display: none;"></div>
                            <div class="sudor" data-2000="display: none; left:90px;" data-2250="display: inline-block;" data-3199="display: inline-block;" data-3200="display: none;"></div>
                            <div class="sudor" data-2000="display: none; left:114px;" data-2250="display: inline-block;" data-3199="display: inline-block;" data-3200="display: none;"></div>
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
                            data-2000="transform: rotate(0deg);">
                        </div>
                        <div class="brazo-der"
                            data-1700="transform: rotate(-60deg);"
                            data-2000="transform: rotate(0deg);"
                            data-3499="opacity: 1" data-3500="opacity: 0"
                            data-4499="opacity: 0" data-4500="opacity: 1"
                            data-5249="opacity: 1" data-5250="opacity: 0"
                            data-6249="opacity: 0" data-6250="opacity: 1"
                            data-6499="opacity: 1" data-6500="opacity: 0">
                        </div>
                        <div class="brazo-der-paraguas"
                            data-3499="opacity: 0;" data-3500="opacity: 1; transform: rotate(36deg);"
                            data-3700="transform: rotate(-27deg);" data-4200="transform: rotate(-27deg);" data-4498="transform: rotate(36deg);"
                            data-4499="opacity: 1;" data-4500="opacity: 0;">
                        </div>
                        <div class="brazo-der-ok"
                            data-5249="opacity: 0" data-5250="opacity: 1"
                            data-6249="opacity: 1" data-6250="opacity: 0">
                        </div>
                        <div class="brazo-der-tridente"
                            data-6499="opacity: 0; transform: rotate(7deg);" data-6500="opacity: 1;" data-7000="opacity: 1; transform: rotate(0deg);">
                        </div>
                        <div class="shadow"></div>
                    </div>
                    <div class="esposa"
                        data-5000="opacity: 0; left:118px;" data-5250="opacity: 1; left:150px;"
                        data-6250="left:150px;" data-6500="left:221px;"></div>
                    <div class="carrito-2015"
                        data-8000="opacity: 0; transform: translateX(-1000px);" data-8500="opacity: 1; transform: translateX(0px);">
                        <div class="metas-2015"
                            data-8500="opacity: 0; transform: translateY(-1200px);" data-8800="opacity: 1; transform: translateY(0px);">
                        </div>
                    </div>
                </div>
                <div class="ground"></div>
            </section>
        </div>
    </body>
</html>