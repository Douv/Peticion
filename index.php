<?php

  //session_start();
  define("BASE_URL", "http://localhost/peticion/");

  $dsn     = "mysql:host=localhost; dbname=peticion; charset=utf8";
  $user    = "root";
  $pass    = "";
  $charset = 'utf8mb4';

  try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

  //global $pdo;

  if (isset($_POST['sendForm'])) {
    $nombre    = htmlspecialchars(trim(stripcslashes($_POST['nombre'])));
    $email     = htmlspecialchars(trim(stripcslashes($_POST['email'])));
    $dni       = htmlspecialchars(trim(stripcslashes($_POST['dni'])));
    $provincia = htmlspecialchars(trim(stripcslashes($_POST['provincia'])));

    if (empty($nombre) or empty($email) or empty($dni) or empty($provincia)) {
      echo "<script> alert('¡Algún campo quedó incompleto. Recordá que todos los campos son obligatorios!')</script>";
    }else{
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('¡Formato de e-mail inválido!')</script>";
      }else{
        $stmt = $pdo->prepare("INSERT INTO `firmas` ( `nombre`, `email`, `dni`, `provincia`) VALUES(:nombre, :email, :dni, :provincia )");  
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":dni", $dni, PDO::PARAM_STR);
        $stmt->bindParam(":provincia", $provincia, PDO::PARAM_STR);

        if ($stmt->execute()) {
          echo "<script> alert('¡Gracias por su firma!')</script>";
        }else{
          echo "¡Hubo un problema al registrar la firma!"; die;
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Petición Emma Riosendaulv Joncka</title>
    <!-- MDB icon -->
    <link rel="icon" href="" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
      <!-- Main navigation -->
        <header>
          <!-- Full Page Intro -->
          <div class="view" style="background-image: url('img/Big-Jonck.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <!-- Mask & flexbox options-->
            <div class="mask rgba-gradient align-items-center">
              <!-- Content -->
              <div class="container pt-5">
                <!--Grid row-->
                <div class="row">
                  <!--Grid column-->
                  <div class="col-md-6 white-text text-center text-md-left mb-5 wow fadeInLeft" data-wow-delay="0.3s">
                    <h3 class="h3-responsive text-center font-weight-bold mt-sm-5">JONCKA EMMA RIOSENDAULV </h3>
                    <div class="mt-5 row">
                      <div class="col-4">
                        <p class="mt-3 text-md-right">05/11/1997</p>
                      </div>
                      
                      <div class="col-4"><img class="img-fluid" width="200px" src="img/flag.jpeg" alt=""></div>
                     
                      <div class="col-4">
                        <p class="mt-3">10/04/2020</p>
                      </div>
                    </div>
                    <hr class="hr-light mt-5">
                    <p class="text-justify mb-4"> Joncka Emma Riosendaulv, era un joven haitiano de 23 años que vivía en Rosario desde hace dos años donde estudiaba Ingenería Mecánica en la UNR (Universidad Nacional de Rosario). Perdió su vida trágicamente el viernes 10 de Abril 2020 cerca de la 22:30 cuando un colectivo de la empresa MOVI línea 113 lo atropelló y lo mató con su moto mientras trabajaba como cadete para una de las plataformas de entregas. (Nosotros, la comunidad haitiana en argentina, pedimos que se haga luz en el caso...) <a href="#leermas" class="black-text font-weight-bold"><u>Leer más</u></a>
                    </p>
                    <a type="button" data-toggle="modal" data-target="#centralModalSm" class="btn btn-white">FIRMAR CARTA</a>
                    <!--<a href="#leermas" class="btn btn-outline-white">Leer más</a>-->
                  </div>
                  <!--Grid column-->
                  <!--Grid column-->
                  <div class="col-md-6 col-xl-5 mt-xl-5 wow fadeInRight" data-wow-delay="0.3s">
                    <img src="img/Big-Jonck.jpeg" alt="" class="img-fluid">
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div>
              <!-- Content -->
            </div>
            <!-- Mask & flexbox options-->
          </div>
          <!-- Full Page Intro -->
        </header>
      <!-- main navigation -->

      <!-- encabezado con escudo haitiano -->
        <div class="container-fluid blue-grey lighten-5">
          <div class="row">
            <div class="container-fluid text-center">
              <img src="img/logohaiti.png" width="200px" class="img-fluid py-3" alt="escudo de haiti">
              <h4 class="h4-responsive"><u>LA COMUNIDAD HAITIANA EN ARGENTINA</u></h4>
              <a name="leermas">
                <h6 class="h6-responsive font-weight-bold pt-3">CARTA DE SIMPATIA Y PEDIDO DE CLARIFICACION PUBLICA <br> A LAS AUTORIDADES COMPETENTES.</h6>
              </a>
            </div>
          </div>
        </div> 
      <!-- encabezado con escudo haitiano -->


      <!-- texto de la peticion -->
          <div class="container-fluid blue-grey lighten-5">
            <!--Section: Content-->
            <section class="text-center black-text">

              <!--Grid row-->
              <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="col-lg-9">
                  <p class="text-right">Fecha : 15/04/2020, Argentina.</p>

                  <p class="text-justify">
                    El día 10 de Abril de 2020, alrededor de las 22:30 P.M, se nos informó acerca de un trágico accidente ocurrido entre la avenida Francia y la calle Cerrito situadas en la ciudad de Rosario (Provincia de Santa Fe), donde lamentablemente perdió la vida un compatriota.  La línea 113 del colectivo del transporte público de pasajeros de la mencionada ciudad atropelló a nuestro querido hermano: <strong>Emma Riosendaulv Joncka</strong>. Sin duda alguna, esta irreparable pérdida afecta a todos los miembros de la comunidad haitiana en Argentina. Nos invade un profundo e indescriptible dolor. Por tanto, queremos expresar, ante todo, nuestras sinceras condolencias a sus padres, a sus hermanos, a los demás parientes y allegados afligidos por su dramática e inesperada partida de este mundo.
                  </p>
                  <p class="text-justify">
                    Es menester subrayar que, cuando ocurrió el trágico hecho, <strong>Emma</strong> se encontraba trabajando como repartidor a domicilio de insumos esenciales para la ciudadanía durante la pandemia que es de público conocimiento para la compañía <strong>PEDIDOS YA</strong>. Además, se encontraba en regla con todos los requisitos exigidos para desarrollar esa actividad enmarcada dentro de las actividades exceptuadas previstas en el <strong>DNU 297/2020, (Art. 6, Apartado 19 y Art. 6, Apartado 21).</strong>
                  </p>
                  <p class="text-justify">
                    Antes de terminar, es importante señalar que estamos indignados y sorprendidos por las opiniones e informaciones difundidas por algunos medios masivos ya que son totalmente contradictorias a <u>cómo</u> sucedió esa tragedia. Por ejemplo, afirman que <strong>Emma</strong> venía a gran velocidad y chocó al colectivo. Algo falso, pues el cuerpo de nuestro compatriota al igual que su moto se encontraban delante del vehículo de transporte público sobre una vía unidireccional. Por lo tanto, 
                    <u>es claro e indiscutible que</u> <strong>Emma</strong> fue atropellado por el colectivo. Las cámaras de seguridad sobre la Avenida, en permanente funcionamiento durante todo el día, evidencian lo ocurrido. 
                  </p>
                  <p class="text-justify">
                    Por todo ello, esperamos la clarificación pública del hecho por parte de la Fiscalía a cargo como así también de las demás Instancias Estatales competentes. <br>
                    Entre tanto, nos queda por expresar, una vez más, nuestros sinceros sentimientos de condolencia a sus padres y a todos/as que comparten al igual que nosotros este dolor inmenso e indescriptible.
                  </p>
                </div>
                <!--Grid column-->
              </div>

              <!-- boton de firma -->
                <div class="pb-5">
                  <a type="button" data-toggle="modal" data-target="#centralModalSm" class="btn btn-primary">FIRMAR CARTA</a>
                </div>
              <!-- boton de firma -->

              <!--Grid row-->
            </section>
            <!--Section: Content-->
          </div>
      <!-- texto de la peticion -->    

      <!-- Footer -->
        <footer class="page-footer font-small blue"> 

          <!-- Copyright -->
          <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> COMUNIDAD HAITIANA EN ARGENTINA</a>
          </div>
          <!-- Copyright -->

        </footer>
      <!-- Footer -->

      <!-- Central Modal Small -->
        <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">

          <!-- Change class .modal-sm to change the size of the modal -->
          <div class="modal-dialog modal-md" role="document">


             <div class="modal-content">
              <!--Header-->
              <div class="modal-header text-center">
                <h4 class="modal-title black-text w-100 font-weight-bold py-2">Complete con tus datos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="white-text">&times;</span>
                </button>
              </div>
              <form  action="index.php" method="post">
                <!--Body-->
                <div class="modal-body">
                  <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="form1" name="nombre" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form1">Nombre</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="email" id="form2" name="email" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form2" required> E-mail</label>
                  </div>
                  <div class="md-form mb-5">
                    <i class="fas fa-id-card prefix grey-text"></i>
                    <input type="text" id="form3" name="dni" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form3">Documento</label>
                  </div>
                  <div class="md-form mb-5">
                    <i class="fas fa-map-marker-alt prefix grey-text"></i>
                    <input type="text" id="form4" name="provincia" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form4">Provincia</label>
                  </div>  
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                  <button type="submit" name="sendForm" class="btn btn-primary waves-effect">Enviar <i class="fas fa-paper-plane-o ml-1"></i></button><!-- outline-grey -->
                </div>
              </form> 
            </div>
          </div>
        </div>
      <!-- Central Modal Small -->
    
    <!-- End your project here-->

      <!-- jQuery -->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="js/popper.min.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="js/mdb.min.js"></script>
      <!-- Your custom scripts (optional) -->
      <script type="text/javascript">
        // Animations init
        new WOW().init();
      </script>

  </body>
</html>
