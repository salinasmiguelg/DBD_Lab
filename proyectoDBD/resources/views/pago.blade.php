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
                <div class="mb-3">
                    <label for="ejemploNombre" class="form-label">Nombre</label>
                    <input type="nombre" class="form-control" id="ejemploNombre" placeholder="Victor Pérez">
                </div>
                <div class="mb-3">
                    <label for="ejemploCorreo" class="form-label">Correo Electrónico</label>
                    <input type="correo" class="form-control" id="ejemploCorreo" placeholder="name@ejemplo.com">
                </div>
                <div class="mb-3">
                    <label for="ejemploRut" class="form-label">Rut</label>
                    <input type="correo" class="form-control" id="ejemploRut" placeholder="12.345.678-9">
                </div>
                <div class="mb-3">
                    <label for="ejemploTelefono" class="form-label">Teléfono</label>
                    <input type="telefono" class="form-control" id="ejemploTelefono" placeholder="+56 9 12 34 56 78">
                </div>
                <div class="mb-3">
                    <label for="ejemploDireccionDespacho" class="form-label">Dirección Despacho</label>
                    <input type="direccionDespacho" class="form-control" id="ejemploDireccionDespacho" placeholder="Calle/Pasaje">
                </div>

                <!-- Cuadro de texto para informacion adicional -->
                <div class="form-floating">
                <label for="NotasAdicionales" class="form-label">Notas Adicionales</label>
                    <textarea class="form-control" placeholder="Notas adicionales para entrega" id="floatingTextarea"></textarea>
                </div>

                <!-- Selector 1 -->
                <select class="form-select" aria-label="seleccion metodo pago">
                    <option selected>Método de Pago</option>
                    <option value="1">Efectivo</option>
                    <option value="2">Débito/Crédito</option>
                    <option value="3">Depósito</option>
                </select>
                <!-- Selector 2 -->
                <select class="form-select" aria-label="Seleccion retiro/despacho">
                    <option selected>Tipo Entrega</option>
                    <option value="1">Retiro Personal</option>
                    <option value="2">Despacho a Domicilio</option>
                </select>

            </form>
        
        </div>
            <!-- Segunda seccion de Grilla -->
            <div class="col-sm-4">
            
            <!-- Cuadro de texto no modificable que muestra elementos que serna comprados -->
            <form>
                <fieldset disabled>
                    <legend>Elementos a comprar</legend>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Elementos del carrito!" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Total: </label>
                    </div>
                </div>
            </form>

            <!-- Tercera seccion de Grilla -->
            <div class="col-sm-4">   
                <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple113/v4/0e/c9/a6/0ec9a6b1-7398-4621-04cc-9d3739fab718/source/256x256bb.jpg  " class="img-fluid" alt="...">
            </div>

            <div class="row">
                <div class="col">
                    <a href="/pago/comprobante" class="btn btn-success">Ordenar y Pagar</a>
                </div>
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