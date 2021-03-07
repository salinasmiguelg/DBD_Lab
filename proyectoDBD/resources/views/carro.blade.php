<?php
use App\Models\Producto;
?>
<!doctype html>
<html lang="es">
    <head>
        <meta http-equiv= "Content-Type" content = "text/html; charset=URF-8">
        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap CSS -->
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
                              <a class="nav-link disabled" href="/carro/{{$user->id}}">Carrito</a>
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

                <div class = "col ">
                    <div class = "container fluid">
                            <div class="row">
                                @forelse($transaccion_user as $transaccion_user)
                                <?php
                                    $idT = $transaccion_user->id_productos;
                                    $product = Producto::find($idT);
                                ?>
                                <div class="col-sm">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$product->nombreProducto}}</h5>
                                            <p class="card-text">Precio: {{$product->precioUnitario}}</p>
                                            <p class="card-text">Cantidad: {{$transaccion_user->cantidad}}</p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p>El carro se encuentra vacío</p>
                                @endforelse
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
                        <div class="row">
                            <a class="btn btn-primary btn-lg active" href = "/pago/{{$user->id}}">Pasar por caja</a>
                        </div>

                        <div class = "end-50 bottom text-center">
                            <p class = "text-muted padding_up">
                                FERIINF - Online Market - 2021
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
</html>

<style>

    .form-sigin{
        -webkit-box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
        box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        padding: 30px 25px;
        background-color: #ffffff;
    }
    @media (min-width: 580px) {
        .form-sigin {
        margin: 300px;
        }
    }
    @media (min-width: 250px) {
        .form-sigin{
            margin-top: 80px;
            margin-bottom: 80px;
            padding: 80px;

        }
    }
    body{
        background-color:#a7dcb2;
    }
    .form-group{
        position: absolute;
        color: #ffffff;
        background-color: #81be4d;
        border-radius: 5px;
        height: 50%;
        width: 500px;
        text-align: center;
        font-size: 20px;
        position: relative;


    }
    .rounded-pill{
        width: 350px;
        margin-left: 75px;

    }
    .boton{
        margin-top: 20px;
    }

    .form-control input[type='text'],
    .form-control input[type='email'],
    .form-control input[type='contraseña'] {
        padding-left: 60px;
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
</style>
