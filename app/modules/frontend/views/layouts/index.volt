{{ content() }}
<section class="slider">
    <div class="shadow"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 no-padding">
                <h4>Скоро в эфире</h4>
                <ul class="slides">
                    {% for preview in previews %}
                        <li>
                            {{ image('files/previews/'~preview.image, 'title' : preview.title) }}
                        </li>
                    {% elsefor %}
                        <li class="dafault">
                            {{ image('files/previews/4039e060-7907-4d7f-8fbc-3f4baf7d2b9f.jpg') }}
                            <h1>Телеканал «Сделано в Кузбассе»</h1>
                            <h2>Рабочии профессии нашего региона</h2>
                        </li>
                    {% endfor %}
                </ul>
            </div>
            {% if previews.count() > 0 %}
                <script>
                    $(".slides").bxSlider({
                        mode : 'fade',
                        nextText : '<i class="fa fa-angle-right"></i>',
                        prevText : '<i class="fa fa-angle-left"></i>',
                        captions : true,
                        onSliderLoad : function () {
                            borderRadiusSlider();
                        },
                        onSlideBefore : function () {
                            borderRadiusSlider();
                        },
                        onSlideAfter : function () {
                            borderRadiusSlider();
                        },
                        onSlideNext : function () {
                            borderRadiusSlider();
                        },
                        onSlidePrev : function () {
                            borderRadiusSlider();
                        }
                    });

                    function borderRadiusSlider()
                    {
                        if($(window).width() >= 768) {
                            var sliderHeight = $('.bx-wrapper').height();
                            var radius = (sliderHeight / 2);
                            $('.slider .slides img').css({'border-top-right-radius' : radius, 'border-bottom-right-radius' : radius});
                        }
                        else {
                            $('.slider .slides img').css({'border-radius' : 0});
                        }
                    }
                </script>
            {% else %}
                <script>
                    function borderRadiusSlider()
                    {
                        if($(window).width() >= 768) {
                            var sliderHeight = $('.slides').height();
                            var radius = (sliderHeight / 2);
                            $('.slider .dafault').css({'overflow' : 'hidden', 'border-top-right-radius' : radius, 'border-bottom-right-radius' : radius});
                        }
                        else {
                            $('.slider .dafault').css({'border-radius' : 0});
                        }
                    }

                    borderRadiusSlider()
                </script>
                <style>
                    .slider h4 {
                        display: none;
                    }

                    .slider h1 {
                        position: absolute;
                        z-index: 5;
                        color: #fff;
                        top: 40%;
                        left: 40px;
                        font-size: 40px;
                        text-transform: uppercase;
                        font-weight: 500;
                    }

                    .slider h2 {
                        position: absolute;
                        z-index: 5;
                        color: #f89503;
                        top: 60%;
                        left: 40px;
                        font-size: 22px;
                        text-transform: uppercase;
                        font-weight: 500;
                    }

                    @media screen and (max-width: 768px) {
                        .slider h1 {
                            position: static;
                            margin: 20px 0;
                        }

                        .slider h2 {
                            position: static;
                            margin-bottom: 20px;
                        }
                    }
                </style>
            {% endif %}
            <script>
                $(window).resize(function() {
                    borderRadiusSlider();
                });
            </script>
        </div>
    </div>
</section>
<section class="plots plots-main shadowed" data-parallax="scroll" data-image-src="/img/metal.jpg">
    <div class="section-content">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Сюжеты</h2>
            </div>
            <div class="section-body">
                <div class="plots-content">
                    {% for plot in plots  %}
                        {{ partial('parts/plot') }}
                    {% endfor %}
                </div>
                <script>
                    $('.plots .plots-content').owlCarousel({
                        items : 4,
                        pagination : true,
                        navigation : true,
                        navigationText : ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
                        itemsDesktop : [1200, 4],
                        itemsTablet : [960, 3],
                        itemsMobile : [768, 1],
                        autoPlay    : true
                    });
                </script>
            </div>
        </div>
    </div>
</section>
<section class="about shadowed">
    <div class="container">
        <div class="section-content">
            <div class="section-header left reverse">
                <h2 class="section-title">О канале</h2>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="about-text col-md-8">
                        <p>«Сделано в Кузбассе» - атмосферно-познавательный телеканал, погружающий зрителя во внутреннюю жизнь предприятий родного края: процессы производства от проекта до выхода готового продукта. В эфире телеканала – будни рабочих за станком и конвейером, создание шедевров руками мастеров народного промысла. Наш зритель узнаёт, как делают профлист, варят квас, производят рельсы, добывают уголь, выращивают тюльпаны и многое другое. Ролики сопровождаются информацией о производстве, профессии или истории ремесла.</p>
                        <p>Бесконечно можно смотреть на три вещи: как горит огонь, течет вода и работают другие люди. Эти завораживающие процессы есть в каждом нашем сюжете.</p>
                        <p>Телеканал «Сделано в Кузбассе» транслируется в формате Full HD и доступен бесплатно в кабельном и «Большом ТВ» компании «GoodLine» в Кемеровской области.</p>
                    </div>
                    <div class="images col-md-4">
                        {{ image('img/goodline.jpg', 'class' : 'col-md-6 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2') }}
                        {{ image('img/big-tv.jpg', 'class' : 'col-md-6 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shadowed" data-parallax="scroll" data-image-src="/img/metal.jpg">
    <div class="container">
        <div class="row">
            <div class="section-content col-md-6">
                <div class="section-header left col-sm-12">
                    <h2 class="section-title">Обратная связь</h2>
                </div>
                <div class="section-body">
                    {{ form('order/send', 'class' : 'orderForm col-md-10') }}
                        {% for element in orderForm %}
                            {{ element }}
                        {% endfor %}
                        <button type="submit" class="btn orange">Отправить</button>
                    {{ endform() }}
                </div>
            </div>
            <div class="section-content col-md-6 contacts">
                <div class="section-header left col-sm-12">
                    <h2 class="section-title">Контакты</h2>
                </div>
                <div class="section-body">
                    <div class="col-md-10">
                        <div class="item">
                            <i class="fa fa-phone-square"></i>
                            (3842) 45-25-77
                        </div>
                        <div class="item">
                            <i class="fa fa-envelope-square"></i>
                            ufimtceva.ia@goodline.info
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>