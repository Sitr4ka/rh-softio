<?= $this->extend('base') ?>

<?= $this->section('content') ?>
<main class="main container-fluid">
    <header class="mt-3 mx-4">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                    aria-selected="true">Informations Personnelles
                </button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                    aria-selected="false">Embauche
                </button>
            </div>
        </nav>
    </header>
    <div class="tab-content pt-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
            aria-labelledby="nav-home-tab" tabindex="0">
            <form class="px-4" action="">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gx-2 gy-2 mb-3">
                    <div class="col py-1">
                        <label for="lastName">Nom</label>
                        <input type="text" class="form-control" name="lastName"
                            placeholder="Entrez votre nom" aria-label="Nom" required>
                    </div>
                    <div class="col py-1">
                        <label for="firstName">Prénoms</label>
                        <input type="text" class="form-control" name="firstName"
                            placeholder="Entrez vos prénoms" aria-label="Last name" required>
                    </div>
                    <div class="col py-1">
                        <label for="address">Adresse</label>
                        <input type="text" class="form-control" name="address"
                            placeholder="Entrez votre adresse" aria-label="First name" required>
                    </div>
                    <div class="col py-1">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" name="contact"
                            placeholder="Entrez votre numéro" aria-label="Last name" required>
                    </div>
                    <div class="col py-1">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email"
                            placeholder="Entrez votre email" aria-label="First name" required>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gx-2 gy-2 mb-3">
                    <div class="col py-1">
                        <label for="cinNum">Num CIN</label>
                        <input type="text" class="form-control" name="cinNum"
                            placeholder="Entrez votre numéro CIN" aria-label="First name" required>
                    </div>
                    <div class="col py-1">
                        <label for="dateDelivrance">Date de délivrance</label>
                        <input type="date" class="form-control" name="dateDelivrance"
                            aria-label="Last name" required>
                    </div>
                    <div class="col py-1">
                        <label for="lieuDélivrance">Lieu</label>
                        <input type="text" class="form-control" name="address"
                            placeholder="Entrez le lieu de délivrance" aria-label="First name" required>
                    </div>
                    <div class="col py-1">
                        <label for="nationalite">Nationalité</label>
                        <input type="text" class="form-control" name="nationalite"
                            placeholder="Entrez votre nationalité" aria-label="Last name" required>
                    </div>
                    <div class="col py-1">
                        <label for="etatCivil">Etat Civil</label>
                        <select class="form-select" name="etatCivil"
                            aria-label="Default select example">
                            <option selected>Célibataire</option>
                            <option value="marie">Marié</option>
                        </select>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gx-2 gy-2 mb-3">
                    <div class="col py-1">
                        <label for="urgenceName">Nom Urgence</label>
                        <input type="text" class="form-control" name="urgencame"
                            placeholder="Entrez un nom d'urgence" aria-label="Nom Urgence" required>
                    </div>
                    <div class="col py-1">
                        <label for="urgenceNum">Contact d'Urgence</label>
                        <input type="text" class="form-control" name="urgenceNum"
                            placeholder="Entrez le numéro d'urgence" aria-label="Contact d'Urgence"
                            required>
                    </div>
                    <div class="col py-1">
                        <label for="urgenceRelation">Relation</label>
                        <input type="text" class="form-control" name="urgenceRelation"
                            placeholder="Relation avec l'urgence" aria-label="Relation" required>
                    </div>

                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
            <div class="p-4">
                <table class="table table-borderless table-hover table-striped mt-3 ">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Prénoms</th>
                            <th class="text-center">Adresse</th>
                            <th class="text-center">Contact</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employees as $employee) {
                        ?>
                            <tr>
                                <td> <?= $employee['idInfoPerso'] ?> </td>
                                <td> <?= $employee['nom']         ?> </td>
                                <td> <?= $employee['prenom']      ?> </td>
                                <td> <?= $employee['adresse']     ?> </td>
                                <td> <?= $employee['contact']     ?> </td>
                                <td> <?= $employee['mail']        ?> </td>
                                <td class="d-flex gap-2">
                                    <a href="<?= base_url('employee/delete/' . $employee['idInfoPerso']) ?>" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $employee['idInfoPerso'] ?>">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="editModal<?= $employee['idInfoPerso'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modification</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('employee/update/' . $employee['idInfoPerso']) ?>" method="post">
                                                <input type="hidden" name="_method" value="PUT">
                                                <div class="">
                                                    <label for="lastName" class="form-label">Nom</label>
                                                    <input type="text" name="lastName" id="lastName" class="form form-control" value="<?= $employee['nom'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="firstName" class="form-label">Prénoms</label>
                                                    <input type="text" name="firstName" id="firstName" class="form form-control" value="<?= $employee['prenom'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="adresse" class="form-label">Adresse</label>
                                                    <input type="text" name="adresse" id="adresse" class="form form-control" value="<?= $employee['adresse'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="contact" class="form-label">Contact</label>
                                                    <input type="text" name="contact" id="contact" class="form form-control" value="<?= $employee['contact'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="email" id="email" class="form form-control" value="<?= $employee['mail'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="numCin" class="form-label">CIN</label>
                                                    <input type="text" name="numCin" id="numCin" class="form form-control" value="<?= $employee['numeroCin'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dateCin" class="form-label">Date</label>
                                                    <input type="date" name="dateCin" id="dateCin" class="form form-control" value="<?= $employee['dateCin'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="lieuCin" class="form-label">Lieu</label>
                                                    <input type="text" name="lieuCin" id="lieuCin" class="form form-control" value="<?= $employee['lieuCin'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nationalite" class="form-label">Nationalité</label>
                                                    <input type="text" name="nationalite" id="nationalite" class="form form-control" value="<?= $employee['nationalité'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="etatCivil" class="form-label">Etat Civil</label>
                                                    <input type="text" name="etatCivil" id="etatCivil" class="form form-control" value="<?= $employee['etatCivil'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="urgenceName" class="form-label">Urgence</label>
                                                    <input type="text" name="urgenceName" id="urgenceName" class="form form-control" value="<?= $employee['nomUrgence'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="urgenceNum" class="form-label">Contact Urgence</label>
                                                    <input type="text" name="urgenceNum" id="urgenceNum" class="form form-control" value="<?= $employee['contactUrgence'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="relation" class="form-label">Relation</label>
                                                    <input type="text" name="relation" id="relation" class="form form-control" value="<?= $employee['relation'] ?>">
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
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade text-black" id="nav-profile" role="tabpanel"
            aria-labelledby="nav-profile-tab" tabindex="0">
            <!-- Add Professional Informations -->
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

    .tab-pane label {
        padding-bottom: 5px;
    }
</style>
<?= $this->endSection() ?>