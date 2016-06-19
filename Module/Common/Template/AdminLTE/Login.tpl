<div class="login-box">

    <div class="login-logo">
        <a href="/"><b>{{@$meta['titles']['full']['part1'];}}</b>{{@$meta['titles']['full']['part2'];}}</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="/user/login" method="post">
            <div class="form-group has-feedback{{@($hasError ? ' has-error' : '');}}">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{@$email}}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback{{@($hasError ? ' has-error' : '');}}">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <a href="#">I forgot my password</a><br>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
            </div>
        </form>


        {{if ($hasError):}}
        <br />
        <div class="alert alert-error">
            {{@$error}}
        </div>
        {{endif;}}

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->