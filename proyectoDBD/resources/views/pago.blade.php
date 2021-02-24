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
    <h1 class = "first-title">Proceso de Pago</h1>

    <div class="container">

        <div class="col-sm-4">Datos Personales
            
            <form>
                <div class="mb-3">
                    <label for="ejemploNombre" class="form-label">Nombre</label>
                    <input type="nombre" class="form-control" id="ejemploNombre" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="ejemploCorreo" class="form-label">Correo Electronico</label>
                    <input type="correo" class="form-control" id="ejemploCorreo" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="ejemploTelefono" class="form-label">Telefono</label>
                    <input type="telefono" class="form-control" id="ejemploTelefono" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="ejemploDireccionDespacho" class="form-label">Direccion Despacho</label>
                    <input type="direccionDespacho" class="form-control" id="ejemploDireccionDespacho" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="ejemploNotas" class="form-label">Notas Adicionales</label>
                    <input type="Notas" class="form-control" id="ejemploNotas" aria-describedby="emailHelp">
                </div>

                <select class="form-select" aria-label="seleccion metodo pago">
                    <option selected>Método de Pago</option>
                    <option value="1">Efectivo</option>
                    <option value="2">Debito/credito</option>
                    <option value="3">Deposito</option>
                </select>

                <select class="form-select" aria-label="Seleccion retiro/despacho">
                    <option selected>Tipo Entrega</option>
                    <option value="1">Retiro Personal</option>
                    <option value="2">Despacho a Domicilio</option>
                </select>

            </form>
        
        </div>

            <div class="col-sm-4">Elementos a comprar
                <div class = "container-text">
                
                </div>
            </div>

            
    </div>

    <button type="submit" class="btn btn-primary">Pagar</button>

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