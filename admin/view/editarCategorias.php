<?php
// variable de formulario
$id_categoria = !empty($_POST['id_categoria']) ? $_POST['id_categoria'] : 0;
// consultamos registro segun ID
$r = mysqli_query($mysqli, "SELECT * FROM categorias WHERE id_categoria = '$id_categoria' ");
// verificamos existencia de registro
if (mysqli_num_rows($r) == false) {
    exit("No se encontro un ID a editar: " . $id_categoria);
}
// guardamos datos de registro en variable y liberamos consulta
$datosEditar = mysqli_fetch_array($r);
mysqli_free_result($r);

/*
$id_categoria = $_POST['id_categoria'];
$updateSQL = "SELECT * FROM categorias WHERE id_categoria = '$id_categoria' ";
$update = mysqli_query($mysqli, $updateSQL);

while ($row = mysqli_fetch_array($update)) {
    $id_categoria = $row[0];
    $nombre_categoria = $row[1];
    $color_categoria = $row[2];
    $fecha_creacion = $row[3];
}*/
?>
<div class="tabcontent">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class=" d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Actualizar Categoría</h1>
        </div>
        <div class="alert alert-danger" role="alert">
            Cambiar la categoría puede afectar los datos de las plantas<br>
            Asegúrese de que no tenga registros con esta categoría.
        </div>
        <!-- DataTales Example -->
        <div class="card shadow col-md-3">
        </div>
        <div class="card shadow col-md-9">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="seccion/controlCategorias.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" class="form-control" id="id_categoria" name="id_categoria" value="<?= $datosEditar['id_categoria'] ?>">
                        <div class="form-group">
                            <input type="text" style="background: #fff;" class="form-control" id="nombre_categoria" name="nombre_categoria" value="<?= $datosEditar['nombre_categoria'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="color" class="form-control" id="color_categoria" name="color_categoria" value="<?= $datosEditar['color_categoria'] ?>">
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="<?= SERVERURL . "categorias" ?>" class="btn btn-default">Regresar </a>
                            <button type="submit" class="btn btn-info pull-right" name="btn_actualizar_categoria">Actualizar</button>
                        </div>
                        <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <div class="card shadow col-md-3">
        </div>
    </div>
</div>
<br><br><br><br><br>