<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <title>Editar Perfil</title>
  </head>
  <body>
    <h1 class = "first-title">Editar Perfil</h1>
    <div class = "container-text">
    <form class = "container-form">
      <label for="disabledTextInput" class="form-label">Número Telefónico</label>
      <input type="text" class="form-control" value="Número actual">
      <label for="disabledTextInput" class="form-label">Región</label>
      <input type="text" class="form-control" value="Región actual">
      <label for="disabledTextInput" class="form-label">Comuna</label>
      <input type="text" class="form-control" value="Comuna actual">
      <label for="disabledTextInput" class="form-label">Dirección</label>
      <input type="text" class="form-control" value="Dirección actual">
    </form>
    </div>
    <a href="/perfil" class="btn btn-success">Guardar Cambios</a>
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
      padding: 1%;
    }
    .first-title{
      text-align: center;
      font-size: 30px;
    }
    .btn{
      margin-top: 3%;
      margin-left: 44%;
    }
    .form-control{
      margin-top:1%;
    }


</style>
