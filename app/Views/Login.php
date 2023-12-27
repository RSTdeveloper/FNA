<!DOCTYPE html>
<html lang="es">
<!--
 ████████      ██████   ██████      ██ 
    ██        ██    ██    ██  ██    ██ 
    ██        ██    ██    ██  ██    ██ 
    ██         ██████   ██████      ██                          
-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RST Asociados</title>

    <link rel="icon" href="<?= base_url(); ?>/logoIcon.png" type="image/png" sizes="64x64" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">


    <!-- /.login-box -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE App -->
    <!--<script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>-->

     <!-- Theme style -->
     <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/login.css">


</head>
<body>   
<div class="prueba">  
    <div class="wrapper">
        <img src="<?= base_url(); ?>/assets/dist/img/fondo.png" class="logo" alt="RST Image">
        <div class="title-text">
            <div class="title login">Bienvenido</div>
        </div>	
        <div class="form-container">
            <div class="form-inner">   
                <form autocomplete="off" method="post" id="formIngresar" control="" class="login tex-ali">
                        <input type="button" value="Iniciar Sesión"  onclick="IniciarSesion()">
                    <div class="field">
                        <input type="number" name="cedula" id="cedula"  placeholder="Número de documento" autocomplete="off">
                    </div>
                    <div class="field">
                        <input type="password" name="validar" id="validar" class="formcontrol" placeholder="Código del mensaje" autocomplete="off">
                    </div>							
                </form>
            </div>
        </div>
    </div>
</body>
<footer class="prueba-foot footer-login">
    <div class="text-food">
        <strong>RST Asociados todos los derechos revervados.</strong>
    </div>
    <div class="footer-bar">
      <div class="bar-segment"></div>
      <div class="bar-segment"></div>
      <div class="bar-segment"></div>
      <div class="bar-segment"></div>
      <div class="bar-segment"></div>
      <div class="bar-segment"></div>
    </div>
</footer>
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        document.getElementById("cedula").addEventListener("keydown", function(e) {
            if (e.keyCode == 13) { //checks whether the pressed key is "Enter"
                IniciarSesion();
            }
        });

        document.getElementById("validar").addEventListener("keydown", function(e) {
            if (e.keyCode == 13) { //checks whether the pressed key is "Enter"
                IniciarSesion();
            }
        });
        async function IniciarSesion()
        {
            let identificacion= $('#cedula').val();
            let username= $('#validar').val();
            if(identificacion == '' && username ==''){
                Toast.fire({
                        icon: 'error',
                        title: 'Por favor ingrese los datos'
                    })
                return null;
            }
            if(identificacion != '' && username ==''){
                Toast.fire({
                        icon: 'error',
                        title: 'Por favor ingrese el codigo enviado por mensaje de texto'
                    })
                return null;
            }
            if(identificacion == '' && username !=''){
                Toast.fire({
                        icon: 'error',
                        title: 'Por favor ingrese el numero de documento registrado'
                    })
                return null;
            }
            var data = {
                identificacion: $('#cedula').val(),
                username: $('#validar').val(),
            }

            $.ajax({
                type: "post",
                url: "<?= base_url(); ?>/login",
                data: data,
                dataType: "json",
                beforeSend: function() {},
                success: function(data) {                    
                    if (data.type == 'error') {
                        Toast.fire({
                            icon: 'error',
                            title: data.message
                        }).then((result) => {
                            if (result) {
                                console.log(result);
                            }
                        });
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
                        window.location.href = '<?= base_url(); ?>/master'                           
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }
    </script>
</html>