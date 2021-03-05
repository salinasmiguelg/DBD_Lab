<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- Titulo de pagina -->
    <title>Feriinf</title>
  </head>

  <body>
    <!-- Cabecera de la pagina de Pago -->
    <div class="jumbotron">
      <h1 class="text-center">Compra completa</h1>
      <p class="text-center">Muchas gracias!</p>
      <div class="col bs-linebreak"></div>
      <p class="text-center">A continuación su comprobante y los detalles</p>
    </div>

    <!-- Contenedor texto con informacion del comprobante-->
    <div class = "container">
              
          <!-- formularios de texto con la informacion del comprador -->
          <div class="card" style="width: 100%;">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">Nombres: </li>
                  <li class="list-group-item">Correo Electronico: </li>
                  <li class="list-group-item">Rut: </li>
                  <li class="list-group-item">Telefono: </li>
                  <li class="list-group-item">Dirección de Despacho: </li>
                  <li class="list-group-item">Método de pago: </li>
                  <li class="list-group-item">Tipo de despacho: </li>
                  <li class="list-group-item">Total Pagado: </li>
              </ul>
          </div>

    <!--Boton que lleva a la pagina principal -->
    <div class="row">
  <div class="col-md-8"></div>
  <a href="/" class="btn btn-success">Página principal</a>
</div>    

  <!--Footer de la pagina -->
    <div class = "footer">
            FERIINF - Online Market - 2021
    </div>

  </body>
</html>

  <style>

    .color1{
        background-color:#3a7658;
        color: #ffffff;

    }
    .color2{
        background-color:#235434;
        color: #ffffff;
    }
    .color3{
        background-color:#032107;
        color: #ffffff;
    }
    .color4{
        background-color:#a7dcb2;
        color: #ffffff;
    }
    .color5{
        background-color:#81be4d;
        color: #ffffff;
    }
    .color6{
        background-color:#3a7658;
    }
    body {
        padding-bottom: 20px;
        background-color: #81be4d;
    }
    .container-text{
      background-color:#235434;
      color: white;
      font-size: 20px;
      margin-left: 5%;
      margin-right: 5%;
      margin-top: 1%;
      border-radius: 5px;
    }
    .container{
        background-color:#235434;
        color: white;
        border-radius: 5px;
        padding: 1%;
    }
    .list-group-item{
        color: black;
    }
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #032107;
        color: white;
        text-align: center;
    }
    .first-title{
      text-align: center;
      font-size: 30px;
    }
    .jumbotron{
        background-image: url("https://foodandtravel.mx/wp-content/uploads/2020/05/Frutas-y-verduras-de-temporada-Por.jpg");
        background-size: cover;
        color: white;
    }
</style>