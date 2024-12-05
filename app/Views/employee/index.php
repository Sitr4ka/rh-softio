<?= $this->extend('base') ?>

<?= $this->section('title') ?> RH | Gestion des personnels<?= $this->endSection() ?>

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
        <form class="px-4" action="<?= base_url('employee/add') ?>" method="post">
            <?= csrf_field(); ?>

            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="row row-cols-1 gx-2 gy-2 mb-3">
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1 ">
                        <label for="nom" class="col-form-label">Nom</label>
                    </div>
                    <div class="col">
                        <input type="text" id="nom" name="nom" class="form-control"
                            placeholder="Entrez votre nom" value="<?= old('nom') ?>">
                        <?php if (isset($errors['nom'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['nom']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="prenoms" class="col-form-label">Prénoms</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="prenoms"
                            placeholder="Entrez vos prénoms" value="<?= old('prenoms') ?>">
                        <?php if (isset($errors['prenoms'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['prenoms']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="adresse" class="col-form-label">Adresse</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="adresse"
                            placeholder="Entrez votre adresse" value="<?= old('adresse') ?>">
                        <?php if (isset($errors['adresse'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['adresse']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="contact" class="col-form-label">Contact</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="contact"
                            placeholder="Entrez votre numéro" value="<?= old('contact') ?>">
                        <?php if (isset($errors['contact'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['contact']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class=" col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="email" class="col-form-label">Email</label>
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" name="email"
                            placeholder="Entrez votre email" value="<?= old('email') ?>">
                        <?php if (isset($errors['email'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['email']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="numeroCin" class="col-form-label">N° CIN</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="numeroCin"
                            placeholder="Entrez votre numéro CIN" value="<?= old('numeroCin') ?>">
                        <?php if (isset($errors['numeroCin'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['numeroCin']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="dateCin" class="col-form-label">Date de délivrance</label>
                    </div>
                    <div class="col">
                        <input type="date" class="form-control" name="dateCin" value="<?= old('dateCin') ?>">
                        <?php if (isset($errors['dateCin'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['dateCin']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class=" col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="lieuCin" class="col-form-label">Lieu</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="lieuCin"
                            placeholder="Entrez le lieu de délivrance" value="<?= old('lieuCin') ?>">
                        <?php if (isset($errors['lieuCin'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['lieuCin']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="nationalite" class="col-form-label">Nationalité</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="nationalite"
                            placeholder="Entrez votre nationalité" value="<?= old('nationalite') ?>">
                        <?php if (isset($errors['nationalite'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['nationalite']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class=" col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="etatCivil" class="col-form-label">Etat Civil</label>
                    </div>
                    <div class="col">
                        <select class="form-select" name="etatCivil" value="<?= old('etatCivil') ?>">
                            <option selected>Célibataire</option>
                            <option value="marié(e)">Marié(e)</option>
                        </select>
                        <?php if (isset($errors['etatCivil'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['etatCivil']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="nomUrgence" class="col-form-label">Nom Urgence</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="nomUrgence"
                            placeholder="Entrez un nom d'urgence" value="<?= old('nomUrgence') ?>">
                        <?php if (isset($errors['nomUrgence'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['nomUrgence']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="contactUrgence" class="col-form-label">Contact d'Urgence</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="contactUrgence"
                            placeholder="Entrez le numéro d'urgence" value="<?= old('contactUrgence') ?>">
                        <?php if (isset($errors['contactUrgence'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['contactUrgence']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col row g-1 align-items-center mb-3">
                    <div class="col-2 col-xxl-1">
                        <label for="relationUrgence" class="col-form-label">Relation</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="relationUrgence"
                            placeholder="Relation avec l' urgence" value="<?= old('relationUrgence') ?>">
                        <?php if (isset($errors['relationUrgence'])): ?>
                            <div class="ms-2 mt-1 text-danger">
                                <?= esc($errors['relationUrgence']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </form>
        <div class="container-fluid employeeTable overflow-x-auto">
            <div class="headerEmployeeTable d-flex justify-content-end mb-3">
                <form action="<?= base_url('employee') ?>" method="get">
                    <div class="input-group">
                        <button class="btn btn-primary" type="submit" id="searchBtn">Rechercher</button>
                        <input type="search" class="form-control" name="searchEmployee" value="<?= ($search) ? $search :  "" ?>">
                    </div>
                </form>
            </div>
            <table id="employeeTable" class="table table-borderless table-hover table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class=" bg-info">#</th>
                        <th class=" bg-info">Nom</th>
                        <th class=" bg-info">Prénoms</th>
                        <th class=" bg-info">Adresse</th>
                        <th class=" bg-info">Contact</th>
                        <th class=" bg-info">Email</th>
                        <th class=" bg-info">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee) {
                    ?>
                        <tr>
                            <td> <?= $employee['idEmploye'] ?> </td>
                            <td> <?= $employee['nom']         ?> </td>
                            <td> <?= $employee['prenoms']      ?> </td>
                            <td> <?= $employee['adresse']     ?> </td>
                            <td> <?= $employee['contact']     ?> </td>
                            <td> <?= $employee['email']        ?> </td>
                            <td class="d-flex gap-2">

                                <!-- Delete Button modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $employee['idEmploye'] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Edit Button modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editEmployeeModal<?= $employee['idEmploye'] ?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Deletion Modal -->
                        <div class="modal fade" id="deleteModal<?= $employee['idEmploye'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez vous vraiment supprimer cet employé ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <a href="<?= base_url('employee/delete/' . $employee['idEmploye']) ?>" class="btn btn-primary">
                                            Continuer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Edit Modal -->
                        <div class="modal modal-lg fade" id="editEmployeeModal<?= $employee['idEmploye'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('employee/update/' . $employee['idEmploye']) ?>" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="mb-3">
                                                <label for="nom" class="form-label">Nom</label>
                                                <input type="text" name="nom" id="nom" class="form form-control" value="<?= $employee['nom'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="prenoms" class="form-label">Prénoms</label>
                                                <input type="text" name="prenoms" id="prenoms" class="form form-control" value="<?= $employee['prenoms'] ?>">
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
                                                <input type="email" name="email" id="email" class="form form-control" value="<?= $employee['email'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="numeroCin" class="form-label">CIN</label>
                                                <input type="text" name="numeroCin" id="numeroCin" class="form form-control" value="<?= $employee['numeroCin'] ?>">
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
                                                <input type="text" name="nationalite" id="nationalite" class="form form-control" value="<?= $employee['nationalite'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="etatCivil" class="form-label">Etat Civil</label>
                                                <input type="text" name="etatCivil" id="etatCivil" class="form form-control" value="<?= $employee['etatCivil'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nomUrgence" class="form-label">Urgence</label>
                                                <input type="text" name="nomUrgence" id="nomUrgence" class="form form-control" value="<?= $employee['nomUrgence'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="contactUrgence" class="form-label">Contact Urgence</label>
                                                <input type="text" name="contactUrgence" id="contactUrgence" class="form form-control" value="<?= $employee['contactUrgence'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="relationUrgence" class="form-label">Relation</label>
                                                <input type="text" name="relationUrgence" id="relationUrgence" class="form form-control" value="<?= $employee['relationUrgence'] ?>">
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
            <?= $pager->links('default', 'mypager') ?>
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

    .employeeTable {
        min-height: 400px;
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('js/employee.js') ?>"></script>
<?= $this->endSection() ?>