<?php

require_once("config/conexion.php");
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("location: index.php");
}

$rol = $_SESSION['rol'];
$id_usuario = $_SESSION["id_usuario"];
$tipo_usuario = $_SESSION["tipo_usuario"];
$nombre_usuario = $_SESSION['nombre_usuario'];
$nombre = $_SESSION['nombre'];


$id_planta = $_GET['id_planta'];

$updateSQL = "SELECT * FROM mapa WHERE id_planta = '$id_planta' ";
$update = mysqli_query($mysqli, $updateSQL);

while ($row = mysqli_fetch_array($update)) {

    $idPlanta = $row[0];
    $localidad = $row[1];
    $direccion = $row[2];
    $descripcion = $row[3];
    $imagen = $row[4];
    $estado = $row[5];
    $latitud = $row[6];
    $longitud = $row[7];
    $categoria = $row[8];
    $fecha_registro = $row[9];
    $fecha_baja = $row[10];
    $fecha_actualizacion = $row[11];
}

?>


<!-- Sidebar -->
<?php include("template/menu.php") ?>
<!-- End of Sidebar -->



<!-- Topbar -->
<?php include("template/header.php") ?>
<!-- End of Topbar -->




<div class="tabcontent">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class=" d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Actualizar Usuario</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="seccion/controlPlantas.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" style="background: #fff;" readonly class="form-control" id="id_planta" name="id_planta" value="<?php echo $idPlanta ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>">
                        </div>
                        <div class="form-group">

                            <select name="localidad" id="localidad" class="form-control">
                                <option value="<?php echo $localidad ?>"><?php echo $localidad ?></option>
                                <option value="Barranca Salda">Barranca Salda</option>
                                <option value="Barrio San Pedro">Barrio San Pedro</option>
                                <option value="Cañada Estaca">Cañada Estaca</option>
                                <option value="Cañada San Miguel">Cañada San Miguel</option>
                                <option value="El Carrizal">El Carrizal</option>
                                <option value="El Cuajilote">El Cuajilote</option>
                                <option value="El Mosco">El Mosco</option>
                                <option value="Gabino Barreda">Gabino Barreda</option>
                                <option value="La Huertilla">La Huertilla</option>
                                <option value="San Jeronimo Primera Seccion">San Jeronimo Primera Seccion</option>
                                <option value="San Jeronimo Segunda Seccion">San Jeronimo Segunda Seccion</option>
                                <option value="San Pedro">San Pedro</option>
                                <option value="Santo Domingo Tonahuixtla">Santo Domingo Tonahuixtla</option>
                                <option value="Cañada Sandia">Cañada Sandia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>">
                        </div>
                        <div class="form-group">
                            <select name="estado" id="estado" class="form-control">
                                <?php if ($estado == "activo") { ?>
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                <?php } else { ?>
                                    <option value="inactivo">Inactivo</option>
                                    <option value="activo">Activo</option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="lat" name="lat" value="<?php echo $latitud; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="lng" name="lng" value="<?php echo $longitud; ?>">
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-smd-2 control-label">Imagen</label><br>
                            <img src="<?php echo "img/imagenesPlantas/" . $imagen ?>" alt="" height="70">

                            <label for="inputEmail3" class="col-smd-2 control-label"><?php echo $imagen; ?></label>/
                            <input type="file" class="form-control" id="imagen" name="imagen" value="<?php echo $imagen; ?>">
                        </div>
                        <div class="form-group">
                            <?php

                            $sqlCategorias = ("SELECT * FROM `categorias`");
                            $categorias = mysqli_query($mysqli, $sqlCategorias);

                            ?>
                            <select name="categoria" id="categoria" class="form-control">
                                <option value="<?= $categoria ?>"><?= $categoria ?></option>

                                <?php while ($row = $categorias->fetch_assoc()) {
                                    if ($categoria == $row['nombre_categoria']) {
                                ?>

                                    <?php
                                    } else { ?>
                                        <option value="<?php echo $row['nombre_categoria']; ?>"><?php echo $row['nombre_categoria']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                  
                    <div class="form-group">
                        <input type="text" hidden class="form-control" id="fecha_actualizacion" name="fecha_actualizacion" value="<?php echo $fecha_actualizacion = date('Y-m-d'); ?>">
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="registrosPlantas.php" class="btn btn-default">Regresar </a>
                        <button type="submit" class="btn btn-info pull-right" name="btn_actualizar">Actualizar</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("template/footer.php"); ?>