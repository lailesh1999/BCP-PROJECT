
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          ADMIN
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add_tax.php">
                <i class="fas fa-fw fa-align-justify text-orange"></i>
                <span class="nav-link-text">ADD TAX</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view_tax.php">
                <i class="fas fa-fw fa-align-justify text-orange"></i>
                <span class="nav-link-text">VIEW TAX</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add_units.php">
                <i class="fas fa-fw fa-align-justify text-orange"></i>
                <span class="nav-link-text">ADD UNITS</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view_unit.php">
                <i class="fas fa-fw fa-server text-green"></i>
                <span class="nav-link-text">VIEW  UNITS </span>
              </a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="add_category.php">
                <i class="fas fa-fw fa-server text-green"></i>
                <span class="nav-link-text">ADD CATEGORY </span>
              </a>
            </li>
         </li>
            <li class="nav-item">
              <a class="nav-link" href="view_category.php">
                <i class="fas fa-fw fa-address-book text-pink"></i>
                <span class="nav-link-text">VIEW CATEGORY</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add_supplier.php">
                <i class="fas fa-fw fa-address-book text-pink"></i>
                <span class="nav-link-text">ADD SUPPLIER</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view_supplier.php">
                <i class="fas fa-fw fa-address-book text-pink"></i>
                <span class="nav-link-text">VIEW SUPPLIER</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add_product.php">
                <i class="fas fa-fw fa-address-book text-pink"></i>
                <span class="nav-link-text">ADD MEDICINE</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view_product.php">
                <i class="fas fa-fw fa-address-book text-pink"></i>
                <span class="nav-link-text">VIEW MEDICINE</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add_stock.php">
                <i class="fas fa-fw fa-address-book text-pink"></i>
                <span class="nav-link-text">ADD STOCK</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view_stock.php">
                <i class="fas fa-fw fa-address-book text-pink"></i>
                <span class="nav-link-text">VIEW STOCK</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view_purchase.php">
                <i class="fas fa-fw fa-address-book text-pink"></i>
                <span class="nav-link-text">VIEW PURCHASE</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add_customer.php">
                <i class="fas fa-fw fa-address-book text-pink"></i>
                <span class="nav-link-text">ADD CUSTOMER</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-address-book text-red"></i>
                <span class="nav-link-text">LOG OUT</span>
              </a>
            </li>
            
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="billing.php">
                <i class="fas fa-filter text-red"></i>
                <span class="nav-link-text">BILLING</span>
              </a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="view_billing_report.php">
                <i class="fas fa-fw fa-address-card text-blue"></i>
                <span class="nav-link-text">REPORT</span>
              </a>
            </li>
           
          </ul>
        </div>
      </div>
    </div>
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
          <a href="logout.php" class="btn btn-danger">logout</a>
        </div>
      </div>
    </div>
  </div>
  </nav>