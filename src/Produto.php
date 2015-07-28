<?php
	class Produto implements IProduto
	{
		private $produtoid;
		private $produtonome;
		private $produtoestoque;
		private $produtovalor;
		
		public function __construct($id, $nome, $estoque, $valor)
		{
			$this->produtoid = $id;
			$this->produtonome = $nome;
			$this->produtoestoque = $estoque;
			$this->produtovalor = $valor;
		}
	}
?>