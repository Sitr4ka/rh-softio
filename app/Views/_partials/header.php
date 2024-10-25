<header class="header">
    <div class="left-panel ">
        <span class="hamburger" id="hamburger">
            <i class="fa fa-bars fa-2x"></i>
        </span>
        <div class="logo">
            <img src="https://softio-App.com/public/images/logo/logo_blanc.png" alt="logo...">
        </div>
    </div>
    <div class="setting-panel d-flex align-items-center justify-content-evenly">
        <div class="color-theme border border-1 text-center align-content-center pt-1">
            <span id="userButton">
                <i class="fa-solid fa-palette text-light"></i>
            </span>
        </div>
        <div id="user_icon" class="profil border border-1 text-center align-content-center">
            <span>
                <i class="fa-solid fa-user-tie text-light"></i>
            </span>
        </div>
        <div id="userInfo" class="userInfo d-none">
            <span id="username">
                <?= $user['username'] ?>
            </span>
            <a href="<?= base_url('auth/login') ?>" class="link-info nav-link">Déconnexion</a>
        </div>
    </div>
</header