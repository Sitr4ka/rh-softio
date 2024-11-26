<?= $this->extend('base') ?>

<?= $this->section('content') ?>
<main class="main container-fluid pt-3">
    <table id="scoringTable" class="table table-borderless table-hover table-striped" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Nom</th>
                <th class="text-center">Contrat</th>
                <th class="text-center">Poste</th>
                <th class="text-center">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee) {
            ?>
                <tr>
                    <td class="text-center"> <?= $employee['idEmploye'] ?> </td>
                    <td class="text-center"> <?= $employee['nom'] ?> </td>
                    <td class="text-center"> <?= $employee['typeContrat'] ?> </td>
                    <td class="text-center"> <?= $employee['poste'] ?> </td>
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
                                            <label for="" class="form-label">N° Employé</label>
                                            <input id="" type="text" name="numEmploye" class="form-control"
                                                value="<?= $employee['idEmploye'] ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Date</label>
                                            <input type="date" name="datePointage" class="form-control"
                                            value="<?= $today ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Entrée</label>
                                            <input id="" type="time" class="form-control" name="heureEntree"
                                            value="<?= array_key_exists('heureEntree', $employee) ? $employee['heureEntree'] : "" ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Sortie</label>
                                            <input id="" type="time" class="form-control" name="heureSortie"
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
    <div class="searchBar mx-2 border">
        <div class="row bg-white py-4">
            <div class="col">
                <label for="startDate" class="form-label">Début</label>
                <input type="date" class="form-control">
            </div>
            <div class="col">
                <label for="endDate" class="form-label">Fin</label>
                <input type="date" class="form-control">
            </div>
            <div class="col">
                <label for="searchInput" class="form-label">Rechercher</label>
                <input type="search" class="form-control">
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    const today = new Date().toISOString().split('T')[0];
    const dateInput = document.getElementsByClassName('datePointage')
    const navMenu = document.getElementById('scoringNav');
    navMenu.classList.add('active')
</script>
<?= $this->endSection() ?>