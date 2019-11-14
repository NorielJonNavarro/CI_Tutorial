<?php $user = $this->session->userdata('logged_in');?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars menu"></i></a>
    <a href="<?= base_url()?>" class="navbar-brand">Enrollment</a>
        
    <div class="container d-flex justify-content-end navbar-top">
        <ul class="nav">
            <li class="nav-item d-none d-sm-inline-block d-flex justift-content-end">               
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link  menu-name">
                        <?= $user['first_name']?>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu menu-logout" aria-labelledby="my-dropdown">
                        <a href="<?= base_url()?>backend/logout" class="d-block text-center">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>