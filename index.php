<?php
  if (!file_exists('./archivos/configuracion/basedatos.php')) {
    if (isset($_POST) && !empty($_POST)) {
      $archivoConfiguracion = './archivos/configuracion/basedatos.php';
      if (!$archivo = fopen($archivoConfiguracion, "x")){
          echo "No se ha podido crear la configuracion";
      } else {
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $servidor = $_POST['servidor'];
        $controlador = $_POST['controlador'];
        $texto = "
        <?php
          return array(
            'BD_Controlador' => '$controlador',
            'BD_Servidor' => '$servidor',
            'BD_Usuario' => '$usuario',
            'BD_Clave' => '$clave',
            'BD_Nombre' => '$nombre',
            'BD_Caracter' => 'utf8'
          );
        ?>";
        $archivo = fopen($archivoConfiguracion, "w");
        fwrite($archivo, $texto);
        fclose($archivo);
        echo "<meta http-equiv='refresh' content='0; URL=index.php'";
      }
    }
?>
  <!DOCTYPE html>
  <html lang="es" dir="ltr">
    <head>
      <!-- METADATOS -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Empecemos configurando la base de datos.">
      <title>Primero lo esencial</title>
      <!-- ESTILOS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="./archivos/estilos/estilos.css">
      <!-- SCRIPTS -->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script src="./archivos/scripts/scripts.js"></script>
    </head>
    <body>
      <div class="valign-wrapper" style="width: 100%; height: 100%; position: absolute;">
        <div class="container">
          <div class="row">
            <div class="col s12 m12 l12">
              <form role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                <div class="card">
                  <div class="card-content">
                    <p>A continuación deberás introducir los detalles de conexión a tu base de datos. Si no estás seguro de esta información contacta con tu proveedor de alojamiento web.</p><br>
                    <div class="container">
                      <div class="row">
                        <div class="input-field col s12 m6 l6">
                          <input id="nombre" name="nombre" type="text" required>
                          <label for="nombre">Nombre de la base de datos</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                          <input id="usuario" name="usuario" type="text" required>
                          <label for="usuario">Nombre de usuario</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                          <input id="clave" name="clave" type="password">
                          <label for="clave">Contraseña</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                          <input id="servidor" name="servidor" type="text" required>
                          <label for="servidor">Servidor</label>
                        </div>
                        <div class="input-field col s12">
                          <select name="controlador">
                            <option value="dblib" selected>MS SQL</option>
                            <option value="mysql">MySQL</option>
                            <option value="oci">Oracle</option>
                            <option value="pgsql">PostgreSQL</option>
                          </select>
                          <label>Controlador</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-action">
                    <button name="aceptar" class="waves-effect waves-light btn" type="submit" >Aceptar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>
<?php
} else {
?>
    <!DOCTYPE html>
    <html lang="es" dir="ltr">
      <head>
        <!-- METADATOS -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Inicia sesión con tus datos.">
        <title>Inicia sesión</title>
        <!-- ESTILOS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="./archivos/estilos/estilos.css">
        <!-- SCRIPTS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="./archivos/scripts/scripts.js"></script>
      </head>
      <body>
        <div class="valign-wrapper" style="width: 100%; height: 100%; position: absolute;">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <form role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                  <div class="card">
                    <div class="card-content">
                      <div class="container">
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="fas fa-id-card prefix"></i>
                            <input id="usuario" name="usuario" type="text" class="validate" required>
                            <label for="usuario">Usuario</label>
                          </div>
                          <div class="input-field col s12">
                            <i class="fas fa-lock prefix"></i>
                            <input id="clave" name="clave" type="password" required>
                            <label for="clave">Contraseña</label>
                          </div>
                          <div>
                            <label style="float: right;"><a href="./olvida.php" id="olvidar"><b>¿Olvidó su contraseña?</b></a></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-action center-align">
                      <a href="./registra.php" style="color: #037DBA;">Regístrate</a>
                      <button name="iniciar" class="waves-effect waves-light btn" type="submit">Iniciar sesión</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </body>
    </html>
<?php
  }
?>
