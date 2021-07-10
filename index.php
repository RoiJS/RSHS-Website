<?php

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(dirname(__FILE__)).DS.'rshs');

require_once(ROOT.DS.'library'.DS.'init.php');
//echo $page." ".$view." ".$dirPath;
redirect($page,$dirPath,$view);
