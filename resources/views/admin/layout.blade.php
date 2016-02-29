<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Belief School | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <!-- Bootstrap 3.3.2 -->
    <link href="{!!asset('components/admin-lte/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{!!asset('components/admin-lte/dist/css/AdminLTE.min.css')!!}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{!!asset('components/admin-lte/dist/css/skins/skin-yellow.min.css')!!}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('admin-assets/data-tables/datatables.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body class="skin-yellow">
<div class="wrapper">

    @include('admin.partials.header')

    @include('admin.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page-title')
            </h1>
            <ol class="breadcrumb">
                @yield('breadcrumbs')
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            @yield('content')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    @include('admin.partials.footer')
</div><!-- ./wrapper -->
<script>
    window.debug = {{env('APP_DEBUG', false)}};
</script>
<!-- jQuery 2.1.3 -->
<script src="{!!asset('components/admin-lte/plugins/jQuery/jQuery-2.1.3.min.js')!!}"></script>
<!-- jQuery UI 1.11.2 -->
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>


<script src="{!!asset('components/admin-lte/bootstrap/js/bootstrap.min.js')!!}" type="text/javascript"></script>

<script src="{!!asset('components/admin-lte/dist/js/app.min.js')!!}" type="text/javascript"></script>

<script src="{{asset('admin-assets/data-tables/datatables.min.js')}}"></script>

<script src="{{asset('components/requirejs/require.js')}}" data-main="{{asset('admin-assets/js/main.js')}}"></script>

</body>
</html>