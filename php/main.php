<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html">
    <title>
      Dimitri Colferai Main
    </title>
  </head>

  <body bgcolor="#ffffff">

<?php
  //$file=fopen("main.count","r") or exit("Unable to open file main.count!");
  //$line=fgets($file);
  //fclose($file);
  // //print( "vecchio numero = $line" . '<br />' );
  //$line=$line+1;
  //$line = $line . "\n";
  // //print( "nuovo numero = $line" . '<br />' );
  //$file=fopen("main.count","a") or exit("Unable to open file main.count!");
  //fwrite($file,$line);
  $line=date("Y-m-d_H:i:s") . "\n";
  fwrite($file,$line);
  fclose($file);
?>
    <?php
      include('./counter_script/index.php');
    ?>

    <br>
    <font size="+1">
      Benvenuti nella mia pagina webb.
      <br>
      Qui potrete trovare informazioni sull'attivita' di ricerca, sull'attivita'
      didattica e su altre attivita' che svolgo. Per esempio ...
    </font>
    <br>
    <br>
    <br>

    <center>
      <img src="podioImola.jpg" width="70%">
    </center>

    <a href=http://www.langolodelpirata.it/vittorie-colferai-tafi-si-conclude-giro-delle-terre-medicee/> Gara di fine stagione 2017 a Cerbaia</a>

  </body>
</html>
