<?php
	interface IPedido
	{
		public function getPedidoItens();
		public function addItemPedido(IProduto $produto, $quantidade);
	}
?>