<?php
use App\Models\Producto;
?>
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
    <div class="jumbotron">
      <h1 class="text-center">Proceso de pago</h1>
      <p class="text-center"> Confirme su datos</p>
    </div>

    <!-- Grilla de 3 secciones -->
    <div class="container">

        <!-- Primera Seccion: Datos personales -->
        <div class="col-sm-4">
            <h4>Datos Personales</h4>
            
            <!-- formularios de texto con la informacion del comprador -->
            <form class = "form-sigin" action = "{{route('comprobanteStore', $user)}}" method = "POST">

                <div class="mb-3">
                        <div>
                            <label for="ejemploNombre" class="form-label"></label>
                            <input name="nombre" type="hidden" class="form-control" id="ejemploNombre" placeholder="Nombre" value="{{$user->nombre}}">
                        </div>
                        <div class="mb-3">
                            <label for="ejemploNombre" class="form-label"></label>
                            <input name="apellido" type="hidden" class="form-control" id="ejemploNombre" placeholder="Apellidos" value="{{$user->apellido}}" >
                        </div>
                        <div class="mb-3">
                            <label for="ejemploCorreo" class="form-label"></label>
                            <input name="direccionDespacho" type="correo" class="form-control" id="ejemploCorreo" placeholder="Direccion Despacho">
                        </div>

                        <div class="mb-3">
                            <label for="id_user" class="form-label"></label>
                            <input name="id_users" type="hidden" class="form-control" id="ejemploNombre" placeholder="" value = "{{$user->id}}" >
                        </div>
                    
                        <?php
                            $total1 = 0;
                        ?>
                        @forelse($transaccion_producto1 as $transaccion_producto1)
                            <?php
                                $idP = $transaccion_producto1->id_productos;
                                $product1 = Producto::find($idP);
                                $totalProducto1 = $product1->precioUnitario * $transaccion_producto1->cantidad;
                                $total1 = $total1 + $totalProducto1;
                            ?>
                        @empty
                            No hay productos en el carrito
                        @endforelse
                        <div class="mb-3">
                            <label for="monto" class="form-label"></label>
                            <input name="monto" type="hidden" class="form-control" id="ejemploNombre" placeholder="" value = "{{$total1}}" >
                        </div>
                        <div class="mb-3">
                            <label for="idT" class="form-label"></label>
                            <input name="idT" type="hidden" class="form-control" id="ejemploNombre" placeholder="" value = "{{$transaccion->id}}" >
                        </div>
                    

                </div>

            <div class="container-fluid">
                <!-- Selector 1 -->
                <select name="metodoPago" class="form-select" id="validationCustom04" required="">
                    <option selected="" disabled="" value="">Método Pago </option>
                    <option>Efectivo</option>
                    <option>Debito/Crédito</option>
                    <option>Déposito</option>
                </select>
                <!-- Selector 2 -->
                <select name="tipoDespacho" class="form-select" id="validationCustom04" required="">
                    <option selected="" disabled="" value="">Método Despacho </option>
                    <option>Retiro Personal</option>
                    <option>Despacho a Domicilio</option>
                </select>
                <!-- Selector 2 -->
                <select name="tipo" class="form-select" id="validationCustom04" required="">
                    <option selected="" disabled="" value="">Boleta o Factura </option>
                    <option>Boleta</option>
                    <option>Factura</option>
                </select>
            </div>
                <!--Boton de formulario para finalizar la compra. Deben servira si se han seleccionado opciones en anteriores selectores-->
                <div class="row">
                    <button class="btn btn-primary btn-lg active" type="submit">Ordenar y pagar</button>
                </div>
            </form>

        </div>
            <!-- Segunda seccion de Grilla: Elementos a comprar -->
            <div class="col-sm-4">
            
            <!-- Tabla con elementos que estan en el carrito de compra del usuario -->
                <table class="table table-hoved">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <?php
                        $total = 0;
                    ?>
                    @forelse($transaccion_producto as $transaccion_producto)
                    <?php
                        $idTr = $transaccion_producto->id_productos;
                        $product = Producto::find($idTr);
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row">-</th>
                            <td>{{$product->nombreProducto}}</td>
                            <td>{{$product->precioUnitario}}</td>
                            <td>{{$transaccion_producto->cantidad}}</td>
                            <?php
                                $totalProducto = $product->precioUnitario * $transaccion_producto->cantidad;
                                $total = $total + $totalProducto;
                            ?>
                            <td>{{$totalProducto}}</td>
                        </tr>
                    </tbody>
                    @empty
                        No hay productos en el carrito
                    @endforelse
                </table>
                <h4>Total a pagar: {{$total}} <h4>              
            </div>

            <!-- Tercera seccion de Grilla: Foto de pagina y boton de retorno -->
            <div class="col-sm-4">   
                <img src="https://static.vecteezy.com/system/resources/previews/000/812/118/non_2x/grocery-shopping-cart-with-vegetables-and-fruits-photo.jpg" class="img-responsive" alt="img.rounded">
                <a href="/home/{{$user->id}}" class="btn btn-primary btn-lg active" role="button">Pagina Principal</a>
            </div>
            
        </div>

        <!-- Footer de la pagina-->
        <div class="footer">
                FERIINF - Online Market - 2021
        </div>

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
    .list-group-item{
        color: black;
    }
    .form-select{
        color: black;
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
    .container{
        background-color:#235434;
        color: white;
        border-radius: 5px;
        padding: 1%;
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
    .first-title{
      text-align: center;
      font-size: 30px;
    }
    .jumbotron{
        background-image: url("https://foodandtravel.mx/wp-content/uploads/2020/05/Frutas-y-verduras-de-temporada-Por.jpg");
        background-size: cover;
        color: white;
    }
    .btn{
      margin-top: 3%;
      margin-left: 45%;
    }



</style>

