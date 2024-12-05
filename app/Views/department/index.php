<?= $this->extend('base') ?>

<?= $this->section('content') ?>
<main class="main container-fluid pt-3">

    <!-- Message alert -->
    <?php
    $flashData = session()->getFlashdata("status");
    if ($flashData) {
    ?>
        <input type="hidden" name="status" value="<?= $flashData ? $flashData : null ?>" id="status">
    <?php
    }
    ?>

    <div class="row row-cols-1 row-cols-lg-2">
        <section class="department">
            <header class="d-flex justify-content-between">
                <h6 class="nav-title py-2 px-4">
                    Départements
                </h6>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nouveauDepartementModal">
                    Ajouter
                </button>
            </header>

            <!-- Modal for adding new department -->
            <div class="modal fade" id="nouveauDepartementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Nouveau Département</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('department/add') ?>" method="post">
                            <div class="modal-body">
                                <?= csrf_field(); ?>

                                <div class="mb-3">
                                    <label for=libelleDepart class="form-label">Libellé</label>
                                    <input type="text" name=libelleDepart id=libelleDepart class="form form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>

            <!-- Table to print department data -->
            <table id="departmentTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="bg-info">#</th>
                        <th class="bg-info">Départements</th>
                        <th class="bg-info text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($departements as $departement) {
                    ?>
                        <tr>
                            <td><?= $departement['idDepart'] ?></td>
                            <td><?= $departement['libelleDepart'] ?></td>
                            <td class="d-flex gap-2 justify-content-center">

                                <!-- Delete Button modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteDepartModal<?= $departement['idDepart'] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Edit Button modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editDepartModal<?= $departement['idDepart'] ?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Delete department modal -->
                        <div class="modal fade" id="deleteDepartModal<?= $departement['idDepart'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez vous vraiment supprimer cet département ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <a href="<?= base_url('department/delete/' . $departement['idDepart']) ?>" class="btn btn-primary">
                                            Continuer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Department modal -->
                        <div class="modal fade" id="editDepartModal<?= $departement['idDepart'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nouveau Département</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('department/update/' . $departement['idDepart']) ?>" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="_method" value="PUT">

                                            <div class="mb-3">
                                                <label for=libelleDepart class="form-label">Libellé</label>
                                                <input id=libelleDepart type="text" class="form form-control" name=libelleDepart value="<?= $departement['libelleDepart'] ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Valider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php

                    } ?>
                </tbody>
            </table>
        </section>
        <section class="postionHeld">
            <header class="d-flex justify-content-between">
                <h6 class="nav-title py-2 px-4">
                    Postes
                </h6>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nouveauPosteModal">
                    Ajouter
                </button>
            </header>

            <!-- Modal for adding new positionHeld -->
            <div class="modal fade" id="nouveauPosteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Nouveau Poste</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('department/positionHeld/add') ?>" method="post">
                            <div class="modal-body">
                                <?= csrf_field(); ?>
                                <div class="mb-3">
                                    <label for=poste class="form-label">Titre du Poste</label>
                                    <input type="text" name=poste id=poste class="form form-control">
                                </div>
                                <div class="mb-3">
                                    <label for=departement class="form-label">Département</label>
                                    <select type="text" id="poste" class="form-select" name="departement">
                                        <?php
                                        foreach ($departements as $departement) {
                                        ?>
                                            <option value="<?= $departement['libelleDepart'] ?>">
                                                <?= $departement['libelleDepart'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>

            <!-- Table to print positionHeld data -->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="bg-info">#</th>
                        <th class="bg-info">Poste</th>
                        <!-- <th class="bg-info">Nombre</th> -->
                        <th class="bg-info text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($postes as $poste) {
                    ?>
                        <tr>
                            <td><?= $poste['idPoste'] ?></td>
                            <td><?= $poste['poste'] ?></td>
                            <td class="d-flex gap-2 justify-content-center">

                                <!-- Delete Button modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePositionHeldModal<?= $poste['idPoste'] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Edit Button modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPositionHeldModal<?= $poste['idPoste'] ?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Delete postionHeld modal -->
                        <div class="modal fade" id="deletePositionHeldModal<?= $poste['idPoste'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Êtes-vous sûr de vouloir supprimer ce poste ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <a href="<?= base_url('department/positionHeld/delete/' . $poste['idPoste']) ?>" class="btn btn-primary">
                                            Continuer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Position Held modal -->
                        <div class="modal fade" id="editPositionHeldModal<?= $poste['idPoste'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier le poste</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('department/postionHeld/update/' . $poste['idPoste']) ?>" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="_method" value="PUT">

                                            <div class="mb-3">
                                                <label for=poste class="form-label">Titre du Poste</label>
                                                <input type="text" name=poste id=poste class="form form-control" value="<?= $poste['poste'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for=departement class="form-label">Département</label>
                                                <select type="text" id="poste" class="form-select" name="departement">
                                                    <?php
                                                    foreach ($departements as $departement) {
                                                    ?>
                                                        <option value="<?= $departement['libelleDepart'] ?>" <?= ($departement['libelleDepart'] == $poste['libelleDepart']) ? "selected" : "" ?> >
                                                            <?= $departement['libelleDepart'] ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Valider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php

                    } ?>
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
<script src="<?= base_url('js/departement.js') ?>"></script>

<?= $this->endSection() ?>