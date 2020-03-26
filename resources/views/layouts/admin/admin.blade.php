<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>{{ \App\Setting::findByName('nome') ? \App\Setting::findByName('nome') : 'Site' }} | Área Administrativa</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="{{ \App\Setting::findByName('nome') ? \App\Setting::findByName('nome') : 'Site' }} - Admin" name="description" />
        <meta content="Alan Hidalgo Pagoto" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('adm/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('adm/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('adm/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('adm/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ URL::asset('adm/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ URL::asset('adm/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ URL::asset('adm/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('adm/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ URL::asset('adm/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        @yield("extra_css")
        <script src="{{ URL::asset('adm/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <!-- END HEAD -->

    <body class="page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="text-center">
                                @if (\App\Setting::findByName('logo_url'))
                                    <img src="{{ URL::asset(\App\Setting::findByName('logo_url')) }}" class="center-block bg-white p-3" style="margin-bottom: 15px; max-width: 150px;">
                                @endif
                            </li>
                            <li class="nav-item start ">
                                <a href="{{ URL::to('admin/categories') }}" class="nav-link">
                                    <i class="fa fa-folder"></i>
                                    <span class="title">Categorias</span>
                                </a>
                            </li>
                            <li class="nav-item start ">
                                <a href="{{ URL::to('admin/products') }}" class="nav-link">
                                    <i class="fa fa-folder"></i>
                                    <span class="title">Produtos</span>
                                </a>
                            </li>
                            <li class="nav-item start ">
                                <a href="{{ URL::to('admin/shippings') }}" class="nav-link">
                                    <i class="fa fa-folder"></i>
                                    <span class="title">Meios de entrega</span>
                                </a>
                            </li>
                            <li class="nav-item start ">
                                <a href="{{ URL::to('admin/banners') }}" class="nav-link">
                                    <i class="fa fa-image"></i>
                                    <span class="title">Banners</span>
                                </a>
                            </li>
                            <li class="nav-item start ">
                                <a href="{{ URL::to('admin/settings') }}" class="nav-link">
                                    <i class="fa fa-cogs"></i>
                                    <span class="title">Configurações</span>
                                </a>
                            </li>
                            <li class="nav-item start ">
                                <a href="{{ URL::to('admin/logout') }}" class="nav-link">
                                    <i class="fa fa-sign-out"></i>
                                    <span class="title">Sair</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <div class="page-content">
                        @if (session('status'))
                            <p class="alert alert-success">{{ session('status') }}</p>
                            <br/>
                        @endif
                        @if (session('error'))
                            <p class="alert alert-danger">{{ session('error') }}</p>
                            <br/>
                        @endif
                        <!-- BEGIN CONTENT BODY -->
                            @yield('content')
                        <!-- END CONTENT BODY -->
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> {{ date('Y') }} &copy; Nostra Casa
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!--[if lt IE 9]>
<script src="{{ URL::asset('adm/global/plugins/respond.min.js') }}"></script>
<script src="{{ URL::asset('adm/global/plugins/excanvas.min.js') }}"></script>
<script src="{{ URL::asset('adm/global/plugins/ie8.fix.min.js') }}"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{ URL::asset('adm/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('adm/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('adm/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('adm/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('adm/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ URL::asset('adm/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ URL::asset('adm/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('adm/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('adm/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('adm/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script src="{{ URL::asset('adm/js/jquery.mask.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('adm/js/custom.js?v=3') }}" type="text/javascript"></script>
        @yield("extra_js")
    </body>

</html>
