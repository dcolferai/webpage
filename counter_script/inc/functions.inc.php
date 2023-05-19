<?php
  if ($tracer == 'yes') { print('FUNCTIONS.INC.PHP: inizio<br />'); }

  /*****************************************************
  ** Prevent direct call
  *****************************************************/
          if (!defined('IN_SCRIPT')) {
              die();
          }
  /*****************************************************
  ** Print debug messages
  *****************************************************/
          function debug_mode($msg, $desc = '') {
              global $debug_mode;

              if ($debug_mode == 'on' and !empty($msg)) {
                  if (!is_array($msg)) {
                      $msg = (array) $msg;
                  }

                  for($i = 0; $i < count($msg); $i++)
                  {
                      echo '<pre><strong>' . $desc . '</strong>' . "\n\n" . htmlspecialchars($msg[$i]) . '</pre>.............................................................................<br />';
                  }
              }
          }
  /*****************************************************
  ** Print Array
  *****************************************************/
          function print_a($ar)
          {
              echo '<pre>';

              print_r($ar);

              echo '</pre>';
          }
  /*****************************************************
  ** Get variable content from environment
  *****************************************************/
          function method_vars($variable)
          {
              global $_GET, $_POST;
              
              if (isset($_GET[$variable]) and !empty($_GET[$variable])) {
                  return $_GET[$variable];
              }
              
              
              if (isset($_POST[$variable]) and !empty($_POST[$variable])) {
                  return $_POST[$variable];
              }
              
          }

  if ($tracer == 'yes') { print('FUNCTIONS.INC.PHP: inizio<br />'); }
?>
