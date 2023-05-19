<html>
  <head>
    <title>Menu</title>
  </head>

  <body text="#000000" bgcolor="#DDEEFF">

<h4>

    <ul>

      <li>
	<b><a href="amq1.pdf" target="main">Firenze, 2005-03-24</a></b>
      </li>

      <li>
	<b><a href="amq2.pdf" target="main">Firenze, 2005-12-12</a></b>
      </li>

      <li>
	<b><a href="amq3.pdf" target="main">Firenze, 2006-09-07</a></b>
      </li>

      <li>
	<b><a href="amq4.pdf" target="main">Firenze, 2006-10-16</a></b>
      </li>

      <li>
	<b><a href="amq5.pdf" target="main">Firenze, 2006-12-13</a></b>
      </li>

</h4>

    <p>
    <hr>
    <font face="serif" color="#076090"> Last modified $Date: 2009/03/04 12:05:18 $</font>

    <?php
      $file=fopen("index.count","a") or exit("Unable to open file index.count!");
      $line=date("Y-m-d_H:i:s") . "\n";
      fwrite($file,$line);
      fclose($file);
    ?>

    <?php
      include('../counter_script/index.php');
    ?>


  </body>
</html>
