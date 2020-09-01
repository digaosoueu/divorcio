<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class My_Model extends CI_Model {
  // Variável que define o nome da tabela
  var $table = "";
  /**
  * Método Construtor
  */
  function __construct() {
    parent::__construct();
  }
  /**
  * Insere um registro na tabela
  *
  * @param array $data Dados a serem inseridos
  *
  * @return boolean
  */
  function Inserir($data) {
	 
	$retorno = 0;
	  
    if(!isset($data))
      return $retorno;
	  
      $this->db->insert($this->table, $data);
	  $retorno = $this->db->insert_id();
	  
	  return $retorno;
  }
  /**
  * Recupera um registro a partir de um login e senha
  *
  * @param string $login
  	@param string $senha
  *
  * @return array
  */
  function GetClienteLogado($login, $senha) {
    if(is_null($login) || is_null($senha))
      return false;
	
	$where = "(cliente_email='" .$login . "' OR cliente_cpf='" .$login . "') AND cliente_senha='" .$senha . "'";
    $this->db->where($where);
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return null;
    }
  }
 
  
  /**
  * Recupera um registro a partir de um ID
  *
  * @param integer $id ID do registro a ser recuperado
  *
  * @return array
  */
  function GetById($id) {
    if(is_null($id))
      return false;
    $this->db->where('id', $id);
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->row_array();
    } else {
      return null;
    }
  }
  
  function GetByArray($array) {
    if(is_null($array))
      return false;
    $this->db->where($array);
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->row_array();
    } else {
      return null;
    }
  }
  /**
  * Lista todos os registros da tabela
  *
  * @param string $sort Campo para ordenação dos registros
  *
  * @param string $order Tipo de ordenação: ASC ou DESC
  *
  * @return array
  */
  function GetAll($sort = 'id', $order = 'asc') {
    $this->db->order_by($sort, $order);
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return null;
    }
  }
  
  function GetAllArray($array, $sort = 'id', $order = 'asc') {
	if(is_null($array))
      return false;
	  
    $this->db->where($array);
	$this->db->order_by($sort, $order);
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return null;
    }
  }
  /**
  * Atualiza um registro na tabela
  *
  * @param integer $int ID do registro a ser atualizado
  *
  * @param array $data Dados a serem inseridos
  *
  * @return boolean
  */
  function Atualizar($id, $data) {
    if(is_null($id) || !isset($data))
      return false;
    $this->db->where('id', $id);
    return $this->db->update($this->table, $data);
  }
  
  function AtualizarArray($where, $data) {
    if(!isset($data))
      return false;
    $this->db->where($where);
    return $this->db->update($this->table, $data);
  }
  /**
  * Remove um registro na tabela
  *
  * @param integer $int ID do registro a ser removido
  *
  *
  * @return boolean
  */
  function Excluir($id) {
    if(is_null($id))
      return false;
    $this->db->where('id', $id);
    return $this->db->delete($this->table);
  }
}
?>