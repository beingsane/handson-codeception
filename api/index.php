<?php
	error_reporting(0);
	
	require '../vendor/autoload.php';
	
	$app = new \Slim\Slim();
	
	$valid_passwords = array ("phptesting" => "123");
	$valid_users = array_keys($valid_passwords);
	$user = $_SERVER['PHP_AUTH_USER'];
	$pass = $_SERVER['PHP_AUTH_PW'];
	$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);
	if (!$validated) {
		header('WWW-Authenticate: Basic realm="My Realm"');
		header('HTTP/1.0 401 Unauthorized');
		die ("Not authorized");
		exit();
	}
	
	$app->get('/', function () {
	    $resposta = array(
	            "status" => "sucesso",
	            "message" => "Bem vindos a API Qualister",
	    		"data" => array("codigo" => "gnitsetphp")
		);
	    
	    header("Content-Type: application/json");
	    header('HTTP/1.0 200 OK');
	    
	    echo json_encode($resposta);
	    exit();
	});
	
	$app->get('/pedido', function () {
		$pedido = new Pedido();
		$itens = $pedido->getPedidoItens();
		$resposta = array(
				"status" => "sucesso",
				"message" => "A lista está vazia",
				"data" => $itens
		);
		header("Content-Type: application/json");
		header('HTTP/1.0 200 OK');
		echo json_encode($resposta);
		exit();
	});
	
	$app->get('/pedido/:id', function ($id) use ($app) {
		$clientenome = $app->request()->get("clientenome");
		$resposta = array(
				"status" => "sucesso",
				"message" => "Seu código é $id",
				"data" => array("clientenome" => $clientenome)
		);
		header("Content-Type: application/json");
		header('HTTP/1.0 200 OK');
		echo json_encode($resposta);
		exit();
	});
	
	$app->post('/pedido', function () use ($app) {
		$produtoid = $app->request()->post("produtoid");		
		$produtonome = $app->request()->post("produtonome");
		$produtoestoque = $app->request()->post("produtoestoque");
		$produtovalor = $app->request()->post("produtovalor");
	
		$pedido = new Pedido();
		$produto = new Produto($produtoid, $produtonome, $produtoestoque, $produtovalor);
		$pedido->addItemPedido($produto, 1);
	
		$pedidoservicos = new PedidoServicos();
	
		$resposta = array(
				"status" => "sucesso",
				"message" => $pedidoservicos->salvar($pedido),
				"data" => array()
		);
	
		header("Content-Type: application/json");
		header('HTTP/1.0 200 OK');
		echo json_encode($resposta);
		exit();
	});
		
	$app->run();
?>