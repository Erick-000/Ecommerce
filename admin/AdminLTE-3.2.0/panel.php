<!DOCTYPE html>
<html lang="en">
<?php
//Si la variable de id es false redireccionar al index
session_start();
session_regenerate_id(true);
if (isset($_REQUEST['sesion']) && $_REQUEST['sesion'] == "cerrar") {
  session_destroy();
  header("location: index.php");
}
if (isset($_SESSION['id']) == false) {
  header("location: index.php");
}
$modulo = $_REQUEST['modulo'] ?? ''; //Creo una variable modulo y si no se manda nada la variable va a tener un string vacio
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My ecommerce</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables 
   <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">-->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/2.0.2/css/select.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.2/css/dataTables.dateTime.min.css">
  <link rel="stylesheet" href="css/editor.dataTables.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <!--<img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <!-- Messages Dropdown Menu -->
        <a class="nav-link" href="panel.php?modulo=editarUsuario&id=<?php echo $_SESSION['id'] ?>">
          <i class="far fa-user"></i>
        </a>
        <a class="nav-link text-danger" href="panel.php?modulo=&sesion=cerrar" title="Cerrar sesion">
          <i class="fas fa-door-closed"></i>
        </a>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light"> My ecommerce </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <!--<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['nombre']; ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="fas fa-shopping-cart nav-icon" aria-hidden="true"></i>
                <p>
                  Ecommerce
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="panel.php?modulo=estadisticas"
                    class="nav-link <?php echo ($modulo == "estadisticas" || $modulo == "") ? " active " : " "; ?>">
                    <i class="fas fa-chart-bar nav-icon"></i>
                    <p> Estadisticas </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="panel.php?modulo=usuarios"
                    class="nav-link <?php echo ($modulo == "usuarios" || $modulo == "crearUsuario" || $modulo == "editarUsuario") ? " active " : " "; ?>">
                    <i class="far fa-user nav-icon"></i>
                    <p> Usuarios </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="panel.php?modulo=productos"
                    class="nav-link <?php echo ($modulo == "productos" || $modulo == "") ? " active " : " "; ?>">
                    <i class="fa fa-shopping-bag nav-icon"></i>
                    <p> Productos </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="panel.php?modulo=ventas"
                    class="nav-link <?php echo ($modulo == "ventas" || $modulo == "") ? " active " : " "; ?>">
                    <i class="fa fa-table nav-icon"></i>
                    <p>Ventas</p>
                  </a>
                </li>
              </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <?php
    if (isset($_REQUEST['mensaje'])) {
      ?>
      <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <?php echo $_REQUEST['mensaje'] ?>
      </div>
      <?php
    }
    if ($modulo == "estadisticas" || $modulo == "") {
      include_once "estadisticas.php";
    }
    if ($modulo == "usuarios" || $modulo == "") {
      include_once "usuarios.php";
    }
    if ($modulo == "productos" || $modulo == "") {
      include_once "productos.php";
    }
    if ($modulo == "ventas" || $modulo == "") {
      include_once "ventas.php";
    }
    if ($modulo == "crearUsuario" || $modulo == "") {
      include_once "crearUsuario.php";
    }
    if ($modulo == "editarUsuario" || $modulo == "") {
      include_once "editarUsuario.php";
    }
    if ($modulo == "productos" || $modulo == "") {
      include_once "productos.php";
    }
    ?>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<!--<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<!--<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!--<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!--<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!--<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!--<script src="plugins/jszip/jszip.min.js"></script>
<!--<script src="plugins/pdfmake/pdfmake.min.js"></script>
<!--<script src="plugins/pdfmake/vfs_fonts.js"></script>
<!--<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<!--<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<!--<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>  -->

<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
  <script src="https://cdn.datatables.net/select/2.0.2/js/dataTables.select.js"></script>
  <script src="https://cdn.datatables.net/select/2.0.2/js/select.dataTables.js"></script>
  <script src="js/dataTables.editor.min.js"></script>

  <script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });

      //Este seccion hace parte del datatable de productos
      const editor = new DataTable.Editor({
        ajax: "controllers/productos.php",
        fields: [{
          label: 'Nombre:',
          name: 'nombre'
        },
        {
          label: 'Precio:',
          name: 'precio'
        },
        {
          label: 'Existencia:',
          name: 'existencia'
        },
        {
          label: 'Imagenes:',
          name: 'files[].id',
            type: 'uploadMany',
          display: (fileId, counter) =>
            `<img src="${editor.file('files', fileId).web_path}"/>`,
          noFileText: 'No hay imagenes'
        }
        ],
        table: '#tablaProductos'
      });

      new DataTable('#tablaProductos', {
        ajax: 'controllers/productos.php',
        columns: [{
          data: 'nombre'
        },
        {
          data: 'precio',
          render: DataTable.render.number(null, null, 0, '$')
        },
        {
          data: 'existencia'
        },
        {
          data: 'files',
          render: (d) => (d.length ? `${d.length} imagen(es)` : 'No hay imagen(es)'),
          title: 'Imagen'
        }
        ],
        layout: {
          topStart: {
            buttons: [{
              extend: 'create',
              editor: editor
            },
            {
              extend: 'edit',
              editor: editor
            },
            {
              extend: 'remove',
              editor: editor
            }
            ]
          }
        },
        select: true
      });
    });
  </script>
 
<!-- Script para borrar al usuario -->
<script>
  $(document).ready(function () {
    $(".borrar").click(function (e) { 
      e.preventDefault();
      var res=confirm("Realmente te quieres eliminar a este usuario?");
      if(res==true){
        var link=$(this).attr("href");
        window.location=link;
      }
      
    });
  });
</script>

</body>

</html>