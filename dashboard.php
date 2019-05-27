<?php
include('include/header.php');
include('include/left.php');
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                        <?php $query = $dbc->Query("SELECT COUNT(*) as users FROM userdetail "); $result = $query->fetch_assoc();?>
                        <div class="info-box-content">
                            <span class="info-box-text">Users</span>
                            <span class="info-box-number"><?=$result['users']?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-home"></i></span>
                        <?php $query = $dbc->Query("SELECT COUNT(*) as total_cat FROM category "); $result2 = $query->fetch_assoc();?>
                        <div class="info-box-content">
                            <span class="info-box-text">Category</span>
                            <span class="info-box-number"><?=$result2['total_cat']?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-building-o"></i></span>
                        <?php $query = $dbc->Query("SELECT COUNT(*) as total_sub_cat FROM sub_category "); $result3 = $query->fetch_assoc();?>
                        <div class="info-box-content">
                            <span class="info-box-text">Sub Category</span>
                            <span class="info-box-number"><?=$result3['total_sub_cat']?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-bath"></i></span>
                        <?php $query = $dbc->Query("SELECT COUNT(*) as total_product FROM product "); $result4 = $query->fetch_assoc();?>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Products</P></span>
                            <span class="info-box-number"><?=$result4['total_product']?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php
include('include/footer.php');
?>