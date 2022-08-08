<?php
    namespace App\WebService;

    /**
     * Classe principal da funcao  
     * @author eu
     * @version 1.00
     * */

    class Speedio{
        /**
         * URL base da API do Speedio
         * @var string 
         */

        // constante para a URL  base 
        const URL_BASE = 'https://api-publica.speedio.com.br';

        /**
         * Método responsável  por consultar o CNPJ nas APIs do Speedio
         * @param string $cnpj 
         * @return array com as informações 
         */

         public function  consultarCNPJ ( $cnpj ){

            /**
             * Remove os caracteres Inválidos 
             * 
             */
            $cnpj = preg_replace('/\D/', '', $cnpj);


            //var_dump( $cnpj );
            /**
             * Retorna a Execução da Consulta 
             */
            return $this->get('/buscarcnpj?cnpj='.$cnpj);

         }

        /**
         * Metodo responsável  por executar a consulta nas APIs do Speedio
         * @param string $resource
         * @return array
         */
         public function  get( $resource ){

            /**
             * ENDPoint completo da API que será requisitado 
             */

             $endpoint = self::URL_BASE.$resource; 

            //var_dump( $endpoint );
            //  exit; 

            /**
             * Inicia o CURL
             */

            //  $curl = curl_init();

             /**
              * Configurações do CURL
              */
            // curl_setopt_array( $curl, [
            //     CURLOPT_URL => $endpoint,
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_CUSTOMREQUEST => 'GET'
            // ]);


            /**
             * Executa a requisicao
             */



          
                
                $headers = array("Content-Type: application/json; charset=utf-8");
               
                $ch = curl_init($endpoint);
                
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                
                $resultado = json_decode(curl_exec($ch), true );
                
                // var_dump($resultado);

            // $response = curl_exec($curl);

            /**
             * Fecha a conexao
             */
            // curl_close( $curl );

            curl_close( $ch );


            // echo "<pre>";
            
            // print_r( $response );
            // echo "</pre>";
            // exit;


            /**
             * Verificando se a resposta da variavel  esta da forma como necessitamos 
             */
           // $responseArray = json_decode( $resultado, true );

        $responseArray = $resultado ;

            /**
             * Retorna o array  com os dados 
             */
            return is_array( $responseArray) ? $responseArray: [];


            

        }

    }
?>