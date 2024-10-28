<?= $this->extend('base') ?>

<?= $this->section('content') ?>
<main class="main container-fluid py-3 px-4">
    <!-- Message alert -->
    <?php
    if (session()->getFlashdata("status")) {
    ?>
        <div class="alert alert-success alert-dismissible fade show mx-4 mt-2" role="alert">
            <?php echo session()->getFlashdata("status"); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>

    <form action="<?= base_url(''); ?>" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="matricule" class="form-label">N° Matricule</label>
            <input type="text" class="form-control" id="matricule" name="matricule">
        </div>
        <div class="mb-3">
            <label for="paymentType" class="form-label">Type de paiement</label>
            <input type="text" class="form-control" id="paymentType" name="paymentType">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date d'ajout</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="mb-3">
            <label for="baseSalary" class="form-label">Salaire</label>
            <input type="text" class="form-control" id="baseSalary" name="baseSalary">
        </div>
        <div class="mb-3 d-flex align-items-center">
            <button type="submit" class="btn btn-primary m-2">Submit</button>
        </div>
    </form>
</main>

<?= $this->endSection() ?>

<?= $this->section('stylesheet') ?>
    <style>
        main {
            
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    paymentNav.classList.add('active')
</script>
<?= $this->endSection() ?>