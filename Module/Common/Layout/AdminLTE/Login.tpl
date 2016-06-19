<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{@$meta['title']}} | Log In</title>


    <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/static/plugins/ionicons/css/ionicons.min.css">

    <link rel="stylesheet" href="/static/themes/admin-lte/css/admin-lte.min.css">
    <link rel="stylesheet" href="/static/themes/admin-lte/css/skins/skin-green-light.min.css">
    <link rel="stylesheet" href="/static/plugins/icheck/square/blue.css">

    <!--[if lt IE 9]>
    <script src="/static/plugins/html5shiv/js/html5shiv.min.js"></script>
    <script src="/static/plugins/respond/js/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page">

{{@$content}}

<script src="/static/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="/static/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/plugins/icheck/icheck.min.js"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
