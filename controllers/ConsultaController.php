<?php
  class ConsultaController extends Controller {
    function listar() {
      $model = new Consulta();
      $consultas = $model->read();
      $this->view("listagemConsulta",
        compact('consultas')
        );
    }

    function novo() {
      $consulta = array();
      $consulta['id'] = 0;
      $consulta['nome_paciente'] = "";
      $consulta['cpf'] = "";
      $consulta['telefone'] = "";
      $consulta['data'] = "";
      $consulta['horario'] = "";
      $consulta['descricao'] = "";
      $consulta['doutor_id'] = "";

      $model = new Doutor();
      $doutores = $model->read();

      $this->view("frmConsulta",
        compact('consulta', 'doutores')
      );
    }

    function salvar() {      
      $consulta = array();
      $consulta['id'] = $_POST['id'];
      $consulta['nome_paciente'] = $_POST['nome_paciente'];
      $consulta['cpf'] = $_POST['cpf'];
      $consulta['telefone'] = $_POST['telefone'];
      $consulta['data'] = $_POST['data'];
      $consulta['horario'] = $_POST['horario'];
      $consulta['descricao'] = $_POST['descricao'];
      $consulta['doutor_id'] = $_POST['doutor_id'];
      
      try {
        $model = new Consulta();
        
        if ($consulta['id'] == 0) {
          $model->create($consulta);
        } else {
          $model->update($consulta);
        }
        $this->redirect("consulta/listar?msgSucesso=Consulta cadastrada com sucesso!");
      }catch (PDOException $e) {
        // die($e->getMessage());
        $this->redirect('consulta/listar?msgErro=Falha! Não foi possível cadastrar. Tente preencher os dados corretamente.');
      }
    }

    function editar($id) {
      $modelConsulta = new Consulta();
      $consulta = $modelConsulta->getById($id);
      
      $modelDoutor = new Doutor();
      $doutores = $modelDoutor->read();

      $this->view("frmConsulta",
        compact('consulta', 'doutores')
      );
    }

    function visualizar($id) {
      $model = new Consulta();
      $consulta = $model->getById($id);

      $modelDoutor = new Doutor();
      $doutor = $modelDoutor->getById($consulta['doutor_id']);

      $this->view("visualizarConsulta",
        compact('consulta', 'doutor')
      );
    }

    function excluir($id) {
      $model = new Consulta();
      $model->delete($id);
      $this->redirect("consulta/listar");
    }
  }

 ?>