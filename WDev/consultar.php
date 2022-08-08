<?php

/**
 * Incluindo no projeto o autoload do composer
 */

 require __DIR__.'/vendor/autoload.php';

 /**
  * Importar a classe 
  */

  use \App\WebService\Speedio;
//use Symfony\Component\Debug\Debug;

  /**
   * Nova instancia de Speedio
   */

   $objSpeedio = new Speedio;


   /**
    * @var cnpj
    */

    $cnpj  = '00.000.000/0001-91';
    $cnpj1 = "00000000000191";

    /**
     * Consulta ao CNPJ nas APIs do Speedio 
     */

   $resultado = $objSpeedio->consultarCNPJ( $cnpj );

//    echo "<pre>";
//    print_r( $resultado );
//    echo "</pre>";
//    exit;

    /**
     * Verifica resultado da consulta 
     */

     if( empty( $resultado )){
        die( 'Problemas ao consultar o CNPJ '. $cnpj) ;
     }

     /**
      * Verifica o erro da requisição
      */
    if( isset($resultado['error'])){
        die($resultado['error']);
    }

    /**
     * Imprimindo os dados de Sucesso
     */

    echo '<br><b>CNPJ: </b>'. $cnpj. '<br>';
    echo '<pre>';
    print_r( $resultado );
    echo '</pre>';










?>