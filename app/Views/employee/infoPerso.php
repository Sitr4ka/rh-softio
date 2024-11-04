<?= $this->extend('base') ?>

<?= $this->section('title') ?> RH | Softio<?= $this->endSection() ?>

<?= $this->section('content') ?>

<main class="main container-fluid">
    <?= $this->include('_partials/employeeHeader') ?>
    <!-- Message alert -->
    <?php
    if (session()->getFlashdata("status")) {
    ?>
        <div class="alert alert-success alert-dismissible fade show mx-4 mt-2" role="alert">
            <?php echo session()->getFlashdata("status"); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>

    <div>
        <!-- Add Personal Informations -->
        <form class="px-4" action="<?= base_url('infoPerso/add') ?>" method="post">
            <div class="row row-cols-1 gx-2 gy-2 mb-3">
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1 ">
                        <label for="lastName" class="col-form-label">Nom</label>
                    </div>
                    <div class="col">
                        <input type="text" id="lastName" name="lastName" class="form-control" aria-describedby="passwordHelpInline"
                            placeholder="Entrez votre nom" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="firstName" class="col-form-label">Prénoms</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="firstName"
                            placeholder="Entrez vos prénoms" aria-label="Last name" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="address" class="col-form-label">Adresse</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="address"
                            placeholder="Entrez votre adresse" aria-label="First name" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="contact" class="col-form-label">Contact</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="contact"
                            placeholder="Entrez votre numéro" aria-label="Last name" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="email" class="col-form-label">Email</label>
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" name="email"
                            placeholder="Entrez votre email" aria-label="First name" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="numCin" class="col-form-label">Num CIN</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="numCin"
                            placeholder="Entrez votre numéro CIN" aria-label="First name" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="dateCin" class="col-form-label">Date de délivrance</label>
                    </div>
                    <div class="col">
                        <input type="date" class="form-control" name="dateCin"
                            aria-label="Last name" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="lieuCin" class="col-form-label">Lieu</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="lieuCin"
                            placeholder="Entrez le lieu de délivrance" aria-label="First name" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="nationalite" class="col-form-label">Nationalité</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="nationalite"
                            placeholder="Entrez votre nationalité" aria-label="Last name" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="etatCivil" class="col-form-label">Etat Civil</label>
                    </div>
                    <div class="col">
                        <select class="form-select" name="etatCivil"
                            aria-label="Default select example">
                            <option selected>Célibataire</option>
                            <option value="marie">Marié</option>
                        </select>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="urgenceName" class="col-form-label">Nom Urgence</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="urgenceName"
                            placeholder="Entrez un nom d'urgence" aria-label="Nom Urgence" required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="urgenceNum" class="col-form-label">Contact d'Urgence</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="urgenceNum"
                            placeholder="Entrez le numéro d'urgence" aria-label="Contact d'Urgence"
                            required>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="urgenceRelation" class="col-form-label">Relation</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="urgenceRelation"
                            placeholder="Relation avec l'urgence" aria-label="Relation" required>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </form>
        <div class="search-employee border border-1 bg-white row mx-4 rounded-3">
            <form class="offset-9 col-3 d-flex align-items-center ">
                <input type="search" name="searchKeyword" id="searchKeyword" class="form-control"
                    placeholder="Rechercher">
                <button type="submit" class="btn">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="p-4">
            <table class="table table-borderless table-hover table-striped mt-3" id="infoPersoTable">
                <thead>
                    <tr>
                        <th class="text-center bg-info">#</th>
                        <th class="text-center bg-info">Nom</th>
                        <th class="text-center bg-info">Prénoms</th>
                        <th class="text-center bg-info">Adresse</th>
                        <th class="text-center bg-info">Contact</th>
                        <th class="text-center bg-info">Email</th>
                        <th class="text-center bg-info">Action</th>
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

                                <!-- Delete Button modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $employee['idInfoPerso'] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Edit Button modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $employee['idInfoPerso'] ?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Deletion Modal -->
                        <div class="modal fade" id="deleteModal<?= $employee['idInfoPerso'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <a href="<?= base_url('employee/delete/' . $employee['idInfoPerso']) ?>" class="btn btn-primary">
                                            Continuer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Edit Modal -->
                        <div class="modal fade" id="editModal<?= $employee['idInfoPerso'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('infoPerso/update/' . $employee['idInfoPerso']) ?>" method="post">
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
                                                <label for="address" class="form-label">Adresse</label>
                                                <input type="text" name="address" id="address" class="form form-control" value="<?= $employee['adresse'] ?>">
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
                                                <label for="urgenceRelation" class="form-label">Relation</label>
                                                <input type="text" name="urgenceRelation" id="urgenceRelation" class="form form-control" value="<?= $employee['relation'] ?>">
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
</main>

<?= $this->endSection() ?>


<?= $this->section('stylesheet') ?>

<style>
    .main {
        min-height: calc(100vh - 60px);
        max-height: calc(100vh - 60px);
        overflow-y: auto;
    }

    .search-employee {
        height: 75px;
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    infoPersoNav.classList.add('active')
    employeeNav.classList.add('active')
</script>
<?= $this->endSection() ?>