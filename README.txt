Installation

1. chmod -R 777 WEB-ROOT/protected/runtime 
2. chmod -R 777 WEB-ROOT/assets
3. Mysql database settings: WEB-ROOT/protected/config/main.php 

        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=ab',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        
4. Load test data to database: WEB-ROOT/dump.sql