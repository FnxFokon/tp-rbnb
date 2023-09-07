<div class="col-4 d-flex flex-column border p-3">
    <h1><?= $title_tag ?></h1>
    <form action="/login" method="post">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de Passe</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary align-center">S'Enregistrer</button>
        </div>
    </form>
</div>