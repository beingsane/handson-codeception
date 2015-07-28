<?php


class PedidoTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;
	private $pedido;
    
    protected function _before()
    {
    	$this->pedido = new Pedido();
    }

    protected function _after()
    {
    }

    /**
     * @test
     */
    public function criarUmPedidoSalvarERetornarSucesso()
    {
		// Arrange
		//$pedidoServicos = new PedidoServicos();
		$pedidoServicos = \Codeception\Util\Stub::make('PedidoServicos', ['salvar' => 'Sucesso']);
		
    	// Act
    	$resultado = $pedidoServicos->salvar($this->pedido);
    	
    	// Assert
    	$this->assertEquals("Sucesso", $resultado);
    }
}