<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <title>Perfil</title>
  </head>
  <body>
    <h1 class = "first-title">Perfil</h1>
    <div class = "container-text">
      <p>Nombre: {{$user->nombre}}</p>
      <p>Apellido: {{$user->apellido}}</p>
      <p>Número Telefónico: {{$user->numeroTelefono}}</p><!--se puede cambiar-->
      <p>Email: {{$user->email}}</p>

      @forelse($direccion as $direccion)
      <p>Dirección: {{$direccion->calle}}, {{$direccion->numero}} </p>
      @empty
      <p>Dirección: No posee dirección </p>
      @endforelse

      @forelse($region as $region)
      <p>Región: {{$region->nombre}} </p>
      @empty
      <p>Región: No posee región </p>
      @endforelse


      @forelse($comuna_user as $comuna_user)
      <p>Comuna: {{$comuna_user->nombre}} </p>
      @empty
      <p>Comuna: No posee región </p>
      @endforelse

      @forelse($rol as $rol)
      <p>Rol: {{$rol->nombre}} </p>
      @empty
      <p>Rol: No posee rol </p>
      @endforelse

    </div>
    <a href="/perfil/edit/{{$user->id}}" class="btn btn-success">Editar Perfil</a>
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
      margin-left: 45%;
    }


</style>
