<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ferreter&iacute;a</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>build/css/custom.min.css" rel="stylesheet">
    <!-- estilos personalizados -->
    <link href="<?php echo base_url();?>vendors/styles-css/estilosPersonalizados.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="form_inicioSesion">
              <h1>Inicio de sesi&oacute;n</h1>
              <div class="alert alert-danger alert-dismissible " role="alert" style="display:none;" id="mensaje">
                    <!-- aca se ven los mensajes de error -->
                  </div>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" required="" id="usuario" name="usuario"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contrase&ntilde;a" id="clave" required="" name="clave"/>
              </div>
              <div>
                <!-- <a class="btn btn-default submit" href="index.html">Log in</a> -->
                <button class="btn btn-primary" id="btnIngresar">Ingresar</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-wrench"></i> Ferreter&iacute;a</h1>
                  <p> Privacy and Terms Developer Lucas Nahuel</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <!-- <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div> -->
      </div>
    </div>
    <script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>vendors/jquery/dist/jquery.validate.min.js"></script>
    <script>
            $("#form_inicioSesion").validate({
                rules:{
                    clave:{required:true},
                    usuario:{required:true}
                },
                messages:{ 
                    clave:{required:"Ingrese su clave para acceder"},
                    usuario:{required:"Ingrese su usuario para acceder"}
                },
                submitHandler: function(formulario){
                    //una bez de clicl desabilito el boton
                    $("btnIngresar").prop("disabled",true);
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url();?>Login",
                        data:$("#form_inicioSesion").serialize(),
                        dataType:"json", //espero un json como respuesta
                        success:function(datos_esperados){
                            $("#mensaje").empty();//quito cualquier mensaje previamente mostrado
                            $("#mensaje").removeClass();//remuevo la clase css
                            $("#mensaje").addClass(datos_esperados.clase_css);
                            //clases_css sera la respuesta enviada por el controlador
                            $("#mensaje").append(datos_esperados.mensaje);
                            //mensaje que sera la respuesta enviada por el controlador
                            $("#mensaje").show();//muestro el mensaje
                            if(datos_esperados.respuesta ==1){
                                //respuesta sera la respuesta enviada por el controlador 
                                //si la respuesta es 1 como succes que nos diriga a la pagina de inicio
                                // ahora ponemos una función en JavaScript que carga una nueva URL en el navegador y reemplaza la entrada actual en el historial del navegador, lo que significa que el usuario no puede volver a la página anterior utilizando el botón de retroceso del navegador.
                                window.location.replace("<?php echo base_url();?>Bienvenido");
                            }
                        }
                       
                    })
                }

            });
            
    </script>
  </body>
</html>
