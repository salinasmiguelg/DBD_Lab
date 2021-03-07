<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel= "canonical" href = "https://getbootstrap.com/docs/4.0/examples/sig-in/">

    <title>Puestos</title>
  </head>
  <body>




  <div class = "container-fluid ">
  

            <div class = "row">
                <div class="color1">
                    <nav class="navbar navbar-dark ">
                        <a class="navbar-brand" href="/home/{{$user->id}}">Feriinf</a>
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="navbar-collapse collapse" id="navbarsExample01" >
                        <ul class="navbar-nav mr-auto">
                            <h5 class = "nav-item">{{$user->nombre}}</h5>
                            <li class="nav-item">
                                <a class="nav-link" href="/perfil/{{$user->id}}">Perfil</a>
                            </li>
                            <li class="nav-item">
                            <li class="nav-item">
                                <a class="nav-link" href="/carro/{{$user->id}}">Carrito</a>
                            </li>
                            <li class="nav-item">
                            @if($rol->nombre == "Vendedor")
                            <li class="nav-item">
                                <a class="nav-link" href="/crearProducto/{{$user->id}}">Crear Producto</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="/">Cerrar sesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/home/{{$user->id}}">Página principal</a>
                            </li>
                          </ul>
                          <!--
                          <form class="form-inline my-2 my-md-0">
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                          </form>
                          -->
                        </div>
                    </nav>

                </div>

                <!-- titulo Pagina Pago -->
    <div class="jumbotron">
      <h1 class="text-center">Puestos</h1>
    </div>

                <div class = "col">
                    <div class = "container fluid">

                      <h1 class = "first-title">Localizados en: {{$comuna->nombre}}</h1>
                      @forelse($ferias_puesto as $ferias_puesto)
                      <div class = "card-columns">
                        <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Nombre de puesto: {{$ferias_puesto->descripcion}}</h5>
                            <p class="card-text">Categoría: {{$ferias_puesto->categoria}}</p>
                            <p class="card-text">Feria: {{$ferias_puesto->descripcion_feria}}</p>
                            <p class="card-text">Dueño: juanito </p>
                            <p class="card-text">Contacto: @usach.cl</p>
                            <!--
                            <a href="#" class="btn btn-primary">Agregar</a>
                            -->
                          </div>
                        </div>
                        @empty
                          <p> No se encontró ningún puesto: </p>
                        @endforelse


                      </div>

                        <!-- Footer de la pagina-->
                        <div class="footer">
                                FERIINF - Online Market - 2021
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
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
      background-color: #3a7658;
      color: white;
      margin: 1%;
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
    .jumbotron{
        background-image: url("https://foodandtravel.mx/wp-content/uploads/2020/05/Frutas-y-verduras-de-temporada-Por.jpg");
        background-size: cover;
        color: white;
    }
    .first-title{
      text-align: center;
      font-size: 30px;
      color: white;
    }
</style>
