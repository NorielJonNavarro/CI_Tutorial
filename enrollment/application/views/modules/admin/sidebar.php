<aside class="main-sidebar sidebar-dark-primary elevation-4"><!-- Main Sidebar Container -->
  <a href="<?= base_url()?>" class="brand-link text-center">Enrollment</a><!-- Brand Logo -->
    <div class="sidebar"> <!-- Sidebar -->
      <nav><!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block text-center"><?= $user_data['first_name']?></a>
          </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="<?= base_url()?>backend/logout" class="d-block text-center logout-button">Logout</a>
          </div>
        </div>                
      </nav><!-- /.sidebar-menu -->
    </div><!-- /.sidebar -->
</aside>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside><!-- /.control-sidebar -->