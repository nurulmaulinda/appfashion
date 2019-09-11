<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=dbfashion;host=localhost';
$user = 'root';
$password = '';

try {
    $konek = new PDO($dsn, $user, $password);
    //tambahan untuk menghandle kesalahan & banyak transaksi query db
    $konek->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     $konek->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
} catch (PDOException $e) {
    echo 'Gagal konek karena ' . $e->getMessage();
}

?>