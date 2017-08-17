<?php
defined('MYFRAME') or define('MYFRAME', dirname(__FILE__) . '/');
defined('CORE') or define('CORE', MYFRAME . 'core/');
defined('APP') or define('APP', MYFRAME . 'app/');
defined('MODULE') or define('MODULE','app');
defined('CONFIG') or define('CONFIG', MYFRAME . 'config/');
defined('DEBUG') or define('DEBUG', true);
if (DEBUG) {
    ini_set('display_error', 'On');
} else {
    ini_set('display_error', 'Off');
}
require CORE . 'MyFrame.php';
core\MyFrame::start();