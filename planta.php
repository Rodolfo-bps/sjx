<?php 

if(isset($_POST)){
    $id = $_POST['id_planta'];

    echo "Este es el id ".$id;
}


?>

<!doctype html>
<html lang="en">

<?php include("template/head.php"); ?>
<style>
  .box:hover {
    background: #eee;
  }
</style>

<body class="bg-light">

  <?php include("template/header.php"); ?>

  <main role="main">

    <?php include("paginas/planta.php"); ?>

  </main>

  <?php include("template/footer.php"); ?>