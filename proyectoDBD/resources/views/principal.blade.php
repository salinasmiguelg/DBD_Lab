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

                <a class="navbar-brand" href="/">
                    <img alt="Logo" src="https://i.ibb.co/txhWnGx/logotipo-feria-de-osorno-1.png"
                    width=200" height="50">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarsExample01" >
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="/registro">Registrarse</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/login">Inicio de sesión</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="/">Página principal <span class="sr-only">(current)</span></a>
                    </li>

                  </ul>

                </div>
              </nav>

        </div>
        <!-- barras de navegacion-->
        <!--
        <div class="row  text-center color1">
            <div class="col-sm border border-dark ">
                <div class="dropdown ">
                    <a class="dropdown-toggle color7 " href="http://example.com/" id="dropdown01" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                      <div class="dropdown-menu " aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/examples/navbars/#">palta</a>
                        <a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/examples/navbars/#">Tomate</a>
                        <a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/examples/navbars/#">Lechuga</a>
                      </div>
                </div>
            </div>
            <div class="col-sm border border-dark ">
                <div class="dropdown ">
                    <a class="dropdown-toggle color7 " href="http://example.com/" id="dropdown01" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Comunas</a>
                      <div class="dropdown-menu " aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/examples/navbars/#">Lo Espejo</a>
                        <a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/examples/navbars/#">La Cisterna</a>
                        <a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/examples/navbars/#">Hechuraba</a>
                      </div>
                </div>
            </div>
        </div>
        -->
    </div>

    <div class="bg-image border-0 container-fluid" >

    <section id="showcase" >
        <div class = "container text-xl-center">
            <h1>No necesitas salir para obtener la mejor fruta</h1>
            <p> Nos aseguramos de que nuestros productos sean frescos y seguros</p>
        </div>
    </section>
    <div class="footer">
        FERIINF - Online Market - 2021
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
    background-image: url('https://i.ibb.co/P9MvwF6/grocery-shopping-cart-with-vegetables-and-fruits-photo.png');
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
        color: #000000;

    }
    .color7{
        color: #ffffff;
    }

    .navbar {
        margin-bottom: 20px;
    }

</style>
