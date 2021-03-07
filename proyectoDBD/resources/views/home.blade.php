<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Feriinf</title>
  </head>
  <body>

    <!-- apartado superior -->

    <div class = "container-fluid ">
        <div class="row color1">
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
                    @if($rol->nombre == "Vendedor")
                    <li class="nav-item">
                        <a class="nav-link" href="/crearProducto/{{$user->id}}">Crear Producto</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/">Cerrar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="/home/{{$user->id}}">Página principal</a>
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
        <!-- barras de navegacion-->
        <div class="row  text-center color1">
            <div class="col-sm border border-dark">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle color7" href="http://example.com/" id="dropdown01" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Comunas</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        @forelse($comuna as $comuna)
                        <a class="dropdown-item" href="/puestos/{{$comuna->id}}/{{$user->id}}">{{$comuna->nombre}}</a>
                        @empty
                        <p>No Funciona</p>
                        @endforelse

                    </div>
                </div>
            </div>
            
            <div class="col-sm border border-dark">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle color7" href="http://example.com/" id="dropdown01" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                    @forelse($producto as $producto)
                    <?php
                        $k = 1;
                        $array[] = "oo"; 
                        for($i = 0; $i < count($array); $i++){
                            if("{$producto->nombreProducto}" == $array[$i]){
                                $k = 0;
                            }
                        }
                        if($k == 1){
                            $array[] = "{$producto->nombreProducto}";
                        }
                    ?>
                    @if($k == 1)
                    <a class="dropdown-item" href="/feriantes/{{$producto->nombreProducto}}/{{$user->id}}">{{$producto->nombreProducto}}</a>
                    @endif
                    @empty
                    <a class="dropdown-item">No hay Productos</a>
                    @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--
    <div class = "container-fluid">
        <div class = "alert alert-success">
            Se ha añadido correctamente el producto al carro
            <a href="/carro/{{$user->id}}">Ver carro</a>
        </div>
    </div>
-->



    <div class = "text-center">

            <!--
        <img src="https://i.ibb.co/L5mx9H3/HKMFWLPZ2-FDXPETCBS4-EG5-GE6-I.jpg" alt="HKMFWLPZ2-FDXPETCBS4-EG5-GE6-I" border="0">
        </div>
        -->
        <!--hola-->
        <div class="container-fluid">

            <div class="bg-image border-0 container-fluid" >

            <div class = "container-fluid   ">
                <h1>No necesitas salir para obtener la mejor fruta</h1>
                <p> Nos aseguramos de que nuestros productos sean frescos y seguros</p>
                <div class="row  row-cols-md-3  card-deck container-fluid">

                    @forelse($producto1 as $producto1)
                    <form action="{{route('agregarProducto')}}" method="POST">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="id_productos" value= "{{$producto1->id}}">
                                    <input type="hidden" name="id_transaccions" value= "{{$user->id}}">
                                    <h4 class="card-title">{{$producto1->nombreProducto}}</h4>
                                    <p class="card-text">El precio del producto1 es: {{$producto1->precioUnitario}} CLP</p>
                                    <p class="card-text">Stock: {{$producto1->stock}}</p>
                                    <input class="numeraco container-fluid"type="number" name="cantidad" value= "1">
                                    <button type="submit" class="btn color1 px-4 container-fluid">Agregar al Carrito</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @empty
                    <div class="alert alert-info px-4" role="alert">
                        No hay productos
                    </div>
                    @endforelse
                </div>
            </div>




        </div>
    <div class = "end-50 bottom text-center">
        <p class = "text-muted text-white padding_up">
            FERIINF - Online Market - 2021
        </p>
    </div>

    </div>
</div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<style>


body{


        background-color:#a7dcb2;


    }

    .bg-image{
        background-image: url('https://static.vecteezy.com/system/resources/previews/000/812/118/non_2x/grocery-shopping-cart-with-vegetables-and-fruits-photo.jpg');

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
    .card{
        min-width: 200px;
        margin: 10px;
    }
    .card-body{



            text-align: center;

            min-width: 200px;

            font-size: 15px;

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
        color: #000000;

    }
    .color7{
        color: #ffffff;
    }


    .navbar {
        margin-bottom: 20px;
    }

</style>
