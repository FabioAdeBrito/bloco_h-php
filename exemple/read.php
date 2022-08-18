<?php

use NFePHP\Common\Soap\CurlSoap;

require __DIR__."/../vendor/autoload.php";

$ean = $_GET['ean'];
$curl = (new CurlSoap(__DIR__."/Certs/08816989000118_priKEY.pem",__DIR__."/Certs/08816989000118_pubKEY.pem",__DIR__."/Certs/08816989000118_certKEY.pem"));
$urlservice = "https://dfe-servico.svrs.rs.gov.br/ws/ccgConsGTIN/ccgConsGTIN.asmx?WSDL";

$body =  '<ccgConsGTIN xmlns="http://www.portalfiscal.inf.br/nfe/wsdl/ccgConsGtin">';
$body .= '<nfeDadosMsg><consGTIN versao="1.00" xmlns="http://www.portalfiscal.inf.br/nfe"><GTIN>'.$ean.'</GTIN></consGTIN>';
$body .= '</nfeDadosMsg></ccgConsGTIN>';


$method = 'POST';
$namespace = '';
$header = '';
$curl->send($urlservice, $namespace, $header, $body, $method);
$resposta = $curl->soapDebug;
echo "<pre>";
var_dump($resposta);
echo "</pre>";