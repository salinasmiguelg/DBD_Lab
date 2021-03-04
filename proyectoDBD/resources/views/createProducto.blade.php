<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Producto</title>
  </head>
  <body>
    <h1 class = "first-title">Crear Producto</h1>
    <div class = "container-text">
    <form action="{{route('crearProducto')}}" method="POST"> 
    <div class="mb-3">
      <label for="formGroupExampleInput">nombre del producto</label>
      <input type="text" name="nombreProducto">
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput">precio</label>
      <input type="number" name="precioUnitario">
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput">stock</label>
      <input type="number" name="stock">
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput">categoria</label>
      <input type="text" name="categoria">
    </div>
      <button type="submit" class="btn btn-primary px-4">Agregar Producto</button>
    </form> 
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
      margin-left: 44%;
    }
    .form-control{
      margin-top:1%;
    }


</style>