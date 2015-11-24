<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Baleromcr.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/css/AdminLTE.min.css">

    
    <style type="text/css">
      .hidden {
        visibility: hidden;
      }
    </style>




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
        <a href=""><b>cPanel</b>Balerom!</a>
      </div>
      <!-- User name -->
      <div class="lockscreen-name">Andrés de la Espriella</div>

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="<?php echo base_url();?>assets/dashboard/img/profile_128.jpg" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" action="<?php echo base_url();?>admin/login" method="POST">
          <div class="input-group">
            <input type="password" class="form-control" name="password" placeholder="contraseña" required>
            <div class="input-group-btn">
              <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
            </div>
          </div>
        </form><!-- /.lockscreen credentials -->

      </div><!-- /.lockscreen-item -->
      <div class="help-block text-center">
        Para iniciar sesión es necesario que ingrese su contraseña.
      </div>
      <div class="lockscreen-footer text-center">
        Copyright &copy; 2015 <b><a href="http://baleromcr.com" class="text-black">BaleromCR</a></b><br>
        All rights reserved
      </div>
    
    </div><!-- /.center -->
    <?php echo br(5); ?>
    <div class="container">
      <div id="alert" class="row hidden">
        <div class="col-md-4 col-md-offset-4">
             <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Error.</h4>
              Contraseña inválida.
            </div>
        </div>
      </div>
    </div>

  </body>

  <script type="text/javascript">
      var url = window.location + "";
      if (url.search('=err') >= 0) {
        var dom = document.getElementById('alert');
        dom.className = "row";
      }
  </script>

</html>
