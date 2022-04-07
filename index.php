<?php
 include 'includes/cdn.php';
 
$imgs = array('imgs/fondo-arbol.jpg');
$img = $imgs[array_rand($imgs)];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">

    <title>Gestor de actividades</title>
</head>
<style>
    body {
        background-image: url('<?php echo $img; ?>');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }
    .h3_font {
     font-size: x-large !important;
    }
    .small-box {
    border-radius: 2px;
    position: relative;
    display: block;
    margin-bottom: 10px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    }

    .tags_recuadr {
    border-radius: 6px;
    cursor: pointer;
    border: 3px solid #00000021;
    overflow: hidden;
    }
    .ajust {
        height: 150px;
        box-shadow: 0 4px 5px 0 rgb(0 0 0 / 14%);
    }
</style>
<body>
    <section class="container-fluid" id="vApp">
        <div class="row ">
            <div class="col-md-6 b-blue">
                <div class="nav-margin ">
                    <ul class="nav   ">
                        <!-- <li class="nav-item">
                            <a class="nav-link text-light" href="#"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
                            </a>
                        </li> -->
                    </ul>

                </div>
            </div>
            <div class="col-md-6 bg-blue">
                <div class="nav-margin">
                    <ul class="nav nav-pills justify-content-end ">
                        
                        
                         <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="#">Actividades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Listas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Horas TCU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Cerrar sesion</a>
                        </li>
                        
                    </ul>

                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 ">
                    <h1 class="title text-center text-light nav-margin">Gestor de actividades</h1>
                   
                </div>
                <div class="col-md-6">
                     <button class="btn btn-secondary btn-sm  nav-margin"  onclick="modalSave()">
                       <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Nueva actividad
                    </button>
                   
                
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6  "  v-for="(nota,index) in notas">
                        <div>
                                <button class="btn btn-secondary  btn-sm" @click="edit(nota)">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button class="btn  btn-danger btn-sm" @click="delete(nota)">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                    <div class="card nav-margin small-box  ajust tags_recuadr  " :class="nota.color">
                      
                        <div class="card-body text-light" >
                            <div class="inner">
                                    
                                    <h5 class="h3_font">{{nota.titulo}}</h5>
                                    <p class="card-text">{{nota.descripcion}}</p>
                                    <p class="card-text"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                     {{nota.fecha}}</p>
                            </div>
                           
                        </div>
                    </div>
                     
                </div>
                
            </div>
        </div>
        <!-- modal -->
        <div id="modalSave" class="modal fade" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">  
                        <h5 class="modal-title">Nueva actividad</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div  class="nav-margin">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="notaTitulo">Nombre</label>
                                    <input type="text" class="form-control" v-model="notaTitulo" >
                                </div>
                                <div class="form-group">
                                    <label for="">Descripcion</label>
                                    <input type="text" class="form-control" v-model="notaDescripcion" >
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha</label>
                                     <input type="date" class="form-control" v-model="notaFecha" >
                                </div>
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <select class=" custom-select bg-light form-control" v-model="notaColor">
                                        <option  value="">Seleccione un color</option>
                                        <option class="bg-primary text-light" value="bg-primary"> Azul </option>
                                        <option value="bg-success " class="text-light bg-success">verde</option>
                                        <option value="bg-dark " class="text-light bg-dark">rojo</option>
                                        <option value="bg-warning " class="text-light bg-warning">Amarillo</option>
                                    </select>
                                </div>
                                        
                                    
                            </div>
                        </div>
                        <div class="modal-footer">  
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" @click="saveNote()" data-bs-dismiss="modal">Guardar</button>
                        </div> 
                    </div>
                </div> 
            </div>
        </div>
    </section>
<script src="js/app.js"></script>
    <script>
        function modalSave(){
           $('#modalSave').modal('show');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>