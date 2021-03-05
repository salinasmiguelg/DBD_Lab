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
                <a class="navbar-brand" href="/">Feriinf</a>
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
                    <!--
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="http://example.com/" id="dropdown01" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                      <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/examples/navbars/#">Action</a>
                        <a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/examples/navbars/#">Another action</a>
                        <a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/examples/navbars/#">Something else here</a>
                      </div>
                    </li>
                    -->
                  </ul>
                  <form class="form-inline my-2 my-md-0">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                  </form>
                </div>
              </nav>

        </div>
        <!-- barras de navegacion-->
        <div class="row  text-center color1">
            <div class="col-sm border border-dark">
                Fruta
            </div>
            <div class="col-sm border border-dark">
                Verdura
            </div>
            <div class="col-sm border border-dark">
                Herramientas
            </div>
            <div class="col-sm border border-dark">
                Limpieza
            </div>
            <div class="col-sm border border-dark">
                Cocina
            </div>
        </div>
    </div>



    <section id="showcase" >
        <div class = "container text-xl-center">
            <h1>No necesitas salir para obtener la mejor fruta</h1>
            <p> Nos aseguramos de que nuestros productos sean frescos y seguros</p>
        </div>
    </section>
    <div class = "container-fluid text-center">
        <div class ="row center imagen">
        <img src="https://i.ibb.co/L5mx9H3/HKMFWLPZ2-FDXPETCBS4-EG5-GE6-I.jpg" alt="HKMFWLPZ2-FDXPETCBS4-EG5-GE6-I" border="0">
        </div>

    </div>
    <div class = "end-50 bottom text-center">
        <p class = "text-muted padding_up">
            FERIINF - Online Market - 2021
        </p>
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
    .imagen{


        border-radius: 5px;
        height: 70%;
        width: 1000px;
        text-align: center;
        font-size: 20px;
        position: relative;
        margin-top: center;
        margin-bottom: center;
        margin-left: 425px;
        margin-right: center;


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
    body {
        padding-bottom: 20px;
    }

    .navbar {
        margin-bottom: 20px;
    }

</style>
