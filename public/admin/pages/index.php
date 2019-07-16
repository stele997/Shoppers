

  <?php  include "../../php/konekcija.php"; ?>
<?php include "../views/admin-head.php"; ?>
<?php include "../views/admin-nav.php"; ?>


<?php if(isset($_SESSION['user'])&&($_SESSION['user']->ulogaId)==1): ?>     

        <div id="page-wrapper">
            <?php 
            $page=$_GET['page'];
            switch($page){
                case 'insertMeni':
                include "../views/admin-insert-meni.php";
                break;
                case 'insertProduct':
                include "../views/admin-insert-product.php";
                break;
                case 'insertUser':
                include "../views/admin-insert-user.php";
                break;
                case 'userRole':
                include "../views/admin-insert-userRole.php";
                break;
                case 'insertProducBrands':
                include "../views/admin-insert-productBrands.php";
                break;
                case 'orders':
                include "../views/admin-orders.php";
                break;
                
                default :
                include "../views/admin-dashboard.php";
                break;
            }
            ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/admin/vendor/raphael/raphael.min.js"></script>
    <script src="/admin/vendor/morrisjs/morris.min.js"></script>
    <script src="/admin/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/admin/dist/js/sb-admin-2.js"></script>
    <script src="/admin/js/radSaBazom.js"></script>

</body>

</html>
<?php else: http_response_code(404); ?>
<?php endif;?>
