<?= $this->extend('base') ?>

<?= $this->section('content') ?>
<main class="main container-fluid">
    <div class="row">
        <section class="department col">
            <h6 class="nav-title py-2 px-4">
                Service
            </h6>
        </section>
        <section class="postionHeld col">
            <h6 class="nav-title py-2 px-4">
                Poste
            </h6>
        </section>
    </div>
</main>

<?= $this->endSection() ?>


<!-- Style -->
<?= $this->section('stylesheet') ?>
<style>
</style>
<?= $this->endSection() ?>


<!-- Script -->
<?= $this->section('script') ?>

<script>
    configNav.classList.add('active')
</script>

<?= $this->endSection() ?>