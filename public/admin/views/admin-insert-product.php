<?php
    $upit="SELECT *,p.naziv as proizvodNaziv FROM proizvod p INNER JOIN marka m ON p.markaId=m.markaId";
    $upitMarka="SELECT * FROM marka";
    $marka=$connection->query($upitMarka)->fetchAll();
    $product=$connection->query($upit)->fetchAll();
?>
