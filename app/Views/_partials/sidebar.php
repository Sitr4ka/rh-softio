<aside id="sidebar" class="sidebar">
    <nav>
        <ul class="nav-menu">
            <li class="nav-item">
                <span>
                    <i class="fa fa-user"></i>
                </span>
                <a class="nav-link " id="employeeNav" href="<?= base_url('home') ?>">
                    Employé
                </a>
            </li>
            <li class="nav-item">
                <span>
                    <i class="fa fa-calendar-check"></i>
                </span>
                <a class="nav-link" id="scoringNav" href=" <?= base_url('home/scoring') ?> ">
                    Pointage
                </a>
            </li>
            <li class="nav-item">
                <span>
                    <i class="fa fa-credit-card-alt"></i>
                </span>
                <a class="nav-link" id="paymentNav" href=" <?= base_url('home/payment') ?> ">
                    Paiement
                </a>
            </li>
            <li class="nav-item">
                <span>
                    <i class="fa fa-cog"></i>
                </span>
                <a class="nav-link" id="configNav" href=" <?= base_url('home/settings') ?> ">
                    Paramètres
                </a>
            </li>
        </ul>
    </nav>
</aside>