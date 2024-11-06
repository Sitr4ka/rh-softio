<?= $this->extend('base') ?>

<?= $this->section('title') ?> RH | Embauche<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main class="main container-fluid">
    <?= $this->include('_partials/employeeHeader') ?>
    <!-- Message alert -->
    <?php
    $flashData = session()->getFlashdata("status");
    if ($flashData) {
    ?>
        <script>
            const operation = '<?= $flashData ?>'
            let text = '';
            let icon = '';

            switch (operation) {
                case 'enregistrement':
                    text = 'Enregistrement réussi'
                    icon = 'success'
                    break;

                case 'suppression':
                    text = 'Suppression réussi'
                    icon = 'success'
                    break;

                case 'modification':
                    text = 'Modification réussi'
                    icon = 'success'
                    break;

                default:
                    text = `Aucun personnel trouvé`
                    icon = 'error'
                    break;
            }

            Swal.fire({
                text: text,
                icon: icon,
                confirmButtonText: 'ok',
            });
        </script>
    <?php
    }
    ?>

    <div>
        <!-- Add Professional Informations -->
        <form class="px-4" action="<?= base_url('employee/infopro/add') ?>" method="post">
            <div class="row row-cols-1 gx-2 gy-2 mb-3">
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="email" class="col-form-label">Email</label>
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" name="email"
                            placeholder="Entrer votre email" aria-label="" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="classification" class="col-form-label">Classification</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="classification"
                            placeholder="Entrer la classification" aria-label="">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="contractType" class="col-form-label">Contrat</label>
                    </div>
                    <div class="col">
                        <select type="text" id="contractType" class="form-select" name="contractType"
                            placeholder="Entrer le type de contrat" aria-label="" required>
                            <option selected>CDD</option>
                            <option value="CDI">CDI</option>
                        </select>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="hireDate" class="col-form-label">Début</label>
                    </div>
                    <div class="col">
                        <input type="date" id="hireDate" class="form-control" name="hireDate"
                            aria-label="" placeholder="Entrer la date de début du contrat" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3" id="endDate">
                    <div class="col-2 col-xxl-1">
                        <label for="contractEndDate" class="col-form-label">Fin</label>
                    </div>
                    <div class="col">
                        <input type="date" id="contractEndDate" class="form-control" name="contractEndDate"
                            aria-label="" placeholder="Entrer la date de fin du contrat">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="department" class="col-form-label">Service</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="department"
                            placeholder="Entrer le service" aria-label="">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="workLocation" class="col-form-label">Lieu</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="workLocation"
                            placeholder="Entre le lieu de travail" aria-label="" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="positionHeld" class="col-form-label">Poste</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="positionHeld"
                            placeholder="Entre le poste" aria-label="" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="baseSalary" class="col-form-label">Salaire de base</label>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="baseSalary"
                            placeholder="Entrer le salaire de base" aria-label="" required>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Confirmer</button>
                </div>
            </div>
        </form>
        <div class="container-fluid infoProTable overflow-x-auto">
            <table id="infoProTable" class="table table-borderless table-hover table-striped mt-3">
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

    .infoProTable {
        min-height: 400px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    new DataTable('#infoProTable', {
        "pageLength": 5,
        "language": {
            "search": "Rechercher : ",
            "lengthMenu": '<select class="form-select">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="15">15</option>' +
                '</select>  éléments par page',
            "info": "Affichage des résultats : _START_ à _END_ sur _TOTAL_ entrées",
            "infoEmpty": "Aucune entrée à afficher",
            "infoFiltered": "(filtré de _MAX_ entrées totales)",
        }
    });

    const today = new Date().toISOString().split('T')[0];

    hireNav.classList.add('active')
    employeeNav.classList.add('active')

    const endDate = document.querySelector('#endDate');

    hireDate.value = today;
    contractType.addEventListener('change', function() {
        if (this.value === 'CDI') {
            endDate.classList.add('d-none');
        } else {
            endDate.classList.remove('d-none');
        }
    });
</script>
<?= $this->endSection() ?>