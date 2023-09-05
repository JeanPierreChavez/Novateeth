<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form action=" " method="post">
                            <div class="form-group">
                                <label for="">Nombre del Paciente: </label>
                                <input type="text" name="codigo" id="nombre" placeholder="Ingrese su Nombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tratamiento a realizar: </label>
                                <input type="text" name="codigo" id="tratamiento" placeholder="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de la Cita: </label>
                                <input type="text" name="codigo" id="fecha" placeholder="dd/mm/yyyy" class="form-control">
                            </div> 
                          <br>
                            <div class="form-group">
                                <input type="button" value="Agendar" id="agendar" class="btn btn-primary btn-block">
                            </div> 
                        </form>
                    </div>
                </div>
                <div class="col-lg-8">

                </div>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>
</html>