<?php //conexao.php
     class Conexao{
        private static $dbNome = 'sistema_escola'; 
        private static $dbHost = 'localhost'; 
        private static $dbUsuario = 'root'; 
        private static $dbSenha = ''; 

        private static $cont = null; 

        public function __construct()
        {
            die("A função init não é permitida"); 
        }

        public static function conectar(){
            if (self::$cont == null){
                try {       
                self::$cont = new PDO('mysql:host=localhost;dbname=sistema_escola', self::$dbUsuario, self::$dbSenha); 
                }
                catch(PDOException $exception){
                     die ($exception->getmessage()); 
                }
         
           }
           return self::$cont; 
       }

        public static function desconectar() {
            self::$cont = null; 
        }
   }
