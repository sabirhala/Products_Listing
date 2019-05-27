<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php
        $dashboard = '';
        if($_SERVER['PHP_SELF'] == dirname($_SERVER['PHP_SELF']) . '/dashboard.php'){
            $dashboard = 'active';
        }
        
        $category = '';
        if($_SERVER['PHP_SELF'] == dirname($_SERVER['PHP_SELF']) . '/add_category.php'){
            $category = 'active';
        }
      $sub_category = '';
      if($_SERVER['PHP_SELF'] == dirname($_SERVER['PHP_SELF']) . '/add_sub_category.php'){
          $csub_ategory = 'active';
      }
      $product_volume = '';
      if($_SERVER['PHP_SELF'] == dirname($_SERVER['PHP_SELF']) . '/add_product_volume.php'){
          $product_volume = 'active';
      }

      $product = '';
      if($_SERVER['PHP_SELF'] == dirname($_SERVER['PHP_SELF']) . '/add_product.php'){
          $product = 'active';
      }

      $product_specification = '';
      if($_SERVER['PHP_SELF'] == dirname($_SERVER['PHP_SELF']) . '/add_specification.php'){
          $product = 'active';
      }
        

       ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?=$dashboard?>">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?=$category?>">
          <a href="category.php">
            <i class="fa  fa-mobile-phone"></i> <span>Category</span>
          </a>
        </li>

          <li class="<?=$sub_category?>">
              <a href="sub_category.php">
                  <i class="fa  fa-mobile-phone"></i> <span>Sub Category</span>
              </a>
          </li>

          <li class="<?=$product_volume?>">
              <a href="product_volume.php">
                  <i class="fa  fa-mobile-phone"></i> <span>Product Volume</span>
              </a>
          </li>

          <li class="<?=$product?>">
              <a href="product.php">
                  <i class="fa  fa-mobile-phone"></i> <span>Product</span>
              </a>
          </li>

          <li class="<?=$product_specification?>">
              <a href="add_specification.php">
                  <i class="fa  fa-mobile-phone"></i> <span>Add Product Specification</span>
              </a>
          </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>