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
                    aria-selected="false">Informations Professionnelles
                </button>
            </div>
        </nav>
    </header>
    <div class="tab-content pt-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
            aria-labelledby="nav-home-tab" tabindex="0">
            <form class="px-4" action="">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gx-5 gy-3 mb-3">
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
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gx-5 gy-3 mb-3">
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
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gx-5 gy-3 mb-3">
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
                <table class="table table-bordered table-hover table-striped mt-3 ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénoms</th>
                            <th>Adresse</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>RAKOTOMALALARINTSOA</td>
                            <td>Sitraka Fifaliana</td>
                            <td>Lot IVG 55 Behoririka</td>
                            <td class="justify-content-evenly d-flex ">
                                <span class="btn btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </span>
                                <span class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fa fa-edit"></i>
                                </span>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Modal
                                                    title</h1>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="px-4" action="">
                                                    <div class="row row-cols-1 gx-5 gy-3 mb-3">
                                                        <div class="col py-1">
                                                            <label for="lastName">Nom</label>
                                                            <input type="text" class="form-control"
                                                                name="lastName"
                                                                placeholder="Entrez votre nom"
                                                                aria-label="Nom" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="firstName">Prénoms</label>
                                                            <input type="text" class="form-control"
                                                                name="firstName"
                                                                placeholder="Entrez vos prénoms"
                                                                aria-label="Last name" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="address">Adresse</label>
                                                            <input type="text" class="form-control"
                                                                name="address"
                                                                placeholder="Entrez votre adresse"
                                                                aria-label="First name" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="contact">Contact</label>
                                                            <input type="text" class="form-control"
                                                                name="contact"
                                                                placeholder="Entrez votre numéro"
                                                                aria-label="Last name" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control"
                                                                name="email"
                                                                placeholder="Entrez votre email"
                                                                aria-label="First name" required>
                                                        </div>
                                                    </div>
                                                    <div class="row row-cols-1 gx-5 gy-3 mb-3">
                                                        <div class="col py-1">
                                                            <label for="cinNum">Num CIN</label>
                                                            <input type="text" class="form-control"
                                                                name="cinNum"
                                                                placeholder="Entrez votre numéro CIN"
                                                                aria-label="First name" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="dateDelivrance">Date de
                                                                délivrance</label>
                                                            <input type="date" class="form-control"
                                                                name="dateDelivrance"
                                                                aria-label="Last name" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="lieuDélivrance">Lieu</label>
                                                            <input type="text" class="form-control"
                                                                name="address"
                                                                placeholder="Entrez le lieu de délivrance"
                                                                aria-label="First name" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="nationalite">Nationalité</label>
                                                            <input type="text" class="form-control"
                                                                name="nationalite"
                                                                placeholder="Entrez votre nationalité"
                                                                aria-label="Last name" required>
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
                                                    <div class="row row-cols-1 gx-5 gy-3 mb-3">
                                                        <div class="col py-1">
                                                            <label for="urgenceName">Nom Urgence</label>
                                                            <input type="text" class="form-control"
                                                                name="urgencame"
                                                                placeholder="Entrez un nom d'urgence"
                                                                aria-label="Nom Urgence" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="urgenceNum">Contact
                                                                d'Urgence</label>
                                                            <input type="text" class="form-control"
                                                                name="urgenceNum"
                                                                placeholder="Entrez le numéro d'urgence"
                                                                aria-label="Contact d'Urgence" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label
                                                                for="urgenceRelation">Relation</label>
                                                            <input type="text" class="form-control"
                                                                name="urgenceRelation"
                                                                placeholder="Relation avec l'urgence"
                                                                aria-label="Relation" required>
                                                        </div>

                                                    </div>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        changes</button>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="">2</td>
                            <td class="">RAKOTOMALALARINTSOA</td>
                            <td class="">Santatra Fitahiana</td>
                            <td class="">Lot IVG 55 Behoririka</td>
                            <td class="justify-content-evenly d-flex ">
                                <span class="btn btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </span>
                                <span class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fa fa-edit"></i>
                                </span>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Modal
                                                    title</h1>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="px-4" action="">
                                                    <div class="row row-cols-1 gx-5 gy-3 mb-3">
                                                        <div class="col py-1">
                                                            <label for="lastName">Nom</label>
                                                            <input type="text" class="form-control"
                                                                name="lastName"
                                                                placeholder="Entrez votre nom"
                                                                aria-label="Nom" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="firstName">Prénoms</label>
                                                            <input type="text" class="form-control"
                                                                name="firstName"
                                                                placeholder="Entrez vos prénoms"
                                                                aria-label="Last name" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="address">Adresse</label>
                                                            <input type="text" class="form-control"
                                                                name="address"
                                                                placeholder="Entrez votre adresse"
                                                                aria-label="First name" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="contact">Contact</label>
                                                            <input type="text" class="form-control"
                                                                name="contact"
                                                                placeholder="Entrez votre numéro"
                                                                aria-label="Last name" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control"
                                                                name="email"
                                                                placeholder="Entrez votre email"
                                                                aria-label="First name" required>
                                                        </div>
                                                    </div>
                                                    <div class="row row-cols-1 gx-5 gy-3 mb-3">
                                                        <div class="col py-1">
                                                            <label for="cinNum">Num CIN</label>
                                                            <input type="text" class="form-control"
                                                                name="cinNum"
                                                                placeholder="Entrez votre numéro CIN"
                                                                aria-label="First name" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="dateDelivrance">Date de
                                                                délivrance</label>
                                                            <input type="date" class="form-control"
                                                                name="dateDelivrance"
                                                                aria-label="Last name" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="lieuDélivrance">Lieu</label>
                                                            <input type="text" class="form-control"
                                                                name="address"
                                                                placeholder="Entrez le lieu de délivrance"
                                                                aria-label="First name" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="nationalite">Nationalité</label>
                                                            <input type="text" class="form-control"
                                                                name="nationalite"
                                                                placeholder="Entrez votre nationalité"
                                                                aria-label="Last name" required>
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
                                                    <div class="row row-cols-1 gx-5 gy-3 mb-3">
                                                        <div class="col py-1">
                                                            <label for="urgenceName">Nom Urgence</label>
                                                            <input type="text" class="form-control"
                                                                name="urgencame"
                                                                placeholder="Entrez un nom d'urgence"
                                                                aria-label="Nom Urgence" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label for="urgenceNum">Contact
                                                                d'Urgence</label>
                                                            <input type="text" class="form-control"
                                                                name="urgenceNum"
                                                                placeholder="Entrez le numéro d'urgence"
                                                                aria-label="Contact d'Urgence" required>
                                                        </div>
                                                        <div class="col py-1">
                                                            <label
                                                                for="urgenceRelation">Relation</label>
                                                            <input type="text" class="form-control"
                                                                name="urgenceRelation"
                                                                placeholder="Relation avec l'urgence"
                                                                aria-label="Relation" required>
                                                        </div>

                                                    </div>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        changes</button>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>RAKOTOMALALARINTSOA</td>
                            <td>Saotra Fihobiana</td>
                            <td>Lot IVG 55 Behoririka</td>
                            <td class="justify-content-evenly d-flex ">
                                <span class="btn btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </span>
                                <span class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fa fa-edit"></i>
                                </span>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Modal
                                                    title</h1>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
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


<?= $this->section('stylesheet')?>
<style>
.main {
    min-height: calc(100vh - 60px);
    max-height: calc(100vh - 60px);
    overflow-y: auto;
}
</style>
<?= $this->endSection() ?>