  
<!DOCTYPE html>

<html>
  <head>
<title>TOEIC</title>
    <?php $this->load->view('template/meta'); ?>
  </head>

  <body class="hold-transition login-page">
   
    <div class="login-box">
     
      <div class="login-logo">
        <a><b>Register</b></a>
        <br>
        Aplikasi Pendaftaran Test TOEIC <br> berbasis Web</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Isi Data</p>
        <form role="form" method="post" name="loginForm" id="loginForm" action="<?php echo base_url('register/aksi'); ?>">
          
          <div class="form-group has-feedback">
            <input name="username" id="username" type="text" class="form-control" placeholder="Username:">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          
          <div class="form-group has-feedback">
            <input name="password" id="password" type="password" class="form-control" placeholder="Password:">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="nama" id="nama" type="nama" class="form-control" placeholder="nama:">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="npm" id="npm" type="npm" class="form-control" placeholder="npm:">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="kontak" id="kontak" type="kontak" class="form-control" placeholder="kontak:">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
         
          
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
              <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button> -->
              <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button> -->
            </div><!-- /.col -->
          </div>
                            
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

  </body>
</html>

<script type="text/javascript">

$('#loginForm').submit(function() 
{
    if ($.trim($("#username").val()) === "" || $.trim($("#password").val()) === "") {
        alert('Masukkan Username dan Password !!!');
    return false;
    }
});

</script>