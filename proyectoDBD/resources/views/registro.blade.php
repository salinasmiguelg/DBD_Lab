
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

        <div class = "container-fluid position-relative ">
            <div class = "row">
                <div class="color1">
                    <nav class="navbar navbar-dark ">
                        <a class="navbar-brand" href="/">Feriinf</a>
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="navbar-collapse collapse" id="navbarsExample01" >
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                              <a class="nav-link disabled " href="/registro">Registrarse<span class="sr-only">(current)</span> </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link " href="/login">Inicio de sesión</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="/">Página principal</a>
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

                <div class = "col ">
                    <div class = "container fluid">


                            <form class = "form-sigin  position-relative" action = "{{route('userStore')}}" method = "POST">
                                <div class = "form-group">
                                    <h3 class= "card-title position-relative">Registrarse</h3>
                                    <input name = "nombre"  class="form-control rounded-pill" placeholder="Nombre" required minlength="2" maxlength="30"  type =  "text" autofocus="">
                                    <input name = "apellido"  class="form-control rounded-pill" placeholder="Apellido" required minlength="2" maxlength="30"  type =  "text" autofocus="">
                                    <input name = "numeroTelefono"  class="form-control rounded-pill" placeholder="Número de teléfono" required minlength="9" maxlength="13"  type =  "text" autofocus="">
                                    <input name = "email"  class="form-control rounded-pill" placeholder="Correo Electrónico" required=""  type =  "text" autofocus="">
                                    <input name = "contraseña"  class = "form-control rounded-pill" placeholder="Contraseña" required minlength="8" maxlength="40"  type =  "text" autofocus="">
                                    <input name = "contraseña"  class = "form-control rounded-pill" placeholder="Repita la contraseña" required minlength="8" maxlength="40"  type =  "text" autofocus="">
                                    <input name = "nombreRegion"  class = "form-control rounded-pill" placeholder="Region" required minlength="2" maxlength="40"  type =  "text" autofocus="">
                                    <input name = "nombreComuna"  class = "form-control rounded-pill" placeholder="Comuna" required minlength="2" maxlength="40"  type =  "text" autofocus="">
                                    <input name = "nombreCalle"  class = "form-control rounded-pill" placeholder="Calle" required minlength="2" maxlength="40"  type =  "text" autofocus="">
                                    <input name = "nombreNumero"  class = "form-control rounded-pill" placeholder="Numero de la casa" required minlength="1" maxlength="40"  type =  "number" autofocus="">
                                    <!--
                                    <div class="form-check-inline">

                                          <input name = "nombreRol" type="checkbox" class="form-check-input" value="Vendedor">
                                          <label class="form-check-label">Vendedor</label>

                                      </div>
                                      <div class="form-check-inline">

                                          <input name = "nombreRol" type="checkbox" class="form-check-input" value = "Comprador">
                                          <label class="form-check-label">Comprador</label>

                                      </div>
                                    -->


                                        <div class="form-check-inline">
                                          <div class="form-check-inline">
                                            <input name = "nombreRol" class="form-check-input" type="radio" id="gridRadios1" value="Vendedor" checked>
                                            <label class="form-check-label">
                                              Vendedor
                                            </label>
                                          </div>
                                          <div class="form-check-inline">
                                            <input name = "nombreRol" class="form-check-input" type="radio" id="gridRadios2" value="Comprador">
                                            <label class="form-check-label">
                                              Comprador
                                            </label>
                                          </div>
                                        </div>
                                        <div class = "form-check-inline">
                                            <div class="form-check-inline">
                                                <input name = "esDepartamento" class="form-check-input" type="radio" id="gridRadios2" value="true" checked>
                                                <label class="form-check-label">
                                                Es Departamento
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input name = "esDepartamento" class="form-check-input" type="radio" id="gridRadios2" value="false">
                                                <label class="form-check-label">
                                                 Es Casa
                                                </label>
                                            </div>
                                        </div>




                                    <div class = "boton text-center">
                                        <button type="submit" class="btn color3">Registrarse</button>
                                    </div>

                                </div>
                            </div>



                            </form>

                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-sm">

                                  <!-- Modal content-->
                                  <div class="modal-content-sm">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h3 class="modal-title" id="modal-title">Usuario creado correctamente</h3>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>

                                </div>
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
    /*
    .form-sigin{
        -webkit-box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
        box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        padding: 500px 500px;
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
        display: block;
        margin-left: auto;
        margin-right: auto;

        color: #ffffff;
        background-color: #81be4d;
        border-radius: 5px;
        height: 50%;
        width: 500px;
        text-align: center;
        font-size: 20px;



    }
    .rounded-pill{
        width: 350px;
        margin-left: 75px;

    } */
    @media (min-width: 500px) {
        .form-sigin{
            margin-top: 300px;

            padding: 80px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 105%;
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
        .custom-select{
            width: 250px;

        }
        .input-group-prepend{
            width: 100px;

        }

    }
    .boton{
        margin-top: 10px;
    }
    body{
        background-color:#a7dcb2;
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
