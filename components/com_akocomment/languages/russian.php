<?php
##########################################
# AkoComment - A User Comments Component #
# (C)opyright  2004  by  Arthur  Konze   #
# Homepage : www.mamboportal.com         #
# Version  : 1.0 beta 1                  #
# License  : Copyright, don't distribute #
##########################################
# Author: Arthur Konze                   #
# Homepage   : www.konze.de              #
# Translation: Pavel Maryanov            #
# Homepage: jack.kiev.ua                 #
##########################################

// Header language definitions
DEFINE("_AKOCOMMENT_WRITECOMMENT","Добавление комментария");
DEFINE("_AKOCOMMENT_WRITEFIRSTCOMMENT","Написать первый комментарий");
DEFINE("_AKOCOMMENT_QUOTETHISARTICLE","Цитировать эту статью на своём сайте");
DEFINE("_AKOCOMMENT_CREATELINK","Чтобы создать на своём сайте ссылку на эту статью,<br />скопируйте текст ниже и вставьте его на свою страницу.");
DEFINE("_AKOCOMMENT_PREVIEWQUOTE","Просмотр:");
DEFINE("_AKOCOMMENT_GOBACKITEM","Назад к статье");
DEFINE("_AKOCOMMENT_RSS","RSS-лента");
DEFINE("_AKOCOMMENT_RSS_LASTCOMMENTS","последние комментарии");
DEFINE("_AKOCOMMENT_RSS_COMMENTON","Комментарий к");
DEFINE("_AKOCOMMENT_RSS_VIEWCOMMENT","показать комментарий");
DEFINE("_AKOCOMMENT_SAVED4UNPUBLISHED","Комментарий сохранён. Он будет опубликован после подтверждения администратором.");
DEFINE("_AKOCOMMENT_GOHOME","Go homepage");
DEFINE("_AKOCOMMENT_YOURFAVOURED","Your favourites");
DEFINE("_AKOCOMMENT_YOURFAVOUREDUSER","Your favourites articles");
DEFINE("_AKOCOMMENT_FAVOUREDUSERMUSTLOGIN","Only registered users can add as favourite comments.<br />Please login or register.");
DEFINE("_AKOCOMMENT_FAVOURED","Favoured");
DEFINE("_AKOCOMMENT_ADDFAVOURED","Add as favourites");
DEFINE("_AKOCOMMENT_RECOMMENDTHISARTICLE","Favoured this article");
DEFINE("_AKOCOMMENT_YOUHAVEFAVOUREDTHISARTICLE","You have already add as favourites");
DEFINE("_AKOCOMMENT_THANKFAVOURED","Thanks for your favourites");
DEFINE("_AKOCOMMENT_FAVOUREDREMOVE","Remove");
DEFINE("_AKOCOMMENT_NOFAVOURED","No favourite");
DEFINE("_AKOCOMMENT_WHATYOUWANT","What do your want ?");
DEFINE("_AKOCOMMENT_FAVOUREDONLYREGISTERED","Only registered users can favoured. Please login or register.");
DEFINE("_AKOCOMMENT_MAILMENEWADDCOMMENT","I wish being prevented by email of the comments which will follow");
DEFINE("_AKOCOMMENT_REGISTERED","Registered");
DEFINE("_AKOCOMMENT_GUEST","Guest");
DEFINE("_AKOCOMMENT_HITS_VIEWS","Views: ");
DEFINE("_AKOCOMMENT_REPORT","Report");
DEFINE("_AKOCOMMENT_REPORTACOMMENT","Report a comment");
DEFINE("_AKOCOMMENT_REPORTINTRO","Thank you for taking the time to report the following comment to the administrator of this site.");
DEFINE("_AKOCOMMENT_REPORTINTRO2","Please complete this short form and click the submit button to process your report.");
DEFINE("_AKOCOMMENT_REASON_REPORT","Reason for reporting comment");
DEFINE("_AKOCOMMENT_COMMENTINQUESTION","Comment in question");
DEFINE("_AKOCOMMENT_THANKS4UREPORT","Thank you, your report was sent to the administrator site.");
DEFINE("_AKOCOMMENT_BUTTON_REPORT","Send");
DEFINE("_AKOCOMMENT_REPORTONCOMMENT","Report on comment");
DEFINE("_AKOCOMMENT_REPORTADMINEMAIL","A user reported the following comment:");
DEFINE("_AKOCOMMENT_FORMREPORTVALIDATE","Please insert a reason for report this comment.");

// Email language definitions for subscribe new comment
DEFINE("_AKOCOMMENT_SUBSCRIBEMAILHEADER","New comment");
DEFINE("_AKOCOMMENT_SUBSCRIBEMAIL","Hello,\n\nA user has posted a new comment to an content item at $mosConfig_live_site:\n");
DEFINE("_AKOCOMMENT_SUBSCRIBEMAILFOOTER","Please do not respond to this message as it is automatically generated and is for information purposes only.\n");

DEFINE("_AKOCOMMENT_WRITEPOLICY","<ul><li>Пожалуйста, придерживайтесь темы статьи.</li><li>Личная переписка и оскорбления будут удалены.</li><li>Не используйте комментарии для раскрутки своего сайта. Такой материал будет удаляться.</li><li>Перед нажатием на кнопку 'Отправить' обновите страницу, чтобы получить новый код безопасности.</li><li>Учтите, что предыдущий пункт имеет значение только в том случае, если был введён неверный код безопасности.</li></ul>");
DEFINE("_AKOCOMMENT_COMMENTS","Комментариев");
DEFINE("_AKOCOMMENT_ONLYREGISTERED","Комментарии разрешено оставлять только зарегистрированным пользователям.<br />Войдите в систему или зарегистрируйтесь.");

// Comment language definitions
DEFINE("_AKOCOMMENT_WRITTENBY","Автор:");
DEFINE("_AKOCOMMENT_ON","дата:");

// Form language definitions
DEFINE("_AKOCOMMENT_GUESTNAME","Гость");
DEFINE("_AKOCOMMENT_ENTERNAME","Имя:");
define('_AKOCOMMENT_ENTERMAIL', 'E-mail');
define('_AKOCOMMENT_ENTERSITE', 'Домашняя страница');
DEFINE("_AKOCOMMENT_ENTERTITLE","Тема:");
DEFINE("_AKOCOMMENT_ENTERTEXT","Комментарий:");
DEFINE("_AKOCOMMENT_SENDFORM","Отправить");
DEFINE("_AKOCOMMENT_CLEARFORM","Очистить");
DEFINE("_AKOCOMMENT_FORMVALIDATE","Введите текст комментария.");
DEFINE("_AKOCOMMENT_FORMVALIDATENAME","Проверка имени");

// Spamfix definitions
DEFINE("_AKOCOMMENT_ENTERCODE","Код:");
DEFINE("_AKOCOMMENT_CODEDESCRIPTION","Введите код, показанный на картинке");
DEFINE("_AKOCOMMENT_CODEIMAGE","Введите этот код в поле слева");
DEFINE("_AKOCOMMENT_CODEWRONG","Неверный код безопасности!");

// Save language definitions
DEFINE("_AKOCOMMENT_SAVED","Комментарий успешно добавлен. Если он не имеет отношения к статье, он будет удалён.");

// Email language definitions
DEFINE("_AKOCOMMENT_ADMINMAILHEADER","Добавлен новый комментарий");
DEFINE("_AKOCOMMENT_ADMINMAIL","Уважаемый администратор,\n\nбыл добавлен комментарий на сайте $mosConfig_live_site:\n");
DEFINE("_AKOCOMMENT_ADMINMAILFOOTER","Не нужно отвечать на это письмо, так как оно было создано автоматически сугубо в качестве для уведомления.\n");

?>