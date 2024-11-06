<?= $this->extend('base') ?>

<?= $this->section('content') ?>
<main class="main container-fluid pt-3">
    <div class="row row-cols-1 row-cols-lg-2">
        <section class="department">
            <h6 class="nav-title py-2 px-4">
                Départements
            </h6>
            <hr>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="bg-info">#</th>
                        <th class="bg-info">Départements</th>
                        <th class="bg-info text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>IT</td>
                        <td class="d-flex gap-2 justify-content-center">

                            <!-- Delete Button modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="">
                                <i class="fa fa-trash"></i>
                            </button>

                            <!-- Edit Button modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Commercial</td>
                        <td class="d-flex gap-2 justify-content-center">

                            <!-- Delete Button modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="">
                                <i class="fa fa-trash"></i>
                            </button>

                            <!-- Edit Button modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="postionHeld">
            <h6 class="nav-title py-2 px-4">
                Postes
            </h6>
            <hr>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="bg-info">#</th>
                        <th class="bg-info">Poste</th>
                        <th class="bg-info">Nombre</th>
                        <th class="bg-info text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Lead Dev</td>
                        <td>1</td>
                        <td class="d-flex gap-2 justify-content-center">

                            <!-- Delete Button modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="">
                                <i class="fa fa-trash"></i>
                            </button>

                            <!-- Edit Button modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Développeur Frontend</td>
                        <td>3</td>
                        <td class="d-flex gap-2 justify-content-center">

                            <!-- Delete Button modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="">
                                <i class="fa fa-trash"></i>
                            </button>

                            <!-- Edit Button modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Développeur Backend</td>
                        <td>5</td>
                        <td class="d-flex gap-2 justify-content-center">

                            <!-- Delete Button modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="">
                                <i class="fa fa-trash"></i>
                            </button>

                            <!-- Edit Button modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
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