<html>
  <head>
    <title>Menu</title>
  </head>

  <body text="#000000" bgcolor="#DDEEFF">

<h4>

    <ul>

      <li>
	<b><a href="dispenseCasalbuoni.pdf" target="main">Dispense Prof. Casalbuoni</a></b>
      </li>

      <li>
	<b><a href="corpoNero.pdf" target="main">Appunti sul calcolo dello spettro del corpo nero</a></b>
      </li>

      <li>
	<b>Appunti sul Principio di indeterminazione</a></b>
      </li>

      <ul>

      <li>
	<b><a href="principioIndeterminazione/0001.pdf" target="main">pag. 1<a></b>
      </li>

      <li>
	<b><a href="principioIndeterminazione/0002.pdf" target="main">pag. 2<a></b>
      </li>

      <li>
	<b><a href="principioIndeterminazione/0003.pdf" target="main">pag. 3<a></b>
      </li>

      <li>
	<b><a href="principioIndeterminazione/0004.pdf" target="main">pag. 4<a></b>
      </li>

      <li>
	<b><a href="principioIndeterminazione/0005.pdf" target="main">pag. 5<a></b>
      </li>

      <li>
	<b><a href="principioIndeterminazione/0006.pdf" target="main">pag. 6<a></b>
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
