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
include './header.php';
require XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/cache/config.php';

if ($xoopsUser) {
    $thisUser = $xoopsUser->uname();
} else {
    $thisUser = _MA_XIRC_GUEST;
}
OpenTable();

if (($irc_cfg['height'] < 425) || ($irc_cfg['width'] < 475) || ('true' == $irc_cfg['popup'])) {
    $irc_cfg['popup'] = 'true';

    $irc_cfg['height'] = '0';

    $irc_cfg['width'] = '0';
}
?>

<div align="center"><h4><?php printf(_MA_XIRC_WELCOME, $xoopsConfig['sitename']); ?></h4></div>

<table align=center border="0">
    <tr>
        <td>

            <applet name="xirc" code="bocazas.class" archive="./java/bocazas_<?php echo $irc_cfg['type']; ?>.jar" width="<?php echo $irc_cfg['width']; ?>" height="<?php echo $irc_cfg['height']; ?>">
                <param name="CABBASE" value="./java/bocazas_<?php echo $irc_cfg['type']; ?>.cab">

                <!-- Server List -->
                <param name="server1" value="<?php echo $irc_cfg['server1']; ?>">
                <param name="server2" value="<?php echo $irc_cfg['server2']; ?>">
                <param name="server3" value="<?php echo $irc_cfg['server3']; ?>">
                <param name="server4" value="<?php echo $irc_cfg['server4']; ?>">
                <param name="server5" value="<?php echo $irc_cfg['server5']; ?>">

                <!-- Channel List -->
                <param name="channel1" value="<?php echo $irc_cfg['channel1']; ?>">
                <param name="channel2" value="<?php echo $irc_cfg['channel2']; ?>">
                <param name="channel3" value="<?php echo $irc_cfg['channel3']; ?>">
                <param name="channel4" value="<?php echo $irc_cfg['channel4']; ?>">
                <param name="channel5" value="<?php echo $irc_cfg['channel5']; ?>">

                <!-- Language List -->
                <param name="language1" value="<?php echo ucfirst($irc_cfg['deflang']); ?>:java/<?php echo $irc_cfg['deflang']; ?>.lang">
                <param name="language2" value="English:java/english.lang">
                <param name="language3" value="Espanol:java/espagnol.lang">
                <param name="language4" value="Deutsch:java/deutsch.lang">
                <param name="language5" value="Turkce:java/turkce.lang">
                <param name="language6" value="Polski:java/polski.lang">
                <param name="language7" value="Nederlands:java/nederlands.lang">
                <param name="language8" value="Italiano:java/italiano.lang">
                <param name="language9" value="Galego:java/galego.lang">
                <param name="language10" value="Catala:java/catala.lang">
                <param name="language11" value="Japanese:java/Japanese.lang">


                <!-- Name Settings -->
                <param name="nickname" value="<?php echo $thisUser; ?>">
                <param name="fullname" value="<?php echo $thisUser . ' @ ' . XOOPS_URL; ?>">

                <!-- Colors -->
                <param name="setuptextcolor" value="<?php echo $irc_cfg['setuptextcolor']; ?>">
                <param name="bgcolor" value="<?php echo $irc_cfg['bgcolor']; ?>">
                <param name="setupbgcolor" value="<?php echo $irc_cfg['setupbgcolor']; ?>">
                <param name="buttoncolor" value="<?php echo $irc_cfg['buttoncolor']; ?>">
                <param name="panelcolor" value="<?php echo $irc_cfg['panelcolor']; ?>">
                <param name="bordercolor" value="<?php echo $irc_cfg['bordercolor']; ?>">
                <param name="statusbgcolor" value="<?php echo $irc_cfg['statusbgcolor']; ?>">

                <!-- Images -->
                <param name="smileys" value="<?php echo $irc_cfg['smileys']; ?>">
                <param name="buttons" value="<?php echo $irc_cfg['buttons']; ?>">

                <!-- Banners -->
                <param name="logo" value="<?php echo $irc_cfg['logo']; ?>">
                <param name="logourl" value="<?php echo $irc_cfg['logourl']; ?>">
                <param name="banner" value="<?php echo $irc_cfg['banner']; ?>">
                <param name="bannerurl" value="<?php echo $irc_cfg['bannerurl']; ?>">


                <!-- Extra -->
                <param name="list" value="<?php echo $irc_cfg['list']; ?>">
                <param name="files" value="<?php echo $irc_cfg['files']; ?>">
                <param name="popup" value="<?php echo $irc_cfg['popup']; ?>">
                <param name="ident" value="<?php echo $irc_cfg['ident']; ?>">
                <param name="autoentry" value="<?php echo $irc_cfg['autoentry']; ?>">
                <param name="quit" value="<?php echo $irc_cfg['quit']; ?>">
                <param name="encoding" value="<?php echo $irc_cfg['encoding']; ?>">

                <b><?php echo _MA_XIRC_NEED_JAVA; ?>.</b>
            </applet>
        </td>

    </tr>
</table>
<br>

<?php
$content = implode('', file('./cache/footer.php'));
$content = $myts->displayTarea($content, 1, 1, 1);
echo $content;

CloseTable();
include '../../footer.php';
?>
