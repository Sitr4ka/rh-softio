<?= $this->extend('base') ?>

<form action="<?= base_url("home/scoring") ?>" method="get" class="row">
    <div class="datePointage col">
        <div class="col-2"></div>
        <input type="date" name="datePointage" id="datePointage" class="form-control" value="<?= $datePointage ?>">
    </div>
    <div class="col-2">
        <input type="submit" value="Rechercher" class="btn btn-warning">
    </div>
</form>
<?= $this->section('content') ?>
<main class="main container-fluid pt-3">
    <form action="<?= base_url("home/scoring") ?>" method="get" class="d-flex justify-content-end gap-3 mb-3">
        <div class="">
            <input type="date" name="datePointage" class="form-control" value="<?= $datePointage ?>">
        </div>
        <div>
            <button type="submit" class="btn btn-outline-primary">Rechercher</button>
        </div>
    </form>
    <table id="scoringTable" class="table table-bordered table-hover table-striped" style="width:100%">
        <thead>
            <tr>
                <th class="text-center bg-info">#</th>
                <th class="text-center bg-info">Nom</th>
                <th class="text-center bg-info">Prénoms</th>
                <th class="text-center bg-info">Contact</th>
                <th class="text-center bg-info">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($employees as $employee) {
            ?>
                <tr>
                    <td class="text-center"> <?= $employee['idEmploye'] ?> </td>
                    <td class="text-center"> <?= $employee['nom'] ?> </td>
                    <td class="text-center"> <?= $employee['prenoms'] ?> </td>
                    <td class="text-center"> <?= $employee['contact'] ?> </td>
                    <td class="d-flex gap-2 justify-content-center">

                        <!-- Edit Button modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editScoring<?= $employee['idEmploye'] ?>">
                            Pointage
                        </button>
                    </td>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editScoring<?= $employee['idEmploye'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pointage</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('scoring/add') ?>" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="numEmploye" class="form-label">N° Employé</label>
                                            <input id="numEmploye" type="text" name="numEmploye" class="form-control"
                                                value="<?= $employee['idEmploye'] ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" name="datePointage" id="datePointage" class="form-control" value="<?= $datePointage ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="heureEntree" class="form-label">Entrée</label>
                                            <input id="heureEntree" type="time" class="form-control" name="heureEntree"
                                                value="<?= array_key_exists('heureEntree', $employee) ? $employee['heureEntree'] : "" ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="heureSortie" class="form-label">Sortie</label>
                                            <input id="heureSortie" type="time" class="form-control" name="heureSortie"
                                                value="<?= array_key_exists('heureSortie', $employee) ? $employee['heureSortie'] : "" ?>">
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
                </tr>
            <?php
            } ?>
        </tbody>

    </table>
    <div class="searchBar mx-2 border mb-3 bg-white px-5 py-2 rounded rounded-2 shadow">
        <div class="row py-4">
            <div class="col">
                <label for="startDate" class="form-label">Début:</label>
                <input type="date" class="form-control" id="startDate">
            </div>
            <div class="col">
                <label for="endDate" class="form-label">Fin:</label>
                <input type="date" class="form-control" id="endDate">
            </div>
            <div class="col">
                <label for="searchInput" class="form-label">Numéro:</label>
                <input type="search" class="form-control" id="keyWord">
            </div>
        </div>
        <div class="text-end mb-3" id="searchBtn">
            <button type="button" class="btn btn-outline-success">Rechercher</button>
        </div>
        <div class="display-data row d-flex">
            <div class="coordonnees col-6">
                <div class="row">
                    <div class="col-2">
                        <label for="lastname">Nom: </label>
                    </div>
                    <div class="col">
                        <span type="text" class="text" id="lastname"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="firstname">Prénoms: </label>
                    </div>
                    <div class="col">
                        <span type="text" class="text" id="firstname"></span>
                    </div>
                </div>
            </div>
            <div class="apointment-table col-6">
                <table class="table table-bordered" id="apointment-table">
                    <thead>
                        <tr>
                            <th class="text-center bg-info">Date</th>
                            <th class="text-center bg-info">Observation</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('js/scoring.js') ?>"></script>
<?= $this->endSection() ?>