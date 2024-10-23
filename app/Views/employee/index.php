<?= $this->extend('base') ?>

<?= $this->section('title') ?> RH | Softio<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main class="main container-fluid">
    <header class="mt-3 mx-4">
        <nav>
            <div class="nav nav-tabs gap-2 " id="nav-tab" role="tablist">
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
    
    <div class="tab-content pt-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
            aria-labelledby="nav-home-tab" tabindex="0">

            <!-- Add Personal Informations -->
            <form class="px-4" action="<?= base_url('employee/add') ?>" method="post">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gx-2 gy-2 mb-3">
                    <div class="col">
                        <label for="lastName" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="lastName"
                            placeholder="Entrez votre nom" aria-label="Nom" required>
                    </div>
                    <div class="col">
                        <label for="firstName" class="form-label">Prénoms</label>
                        <input type="text" class="form-control" name="firstName"
                            placeholder="Entrez vos prénoms" aria-label="Last name" required>
                    </div>
                    <div class="col">
                        <label for="address" class="form-label">Adresse</label>
                        <input type="text" class="form-control" name="address"
                            placeholder="Entrez votre adresse" aria-label="First name" required>
                    </div>
                    <div class="col">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" name="contact"
                            placeholder="Entrez votre numéro" aria-label="Last name" required>
                    </div>
                    <div class="col">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email"
                            placeholder="Entrez votre email" aria-label="First name" required>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gx-2 gy-2 mb-3">
                    <div class="col">
                        <label for="numCin" class="form-label">Num CIN</label>
                        <input type="text" class="form-control" name="numCin"
                            placeholder="Entrez votre numéro CIN" aria-label="First name" required>
                    </div>
                    <div class="col">
                        <label for="dateCin" class="form-label">Date de délivrance</label>
                        <input type="date" class="form-control" name="dateCin"
                            aria-label="Last name" required>
                    </div>
                    <div class="col">
                        <label for="lieuCin" class="form-label">Lieu</label>
                        <input type="text" class="form-control" name="lieuCin"
                            placeholder="Entrez le lieu de délivrance" aria-label="First name" required>
                    </div>
                    <div class="col">
                        <label for="nationalite" class="form-label">Nationalité</label>
                        <input type="text" class="form-control" name="nationalite"
                            placeholder="Entrez votre nationalité" aria-label="Last name" required>
                    </div>
                    <div class="col">
                        <label for="etatCivil" class="form-label">Etat Civil</label>
                        <select class="form-select" name="etatCivil"
                            aria-label="Default select example">
                            <option selected>Célibataire</option>
                            <option value="marie">Marié</option>
                        </select>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gx-2 gy-2 mb-3">
                    <div class="col">
                        <label for="urgenceName" class="form-label">Nom Urgence</label>
                        <input type="text" class="form-control" name="urgenceName"
                            placeholder="Entrez un nom d'urgence" aria-label="Nom Urgence" required>
                    </div>
                    <div class="col">
                        <label for="urgenceNum" class="form-label">Contact d'Urgence</label>
                        <input type="text" class="form-control" name="urgenceNum"
                            placeholder="Entrez le numéro d'urgence" aria-label="Contact d'Urgence"
                            required>
                    </div>
                    <div class="col">
                        <label for="urgenceRelation" class="form-label">Relation</label>
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

        <div class="tab-pane fade text-black" id="nav-profile" role="tabpanel"
            aria-labelledby="nav-profile-tab" tabindex="0">

            <!-- Add Professional Informations -->
            <form class="px-4" action="<?= base_url('employee/infopro/add') ?>" method="post">
                <div class="row row-cols-1 gy-2 mb-3">
                    <div class="col">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email"
                            placeholder="" aria-label="" required>
                    </div>
                    <div class="col">
                        <label for="classification" class="form-label">Classification</label>
                        <input type="text" class="form-control" name="classification"
                            placeholder="" aria-label="">
                    </div>
                    <div class="col">
                        <label for="contractType" class="form-label">Contrat</label>
                        <select type="text" class="form-select" name="contractType"
                            placeholder="" aria-label="" required>
                            <option value="CDD">CDD</option>
                            <option value="CDI">CDI</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="hireDate" class="form-label">Début</label>
                        <input type="date" class="form-control" name="hireDate"
                            aria-label="" required>
                    </div>
                    <div class="col">
                        <label for="contractEndDate" class="form-label">Fin</label>
                        <input type="date" class="form-control" name="contractEndDate"
                            aria-label="">
                    </div>
                    <div class="col">
                        <label for="department" class="form-label">Service</label>
                        <input type="text" class="form-control" name="department"
                            placeholder="" aria-label="">
                    </div>
                    <div class="col">
                        <label for="workLocation" class="form-label">Lieu</label>
                        <input type="text" class="form-control" name="workLocation"
                            placeholder="" aria-label="" required>
                    </div>
                    <div class="col">
                        <label for="positionHeld" class="form-label">Poste</label>
                        <input type="text" class="form-control" name="positionHeld"
                            placeholder="" aria-label="" required>
                    </div>
                    <div class="col">
                        <label for="workingHours" class="form-label">Heures de travail</label>
                        <input type="number" class="form-control" name="workingHours"
                            placeholder="" aria-label="" required>
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
                            <th class="text-center">#</th>
                            <th class="text-center">Matricule</th>
                            <th class="text-center">Poste</th>
                            <th class="text-center">Début</th>
                            <th class="text-center">Fin</th>
                            <th class="text-center">Heures</th>
                            <th class="text-center">Action</th>
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
                                                        <option value="CDD">CDD</option>
                                                        <option value="CDI">CDI</option>
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
    </div>
</main>
<?= $this->endSection() ?>


<?= $this->section('stylesheet') ?>

    <style>
        :root {
            --primary-color: #4c4a4d;
            --secondary-color: #5c5560;
            --tertiary-color: #ecf0f1;
    
            --text-color: #bdb6c0;
        }
    
        .main {
            min-height: calc(100vh - 60px);
            max-height: calc(100vh - 60px);
            overflow-y: auto;
        }
    
        .tab-pane label {
            padding-bottom: 5px;
        }
    
        .nav-tabs .nav-link {
            background: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            color: var(--primary-color);
        }
    
        .nav-tabs .nav-link:hover {
            color: white;
            background: var(--secondary-color);
            opacity: .5;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
        }
    
        .nav-tabs .nav-link.active {
            color: white;
            background: var(--secondary-color);
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
    </style>
    
<?= $this->endSection() ?>


