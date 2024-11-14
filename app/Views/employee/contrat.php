<?= $this->extend('base') ?>

<?= $this->section('title') ?> RH | Contrat<?= $this->endSection() ?>

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
        <form class="px-4" action="<?= base_url('employee/contrat/add') ?>" method="post">
            <div class="row row-cols-1 gx-2 gy-2 mb-3">
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="email" class="col-form-label">Email</label>
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" name="email"
                            placeholder="Entrer votre email" aria-label="">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="typeContrat" class="col-form-label">Contrat</label>
                    </div>
                    <div class="col">
                        <select type="text" id="typeContrat" class="form-select" name="typeContrat"
                            placeholder="Entrer le type de contrat" aria-label="">
                            <option selected>CDD</option>
                            <option value="CDI">CDI</option>
                            <option value="Stage">Stage</option>
                            <option value="Alternance">Alternance</option>
                        </select>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="poste" class="col-form-label">Poste</label>
                    </div>
                    <div class="col">
                        <select type="text" id="poste" class="form-select" name="poste">
                            <?php
                            foreach ($postes as $poste) {
                            ?>
                                <option value="<?= $poste['poste'] ?>">
                                    <?= $poste['poste'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="dateDebut" class="col-form-label">Début</label>
                    </div>
                    <div class="col">
                        <input type="date" id="dateDebut" class="form-control" name="dateDebut"
                            placeholder="Entrer la date de début du contrat" min="<?= $currentDate ?>">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3" id="endDate">
                    <div class="col-2 col-xxl-1">
                        <label for="dateFin" class="col-form-label">Fin</label>
                    </div>
                    <div class="col">
                        <input type="date" id="dateFin" class="form-control" name="dateFin"
                            aria-label="" placeholder="Entrer la date de fin du contrat">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="lieuTravail" class="col-form-label">Lieu</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="lieuTravail"
                            placeholder="Entrer le lieu de travail" aria-label="">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="salaire" class="col-form-label">Salaire de base</label>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="salaire"
                            placeholder="Entrer le salaire de base" aria-label="">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="moyenPaiement" class="col-form-label">Type de paiement</label>
                    </div>
                    <div class="col">
                        <select type="text" class="form-select" name="moyenPaiement">
                            <option default>Virement bancaire</option>
                            <option value="Mobile Money">Mobile Money</option>
                            <option value="En espèce">En espèce</option>
                        </select>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editHoraire">
                            Horaires
                        </button>
                    </div>

                    <!-- Horaire modal -->
                    <div class="modal fade" id="editHoraire" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Horaires de travail</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <!-- Select Days -->
                                    <div class="days mb-3">
                                        <div class="mb-1">Jours</div>
                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                                            <input class="btn-check" id="Sun"
                                                type="checkbox" name="sunday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Sun">D</label>

                                            <input class="btn-check" id="Mon"
                                                type="checkbox" name="monday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Mon">L</label>



                                            <input class="btn-check" id="Tue"
                                                type="checkbox" name="tuesday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Tue">M</label>

                                            <input class="btn-check" id="Wed"
                                                type="checkbox" name="wednesday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Wed">M</label>

                                            <input class="btn-check" id="Thu"
                                                type="checkbox" name="thursday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Thu">J</label>

                                            <input class="btn-check" id="Fri"
                                                type="checkbox" name="friday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Fri">V</label>

                                            <input class="btn-check" id="Sat"
                                                type="checkbox" name="saturday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Sat">S</label>
                                        </div>
                                    </div>

                                    <div class="days mb-3">
                                        <label for="startTime" class="mb-1">de</label>
                                        <input type="time" name="startTime" class="form-control">
                                    </div>
                                    <div class="days mb-3">
                                        <label for="endTime" class="mb-1">à</label>
                                        <input type="time" name="endTime" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Valider</button>
                                </div>
                            </div>
                        </div><button></button>
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
                        <th class="text-center bg-info">Début</th>
                        <th class="text-center bg-info">Fin</th>
                        <th class="text-center bg-info">Salaire de base</th>
                        <th class="text-center bg-info">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contrats as $contrat) {
                    ?>
                        <tr>
                            <td> <?= $contrat['idEmploye'] ?></td>
                            <td class="text-center"> <?= $contrat['idContrat'] ?></td>
                            <td class="text-center"> <?= $contrat['dateDebut'] ?></td>
                            <td class="text-center"> <?= $contrat['dateFin'] ?></td>
                            <td class="text-end"> <?= $contrat['salaire'] ?></td>
                            <td class="d-flex gap-2 justify-content-center">

                                <!-- Delete Button modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteContrat<?= $contrat['idContrat'] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Edit Button modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editInfoPro<?= $contrat['idContrat'] ?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Deletion Modal -->
                        <div class="modal fade" id="deleteContrat<?= $contrat['idContrat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <a href="<?= base_url('employee/contrat/delete/' . $contrat['idContrat']) ?>" class="btn btn-primary">
                                            Continuer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Edit Modal -->
                        <div class="modal fade" id="editInfoPro<?= $contrat['idContrat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('employee/infopro/update/' . $contrat['idContrat']) ?>" method="post">
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="col mb-4">
                                                <label for="employeeNumber" class="form-label">N° Matricule</label>
                                                <input type="text" class="form-control" name="employeeNumber" value="<?= $contrat['idContrat'] ?>"
                                                    placeholder="" aria-label="" disabled>
                                            </div>
                                            <div class="col mb-4">
                                                <label for="typeContrat" class="form-label">Contrat</label>
                                                <select type="text" class="form-select" name="typeContrat" value="<?= $contrat['typeContrat'] ?>"
                                                    placeholder="" aria-label="">
                                                    <option value="CDI">CDI</option>
                                                    <option value="CDD">CDD</option>
                                                </select>
                                            </div>
                                            <div class="col mb-4">
                                                <label for="dateDebut" class="form-label">Début</label>
                                                <input type="date" class="form-control" name="dateDebut" value="<?= $contrat['dateDebut'] ?>"
                                                    aria-label="">
                                            </div>
                                            <div class="col mb-4">
                                                <label for="dateFin" class="form-label">Fin</label>
                                                <input type="date" class="form-control" name="dateFin" value="<?= $contrat['dateFin'] ?>"
                                                    aria-label="">
                                            </div>
                                            <div class="col mb-4">
                                                <label for="lieuTravail" class="form-label">Lieu</label>
                                                <input type="text" class="form-control" name="lieuTravail" value="<?= $contrat['lieuTravail'] ?>"
                                                    placeholder="" aria-label="">
                                            </div>
                                            <div class="col row g-1 align-items-center mb-3">
                                                <div class="col-2 col-xxl-1">
                                                    <label for="salaire" class="col-form-label">Salaire de base</label>
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="salaire"
                                                        placeholder="Entrer le salaire de base" value="<?= $contrat['salaire'] ?>">
                                                </div>
                                            </div>
                                            <div class="col row g-1 align-items-center mb-3">
                                                <div class="col-2 col-xxl-1">
                                                    <label for="moyenPaiement" class="col-form-label">Type de paiement</label>
                                                </div>
                                                <div class="col">
                                                    <select type="text" class="form-select" name="moyenPaiement" value="<?= $contrat['moyenPaiement'] ?>">
                                                        <option default>Virement bancaire</option>
                                                        <option value="Mobile Money">Mobile Money</option>
                                                        <option value="En espèce">En espèce</option>
                                                    </select>
                                                </div>
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

    dateDebut.value = today;
    typeContrat.addEventListener('change', function() {
        if (this.value === 'CDI') {
            endDate.classList.add('d-none');
        } else {
            endDate.classList.remove('d-none');
        }
    });
</script>
<?= $this->endSection() ?>