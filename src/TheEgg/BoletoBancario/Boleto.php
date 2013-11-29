<?php namespace TheEgg\BoletoBancario;
class Boleto{

  public $digito_conta_corrente;
  public $conta_corrente;
  public $digito_agencia;
  public $carteira;
  public $codigo_cedente;
  public $cedente;
  public $local_pagamento;
  public $data_vencimento;
  public $sacado;
  public $documento_sacado;
  public $endereco_cedente;
  public $aceite;

  function __construct($params = array()){
    $props = $this->getPublicProperties();
    foreach($params as $key=>$value)
      if(in_array($key, $props))
        $this->$key = $value;
  }

  function getBarcodePNG(){}
  function getBarcode(){
    return '12341234111';
  }
  
  function __toString(){
    $result = array();
    foreach($this->getPublicProperties() as $key)
      $result[$key] = $this->$key;
    return json_encode($result);
  }

  private function getPublicProperties(){
    $reflect = new \ReflectionClass($this);
    $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
    $result = array_map(function($el){return $el->name;}, $props);
    return $result;
  }
}
