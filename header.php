<?php

include '../../mainfile.php';

require_once XOOPS_ROOT_PATH . '/class/module.textsanitizer.php';

$myts = MyTextSanitizer::getInstance();

if (file_exists('./language/' . $xoopsConfig['language'] . '/main.php')) {
    require_once './language/' . $xoopsConfig['language'] . '/main.php';
} else {
    require_once './language/english/main.php';
}

include '../../header.php';
