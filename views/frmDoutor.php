<h1>Cadastro de Doutor</h1>
<form action="<?php echo APP;?>doutor/salvar" method="post">
  <div class="mb-3">
    <label for="id" class="form-label">ID</label>
    <input readonly type="text" class="form-control" id="id" value="<?php echo $doutor['id']; ?>" name="id">
  </div>
  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" value="<?php echo $doutor['nome']; ?>" name="nome">
  </div>
  <div class="mb-3">
    <label for="atuacao" class="form-label">Atuação</label>
    <input type="text" class="form-control" id="atuacao" value="<?php echo $doutor['atuacao']; ?>" name="atuacao">
  </div>

  <button class="btn btn-primary" type="submit" name="button">Salvar</button>
</form>