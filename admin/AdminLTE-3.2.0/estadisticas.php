 <?php
  include_once "db_ecommerce.php";
  $con = mysqli_connect($host, $user, $pass, $db);
  $queryNumVentas = "SELECT COUNT(id) AS num from ventas 
  where fecha BETWEEN DATE( DATE_SUB(NOW(),INTERVAL 7 DAY) ) AND NOW(); "; //BETWEEN = entre
  $resNumVentas = mysqli_query($con, $queryNumVentas);
  $rowNumVentas = mysqli_fetch_assoc($resNumVentas);

  //Obtener cantidad de clientes

  $queryNumClientes = "SELECT COUNT(id) AS num from clientes; ";  
  $resNumClientes = mysqli_query($con, $queryNumClientes);
  $rowNumClientes = mysqli_fetch_assoc($resNumClientes);
  ?>

  <script>
  var labelVentas = ['January', 'February', 'March', 'April', 'May', 'June', 'July']
  var datosVentas = [28, 48, 40, 19, 86, 27, 90]
  </script>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Dashboard</h1>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <!-- Small boxes (Stat box) -->
       <div class="row">
         <div class="col-6">
           <!-- small box -->
           <div class="small-box bg-info">
             <div class="inner">
               <h3><?php echo $rowNumVentas['num'] ?></h3>

               <p>Ventas en los ultimos 7 dias</p>
             </div>
             <div class="icon">
               <i class="ion ion-bag"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-6">
           <!-- small box -->
           <div class="small-box bg-warning">
             <div class="inner">
               <h3><?php echo $rowNumClientes['num'] ?></h3>

               <p>Clientes Registrados</p>
             </div>
             <div class="icon">
               <i class="ion ion-person-add"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
       </div>
       <!-- /.row -->
       <!-- Main row -->
       <!-- /.row (main row) -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>