<?php
  /*****************************************************
  ** Script configuration - for a documentation of the
  ** following variables please take a look at the
  ** documentation file in the 'docu' directory.
  *****************************************************/
          $log_referers          = 'yes';      // (yes, no)
          $count_visitors        = 'yes';      // (yes, no)
          $display_errors        = 'yes';      // (yes, no)
          $tracer                = 'no';      // (yes, no)
          $script_root           = '/home/colferai/www/counter_script/';
          $path['templates']     = $script_root . 'templates/';
          $path['logfiles']      = $script_root . 'logfiles/';
          $temp['template']      = 'image_counter.tpl.html';
          $file['referer']       = 'referer.txt';
          $file['count']         = 'count.txt';
  if ($tracer == 'yes') { print('INDEX.PHP: inizio<br />'); }
  /*****************************************************
  ** Add further words, text, variables and stuff
  ** that you want to appear in the template here.
  *****************************************************/
          $add_text = array(
                              'txt_additional' => 'Additional', //  {txt_additional}
                              'txt_more'       => 'More'        //  {txt_more}
                            );
  /*****************************************************
  ** Do not edit below this line - Ende der Einstellungen
  *****************************************************/

  /*****************************************************
  ** Send safety signal to included files
  *****************************************************/
          define('IN_SCRIPT', 'true');
  /*****************************************************
  ** Load script code
  *****************************************************/
          include($script_root . 'inc/counter.inc.php');

  if ($tracer == 'yes') { print('INDEX.PHP: fine<br />'); }
?>
