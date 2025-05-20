<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/png" sizes="16x16" href="<?php base_url() ?>template/assets/images/favicon.png">
    <title>Login</title>
    
    <link href="<?php base_url() ?>template/ecommerce/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="<?php base_url() ?>template/ecommerce/dist/css/style.min.css" rel="stylesheet">

    <style>
        .alert {
            padding: 15px;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
            background-color: #dff0d8;
            color: #3c763d;
        }
    </style>
</head>

<body class="skin-default card-no-border">


    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>


    <section id="wrapper">
        <div class="login-register" style="background-image:url(<?php base_url(); ?>template/assets/gambar/bg-login.jpg);">
            <div class="login-box card">
                <div class="card-body">


                    <form class="form-horizontal form-material" id="loginform" action="aksi_login" method="post">
                        <h3 class="text-center m-b-20">Sign In</h3>


                            <?php if ($this->session->flashdata('msg')): ?>
                                <p id="flash-msg" class="alert"><?php echo $this->session->flashdata('msg'); ?></p>
                            <?php endif; ?>


                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="username" required="" placeholder="Username" autocomplete="off"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" id="form-control-password" required="" placeholder="Password"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cek-password">
                                        <label class="custom-control-label" for="cek-password">Show Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    



    
    <script src="<?php base_url() ?>template/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php base_url() ?>template/assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php base_url() ?>template/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });


        setTimeout(function() {
            document.getElementById('flash-msg').style.display = 'none';
        }, 5000);


        $(document).ready(function(){
			$('#cek-password').click(function(){
				if($(this).is(':checked')){
					$('#form-control-password').attr('type','text');
				}else{
					$('#form-control-password').attr('type','password');
					}
				});
			});
    </script>
</body>
</html>