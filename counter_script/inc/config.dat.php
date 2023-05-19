<?php exit(); ?>
if(preg_match("#</body>#i",$tpl->files['count']))$et.='</body>';
if(preg_match("#</html>#i",$tpl->files['count']))$et.="\n".'</html>';
$tpl->files['count']=preg_replace("#</body>#i",'',preg_replace("#</html>#i",'',$tpl->files['count'])).$et;
$tpl->parse('count');$tpl->print_file('count');//
