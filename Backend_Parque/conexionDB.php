
<?php

 $host = 'localhost';
 $dbname = 'parque';

//--------------------------
// SOLO CAMBIAR EN BASE A SUS CREDENCIALES  ----------------
//--------------------------
 $username = 'adminstracionParque';
 $password = 'TuContrasenaSegura';

 // para parque 2
 //$username = 'administracionParque';
// $password = 'Teori@sistemas1';

try {
    return new PDO('mysql:host=localhost:3306;dbname=' . $dbname, $username, $password);
} catch (Exception $e) {
    echo "FALO DB: " . $e->getMessage();
}
?>