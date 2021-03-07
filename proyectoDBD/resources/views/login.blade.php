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
                              <a class="nav-link  " href="/registro">Registrarse </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link disabled " href="/login">Inicio de sesión<span class="sr-only">(current)</span> </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="/">Página principal </a>
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

                        <form class = "form-sigin  position-relative" action = "{{route('userValidate')}}" method = "GET">
                            <div class = "form-group position-relative ">

                                <h3 class= "card-title position-relative">Iniciar Sesión</h3>
                                <input name = "email" id="inputEmail" class="form-control rounded-pill" placeholder="Correo Electrónico" required="" autofocus="">

                                <input name = "contraseña" id = "inputPassword" class = "form-control rounded-pill" placeholder="Contraseña" required="" autofocus="">


                                <div class = "checkbox mb-4">
                                    <label>
                                        <input type = "checkbox" value = "remember-me"> Guardar Sesión
                                    </label>
                                </div>

                                <div class = "boton text-center">
                                    <button type="submit" class="btn color3">Iniciar</button>
                                </div>
                            </div>
                        </form>
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
                    </div>


                    </div>
                    <div class="footer">
                        FERIINF - Online Market - 2021
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
</html>

<style>

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

    @media (min-width: 500px) {
        .form-sigin{
            margin-top: 300px;
            margin-bottom: 80px;
            padding: 80px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 30%;
            background-color: #81be4d;
            border-radius: 20px;
            text-align: center;

        }
    }

    @media (min-width: 250px) {
        .form-group{

            min-width: 500px;
            position: absolute;
            text-align: center;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 20px;
        }

        .rounded-pill{
        width: 350px;
        margin-left: auto;
        margin-right: auto;
        }


    }
    body{
        background-color:#a7dcb2;
    }
    /*
    .rounded-pill{
        width: 350px;
        margin-left: auto;
        margin-right: auto;

    }*/

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
