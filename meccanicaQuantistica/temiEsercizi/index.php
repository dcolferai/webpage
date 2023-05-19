<html>
  <head>
    <title>Menu</title>
  </head>

  <body text="#000000" bgcolor="#DDEEFF">

<h4>

    <ul>

      <li>
	<b><a href="050110_soluz.pdf" target="main">Firenze, 2005-01-10</a></b>
      </li>

      <li>
	<b><a href="050404.pdf" target="main">Firenze, 2005-04-04</a></b>
      </li>

      <li>
	<b><a href="050623.pdf" target="main">Firenze, 2005-06-23</a></b>
      </li>

      <li>
	<b><a href="050908.pdf" target="main">Firenze, 2005-09-08</a></b>
      </li>

      <li>
	<b><a href="060105.pdf" target="main">Firenze, 2006-01-05</a></b>
      </li>

      <li>
	<b><a href="060626.pdf" target="main">Firenze, 2006-06-26</a></b>
      </li>

      <li>
	<b><a href="060904.pdf" target="main">Firenze, 2006-09-04</a></b>
      </li>

    <p>

      <li>
	<b>Raccolte di esercizi svolti</a></b>
      </li>

    <ul>

      <li>
	<b><a href="Angelini_MQpratica.pdf" target="main">prof. Angelini (Bari)<a></b>
      </li>

      <li>
	<b><a href="http://www.df.unipi.it/~konishi/esercizi.htm" target="main">
	    prof. Konishi (Pisa)<a></b>
      </li>

</h4>

    <p>
    <hr>
    <font face="serif" color="#076090"> Last modified $Date: 2011/05/27 12:11:32 $</font>

    <?php
      $file=fopen("index.count","a") or exit("Unable to open file index.count!");
      $line=date("Y-m-d_H:i:s") . "\n";
      fwrite($file,$line);
      fclose($file);
    ?>

    <?php
      include('../../counter_script/index.php');
    ?>

  </body>
</html>
