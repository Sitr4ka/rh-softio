<?= $this->extend('base') ?>

<?= $this->section('title') ?> RH | Contrat<?= $this->endSection() ?>

<!-- Need some change -->
<div class="col row g-1 align-items-center mb-3">
    <div class="col-2 col-xxl-1">
        Horaires
    </div>
    <div class="col">
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editHoraire">
            sélectionner
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
                        <label for="moyenPaiement" class="col-form-label">Moyen de paiement</label>
                    </div>
                    <div class="col">
                        <select type="text" class="form-select" name="moyenPaiement">
                            <option default>Virement bancaire</option>
                            <option value="Mobile Money">Mobile Money</option>
                            <option value="En espèce">En espèce</option>
                        </select>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Lundi</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="mondayStartTime">
                        <input type="time" class="form-control" name="mondayEndTime">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Mardi</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="tuesdayStartTime">
                        <input type="time" class="form-control" name="tuesdayEndTime">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Mercredi</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="wednesdayStartTime">
                        <input type="time" class="form-control" name="wednesdayEndTime">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Jeudi</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="thursdayStartTime">
                        <input type="time" class="form-control" name="thursdayEndTime">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Vendredi</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="fridayStartTime">
                        <input type="time" class="form-control" name="fridayEndTime">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Samedi</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="saturdayStartTime">
                        <input type="time" class="form-control" name="saturdayEndTime">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Dimanche</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="sundayStartTime">
                        <input type="time" class="form-control" name="sundayEndTime">
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
                            <td class="text-center"> <?= date('d-m-Y', strtotime($contrat['dateDebut'])) ?></td>
                            <td class="text-center"> <?= $contrat['dateFin'] ?></td>
                            <td class="text-end"> <?= number_format($contrat['salaire'], 0, ',', ' ') ?></td>
                            <td class="d-flex gap-2 justify-content-center">

                                <!-- Delete Button modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteContrat<?= $contrat['idContrat'] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Edit Button modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editContrat<?= $contrat['idContrat'] ?>">
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
    const dateDebut = document.querySelector('#dateDebut');
    const dateFin = document.querySelector('#dateFin');

    dateDebut.value = today;
    dateFin.setAttribute('min', dateDebut.value)

    typeContrat.addEventListener('change', function() {
        if (this.value === 'CDI') {
            endDate.classList.add('d-none');
        } else {
            endDate.classList.remove('d-none');
        }
    });
    dateDebut.addEventListener('input', function() {
        dateFin.setAttribute('min', this.value)
    })

    /**
     * Ajax
     */
    /*     $(document).ready(function() {
            // Lorsque l'utilisateur clique sur le bouton pour éditer un contrat
            $('.btn-edit-contrat').on('click', function() {
                var idContrat = $(this).data('id-contrat'); // Récupérer l'ID du contrat
                // Envoi de la requête AJAX pour récupérer les horaires
                $.ajax({
                    url: '/employee/contrat/horaires/' + idContrat, // Route vers la méthode getHoraires
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Réinitialiser toutes les cases à cocher
                        $('#monday').prop('checked', false);
                        $('#tuesday').prop('checked', false);
                        $('#wednesday').prop('checked', false);
                        $('#thursday').prop('checked', false);
                        $('#friday').prop('checked', false);
                        $('#saturday').prop('checked', false);
                        $('#sunday').prop('checked', false);

                        // Pré-cocher les cases des jours associés au contrat
                        response.joursSelectionnes.forEach(function(jour) {
                            switch (jour) {
                                case 'Lundi':
                                    $('#monday').prop('checked', true);
                                    break;
                                case 'Mardi':
                                    $('#tuesday').prop('checked', true);
                                    break;
                                case 'Mercredi':
                                    $('#wednesday').prop('checked', true);
                                    break;
                                case 'Jeudi':
                                    $('#thursday').prop('checked', true);
                                    break;
                                case 'Vendredi':
                                    $('#friday').prop('checked', true);
                                    break;
                                case 'Samedi':
                                    $('#saturday').prop('checked', true);
                                    break;
                                case 'Dimanche':
                                    $('#sunday').prop('checked', true);
                                    break;
                            }
                        });
                    },
                    error: function() {
                        alert("Erreur lors du chargement des horaires.");
                    }
                });
            });
        }); */
</script>
<?= $this->endSection() ?>