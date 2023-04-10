<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
</head>

<?php
  if(!empty($_GET['msgErro'])) {
    $msg = $_GET['msgErro'];
    $class = 'alert alert-danger';
  } else if (!empty($_GET['msgSucesso'])) {
    $msg = $_GET['msgSucesso'];
    $class = 'alert alert-success';
  } else {
    $msg = null;
  }
?>
<?php if (isset($msg)) { ?>
<div class="<?= $class ?>">
  <?= $msg  ?>
</div>
<?php } ?>

<h1>Listagem de Doutores</h1>
<a class="btn btn-primary mb-2" href="<?php echo APP; ?>doutor/novo">Novo</a>
<div class="consultas">
  <table class="table-consulta">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Área de Atuação</th>
        <th>Funcionalidades</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($doutores as $doutor) : ?>
      <?php
        $path_editar = APP . 'doutor/editar';
        $path_excluir = APP . 'doutor/excluir';
        ?>
      <tr>
        <td><?= $doutor['id'] ?></td>
        <td><?= $doutor['nome'] ?></td>
        <td><?= $doutor['atuacao'] ?></td>
        <td>
          <div class="btns">
            <a href="<?= $path_editar ?>/<?= $doutor['id'] ?>"><button>Alterar</button></a>
            <a href="<?= $path_excluir ?>/<?= $doutor['id'] ?>"><button>Excluir</button></a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<d