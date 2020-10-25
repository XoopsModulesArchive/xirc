<?php

$modversion['name'] = _MI_XIRC_NAME;
$modversion['version'] = '1.1';
$modversion['description'] = _MI_XIRC_DESC;
$modversion['credits'] = "<a href='http://www.bocazas.com' target='_blank'>Bocazas.com</a>";
$modversion['author'] = "Half-Dead <a href='http://www.e-xoops.com' target='_blank'>http://www.e-xoops.com</a>";
$modversion['help'] = 'manual/';
$modversion['license'] = "The <a href='http://www.bocazas.com' target='_blank'>Bocazas</a> applet is shareware.";
$modversion['official'] = 0;
$modversion['image'] = 'xIRC.gif';
$modversion['dirname'] = 'xirc';

// Menu
$modversion['hasMain'] = 1;

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Blocks
$modversion['blocks'][1]['file'] = 'irc_chat.php';
$modversion['blocks'][1]['name'] = _MI_XIRC_CHATBLOCK;
$modversion['blocks'][1]['description'] = _MI_XIRC_CHATBLOCK_DESC;
$modversion['blocks'][1]['show_func'] = 'irc_chat';
