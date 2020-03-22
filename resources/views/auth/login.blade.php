<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Área Administrativa - {{ $settings['nome'] }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="Alan Hidalgo Pagoto" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('adm/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('adm/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('adm/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('adm/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ URL::asset('adm/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ URL::asset('adm/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ URL::asset('adm/pages/css/login.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{ URL::to('admin/login') }}" method="post">
        {!! csrf_field() !!}
        <div class="logo-admin">
            @if ($settings['logo_url'])
                <img src="{{ URL::asset($settings['logo_url']) }}" alt="" class="center-block margin-top-40 margin-bottom-40" style="max-width: 180px;" />
            @else
                <h1 class="text-center margin-top-30 margin-bottom-30">Área administrativa - {{ $settings['nome'] }}</h1>
            @endif
        </div>
        @if (session('error'))
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <span>{{ session('error') }}</span>
            </div>
        @endif
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Preencha o email e senha. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" required="required" /> </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Senha</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Senha" name="password" required="required" /> </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase">Login</button>
        </div>
    </form>
    <!-- END LOGIN FORM -->
</div>
<!--[if lt IE 9]>
		<script src="{{ URL::asset('adm/global/plugins/respond.min.js') }}"></script>
		<script src="{{ URL::asset('adm/global/plugins/excanvas.min.js') }}"></script>
		<script src="{{ URL::asset('adm/global/plugins/ie8.fix.min.js') }}"></script>
		<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ URL::asset('adm/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('adm/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('adm/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('adm/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('adm/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('adm/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::asset('adm/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('adm/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ URL::asset('adm/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ URL::asset('adm/pages/scripts/login.min.js?v=2') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
