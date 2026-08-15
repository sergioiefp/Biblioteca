<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Biblioteca - cadastro aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php include VIEWS . "/Includes/menu.php"; ?>


        <h1>Cadastro Aluno</h1>
        <form action="/aluno/cadastro" method="post">
            <!-- Campo oculto para enviar o ID durante a edição -->
            <input type="hidden" name="id" value="<?= $aluno->Id ?? '' ?>">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" value="<?= $aluno->Nome ?? '' ?>" class="form-control" id="nome" name="nome" placeholder="Nome do aluno">
            </div>
            <div class="mb-3">
                <label for="ra" class="form-label">RA:</label>
                <input type="text" value="<?= $aluno->RA ?? '' ?>" class="form-control" id="ra" name="ra" placeholder="RA do aluno">
            </div>
            <div class="mb-3">
                <label for="curso" class="form-label">Curso:</label>
                <input type="text" value="<?= $aluno->Curso ?? '' ?>" class="form-control" id="curso" name="curso" placeholder="Curso do aluno">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>