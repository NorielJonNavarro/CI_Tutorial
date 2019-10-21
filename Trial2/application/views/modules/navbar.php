<nav class="navbar navbar-expand-lg fixed-top mb-4 user-navbar">
    <a class="navbar-brand">Smedia</a>
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse user-navbar-item d-flex justify-content-end">
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="#"><?= $session_user['username'];?></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link user-logout" href="<?= base_url()?>auths/logout_user">Logout</a>
            </li>
        </ul>
    </div>
</nav>