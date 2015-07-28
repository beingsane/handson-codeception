<?php
	class Pedido implements IPedido
	{
		private $pedidoitens = array(); 
		
		public function getPedidoItens()
		{
			return $this->pedidoitens;
		}
		
		public function addItemPedido(IProduto $produto, $quantidade)
		{
			$this->pedidoitens[] = array($produto, $quantidade);
		}
	}
?>