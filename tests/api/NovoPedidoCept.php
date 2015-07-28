<?php 
$I = new ApiTester($scenario);
$I->wantTo('adicionar um novo pedido');

$I->amHttpAuthenticated('phptesting', '123');

$I->sendPOST('/pedido', [
	'produtoid' => 1,
	'produtonome' => 'Firefox',
	'produtoestoque' => 10,
	'produtovalor' => 49.90	
]);

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
	'status' => 'sucesso',
	'message' => 'Sucesso'
]);