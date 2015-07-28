<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('cadastrar um novo pedido');

$I->amOnPage('/');
$I->click('Novo pedido');
$I->fillField('id', 1);
$I->selectOption('produto', 'Firefox');
$I->fillField('estoque', 10);
$I->fillField('valor', 49.90);
$I->click('button');

$I->see('Sucesso', 'h5');