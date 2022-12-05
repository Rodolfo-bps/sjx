<?php

include("seccion/sesiones.php");

//saber numero de usuarios
$sqlUser = "SELECT * FROM usuarios";

if ($resulUser = mysqli_query($mysqli, $sqlUser)) {
    $numUser = mysqli_num_rows($resulUser);
}

$sqlPlant = "SELECT * FROM mapa";
if ($sqlPlant = mysqli_query($mysqli, $sqlPlant)) {
    $numPlant = mysqli_num_rows($sqlPlant);
}

$estado = "inactivo";

$sqlDanger = "SELECT estado FROM mapa WHERE estado = '$estado'";
if ($sqlDanger = mysqli_query($mysqli, $sqlDanger)) {
    $numDanger = mysqli_num_rows($sqlDanger);
}

$estd = "activo";

$sqlActive = "SELECT estado FROM mapa WHERE estado = '$estd'";
if ($sqlActive = mysqli_query($mysqli, $sqlActive)) {
    $sqlActive = mysqli_num_rows($sqlActive);
}






$sql = "SELECT nombre, apellidos FROM usuarios WHERE id_usuario = '$id_usuario' ";
$usuario = mysqli_query($mysqli, $sql);

while ($row = $usuario->fetch_assoc()) {

    $nombre_usuario = $row['nombre'];
    $apellidos = $row["apellidos"];
}


$pass = "Sjx101";

$pass_c = sha1($pass);

$sqlPass = ("SELECT password FROM usuarios WHERE id_usuario='$id_usuario'");
$resultado = $mysqli->query($sqlPass);

//si hay usuario o no
$num = $resultado->num_rows;
//traer usuario de post y de la bd
$row = $resultado->fetch_assoc();
$password_bd = $row["password"];





?>



<!-- Sidebar -->
<?php include("template/menu.php") ?>
<!-- End of Sidebar -->



<!-- Topbar -->
<?php include("template/header.php") ?>
<!-- End of Topbar -->


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <div class="tabcontent">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Bienvenido <strong><?= $nombre_usuario . " " . $apellidos ?></strong></h1>
                </div>

                <?php

                if ($password_bd == $pass_c) { ?>
                    <div class="alert alert-danger" role="alert">
                        Cambia tu contraseña
                    </div>

                <?php } ?>



                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Numero de Usuarios</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $numUser ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <h2>
                                            <i class="bi bi-people fa-2x text-gray-300"></i>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Numero de Plantas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $numPlant ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <h2>
                                            <i class="bi bi-geo-alt fa-2x text-gray-300"></i>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Plantas Inactivas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $numDanger ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <h2>
                                            <i class="bi bi-radioactive fa-2x text-gray-300"></i>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Plantas Activas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sqlActive ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <h2>
                                            <i class="bi bi-bar-chart fa-2x text-gray-300"></i>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>






<?php include("template/footer.php"); ?>