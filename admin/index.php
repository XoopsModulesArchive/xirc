<?php
// ------------------------------------------------------------ //
/*
You may freely use and change this software in both personal and
commercial areas as stipulated under the LGPL Licence:
- http://opensource.org/licenses/lgpl-license.php

With the following exeptions:

* Leave credits intact and make the author known where appropriate.
  This is often the only recompensation free coders get :o)

* If you only change a few lines of the software or make a fix,
  don't just release your own versions, but contact the author
  so he can integrate these into the original software, as not to
  find xxxx different versions floating around on the web.
  This includes passing language translations to the author so he
  may incorporate them into the software.

* If you wish to offer the file for download, link to the download
  page of the file on the authors site, unless of course you made
  sufficient changes to justify the release of a new version.

// -----------------Non License related:------------------------ //

If you find a this program useful and wish to make a small donation,
then your more than welcome to do so at: http://www.e-xoops.com

A link back to the author, lil button, etc, would also be welcome :)

Any help is greatly appreciated, as the author isn't even working at
the moment ..except coding this for you of course :-P Thank's

Cheers, Half-Dead
- http://www.e-xoops.com
- http://www.topsite-toplist.com
(Stop by for other cool stuff)
*/
// ------------------------------------------------------------ //
include './admin_header.php';
$op = $_GET['op'] ?? ($_POST['op'] ?? '');

//------------------------------------------------------------------------------------------//
function setupindex()
{
    xoops_cp_header();

    OpenTable();

    echo "
- <b><a href='./index.php?op=main'>" . 'メイン' . "</a></b><br>
- <b><a href='./index.php?op=appearance'>" . '外観' . "</a></b><br>
- <b><a href='./index.php?op=extra'>" . '詳細' . "</a></b><br>
- <b><a href='./index.php?op=footer'>" . 'フッター' . "</a></b><br>
<br>Bocazza 1.1 <a href='http://www.bocazas.com' target='_blank'>http://www.bocazas.com</a>";

    CloseTable();

    xoops_cp_footer();
}

//------------------------------------------------------------------------------------------//
function main()
{
    global $xoopsModule;

    require XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/cache/config.php';

    xoops_cp_header();

    OpenTable(); ?>

    <form name="main" action="./index.php?op=save_main" method="post">
        <table border="0" align="center">
            <tr>

                <td colspan="2">
                    <hr align="center" noshade="noshade">
                    <div align="center"><?php echo _AM_XIRC_SERVER_LIST; ?></div>
                    <hr align="center" noshade="noshade">
                </td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_SERVERS; ?> :</td>
                <td><input name="server1" type="text" value="<?php echo $irc_cfg['server1']; ?>"></td>

            </tr>
            <tr>

                <td>&nbsp;</td>
                <td><input name="server2" type="text" value="<?php echo $irc_cfg['server2']; ?>"></td>

            </tr>
            <tr>

                <td>&nbsp;</td>
                <td><input name="server3" type="text" value="<?php echo $irc_cfg['server3']; ?>"></td>

            </tr>
            <tr>

                <td>&nbsp;</td>
                <td><input name="server4" type="text" value="<?php echo $irc_cfg['server4']; ?>"></td>

            </tr>
            <tr>

                <td>&nbsp;</td>
                <td><input name="server5" type="text" value="<?php echo $irc_cfg['server5']; ?>"></td>

            </tr>
            <tr>

                <td colspan="2">
                    <hr align="center" noshade="noshade">
                    <div align="center"><?php echo _AM_XIRC_CHANNEL_LIST; ?></div>
                    <hr align="center" noshade="noshade">
                </td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_CHANNELS; ?> :</td>
                <td><input name="channel1" type="text" value="<?php echo $irc_cfg['channel1']; ?>"></td>

            </tr>
            <tr>

                <td>&nbsp;</td>
                <td><input name="channel2" type="text" value="<?php echo $irc_cfg['channel2']; ?>"></td>

            </tr>
            <tr>

                <td>&nbsp;</td>
                <td><input name="channel3" type="text" value="<?php echo $irc_cfg['channel3']; ?>"></td>
            </tr>
            <tr>

                <td>&nbsp;</td>
                <td><input name="channel4" type="text" value="<?php echo $irc_cfg['channel4']; ?>"></td>

            </tr>
            <tr>

                <td>&nbsp;</td>
                <td><input name="channel5" type="text" value="<?php echo $irc_cfg['channel5']; ?>"></td>
            </tr>
            <tr>

                <td colspan="2">
                    <hr align="center" noshade="noshade">
                    <div align="center"><?php echo _AM_XIRC_MISC; ?></div>
                    <hr align="center" noshade="noshade">
                </td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_DEF_LANG; ?> :</td>
                <td><select name="deflang">

                        <?php
                        $handle = opendir('../java');

    while ($file = readdir($handle)) {
        if (preg_match("/(.*)?\.(lang)$/i", $file, $matches)) {
            $lang[] = $matches[1];
        }
    }

    closedir($handle);

    for ($i = 0, $iMax = count($lang); $i < $iMax; $i++) {
        if ($irc_cfg['deflang'] == $lang[$i]) {
            $chk = " selected='selected'";
        } else {
            $chk = '';
        }

        echo "<option value='$lang[$i]'$chk>$lang[$i]</option>";
    } ?>
                    </select></td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_POPUP; ?> :</td>
                <td><select name="popup">
                        <?php
                        if ('false' == $irc_cfg['popup']) {
                            $chk = " selected='selected'";
                        } else {
                            $chk = '';
                        } ?>
                        <option value="true"><?php echo _AM_XIRC_YES; ?></option>
                        <option value="false"<?php echo $chk; ?>><?php echo _AM_XIRC_NO; ?></option>
                    </select></td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_HEIGHT; ?> :</td>
                <td><input name="height" type="text" value="<?php echo $irc_cfg['height']; ?>" size="3"></td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_WIDTH; ?> :</td>
                <td><input name="width" type="text" value="<?php echo $irc_cfg['width']; ?>" size="3"></td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_AUTO_ENTRY; ?> :</td>
                <td><select name="autoentry">
                        <?php
                        if ('false' == $irc_cfg['autoentry']) {
                            $chk = " selected='selected'";
                        } else {
                            $chk = '';
                        } ?>
                        <option value="true"><?php echo _AM_XIRC_YES; ?></option>
                        <option value="false"<?php echo $chk; ?>><?php echo _AM_XIRC_NO; ?></option>
                    </select></td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_LIST_CHANS; ?> :</td>
                <td><select name="list">
                        <?php
                        if ('true' == $irc_cfg['list']) {
                            $chk = " selected='selected'";
                        } else {
                            $chk = '';
                        } ?>
                        <option value="false"><?php echo _AM_XIRC_NO; ?></option>
                        <option value="true"<?php echo $chk; ?>><?php echo _AM_XIRC_YES; ?></option>
                    </select></td>

            </tr>
            <tr>

                <td colspan="2" align="center"><input type="submit" name="submit" value="<?php echo _AM_XIRC_SAVE; ?>"></td>

            </tr>
        </table>
    </form>

    <?php
    CloseTable();

    xoops_cp_footer();
}

//------------------------------------------------------------------------------------------//
function save_main()
{
    global $_POST;

    include '../cache/config.php';

    $irc_cfg['server1'] = $_POST['server1'];

    $irc_cfg['server2'] = $_POST['server2'];

    $irc_cfg['server3'] = $_POST['server3'];

    $irc_cfg['server4'] = $_POST['server4'];

    $irc_cfg['server5'] = $_POST['server5'];

    $irc_cfg['channel1'] = $_POST['channel1'];

    $irc_cfg['channel2'] = $_POST['channel2'];

    $irc_cfg['channel3'] = $_POST['channel3'];

    $irc_cfg['channel4'] = $_POST['channel4'];

    $irc_cfg['channel5'] = $_POST['channel5'];

    $irc_cfg['deflang'] = $_POST['deflang'];

    $irc_cfg['popup'] = $_POST['popup'];

    $irc_cfg['height'] = $_POST['height'];

    $irc_cfg['width'] = $_POST['width'];

    $irc_cfg['autoentry'] = $_POST['autoentry'];

    $irc_cfg['list'] = $_POST['list'];

    save($irc_cfg);
}

//------------------------------------------------------------------------------------------//
function appearance()
{
    global $xoopsModule;

    require XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/cache/config.php';

    xoops_cp_header();

    OpenTable(); ?>

    <form name="appearance" action="./index.php?op=save_appearance" method="post">
        <table border="0" align="center">
            <tr>

                <td colspan="2" align="right">
                    <hr align="center" noshade="noshade">
                    <div align="center"><?php echo _AM_XIRC_GENERAL; ?>
                        <hr align="center" noshade="noshade">
                    </div>
                </td>

            </tr>
            <tr>

                <td align="right">bgcolor :</td>
                <td bgcolor="<?php echo $irc_cfg['bgcolor']; ?>"><input name="bgcolor" type="text" value="<?php echo $irc_cfg['bgcolor']; ?>"></td>

            </tr>
            <tr>

                <td align="right">setupbgcolor :</td>
                <td bgcolor="<?php echo $irc_cfg['setupbgcolor']; ?>"><input name="setupbgcolor" type="text" value="<?php echo $irc_cfg['setupbgcolor']; ?>"></td>

            </tr>
            <tr>

                <td align="right">setuptextcolor :</td>
                <td bgcolor="<?php echo $irc_cfg['setuptextcolor']; ?>"><input name="setuptextcolor" type="text" value="<?php echo $irc_cfg['setuptextcolor']; ?>"></td>

            </tr>
            <tr>

                <td align="right">bordercolor :</td>
                <td bgcolor="<?php echo $irc_cfg['bordercolor']; ?>"><input name="bordercolor" type="text" value="<?php echo $irc_cfg['bordercolor']; ?>"></td>

            </tr>
            <tr>

                <td align="right">statusbgcolor :</td>
                <td bgcolor="<?php echo $irc_cfg['statusbgcolor']; ?>"><input name="statusbgcolor" type="text" value="<?php echo $irc_cfg['statusbgcolor']; ?>"></td>

            </tr>
            <tr>

                <td align="right">buttoncolor :</td>
                <td bgcolor="<?php echo $irc_cfg['buttoncolor']; ?>"><input name="buttoncolor" type="text" value="<?php echo $irc_cfg['buttoncolor']; ?>"></td>

            </tr>
            <tr>

                <td align="right">panelcolor :</td>
                <td bgcolor="<?php echo $irc_cfg['panelcolor']; ?>"><input name="panelcolor" type="text" value="<?php echo $irc_cfg['panelcolor']; ?>"></td>

            </tr>
            <tr>

                <td colspan="2" align="right">
                    <hr align="center" noshade="noshade">
                    <div align="center"><?php echo _AM_XIRC_IMAGE; ?>
                        <hr align="center" noshade="noshade">
                    </div>
                </td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_SMILEYS; ?> :</td>
                <td><input name="smileys" type="text" value="<?php echo $irc_cfg['smileys']; ?>" size="50"></td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_BUTTONS; ?> :</td>
                <td><input name="buttons" type="text" value="<?php echo $irc_cfg['buttons']; ?>" size="50"></td>

            </tr>
            <tr>

                <td colspan="2">
                    <hr align="center" noshade="noshade">
                    <div align="center"><?php echo _AM_XIRC_REG_SETTINGS; ?>
                        <hr align="center" noshade="noshade">
                    </div>
                </td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_LOGO; ?> :</td>
                <td><input name="logo" type="text" value="<?php echo $irc_cfg['logo']; ?>" size="50"></td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_CLICKURL; ?> :</td>
                <td><input name="logourl" type="text" value="<?php echo $irc_cfg['logourl']; ?>" size="50"></td>

            </tr>
            <tr>

                <td colspan="2">&nbsp;</td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_BANNER; ?> :</td>
                <td><input name="banner" type="text" value="<?php echo $irc_cfg['banner']; ?>" size="50"></td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_CLICKURL; ?> :</td>
                <td><input name="bannerurl" type="text" value="<?php echo $irc_cfg['bannerurl']; ?>" size="50"></td>

            </tr>
            <tr>

                <td colspan="2" align="center"><input type="submit" name="submit" value="<?php echo _AM_XIRC_SAVE; ?>"></td>

            </tr>
        </table>
    </form>

    <?php
    CloseTable();

    xoops_cp_footer();
}

//------------------------------------------------------------------------------------------//
function save_appearance()
{
    global $_POST;

    include '../cache/config.php';

    $irc_cfg['setuptextcolor'] = $_POST['setuptextcolor'];

    $irc_cfg['bgcolor'] = $_POST['bgcolor'];

    $irc_cfg['setupbgcolor'] = $_POST['setupbgcolor'];

    $irc_cfg['buttoncolor'] = $_POST['buttoncolor'];

    $irc_cfg['panelcolor'] = $_POST['panelcolor'];

    $irc_cfg['bordercolor'] = $_POST['bordercolor'];

    $irc_cfg['statusbgcolor'] = $_POST['statusbgcolor'];

    $irc_cfg['smileys'] = $_POST['smileys'];

    $irc_cfg['buttons'] = $_POST['buttons'];

    $irc_cfg['logo'] = $_POST['logo'];

    $irc_cfg['logourl'] = $_POST['logourl'];

    $irc_cfg['banner'] = $_POST['banner'];

    $irc_cfg['bannerurl'] = $_POST['bannerurl'];

    save($irc_cfg);
}

//------------------------------------------------------------------------------------------//
function extra()
{
    global $xoopsModule;

    require XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/cache/config.php';

    xoops_cp_header();

    OpenTable(); ?>

    <form name="extra" action="./index.php?op=save_extra" method="post">
        <table border="0" align="center">
            <tr>

                <td colspan="2" align="right">
                    <hr align="center" noshade="noshade">
                    <div align="center"><?php echo _AM_XIRC_EXTRA; ?></div>
                    <hr align="center" noshade="noshade">
                </td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_FILES; ?> :</td>
                <td><select name="files">
                        <?php
                        if ('false' == $irc_cfg['files']) {
                            $chk = " selected='selected'";
                        } else {
                            $chk = '';
                        } ?>
                        <option value="true"><?php echo _AM_XIRC_YES; ?></option>
                        <option value="false"<?php echo $chk; ?>><?php echo _AM_XIRC_NO; ?></option>
                    </select></td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_APPLET; ?> :</td>
                <td><select name="type">
                        <?php
                        switch ($irc_cfg['type']) {
                            case 'normal':
                                $nml = " selected='selected'";
                                $lgt = '';
                                $dlx = '';
                                break;
                            case 'light':
                                $nml = '';
                                $lgt = " selected='selected'";
                                $dlx = '';
                                break;
                            case 'deluxe':
                                $nml = '';
                                $lgt = '';
                                $dlx = " selected='selected'";
                                break;
                        } ?>
                        <option value="normal"<?php echo $nml; ?>>Normal</option>
                        <option value="light"<?php echo $lgt; ?>>Light</option>
                        <option value="deluxe"<?php echo $dlx; ?>>Deluxe</option>
                    </select></td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_IDENT; ?> :</td>
                <td><input name="ident" type="text" value="<?php echo $irc_cfg['ident']; ?>"></td>

            </tr>
            <tr>

                <td align="right"><a href="http://java.sun.com/products/jdk/1.1/docs/guide/intl/encoding.doc.html" target="_blank">Encoding</a> :</td>
                <td><input name="encoding" type="text" value="<?php echo $irc_cfg['encoding']; ?>"></td>

            </tr>
            <tr>

                <td colspan="2">
                    <hr align="center" noshade="noshade">
                    <div align="center"><?php echo _AM_XIRC_REG_SETTINGS; ?></div>
                    <hr align="center" noshade="noshade">
                </td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_HIDE_TOP; ?> :</td>
                <td><select name="top">
                        <?php
                        if ('true' == $irc_cfg['top']) {
                            $chk = " selected='selected'";
                        } else {
                            $chk = '';
                        } ?>
                        <option value="false"><?php echo _AM_XIRC_NO; ?></option>
                        <option value="true"<?php echo $chk; ?>><?php echo _AM_XIRC_YES; ?></option>
                    </select></td>

            </tr>
            <tr>

                <td align="right"><?php echo _AM_XIRC_QUIT; ?> :</td>
                <td><input name="quit" type="text" value="<?php echo $irc_cfg['quit']; ?>"></td>

            </tr>
            <tr>

                <td colspan="2" align="center"><input type="submit" name="submit" value="<?php echo _AM_XIRC_SAVE; ?>"></td>

            </tr>
        </table>
    </form>

    <?php
    CloseTable();

    xoops_cp_footer();
}

//------------------------------------------------------------------------------------------//
function save_extra()
{
    global $_POST;

    include '../cache/config.php';

    $irc_cfg['files'] = $_POST['files'];

    $irc_cfg['type'] = $_POST['type'];

    $irc_cfg['ident'] = $_POST['ident'];

    $irc_cfg['encoding'] = $_POST['encoding'];

    $irc_cfg['top'] = $_POST['top'];

    $irc_cfg['quit'] = $_POST['quit'];

    save($irc_cfg);
}

//------------------------------------------------------------------------------------------//
function footer()
{
    global $xoopsModule, $content;

    require XOOPS_ROOT_PATH . '/include/xoopscodes.php';

    xoops_cp_header();

    OpenTable();

    $myts = MyTextSanitizer::getInstance();

    $content = implode('', file('../cache/footer.php'));

    $content = htmlspecialchars($content, ENT_QUOTES | ENT_HTML5);

    echo "
<form name='footer' action='./index.php?op=save_footer' method='post'>
<table border='0' align='center'><tr><td>";

    xoopsCodeTarea('content');

    xoopsSmilies('content');

    echo "
</td></tr><tr>
<td><input type='submit' name='submit' value='" . _AM_XIRC_SAVE . "'></td>
</tr></table></form>";

    CloseTable();

    xoops_cp_footer();
}

//------------------------------------------------------------------------------------------//
function save_footer()
{
    global $_POST;

    $myts = MyTextSanitizer::getInstance();

    $content = $myts->stripSlashesGPC($_POST['content']);

    $fp = fopen('../cache/footer.php', 'wb');

    $write = fwrite($fp, trim($content));

    fclose($fp);

    if ($write > -1) {
        redirect_header('index.php', 1, _AM_XIRC_CFGUPDATED);
    } else {
        redirect_header('index.php', 1, _AM_XIRC_CFGERROR);
    }

    exit();
}

//------------------------------------------------------------------------------------------//
function save($value)
{
    $content = "<?php\n";

    foreach ($value as $key => $entry) {
        $content .= "\$irc_cfg['$key'] = \"$entry\";" . "\n";
    }

    $content .= '?>';

    $fp = fopen('../cache/config.php', 'wb');

    $write = fwrite($fp, trim($content));

    fclose($fp);

    if ($write > -1) {
        redirect_header('index.php', 1, _AM_XIRC_CFGUPDATED);
    } else {
        redirect_header('index.php', 1, _AM_XIRC_CFGERROR);
    }

    exit();
}

//------------------------------------------------------------------------------------------//
switch ($op) {
    case 'main':
        main();
        break;
    case 'save_main':
        save_main();
        break;
    case 'appearance':
        appearance();
        break;
    case 'save_appearance':
        save_appearance();
        break;
    case 'extra':
        extra();
        break;
    case 'save_extra':
        save_extra();
        break;
    case 'footer':
        footer();
        break;
    case 'save_footer':
        save_footer();
        break;
    default:
        setupindex();
        break;
}

?>
