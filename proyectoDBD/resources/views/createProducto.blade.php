<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel= "canonical" href = "https://getbootstrap.com/docs/4.0/examples/sig-in/">

    <title>Feriinf</title>
  </head>
  <body>
  <div class = "container-fluid ">
            <div class = "row">
                <div class="color1">
                    <nav class="navbar navbar-dark ">

                        <a class="navbar-brand" href="/home/{{$user->id}}">
                    <img alt="Logo" src="https://i.ibb.co/txhWnGx/logotipo-feria-de-osorno-1.png"
                    width=200" height="50">
                </a>
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
                                <a class="nav-link" href="/carro/{{$user->id}}">Carrito</a>
                            </li>
                            <li class="nav-item">
                            @if($rol->nombre == "Vendedor")
                            <li class="nav-item">
                                <a class="nav-link disalbed" href="/crearProducto/{{$user->id}}">Crear Producto</a>
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
                <div class="bg-image border-0 container-fluid" >
                <div class = "col">
                    <div class = "container fluid">

                      <h1 class = "first-title text-white">Crear Producto</h1>
                      <div class = "container-text">
                      <form action="{{route('crearProducto')}}" method="POST">
                      <div class="mb-3">
                        <label for="formGroupExampleInput">Nombre del producto</label>
                        <input class="form-control" type="text" name="nombreProducto">
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput">Precio por unidad</label>
                        <input class="form-control" type="number" name="precioUnitario">
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput">Stock disponible</label>
                        <input class="form-control" type="number" name="stock">
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput">Categoria</label>
                        <input class="form-control" type="text" name="categoria">
                      </div>
                      <div class="mb-3"><!-- ocultar esto -->
                        <input class="hidden" type="hidden" name="id_cantidads" value = {{$user->id}}>
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput">Region del puesto</label>
                        <input class="form-control" type="text" name="nombreRegion">
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput">Comuna del puesto</label>
                        <input class="form-control" type="text" name="nombreComuna">
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput">Nombre de Feria</label>
                        <input class="form-control" type="text" name="nombreFeria">
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput">Nombre de Puesto</label>
                        <input class="form-control" type="text" name="nombrePuesto">
                      </div>
                        <button type="submit" class="btn btn-primary px-4 " >Agregar Producto</button>
                      </form>
                      </div>
                        <!--
                        <p class = "mt-4 text-center">¿No posees cuenta?
                            <a href="/register">Registrarse</a>
                        </p>
                        -->

                        <!--
                        <div class = "container-fluid">
                            <div class ="row center">
                            <img src="https://i.ibb.co/L5mx9H3/HKMFWLPZ2-FDXPETCBS4-EG5-GE6-I.jpg" alt="HKMFWLPZ2-FDXPETCBS4-EG5-GE6-I" border="0">
                            </div>

                        </div>
                        -->

                        <div class="footer">
                             FERIINF - Online Market - 2021
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>

<style>

.bg-image{
    background-image: url('https://i.ibb.co/QNPt6Dt/Feria-web.jpg');
    background-size: cover;
    height: 100vh;
    padding: 0;
    margin: 0;
    background-repeat: no-repeat;
    background-position: center center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    border: none;
        /*
        border-radius: 5px;
        height: 70%;
        width: 1000px;
        text-align: center;
        font-size: 20px;
        position: relative;
        margin-top: center;
        margin-bottom: center;
        margin-left: 425px;
        margin-right: center;*/


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
      background.color: #81be4d;
    }
    .form-control{
      margin-top:1%;
    }


</style>
