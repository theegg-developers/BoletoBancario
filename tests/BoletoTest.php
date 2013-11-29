<?php
include_once(__DIR__.'/../src/TheEgg/BoletoBancario/Boleto.php');

class BoletoTest extends PHPUnit_Framework_TestCase {

  function testToS(){
    $boleto = new TheEgg\BoletoBancario\Boleto(array('digito_conta_corrente'=>'123'));
    $expected_json = '{"digito_conta_corrente":"123","conta_corrente":null,"digito_agencia":null,"carteira":null,"codigo_cedente":null,"cedente":null,"local_pagamento":null,"data_vencimento":null,"sacado":null,"documento_sacado":null,"endereco_cedente":null,"aceite":null}';
    $this->assertEquals((string)$boleto, $expected_json);
  }

  function testBarcode(){
    $boleto = new TheEgg\BoletoBancario\Boleto(array('digito_conta_corrente'=>'123'));
    $this->assertEquals($boleto->getBarcode(), '123412341234' );
  }

  function testPNG(){
  }
}
