<?php

function irc_chat()
{
    $block['title'] = 'IRC Channel';

    $block['content'] = "<div align='center'><a href='" . XOOPS_URL . "/modules/xirc/'><img src='" . XOOPS_URL . "/modules/xirc/images/irc-chat.gif' border='0'></a></div>";

    return $block;
}
