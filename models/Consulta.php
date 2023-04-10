<?php
  class Consulta extends Model {
    protected $tabela="consulta";

    protected $query = "SELECT consulta.*, doutor.nome AS nome_doutor
    FROM consulta 
    JOIN doutor ON consulta.doutor_id = doutor.id";
  }