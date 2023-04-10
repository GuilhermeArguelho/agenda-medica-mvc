<?php
date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="pt-br">

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

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
  <title>Página Inicial</title>
</head>
<h1>Consultas</h1>
<a class="btn btn-primary mb-2" href="<?php echo APP; ?>consulta/novo">Novo</a>
<div class="consultas">
  <table class="table-consulta">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome do paciente</th>
        <th>Data/Hora</th>
        <th>Doutor</th>
        <th>Funcionalidades</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($consultas as $consulta) : ?>
      <?php
        $path_visualizar = APP . 'consulta/visualizar';
        $path_editar = APP . 'consulta/editar';
        $path_excluir = APP . 'consulta/excluir';
        $data = date("d/m/Y", strtotime($consulta['data']));
        $horario = date("H:i", strtotime($consulta['horario']));
        ?>
      <tr>
        <td><?= $consulta['id'] ?></td>
        <td><?= $consulta['nome_paciente'] ?></td>
        <td>
          <?= $data ?>
          <br>
          <?= $horario ?>
        </td>
        <td><?=$consulta['nome_doutor'] ?></td>
        <td>
          <div class="btns">
            <a href="<?= $path_visualizar ?>/<?= $consulta['id'] ?>"><button>Visualizar</button></a>
            <a href="<?= $path_editar ?>/<?= $consulta['id'] ?>"><button>Alterar</button></a>
            <a href="<?= $path_excluir ?>/<?= $consulta['id'] ?>"><button>Excluir</button></a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>