<?php
  if ($tracer == 'yes') { print('LOG.CLASS.INC.PHP: inizio<br />'); }

          class logging
          {
              var $log_content;
              var $new_line;
              /*****************************************************
              ** 
              *****************************************************/
                      function logging()
                      {
                          $this->new_line = "\n";
                          
                          if (preg_match('#win#i', getenv('SERVER_SOFTWARE'))) {
                              $this->new_line = "\r\n";
                          }
                      }
              /*****************************************************
              ** Log all downloads - new line for each download
              *****************************************************/
                      function log($log_path, $download_path, $file_name)
                      {

                          $log_content = array(

                                                $file_name,                                   /* Name of the download file */
                                                getenv('REMOTE_ADDR'),                        /* IP address of the remote host */
                                                gethostbyaddr(getenv('REMOTE_ADDR')),         /* Name of the remote host */
                                                date("Y-m-d (H:i)", mktime()),                /* Date of the download (in international ISO format) */
                                                mktime(),                                     /* Date of the download (in Unix timestamp) */
                                                //filesize($download_path . $file_name),        /* File size of the download file */
                                                //getenv('HTTP_REFERER'),                       /* Referring URL */
                                                getenv('HTTP_USER_AGENT'),                    /* User agent */

                                            );

                          $log_content = join(' - ', $log_content);

                          debug_mode($log_content, 'Log Entry');

                          if ($logfile = fopen($log_path, 'a')) {
                              flock($logfile, 2);
                              fputs($logfile, $log_content . $this->new_line);
                              fclose($logfile);
                          }
                      }
              /*****************************************************
              ** Content of the count file
              *****************************************************/
                      function count_content($file_name, $download_number, $first_download, $last_download)
                      {
                          $log_content = array(
                                                 $file_name,                                 /* Name of the download file */
                                                 $download_number + 1,                       /* Adds 1 to current number of downloads */
                                                 date("Y-m-d (H:i)", $first_download),       /* Date of the first download (in international ISO format) */
                                                 date("Y-m-d (H:i)", $last_download),        /* Date of the last download (in international ISO format) */
                                                 $first_download,                            /* Date of the first download in Unix timestamp */
                                                 $last_download                              /* Date of the last download in Unix timestamp */
                                              );

                          $this->log_content = join(' - ', $log_content);

                          return $this->log_content;
                      }
              /*****************************************************
              ** Reads the numbers of downloads and calculates the
              ** new download number.
              *****************************************************/
                      function count($log_path, $download_path, $file_name)
                      {
                          unset($log_template_content);

                          $query_file_name  = trim($file_name);
                          $current_time     = mktime();


                          if (is_file($log_path)) {

                              $count_file_content   = file($log_path);
                              $log_template_content = array();


                              while(list($key, $line) = each($count_file_content))
                              {
                                  $line = trim($line);

                                  if (!empty($line)) {
                                      $data             = explode(' - ', $line);
                                      $stored_file_name = trim($data[0]);


                                      if (trim($data[0]) == trim($file_name)) {

                                          $download_number = trim($data[1]);
                                          $first_download  = trim($data[4]);
                                          $last_download   = mktime();


                                          $log_template_content_temp = $this->count_content($stored_file_name, $download_number, $first_download, $last_download);
                                          $log_template_content[]    = $log_template_content_temp;

                                          debug_mode($log_template_content_temp, 'Replace Entry');

                                          unset($log_template_content_temp);

                                          $check = 'true';

                                      } else {
                                          $log_template_content[] = $line;
                                      }
                                  }
                              }

                              if (!isset($check) or $check != 'true') {
                                  $log_template_content_temp = $this->count_content($query_file_name, 0, $current_time, $current_time);
                                  $log_template_content[]    = $log_template_content_temp;

                                  debug_mode($log_template_content_temp, 'New Entry');

                                  unset($log_template_content_temp);
                              }


                              $new_file_content = join($this->new_line, $log_template_content);

                              if ($logfile = fopen($log_path, 'w+')) {
                                  flock($logfile, 2);
                                  fputs($logfile, $new_file_content);
                                  fclose($logfile);
                              }
                          } else {

                              $log_template_content = $this->count_content($query_file_name, 0, mktime(), mktime());

                              debug_mode($log_template_content, 'First Entry');

                              if ($logfile = fopen($log_path, 'a')) {
                                  flock($logfile, 2);
                                  fputs  ($logfile, $log_template_content . "\n");
                                  fclose ($logfile);
                              }

                          }
                      }
              /*****************************************************
              ** Get the number of visits
              *****************************************************/
                      function get_visits($log_path, $file_name)
                      {
                          $query_file_name  = trim($file_name);

                          if (is_file($log_path)) {

                              $count_file_content   = file($log_path);
                              $log_template_content = array();


                              while(list($key, $line) = each($count_file_content))
                              {
                                  $line = trim($line);

                                  if (!empty($line)) {
                                      $data             = explode(' - ', $line);
                                      $stored_file_name = trim($data[0]);


                                      if ($stored_file_name == $query_file_name) {

                                          $download_number = trim($data[1]);
                                          $first_download  = trim($data[4]);
                                          $last_download   = mktime();

                                          $check = 'true';

                                      }
                                  }
                              }

                              if (isset($check) and $check == 'true') {
                                  return array('views' => $download_number, 'first_view' => $first_download, 'last_view' => $last_download);
                              }
                          }
                      }
          } // End class
  if ($tracer == 'yes') { print('LOG.CLASS.INC.PHP: inizio<br />'); }
?>
