<?php
# ***** BEGIN LICENSE BLOCK *****
# This file is part of DotClear.
# Copyright (c) 2004 Olivier Meunier and contributors. All rights
# reserved.
#
# DotClear is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
# 
# DotClear is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# 
# You should have received a copy of the GNU General Public License
# along with DotClear; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
# ***** END LICENSE BLOCK *****
 
$do_auth = true;

require dirname(__FILE__).'/inc/prepend.php';

if(!empty($_POST['user_id']) && !empty($_POST['user_pwd']))
{
	$user_id = $_POST['user_id'];
	$user_remember = !empty($_POST['user_remember']) ? true : false;
	
	if($auth->perform($user_id,$_POST['user_pwd'],1,true,$user_remember))
	{
		$_SESSION['sess_user_id'] = $user_id;
		
		$redir = 'index.php';
		
		if (!empty($_SESSION['sess_auth_from']))
		{
			if ($_SESSION['sess_auth_from'] != $_SERVER['REQUEST_URI']) {
				$redir = $_SESSION['sess_auth_from'];
			}
			unset($_SESSION['sess_auth_from']);
		}
		header('Location: '.$redir);
		exit;
	}
	else
	{
		$err = __('Login failed. Please try again.');
	}
}
else
{
	$user_id = '';
}

header('Content-Type: text/html; charset='.dc_encoding);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="<?php echo DC_LANG; ?>" lang="<?php echo DC_LANG; ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=<?php echo dc_encoding; ?>" />
  <meta http-equiv="Content-Script-Type" content="text/javascript" />
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <meta http-equiv="Content-Language" content="<?php echo DC_LANG; ?>" />
  <title><?php echo dc_blog_name; ?> - DotClear</title>
  <style type="text/css">
  @import url(style/default.css); 
  </style>

</head>
<body>


<div style="text-align:center;">
<h1><img src="images/logo.png" alt="dotclear" /></h1>

<form action="auth.php" method="post">
<div class="login">
<?php
if(!empty($err))
{
	echo '<p><strong>'.$err.'</strong></p>';
}
?>

<p><label for="user_id"><strong><?php echo __('Login'); ?> :</strong></label>
<input name="user_id" id="user_id" type="text" maxlength="32"
value="<?php echo $user_id; ?>" tabindex="1"/></p>

<p><label for="user_pwd"><strong><?php echo __('Password'); ?> :</strong></label>
<input name="user_pwd" id="user_pwd" type="password" tabindex="2" /></p>

<p><input type="checkbox" id="user_remember" name="user_remember" value="1" />
<label class="inline" for="user_remember"><?php echo __('Remember me'); ?></label></p>

<p><input class="submit" type="submit" value="<?php echo __('ok'); ?>" /></p>

<p><?php echo __('You must accept cookies in order to use the private area.'); ?></p>

</div>
</form>
</div>

<script type="text/javascript">
document.forms[0]['user_id'].focus();
</script>

</body>
</html>