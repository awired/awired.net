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
#


#        DOT NOT MODIFY THIS FILE !




$GLOBALS['__l10n']['Installation'] = '安装';
$GLOBALS['__l10n']['Welcome on DotClear installation'] = '欢迎安装DotClear';
$GLOBALS['__l10n']['You are about to install DotClear. Please choose your language and encoding.'] = '你即将开始安装DotClear.请选择你的语言和编码(中文请选择UTF-8编码）。';
$GLOBALS['__l10n']['Go'] = '开始安装';
$GLOBALS['__l10n']['Next step'] = '下一步';
$GLOBALS['__l10n']['DotClear is still installed.'] = 'DotClear已经安装。';
$GLOBALS['__l10n']['Upgrade'] = '升级';
$GLOBALS['__l10n']['Note: You must accept session cookies to use this installer.'] = '注意：你必须打开浏览器的cookie以继续安装。';
$GLOBALS['__l10n']['Checking your configuration'] = '请检查你的配置';
$GLOBALS['__l10n']['PHP version and modules'] = 'PHP版本及其组件';
$GLOBALS['__l10n']['PHP version is %s.'] = 'PHP版本：%s';
$GLOBALS['__l10n']['PHP version is %s. Version 4.1 or better is required.'] = '当前PHP版本是：%s. 系统需要在4.1及更新的PHP版本才能安装运行。';
$GLOBALS['__l10n']['%s module is present.'] = '%s组件可用.';
$GLOBALS['__l10n']['%s module is not present.'] = '%s组件不可用.';
$GLOBALS['__l10n']['Files permissions'] = '文件权限设置';
$GLOBALS['__l10n']['%s is writable.'] = '%s 不可写。';
$GLOBALS['__l10n']['%s is not writable. Please change its permissions to install.'] = '%s 不可写。请修改其权限设置。';
$GLOBALS['__l10n']['DotClear cannot be installed.'] = 'DotClear无法安装。';
$GLOBALS['__l10n']['Your PHP configuration is not valid. Please contact your Web host to solve this problem.'] = '你的PHP配置无效. 请与服务器管理员联系.';
$GLOBALS['__l10n']['Some files or directories are not writable. Please change their permissions to install DotClear.'] = '部分文件或目录不可写. 请修改其权限设置.';
$GLOBALS['__l10n']['DotClear can be installed on your site.'] = 'DotClear可以安装。';
$GLOBALS['__l10n']['Database parameters'] = '数据库参数';
$GLOBALS['__l10n']['Invalid tables prefix. It can contain only letters or "_".'] = '无效的数据表前缀. 前缀只能由字母或下划线组成.';
$GLOBALS['__l10n']['Error, check your parameters.'] = '错误，请检查你的参数。';
$GLOBALS['__l10n']['Server address'] = '数据库服务器';
$GLOBALS['__l10n']['User ID'] = '数据库用户';
$GLOBALS['__l10n']['Password'] = '数据库密码';
$GLOBALS['__l10n']['Database name'] = '数据库名';
$GLOBALS['__l10n']['Tables prefix'] = '数据表前缀';
$GLOBALS['__l10n']['Create tables'] = '创建数据表';
$GLOBALS['__l10n']['DotClear seems to be present on your site. You may want to upgrade.'] = 'DotClear已经安装。 下面将进行升级。';
$GLOBALS['__l10n']['Don\'t forget to upload your old dotclear.ini in conf/ directory before upgrade.'] = '升级前请上传你原来的dotclear.ini到 conf/ 目录。';
$GLOBALS['__l10n']['Tables creation'] = '数据表已创建';
$GLOBALS['__l10n']['Table %s exists'] = '数据表%s不存在';
$GLOBALS['__l10n']['Field %s exists'] = '字段%s不存在';
$GLOBALS['__l10n']['Create table %s'] = '创建数据表%s';
$GLOBALS['__l10n']['Add fulltext key %s'] = '增加全文索引%s';
$GLOBALS['__l10n']['Creation of first category'] = '创建第一个分类';
$GLOBALS['__l10n']['Unable to create all tables. Please check if the tables don\'t exist yet.'] = '无法创建所有数据表。请检查数据表是否已存在。';
$GLOBALS['__l10n']['Tables successfully created.'] = '数据表创建成功。';
$GLOBALS['__l10n']['DotClear will run properly even if warnings are issued.'] = 'DotClear已经能够运行。（可能有警告或错误发生）';
$GLOBALS['__l10n']['Creation of first user'] = '创建第一个用户';
$GLOBALS['__l10n']['You are about to create the first user of your blog. This user will be administrator.'] = '你即将创建你的blog的第一个用户。此用户将是blog的管理员。';
$GLOBALS['__l10n']['Create user'] = '创建用户';
$GLOBALS['__l10n']['User succesfuly created'] = '用户创建成功';
$GLOBALS['__l10n']['Blog configuration'] = 'Blog配置';
$GLOBALS['__l10n']['DotClear needs to know in which directory it has been installed. For example, if DotClear has been installed in %s/dotclear, then please type "/dotclear" in the field below:'] = 'DotClear需要知道其所所在目录。比如：如果DotClear安装在 %s/dotclear 目录下，则在下面填入 "/dotclear"';
$GLOBALS['__l10n']['DotClear location'] = 'DotClear位置';
$GLOBALS['__l10n']['Your blog\'s name'] = 'Blog名称';
$GLOBALS['__l10n']['My first weblog'] = 'My first weblog';
$GLOBALS['__l10n']['Your blog archive addresses (permalinks) may be displayed in various formats. The "Query string" URLs will be displayed as "index.php?/2002/04". The "Path info" URLs will be displayed as "index.php/2002/04" (preferred method for search engine optimization). And the "Get" URLs will be displayed as "index.php?d=2002/04" (only for mod_rewrite fans).'] = '你的Blog的文章地址（永久地址）可以显示成多种不同的格式。“Query string”格式将显示成形如：“index.php?/2002/04”的格式。“Path info”格式可以显示成形如：“index.php/2002/04”的格式（此格式有利于搜索引擎对页面的抓取）。而“Get”方式将显示成形如“index.php?d=2002/04”的格式。';
$GLOBALS['__l10n']['Please note that "Path info" type could be broken on some Web hosting configurations.'] = '“Path info”格式在有些服务器上可能无法使用。';
$GLOBALS['__l10n']['URLs format'] = 'URL格式';
$GLOBALS['__l10n']['Save'] = '保存';
$GLOBALS['__l10n']['Unable to write dotclear.ini'] = '无法写入 dotclear.ini';
$GLOBALS['__l10n']['Weblog succesfully configured'] = 'Blog配置已完成';
$GLOBALS['__l10n']['End installation'] = '安装结束';
$GLOBALS['__l10n']['End of installation'] = '安装最后一步';
$GLOBALS['__l10n']['First post'] = '第一篇文章';
$GLOBALS['__l10n']['This is the first post. Please edit it.'] = '这是第一篇文章。请编辑。';
$GLOBALS['__l10n']['Creation of first entry.'] = '创建第一篇文章。';
$GLOBALS['__l10n']['Creation of first entry failed.'] = '创建第一篇文章失败。';
$GLOBALS['__l10n']['Creation of config file.'] = '创建配置文件。';
$GLOBALS['__l10n']['Creation of config file failed.'] = '创建配置文件失败。';
$GLOBALS['__l10n']['An error occured while finishing installation.'] = '完成安装时发生一个错误。';
$GLOBALS['__l10n']['Congratulations!'] = '祝贺！';
$GLOBALS['__l10n']['You successfully installed DotClear. Have fun.'] = 'DotClear安装成功。';
$GLOBALS['__l10n']['Manage your blog'] = '管理blog';
$GLOBALS['__l10n']['Upgrade DotClear'] = '升级DotClear';
$GLOBALS['__l10n']['Update URLed titles'] = '升级URL标题';
$GLOBALS['__l10n']['Update %s'] = '升级%s';
$GLOBALS['__l10n']['Reord categories'] = '重设分类排列顺序';
$GLOBALS['__l10n']['Reord categories failed'] = '重设分类排列顺序失败';
$GLOBALS['__l10n']['Update of dotclear.ini'] = '升级dotclear.ini失败';
$GLOBALS['__l10n']['Update of dotclear.ini failed'] = '升级dotclear.ini失败';
$GLOBALS['__l10n']['DotClear successfully upgraded.'] = 'DotClear升级成功。';
$GLOBALS['__l10n']['Log in'] = '登陆';
?>