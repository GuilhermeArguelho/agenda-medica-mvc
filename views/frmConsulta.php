<?php
date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="../assets/css/cad_consulta.css">
  <link rel="stylesheet" href="../assets/css/index.css"> -->
  <link rel="stylesheet" href="../assets/css/visualizar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
</head>

<?php
  $horario = date("H:i", strtotime($consulta['horario']));
?>
<header>
  <h1>Cadastrar nova consulta</h1>
</header>
<form id="form_consulta" action="<?php echo APP; ?>consulta/salvar" method="post">
  <div class="mb-3">
    <?php  ?> <label for="id" class="form-label">ID</label>
    <input type="text" class="form-control" name="id" id="id" value="<?php echo $consulta['id']; ?>" readonly>
  </div>

  <div class="mb-3">
    <?php  ?> <label for="name" class="form-label">Nome do Paciente</label>
    <input type="text" class="form-control" name="nome_paciente" id="nome_paciente" value="<?php echo $consulta['nome_paciente']; ?>" required>
  </div>

  <div class="mb-3">
    <label for="cpf" class="form-label">CPF</label>
    <input type="cpf" class="form-control" name="cpf" id="cpf" value="<?php echo $consulta['cpf']; ?>" required>
  </div>

  <div class="mb-3">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="phone" class="form-control" name="telefone" id="telefone" value="<?php echo $consulta['telefone']; ?>" required>
  </div>

  <div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea name="descricao" class="form-control" id="descricao" required><?php echo $consulta['descricao']; ?></textarea>
  </div>

  <div id="datahora">
    <div class="mb-3">
      <label for="data" class="form-label">Data</label>
      <input type="date" class="form-control" name="data" id="data" value="<?php echo $consulta['data']; ?>" required>
    </div>
    <div class="mb-3">
      <label for="hora" class="form-label">Horário</label>
      <input type="time" class="form-control" name="horario" id="horario" value="<?php echo $horario; ?>" required>
    </div>
  </div>

  <label for="autor" class="form-label">Doutor</label>
  <select class="form-select mb-3" name="doutor_id" required>
    <?php
    foreach ($doutores as $doutor) : ?>
    <?php $selected = $doutor['id'] == $consulta['doutor_id']?'selected':'';
    echo "<option $selected value='{$doutor['id']}' name='doutor_id' >{$doutor['nome']}</option>";?>
    <?php endforeach; ?>
  </select>
</form>
<div class="mb-3">
  <button class=" btn btn-success" type="submit" name="submit" id="submit" form="form_consulta">CADASTRAR</button>
  <a href="<?php echo APP; ?>consulta/listar"><button class="btn btn-danger">CANCELAR</button> </a>
</div>
</form>