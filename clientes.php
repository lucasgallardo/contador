<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cliente Nuevo</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include './components/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include './components/topbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Descripción</th>
                                        <th>Latitud</th>
                                        <th>Longitud</th>                                        
                                        
                                        <th>Proyecto</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if ($_SESSION['type']==2) {
                                        $id_proyecto = $_SESSION["project_id"];
                                        $query="SELECT * FROM sitios 
                                                LEFT JOIN proyectos ON proyecto_id = sitio_proyecto_id
                                                WHERE sitio_proyecto_id = '$id_proyecto' AND sitio_descripcion != 'centro' ";
                                    }else{
                                        $query="SELECT * FROM sitios 
                                                LEFT JOIN proyectos ON proyecto_id = sitio_proyecto_id
                                                WHERE sitio_descripcion != 'centro' ";
                                    }
                                    $busca=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
                                    while ($row=mysqli_fetch_array($busca)) { ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['sitio_nombre']; ?></td>
                                            <td><?php echo color_name_type($conexion, $row['sitio_tipo']); ?></td>
                                            <td><?php echo $row['sitio_descripcion']; ?></td>
                                            <td><?php echo $row['sitio_latitud']; ?></td>
                                            <td><?php echo $row['sitio_longitud']; ?></td>
                                            
                                            <td><?php echo $row['proyecto_titulo']; ?></td>
                                            <form action="sitio_detail.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['sitio_id']; ?>">
                                                <td><button type="submit" name="buscar" class="btn btn-outline btn-primary"><span class="fa fa-search-plus"></span></button></td>
                                            </form>                                            
                                        </tr>
                                    <?php } ?>                                    
                                </tbody>
                            </table>   

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
