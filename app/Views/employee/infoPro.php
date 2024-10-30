<?= $this->extend('base') ?>

<?= $this->section('title') ?> RH | Softio<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main class="main container-fluid">
    <?= $this->include('_partials/employeeHeader') ?>

    <div>
        <!-- Add Professional Informations -->
        <form class="px-4" action="<?= base_url('employee/infopro/add') ?>" method="post">
            <div class="row row-cols-1 gy-2 mb-3">
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2">
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" name="email"
                            placeholder="Entrer votre email" aria-label="" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2">
                        <label for="classification" class="form-label">Classification</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="classification"
                            placeholder="" aria-label="">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2">
                        <label for="contractType" class="form-label">Contrat</label>
                    </div>
                    <div class="col">
                        <select type="text" id="contractType" class="form-select" name="contractType"
                            placeholder="" aria-label="" required>
                            <option selected>CDI</option>
                            <option value="CDD">CDD</option>
                        </select>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2">
                        <label for="hireDate" class="form-label">Début</label>
                    </div>
                    <div class="col">
                        <input type="date" id="hireDate" class="form-control" name="hireDate"
                            aria-label="" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2">
                        <label for="contractEndDate" class="form-label">Fin</label>
                    </div>
                    <div class="col">
                        <input type="date" id="contractEndDate" class="form-control" name="contractEndDate"
                            aria-label="" disabled>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2">
                        <label for="department" class="form-label">Service</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="department"
                            placeholder="" aria-label="">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2">
                        <label for="workLocation" class="form-label">Lieu</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="workLocation"
                            placeholder="" aria-label="" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2">
                        <label for="positionHeld" class="form-label">Poste</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="positionHeld"
                            placeholder="" aria-label="" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2">
                        <label for="workingHours" class="form-label">Heures de travail</label>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="workingHours"
                            placeholder="" aria-label="" required>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>

        <div class="p-4">
            <table class="table table-borderless table-hover table-striped mt-3 ">
                <thead>
                    <tr>
                        <th class="text-center bg-info">#</th>
                        <th class="text-center bg-info">Matricule</th>
                        <th class="text-center bg-info">Poste</th>
                        <th class="text-center bg-info">Début</th>
                        <th class="text-center bg-info">Fin</th>
                        <th class="text-center bg-info">Heures</th>
                        <th class="text-center bg-info">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($infoPros as $infoPro) {
                    ?>
                        <tr>
                            <td> <?= $infoPro['idInfoPerso'] ?></td>
                            <td class="text-center"> <?= $infoPro['idInfoPro'] ?></td>
                            <td class="text-center"> <?= $infoPro['positionHeld'] ?></td>
                            <td class="text-center"> <?= $infoPro['hireDate'] ?></td>
                            <td class="text-center"> <?= $infoPro['contractEndDate'] ?></td>
                            <td class="text-center"> <?= $infoPro['workingHours'] ?></td>
                            <td class="d-flex gap-2 justify-content-center">

                                <!-- Delete Button modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteInfoPro<?= $infoPro['idInfoPro'] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Edit Button modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editInfoPro<?= $infoPro['idInfoPro'] ?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Deletion Modal -->
                        <div class="modal fade" id="deleteInfoPro<?= $infoPro['idInfoPro'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez vous vraiment supprimer cet employé ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <a href="<?= base_url('employee/infopro/delete/' . $infoPro['idInfoPro']) ?>" class="btn btn-primary">
                                            Continuer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Edit Modal -->
                        <div class="modal fade" id="editInfoPro<?= $infoPro['idInfoPro'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('employee/infopro/update/' . $infoPro['idInfoPro']) ?>" method="post">
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="col mb-4">
                                                <label for="employeeNumber" class="form-label">N° Matricule</label>
                                                <input type="text" class="form-control" name="employeeNumber" value="<?= $infoPro['idInfoPro'] ?>"
                                                    placeholder="" aria-label="" disabled>
                                            </div>
                                            <div class="col">
                                                <label for="classification" class="form-label">Classification</label>
                                                <input type="text" class="form-control" name="classification" value="<?= $infoPro['classification'] ?>"
                                                    placeholder="" aria-label="">
                                            </div>
                                            <div class="col mb-4">
                                                <label for="status" class="form-label">Etat</label>
                                                <select type="text" class="form-select" name="status" value="<?= $infoPro['status'] ?>"
                                                    placeholder="" aria-label="" required>
                                                    <option value="en service">en service</option>
                                                    <option value="débauché">débauché</option>
                                                </select>
                                            </div>
                                            <div class="col mb-4">
                                                <label for="contractType" class="form-label">Contrat</label>
                                                <select type="text" class="form-select" name="contractType" value="<?= $infoPro['contractType'] ?>"
                                                    placeholder="" aria-label="" required>
                                                    <option value="CDI">CDI</option>
                                                    <option value="CDD">CDD</option>
                                                </select>
                                            </div>
                                            <div class="col mb-4">
                                                <label for="hireDate" class="form-label">Début</label>
                                                <input type="date" class="form-control" name="hireDate" value="<?= $infoPro['hireDate'] ?>"
                                                    aria-label="" required>
                                            </div>
                                            <div class="col mb-4">
                                                <label for="contractEndDate" class="form-label">Fin</label>
                                                <input type="date" class="form-control" name="contractEndDate" value="<?= $infoPro['contractEndDate'] ?>"
                                                    aria-label="">
                                            </div>
                                            <div class="col mb-4">
                                                <label for="department" class="form-label">Service</label>
                                                <input type="text" class="form-control" name="department" value="<?= $infoPro['department'] ?>"
                                                    placeholder="" aria-label="">
                                            </div>
                                            <div class="col mb-4">
                                                <label for="workLocation" class="form-label">Lieu</label>
                                                <input type="text" class="form-control" name="workLocation" value="<?= $infoPro['workLocation'] ?>"
                                                    placeholder="" aria-label="" required>
                                            </div>
                                            <div class="col mb-4">
                                                <label for="positionHeld" class="form-label">Poste</label>
                                                <input type="text" class="form-control" name="positionHeld" value="<?= $infoPro['positionHeld'] ?>"
                                                    placeholder="" aria-label="" required>
                                            </div>
                                            <div class="col mb-4">
                                                <label for="workingHours" class="form-label">Heures de travail</label>
                                                <input type="number" class="form-control" name="workingHours" value="<?= $infoPro['workingHours'] ?>"
                                                    placeholder="" aria-label="" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?= $this->endSection() ?>



<?= $this->section('stylesheet') ?>
<style>
    .main {
        min-height: calc(100vh - 60px);
        max-height: calc(100vh - 60px);
        overflow-y: auto;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    const today = new Date().toISOString().split('T')[0];

    hireNav.classList.add('active')
    employeeNav.classList.add('active')
    
    hireDate.value = today;
    contractType.addEventListener('change', function() {
        if (this.value === 'CDI') {
            contractEndDate.disabled = true;
        } else {
            contractEndDate.disabled = false;
        }
    });
</script>
<?= $this->endSection() ?>