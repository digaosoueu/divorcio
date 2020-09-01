<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagseguro_Model extends CI_Model {
	
	public function GetProduto($id){
		if($id){
			$this->db->select('id, nome, valor');
			$this->db->where(array("id" => $id));
			$this->db->from('produto');
			
			return $this->db->get()->result();
		} else {
			return "Produto não encontrado";
		}
	}
		
	public function getRetorno($condicao = array(), $primeiraLinha = FALSE, $pagina = 0) {
		$this->db->select('cod_carrinho, cod_transacao, status, tipoPagamento, url_boleto');
		$this->db->where($condicao);
		$this->db->from('retornopagseguro');		
		
		if ($primeiraLinha) {
			$this->db->order_by('dataCadastro', 'desc');
			return $this->db->get()->first_row();
		} else {
			$this->db->limit(LINHAS_PESQUISA_DASHBOARD, $pagina);
			$this->db->order_by('id_retornoPagseguro', 'desc');
			return $this->db->get()->result();
		}
	}
	
	public function post($itens) {
		$res = $this->db->insert('pagseguro', $itens);
		if ($res) {
			return $this->db->insert_id();
		} else {
			return FALSE;
		}
	}
	
	public function postRetorno($itens) {
		$res = $this->db->insert('retornopagseguro', $itens);
		if ($res) {
			return $this->db->insert_id();
		} else {
			return FALSE;
		}
	}
	
	public function update($itens, $ID_PagSeguro) {
		$this->db->where('ID_PagSeguro', $ID_PagSeguro, FALSE);
		$res = $this->db->update('PagSeguro', $itens);
		if ($res) {
			return $ID_PagSeguro;
		} else {
			return FALSE;
		}
	}
	
	public function delete($ID_PagSeguro) {
		$this->db->where('ID_PagSeguro', $ID_PagSeguro, FALSE);
		return $this->db->delete('PagSeguro');
	}
}