<?php
class DoutorController extends Controller
{
  function listar()
  {
    $model = new Doutor();
    $doutores = $model->read();
    $this->view(
      "listagemDoutor",
      compact('doutores')
    );
  }

  function novo()
  {
    $doutor = array();
    $doutor['id'] = 0;
    $doutor['nome'] = "";
    $doutor['atuacao'] = "";
    $this->view(
      'frmDoutor',
      compact('doutor')
    );
  }

  function salvar()
  {
    $doutor = array();
    $doutor['id'] = $_POST['id'];
    $doutor['nome'] = $_POST['nome'];
    $doutor['atuacao'] = $_POST['atuacao'];
    $model = new Doutor();
    if ($doutor['id'] == 0) {
      $model->create($doutor);
    } else {
      $model->update($doutor);
    }
    $this->redirect('doutor/listar');
  }

  function editar($id)
  {
    $model = new Doutor();
    $doutor = $model->getById($id);
    $this->view(
      'frmDoutor',
      compact('doutor')
    );
  }

  function excluir($id)
  {
    try {
      $model = new Doutor();
      $model->delete($id);
      $this->redirect('doutor/listar?msgSucesso=Doutor excluido com sucesso!');
    } catch (PDOException $e) {
      // die($e->getMessage());
      $this->redirect('doutor/listar?msgErro=Falha! Doutor está atualmente vinculado a uma consulta.');
    }
  }
}