<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email</title>
</head>
<body style="margin:0; padding:0; background:#fff;">
<table width="625" align="center" border="0" cellspacing="0" cellpadding="20">
  <tr>
    <td style="height:105px; border:1px solid #e1e1e1; background:#000;" valign="middle" align="center">
    <img src="<?php echo (Configure::read('App.SiteUrl'));?>/img/email/mail_logo.png" alt="<?php echo (Configure::read('Site.title'));?>"/>
    </td>
  </tr>
  <tr>
    <td style="padding:9px 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#ebebeb; border:1px solid #e1e1e1;">
        <tr>
          <td style="padding:40px 25px;">
          <?php echo $content_for_layout;?>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td style="height:120px; border:1px solid #e1e1e1; background:#000; padding:0 24px;"><table width="100%" border="0" cellspacing="0" cellpadding="20">
        <tr>
          <td align="left" valign="middle" style="height:60px; border-bottom:1px solid #fff;">
          <a href="#"> <img src="<?php echo (Configure::read('App.SiteUrl'));?>/img/email/ftr_logo.png" alt="<?php echo (Configure::read('Site.title'));?>"/>
        </a></td>
          <td align="right" valign="middle" style="height:60px; border-bottom:1px solid #fff; font:normal 14px Arial, Helvetica, sans-serif; color:#fff;"> Site Map © 2013 A Team 4 A Dream, Inc. </td>
        </tr>
        <tr>
          <td colspan="2" style="height:55px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff;" align="center" valign="middle"><a href="#" style="font:normal 14px Arial, Helvetica, sans-serif; color:#fff; text-decoration:none; padding:0 7px;">Stay in touch:</a> <a href="#" style="font:normal 14px Arial, Helvetica, sans-serif; color:#fff; text-decoration:none; padding:0 7px;">Feedback</a> <a href="#" style="font:normal 14px Arial, Helvetica, sans-serif; color:#fff; text-decoration:none; padding:0 7px;">Blog</a> <a href="#" style="font:normal 14px Arial, Helvetica, sans-serif; color:#fff; text-decoration:none; padding:0 7px;">Feedback</a> <a href="#" style="font:normal 14px Arial, Helvetica, sans-serif; color:#fff; text-decoration:none; padding:0 7px;">Newsletter</a> <a href="#" style="font:normal 14px Arial, Helvetica, sans-serif; color:#fff; text-decoration:none; padding:0 2px;">
          <img src="<?php echo (Configure::read('App.SiteUrl'));?>/img/email/facebook.png" alt="facebook" title="facebook" align="absmiddle" />
         </a> <a href="#" style="font:normal 14px Arial, Helvetica, sans-serif; color:#fff; text-decoration:none; padding:0 2px;"> <img src="<?php echo (Configure::read('App.SiteUrl'));?>/img/email/twitter.png" title="twitter" alt="twitter" align="absmiddle" /></a> <a href="#" style="font:normal 14px Arial, Helvetica, sans-serif; color:#fff; text-decoration:none; padding:0 2px;"> <img src="<?php echo (Configure::read('App.SiteUrl'));?>/img/email/rss.png" title="Rss" alt="Rss" align="absmiddle" /></a></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>