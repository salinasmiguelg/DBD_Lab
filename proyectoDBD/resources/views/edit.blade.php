<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <title>Editar Perfil</title>
  </head>
  <body>
    <h1 class = "first-title">Editar Perfil</h1>
    <div class = "container-text">
    <form  action="{!! route('userUpdate', ['id'=>$user->id]) !!}" method="POST"style="padding-top:30px">
                    @method('PUT')
                    <legend style="text-align: center;"><b>Editar Perfil</b></legend>
                    <div class="mb-3">
                        <label for="formGroupExampleInput">Número telefónico</label>
                        <input class="form-control" type="text"  name="numeroTelefono" value="{{$user->numeroTelefono}}" required minlength="3">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput">Apellido</label>
                        <input class="form-control" type="text"  name="apellido" value="{{$user->apellido}}" required minlength="3">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}">
                    </div>

                    <button type="submit" class="btn btn-success botonVisitar" style="margin-left: 45%;">Listo</button>
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
