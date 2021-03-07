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
                                <a class="nav-link" href="/carro/{{$user->id}}">Carrito</a>
                            </li>
                            <li class="nav-item">
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
                    <h1 class="text-center">Edite datos de su Perfil</h1>
                </div>

                <div class = "col">
                    <div class = "container fluid">
                      <div class = "container-text">
                      <form  action="{!! route('userUpdate', ['id'=>$user->id]) !!}" method="POST"style="padding-top:30px">
                                      @method('PUT')
                                      <div class="mb-3">
                                          <label for="formGroupExampleInput">Nombre</label>
                                          <input class="form-control" type="text"  name="nombre" value="{{$user->nombre}}" required minlength="3">
                                      </div>

                                      <div class="mb-3">
                                          <label for="formGroupExampleInput">Apellido</label>
                                          <input class="form-control" type="text"  name="apellido" value="{{$user->apellido}}" required minlength="3">
                                      </div>

                                      <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Numero de teléfono</label>
                                        <input type="number" class="form-control" name="numeroTelefono" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->numeroTelefono}}">
                                      </div>

                                      <button type="submit" class="btn btn-success" style="margin-left: 45%;">Listo</button>
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


</style>
