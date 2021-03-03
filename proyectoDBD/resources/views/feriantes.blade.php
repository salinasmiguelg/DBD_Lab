<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <title>Feriantes</title>
  </head>
  <body>
    <h1 class = "first-title">Feriantes que venden: "minus"</h1>
    <div class = "card-columns">
      @forelse($user as $user)
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Nombre: {{$user->nombre}}</h5>
          <p class="card-text">Apellido: {{$user->apellido}}</p>
          <p class="card-text">Stock: </p>
          <a href="#" class="btn btn-primary">Agregar</a>
        </div>
      </div>
      @empty
      <p> No hay feriantes disponibles </p>
      @endforelse

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
    .card {
      background-color: #a7dcb2;
      margin: 1%;
    }
    .first-title{
      text-align: center;
      font-size: 30px;
    }
</style>
