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
        <input type="hidden" name="status" value="<?= $flashData ? $flashData : null ?>" id="status">
    <?php
    }
    ?>

    <div>
        <form class="px-4" action="<?= base_url('employee/contrat/add') ?>" method="post">
            <div class="row row-cols-1 gx-2 gy-2">
                <div class="col row g-1 align-items-center mb-3" id="contactField">
                    <div class="col-2 col-xxl-1">
                        <label for="contactInput" class="col-form-label">Coordonnée :</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="contactInput" id="contactInput"
                            placeholder="Email ou numéro téléphone">
                    </div>
                </div>

                <!-- Display Employee Name -->
                <div class="col row g-1 align-items-center mb-3 d-none" id="contactErrorMsgBox">
                    <div class="col-2 col-xxl-1"></div>
                    <div class="col text-danger" id="contactErrorMsg"></div>
                </div>
                <div class="col row g-1 align-items-center d-none" id="lastNameGroup">
                    <div class="col-2 col-xxl-1">
                        Nom :
                    </div>
                    <div class="col text-success" id="lastname">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3 d-none" id="firstNameGroup">
                    <div class="col-2 col-xxl-1">
                        Prénoms :
                    </div>
                    <div class="col text-success" id="firstname">
                    </div>
                </div>

                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="typeContrat" class="col-form-label">Contrat :</label>
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
                        <label for="poste" class="col-form-label">Poste :</label>
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
                        <label for="dateDebut" class="col-form-label">Début :</label>
                    </div>
                    <div class="col">
                        <input type="date" id="dateDebut" class="form-control" name="dateDebut"
                            placeholder="Entrer la date de début du contrat" min="<?= $currentDate ?>">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3" id="endDate">
                    <div class="col-2 col-xxl-1">
                        <label for="dateFin" class="col-form-label">Fin :</label>
                    </div>
                    <div class="col">
                        <input type="date" id="dateFin" class="form-control" name="dateFin"
                            aria-label="" placeholder="Entrer la date de fin du contrat">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="lieuTravail" class="col-form-label">Lieu :</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="lieuTravail"
                            placeholder="Entrer le lieu de travail" aria-label="">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="salaire" class="col-form-label">Salaire de base :</label>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="salaire"
                            placeholder="Entrer le salaire de base" aria-label="">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="moyenPaiement" class="col-form-label">Moyen de paiement :</label>
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
                        <label class="col-form-label">Lundi :</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="mondayStartTime">
                        <input type="time" class="form-control" name="mondayEndTime">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Mardi :</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="tuesdayStartTime">
                        <input type="time" class="form-control" name="tuesdayEndTime">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Mercredi :</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="wednesdayStartTime">
                        <input type="time" class="form-control" name="wednesdayEndTime">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Jeudi :</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="thursdayStartTime">
                        <input type="time" class="form-control" name="thursdayEndTime">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Vendredi :</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="fridayStartTime">
                        <input type="time" class="form-control" name="fridayEndTime">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Samedi :</label>
                    </div>
                    <div class="col input-group">
                        <input type="time" class="form-control" name="saturdayStartTime">
                        <input type="time" class="form-control" name="saturdayEndTime">
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-1">
                    <div class="col-2 col-xxl-1">
                        <label class="col-form-label">Dimanche :</label>
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
                            <td class="text-center"><?= date('d-m-Y', strtotime($contrat['dateFin'])) ?></td>
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

                        <!--Edit Modal -->
                        <div class="modal modal-lg fade" id="editContrat<?= $contrat['idContrat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <?php
                                        $horaireData = [];
                                        foreach ($contrat['horaires'] as $horaire) {
                                            $horaireData[$horaire['jours']] = [
                                                'startTime' => $horaire['heureDebut'],
                                                'endTime' => $horaire['heureFin'],
                                            ];
                                        }

                                        ?>
                                        <form action="<?= base_url('employee/contrat/update/' . $contrat['idContrat']) ?>" method="post">
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="col mb-4">
                                                <label for="employeeNumber" class="form-label">N° Matricule :</label>
                                                <input type="text" class="form-control" name="employeeNumber" value="<?= $contrat['idContrat'] ?>" disabled>
                                            </div>
                                            <div class="col mb-4">
                                                <label for="typeContrat" class="form-label">Contrat :</label>
                                                <select type="text" id="typeContrat" class="form-select" name="typeContrat"
                                                    placeholder="Entrer le type de contrat" aria-label="">
                                                    <option value="CDD" <?= ($contrat['typeContrat'] == 'CDD') ? "selected" : "" ?>>CDD</option>
                                                    <option value="CDI" <?= ($contrat['typeContrat'] == 'CDI')  ? "selected" : "" ?>>CDI</option>
                                                    <option value="Stage" <?= ($contrat['typeContrat'] == 'Stage') ? "selected" : "" ?>>Stage</option>
                                                    <option value="Alternance" <?= ($contrat['typeContrat'] == 'Alternance') ? "selected" : "" ?>>Alternance</option>
                                                </select>
                                            </div>
                                            <div class="col mb-4">
                                                <label for="poste" class="form-label">Poste :</label>
                                                <select type="text" id="poste" class="form-select" name="poste">
                                                    <?php
                                                    foreach ($postes as $poste) {
                                                    ?>
                                                        <option value="<?= $poste['poste'] ?>" <?= ($contrat['poste'] == $poste['poste']) ? "selected" : "" ?>>
                                                            <?= $poste['poste'] ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col mb-4">
                                                <label for="dateDebut" class="form-label">Début :</label>
                                                <input type="date" class="form-control" name="dateDebut" value="<?= $contrat['dateDebut'] ?>"
                                                    aria-label="">
                                            </div>
                                            <div class="col mb-4">
                                                <label for="dateFin" class="form-label">Fin :</label>
                                                <input type="date" class="form-control" name="dateFin" value="<?= $contrat['dateFin'] ?>"
                                                    aria-label="">
                                            </div>
                                            <div class="col mb-4">
                                                <label for="lieuTravail" class="form-label">Lieu :</label>
                                                <input type="text" class="form-control" name="lieuTravail" value="<?= $contrat['lieuTravail'] ?>"
                                                    placeholder="" aria-label="">
                                            </div>
                                            <div class="col mb-4">
                                                <label for="salaire" class="form-label">Salaire de base :</label>
                                                <input type="number" class="form-control" name="salaire"
                                                    placeholder="Entrer le salaire de base" value="<?= $contrat['salaire'] ?>">
                                            </div>
                                            <div class="col mb-4">
                                                <label for="moyenPaiement" class="col-form-label">Type de paiement :</label>
                                                <select type="text" class="form-select" name="moyenPaiement">
                                                    <option default>Virement bancaire</option>
                                                    <option value="Mobile Money">Mobile Money</option>
                                                    <option value="En espèce">En espèce</option>
                                                </select>
                                            </div>
                                            <div class="col mb-4">
                                                <label class="col-form-label">Lundi :</label>
                                                <div class="col input-group">
                                                    <input type="time" class="form-control" name="mondayStartTime"
                                                        value="<?= array_key_exists('Lundi', $horaireData) ? $horaireData['Lundi']['startTime'] : ""; ?>">

                                                    <input type="time" class="form-control" name="mondayEndTime"
                                                        value="<?= array_key_exists('Lundi', $horaireData) ? $horaireData['Lundi']['endTime'] : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="col mb-4">
                                                <label class="col-form-label">Mardi :</label>
                                                <div class="col input-group">
                                                    <input type="time" class="form-control" name="tuesdayStartTime"
                                                        value="<?= array_key_exists('Mardi', $horaireData) ? $horaireData['Mardi']['startTime'] : ""; ?>">

                                                    <input type="time" class="form-control" name="tuesdayEndTime"
                                                        value="<?= array_key_exists('Mardi', $horaireData) ? $horaireData['Mardi']['endTime'] : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="col mb-4">
                                                <label class="col-form-label">Mercredi :</label>
                                                <div class="col input-group">
                                                    <input type="time" class="form-control" name="wednesdayStartTime"
                                                        value="<?= array_key_exists('Mercredi', $horaireData) ? $horaireData['Mercredi']['startTime'] : ""; ?>">

                                                    <input type="time" class="form-control" name="wednesdayEndTime"
                                                        value="<?= array_key_exists('Mercredi', $horaireData) ? $horaireData['Mercredi']['endTime'] : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="col mb-4">
                                                <label class="col-form-label">Jeudi :</label>
                                                <div class="col input-group">
                                                    <input type="time" class="form-control" name="thursdayStartTime"
                                                        value="<?= array_key_exists('Jeudi', $horaireData) ? $horaireData['Jeudi']['startTime'] : ""; ?>">

                                                    <input type="time" class="form-control" name="thursdayEndTime"
                                                        value="<?= array_key_exists('Jeudi', $horaireData) ? $horaireData['Jeudi']['endTime'] : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="col mb-4">
                                                <label class="col-form-label">Vendredi :</label>
                                                <div class="col input-group">
                                                    <input type="time" class="form-control" name="fridayStartTime"
                                                        value="<?= array_key_exists('Vendredi', $horaireData) ? $horaireData['Vendredi']['startTime'] : ""; ?>">

                                                    <input type="time" class="form-control" name="fridayEndTime"
                                                        value="<?= array_key_exists('Vendredi', $horaireData) ? $horaireData['Vendredi']['endTime'] : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="col mb-4">
                                                <label class="col-form-label">Samedi :</label>
                                                <div class="col input-group">
                                                    <input type="time" class="form-control" name="saturdayStartTime"
                                                        value="<?= array_key_exists('Samedi', $horaireData) ? $horaireData['Samedi']['startTime'] : ""; ?>">

                                                    <input type="time" class="form-control" name="saturdayEndTime"
                                                        value="<?= array_key_exists('Samedi', $horaireData) ? $horaireData['Samedi']['endTime'] : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="col mb-4">
                                                <label class="col-form-label">Dimanche :</label>
                                                <div class="col input-group">
                                                    <input type="time" class="form-control" name="sundayStartTime"
                                                        value="<?= array_key_exists('Dimanche', $horaireData) ? $horaireData['Dimanche']['startTime'] : ""; ?>">

                                                    <input type="time" class="form-control" name="sundayEndTime"
                                                        value="<?= array_key_exists('Dimanche', $horaireData) ? $horaireData['Dimanche']['endTime'] : ""; ?>">
                                                </div>
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
<script src="<?= base_url('js/contract.js') ?>"></script>
<script>
    
</script>
<?= $this->endSection() ?>