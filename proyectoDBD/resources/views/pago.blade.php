<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <title>Proceso de Pago</title>
  </head>

  <body>
    <!-- titulo Pagina Pago -->
    <h1 class = "first-title">Proceso de Pago</h1>

    <!-- Grilla de 3 secciones -->
    <div class="container">

        <!-- Primera Seccion -->
        <div class="col-sm-4">Datos Personales
            
            <!-- formularios de texto con la informacion del comprador -->
            <form>
                <fieldset disabled>
                    <div class="mb-3">
                        <label for="ejemploNombre" class="form-label">Nombres</label>
                        <input type="nombre" class="form-control" id="ejemploNombre" placeholder="Victor Manuel">
                    </div>
                    <div class="mb-3">
                        <label for="ejemploNombre" class="form-label">Apellidos</label>
                        <input type="nombre" class="form-control" id="ejemploNombre" placeholder="Alarcón Gonzalez">
                    </div>
                    <div class="mb-3">
                        <label for="ejemploCorreo" class="form-label">Correo Electrónico</label>
                        <input type="correo" class="form-control" id="ejemploCorreo" placeholder="name@ejemplo.com">
                    </div>
                    <div class="mb-3">
                        <label for="ejemploTelefono" class="form-label">Teléfono</label>
                        <input type="telefono" class="form-control" id="ejemploTelefono" placeholder="+56 9 12 34 56 78">
                    </div>
                </fieldset>
            </form>
            <form>
                <div class="mb-3">
                    <label for="ejemploDireccionDespacho" class="form-label">Dirección Despacho</label>
                    <input type="direccionDespacho" class="form-control" id="ejemploDireccionDespacho" placeholder="Calle/Pasaje">
                </div>

                <!-- Selector 1 -->
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Método Pago </option>
                    <option>Efectivo</option>
                    <option>Debito/Crédito</option>
                    <option>Déposito</option>
                </select>

                <!-- Selector 2 -->
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Metodo Despacho </option>
                    <option>Tipo Entrega</option>
                    <option>Retiro Personal</option>
                    <option>Despacho a Domicilio</option>
                </select>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Ordenar y pagar</button>
                </div>

            </form>
        
        </div>
            <!-- Segunda seccion de Grilla -->
            <div class="col-sm-4">
            
            <!-- Tabal con elementos que estan en el carrito de compra del usuario -->
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>esta</td>
                            <td>tabla</td>
                            <td>Hay que</td>
                            <td>Rellenarla</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>con</td>
                            <td>datos</td>
                            <td>de</td>
                            <td>Carrito</td>
                        </tr>
                    </tbody>
                </table>
                <h4>Total: </h4> <h4> Numero! BD </h4>                
            </div>

            <!-- Tercera seccion de Grilla -->
            <div class="col-sm-4">   
                <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple113/v4/0e/c9/a6/0ec9a6b1-7398-4621-04cc-9d3739fab718/source/256x256bb.jpg  " class="img-fluid" alt="...">
            </div>

            
    </div>

    
    

  </body>

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

</hmtl>