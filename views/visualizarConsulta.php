<?php
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/cad_consulta.css">
  <link rel="stylesheet" href="../assets/css/index.css">
  <link rel="stylesheet" href="../assets/css/visualizar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
</head>
<?php
  $horario = date("H:i", strtotime($consulta['horario']));
?>
<header>
  <h1>Consulta do(a) paciente <?= $consulta['nome_paciente'] ?></h1>
</header>
<form id="form_consulta" action="<?php echo APP; ?>consulta/salvar" method="post">
  <div class="mb-3">
    <label for="name" class="form-label">Nome do Paciente</label>
    <input type="text" class="form-control" name="nomePaciente" id="nomePaciente" value="<?php echo $consulta['nome_paciente']; ?>" readonly>
  </div>

  <div class="mb-3">
    <label for="cpf" class="form-label">CPF</label>
    <input type="cpf" class="form-control" name="cpf" id="cpf" value="<?php echo $consulta['cpf']; ?>" readonly>
  </div>

  <div class="mb-3">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $consulta['telefone']; ?>" readonly>
  </div>

  <div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea name="descricao" class="form-control" id="descricao" readonly><?php echo $consulta['descricao']; ?></textarea>
  </div>

  <div id="datahora">
    <div class="mb-3">
      <label for="data" class="form-label">Data</label>
      <input type="date" class="form-control" name="data" id="data" value="<?php echo $consulta['data']; ?>" readonly>
    </div>
    <div class="mb-3">
      <label for="horario" class="form-label">Horário</label>
      <input type="time" class="form-control" name="horario" id="horario" value="<?php echo $horario; ?>" readonly>
    </div>
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Doutor</label>
    <input type="name" class="form-control" name="nome_doutor" id="nome_doutor" value="<?php echo $doutor['nome']; ?>" readonly>
  </div>

  <div class="mb-3">
    <label for="text" class="form-label">Área de atuação do doutor</label>
    <input type="text" class="form-control" name="area_atuacao" id="area_atuacao" value="<?php echo $doutor['atuacao']; ?>" readonly>
  </div>
</form>
<div>
  <a href="<?php echo APP; ?>consulta/editar/<?= $consulta['id'] ?>"><button class="btn btn-primary">EDITAR</button></a>
  <a href="<?php echo APP; ?>consulta/listar"><button class="btn btn-danger">VOLTAR</button></a>
</div>
</form>