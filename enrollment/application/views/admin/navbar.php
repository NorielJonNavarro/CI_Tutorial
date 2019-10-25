<?php $user = $this->session->userdata('logged_in');?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<!-- Navbar -->
    <a href="<?= base_url()?>" class="navbar-brand">Enrollment</a>
    <!-- Brand Logo -->
        
    <div class="d-flex justify-content-end navbar-top">
    <!-- Left navbar links -->
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </li>

            <li class="nav-item d-none d-sm-inline-block d-flex justift-content-end">
                <a href="<?= base_url()?>" class="nav-link">
                    <?= $user['name']?>
                </a>
            </li>
        </ul>
    </div>
</nav>