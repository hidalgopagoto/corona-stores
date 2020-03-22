
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home 02</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ URL::asset('fashe-colorlib/images/icons/favicon.png') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/fonts/themify/themify-icons.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/fonts/elegant-font/html-css/style.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/vendor/slick/slick.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/vendor/lightbox2/css/lightbox.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fashe-colorlib/css/main.css') }}">
    <!--===============================================================================================-->
</head>
<body class="animsition">

<!-- header fixed -->
<div class="wrap_header fixed-header2 trans-0-4">
    <!-- Logo -->
    <a href="index.html" class="logo">
        <img src="{{ URL::asset('fashe-colorlib/images/icons/logo.png') }}" alt="IMG-LOGO">
    </a>

    <!-- Menu -->
    <div class="wrap_menu">
        <nav class="menu">
            <ul class="main_menu">
                <li>
                    <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li>
                    <a href="{{ URL::to('produtos') }}">Produtos</a>
                </li>
                <li>
                    <a href="{{ URL::to('quem-somos') }}">Quem somos</a>
                </li>
                <li>
                    <a href="{{ URL::to('termos-compra') }}">Termos de Compra</a>
                </li>
                <li>
                    <a href="{{ URL::to('contato') }}">Contato</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Header Icon -->
    <div class="header-icons">
        <a href="#" class="header-wrapicon1 dis-block">
            <img src="{{ URL::asset('fashe-colorlib/images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
        </a>

        <span class="linedivide1"></span>

        <div class="header-wrapicon2">
            <img src="{{ URL::asset('fashe-colorlib/images/icons/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti">0</span>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
                <ul class="header-cart-wrapitem">
                    <li class="header-cart-item">
                        <div class="header-cart-item-img">
                            <img src="{{ URL::asset('fashe-colorlib/images/item-cart-01.jpg') }}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name">
                                White Shirt With Pleat Detail Back
                            </a>

                            <span class="header-cart-item-info">
									1 x $19.00
								</span>
                        </div>
                    </li>

                    <li class="header-cart-item">
                        <div class="header-cart-item-img">
                            <img src="{{ URL::asset('fashe-colorlib/images/item-cart-02.jpg') }}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name">
                                Converse All Star Hi Black Canvas
                            </a>

                            <span class="header-cart-item-info">
									1 x $39.00
								</span>
                        </div>
                    </li>

                    <li class="header-cart-item">
                        <div class="header-cart-item-img">
                            <img src="{{ URL::asset('fashe-colorlib/images/item-cart-03.jpg') }}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name">
                                Nixon Porter Leather Watch In Tan
                            </a>

                            <span class="header-cart-item-info">
									1 x $17.00
								</span>
                        </div>
                    </li>
                </ul>

                <div class="header-cart-total">
                    Total: $75.00
                </div>

                <div class="header-cart-buttons">
                    <div class="header-cart-wrapbtn">
                        <!-- Button -->
                        <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                            View Cart
                        </a>
                    </div>

                    <div class="header-cart-wrapbtn">
                        <!-- Button -->
                        <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- top noti -->
<div class="flex-c-m size22 bg0 s-text21 pos-relative">
    20% de desconto!
    <a href="product.html" class="s-text22 hov6 p-l-5">
        Ver agora
    </a>

    <button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
        <i class="fa fa-remove fs-13" aria-hidden="true"></i>
    </button>
</div>

<!-- Header -->
<header class="header2">
    <!-- Header desktop -->
    <div class="container-menu-header-v2 p-t-26">
        <div class="topbar2">
            <div class="topbar-social">
                @if (\App\Setting::findByName('facebook_url'))
                    <a href="{{ \App\Setting::findByName('facebook_url') }}" class="topbar-social-item fa fa-facebook"></a>
                @endif
                @if (\App\Setting::findByName('instagram_url'))
                    <a href="#" class="topbar-social-item fa fa-instagram"></a>
                @endif
            </div>

            <!-- Logo2 -->
            <a href="{{ URL::to('/') }}" class="logo2">
                <img src="{{ URL::asset('fashe-colorlib/images/icons/logo.png') }}" alt="IMG-LOGO">
            </a>

            <div class="topbar-child2">
					<span class="topbar-email">
						fashe@example.com
					</span>

                <!--  -->
                <a href="#" class="header-wrapicon1 dis-block m-l-30">
                    <img src="{{ URL::asset('fashe-colorlib/images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
                </a>

                <span class="linedivide1"></span>

                <div class="header-wrapicon2 m-r-13">
                    <img src="{{ URL::asset('fashe-colorlib/images/icons/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">0</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{ URL::to('cart') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Ver carrinho
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{ URL::to('cart/checkout') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Finalizar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrap_header">

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="{{ URL::to('/') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('produtos') }}">Produtos</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('quem-somos') }}">Quem somos</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('termos-compra') }}">Termos de Compra</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('contato') }}">Contato</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">

            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="index.html" class="logo-mobile">
            <img src="{{ URL::asset('fashe-colorlib/images/icons/logo.png') }}" alt="IMG-LOGO">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <a href="#" class="header-wrapicon1 dis-block">
                    <img src="{{ URL::asset('fashe-colorlib/images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
                </a>

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="{{ URL::asset('fashe-colorlib/images/icons/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">0</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="{{ URL::asset('fashe-colorlib/images/item-cart-01.jpg') }}" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        White Shirt With Pleat Detail Back
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $19.00
										</span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="{{ URL::asset('fashe-colorlib/images/item-cart-02.jpg') }}" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Converse All Star Hi Black Canvas
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $39.00
										</span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="{{ URL::asset('fashe-colorlib/images/item-cart-03.jpg') }}" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Nixon Porter Leather Watch In Tan
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $17.00
										</span>
                                </div>
                            </li>
                        </ul>

                        <div class="header-cart-total">
                            Total: $75.00
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
                </li>

                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>
                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a href="index.html">Home</a>
                    <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                </li>
                <li class="item-menu-mobile">
                    <a href="{{ URL::to('produtos') }}">Produtos</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="{{ URL::to('quem-somos') }}">Quem somos</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="{{ URL::to('termos-compra') }}">Termos de Compra</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="{{ URL::to('contato') }}">Contato</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

@yield('content')

<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w p-b-90">
        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                ENTRE EM CONTATO
            </h4>

            <div>
                <p class="s-text7 w-size27">
                    Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
                </p>

                <div class="flex-m p-t-30">
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                </div>
            </div>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Categorias
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Homens
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Mulheres
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Infantil
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Unissex
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Loja
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Onde estamos
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Contato
                    </a>
                </li>

            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Ajuda
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Termos e Condições
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Entrega
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="t-center p-l-15 p-r-15">
        <a href="#">
            <img class="h-size2" src="{{ URL::asset('fashe-colorlib/images/icons/paypal.png') }}" alt="IMG-PAYPAL">
        </a>

        <a href="#">
            <img class="h-size2" src="{{ URL::asset('fashe-colorlib/images/icons/visa.png') }}" alt="IMG-VISA">
        </a>

        <a href="#">
            <img class="h-size2" src="{{ URL::asset('fashe-colorlib/images/icons/mastercard.png') }}" alt="IMG-MASTERCARD">
        </a>

        <a href="#">
            <img class="h-size2" src="{{ URL::asset('fashe-colorlib/images/icons/express.png') }}" alt="IMG-EXPRESS">
        </a>

        <a href="#">
            <img class="h-size2" src="{{ URL::asset('fashe-colorlib/images/icons/discover.png') }}" alt="IMG-DISCOVER">
        </a>

        <div class="t-center s-text8 p-t-20">
            © 2019 | Website fornecido gratuitamente | Template desenvolvido com <i class="fa fa-heart-o" aria-hidden="true"></i> por <a href="https://colorlib.com" target="_blank">Colorlib</a>
        </div>
    </div>
</footer>



<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

<!-- Modal Video 01-->
<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog" role="document" data-dismiss="modal">
        <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

        <div class="wrap-video-mo-01">
            <div class="w-full wrap-pic-w op-0-0"><img src="{{ URL::asset('fashe-colorlib/images/icons/video-16-9.jpg') }}" alt="IMG"></div>
            <div class="video-mo-01">
                <iframe src="https://www.youtube.com/embed/Nt8ZrWY2Cmk?rel=0&amp;showinfo=0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('fashe-colorlib/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('fashe-colorlib/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('fashe-colorlib/vendor/bootstrap/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('fashe-colorlib/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('fashe-colorlib/vendor/select2/select2.min.js') }}"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('fashe-colorlib/vendor/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('fashe-colorlib/js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('fashe-colorlib/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('fashe-colorlib/vendor/lightbox2/js/lightbox.min.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('fashe-colorlib/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script type="text/javascript">
    $('.block2-btn-addcart').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to cart !", "success");
        });
    });

    $('.block2-btn-addwishlist').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");
        });
    });
</script>

<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('fashe-colorlib/vendor/parallax100/parallax100.js') }}"></script>
<script type="text/javascript">
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="{{ URL::asset('fashe-colorlib/js/main.js') }}"></script>

@yield('extra_js')

</body>
</html>
