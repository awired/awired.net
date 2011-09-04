<?php
/**
 * Joom!Fish - multilingual extention and translation manager for Joomla!
 * Copyright (C) 2003-2006 Think Network GmbH, Munich
 * 
 * All rights reserved.  The Joom!Fish project is a set of extentions for 
 * the content management system Joomla!. It enables Joomla! 
 * to manage multilingual sites especially in all dynamic information 
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU Lesser General Public License" (LGPL) is available at
 * http: *www.gnu.org/copyleft/lgpl.html
 * -----------------------------------------------------------------------------
 * $Id: ReadMe,v 1.2 2005/03/15 11:07:01 akede Exp $
 *
*/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class HTML_joomfish_help {

	function showWelcome() {
		global $act, $task, $option, $mosConfig_live_site, $mosConfig_absolute_path;
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_TITLE. ' '._JOOMFISH_CREDITS, 'credits', false );
    ?>
	<tr align="center" valign="middle">
      <td align="left" valign="top" width="70%">
		<p>
      	<span class="moduleheading">Добре дощли в Джум!Фиш</span></p>
      	
        <strong>Джум!Фиш - превод? Управление на мултиезично съдържание - За какво говорите? Какво за бога е бабел фиш?</strong>
		<p>ОК, едно е СИГУРНО! <b>Това не е средство за автоматичен превод, което се предлага от някой компании!</b> Името вече бе взето от тях назаем!</p>
		<p>Но Вие знаете Форд Перфект нали?<br />
		<strong>НЕ!</strong><br />
		&nbsp;<br />
		Уфф, това е трудно - може ли живота да е толкова труден?<br />
		Всъщност ... - да! <br />
		&nbsp;<br />
		<strong>Да но сега какво? ...</strong><br />
		Най-доброто, което можете да направите е: <a href="http://www.amazon.de/exec/obidos/ASIN/0345391802/thinknetwork-21" target="_blank">да натиснете тук, да прочетете, да се посмеете и да разберете!</a><br />
		&nbsp;<br />
		Бъдете бързи, в противен случай галактическата магистрала ще бъде построена и ще бъде прекалено късно ;-)</p>
		<p>
		<strong>Да, разбира се!</strong><br />
		Готини, Вашата маса в "Ресторант накрая на вселента" е резервирана.<br />
		Искате ли да <a href="index2.php?option=com_joomfish&act=dinnermenu">прочетете менюто</a>?<br />
		&nbsp;<br />
		За нас е удовлствие, че ползвате Джум!Фиш<br>
		
		<p>
		<span class="moduleheading">Кредити</span><br />
		За всички Вас, които все още не разбирате за какво говоря. Трябва обезателно за започнете да четете книги!<br />
		<br />
		Искам също така да използвам възможността да благодаря на всички потребители на Мамбелфиш и Джум!Фиш, тъй като Вие стоите в основата на това, тези две приложения да се едни от най-важните във вселената на Джумла!<br /> Моля Ви, да не спирате да ни тормозите с Вашите идеи и предложения, как можем да подобрим рибката още и още.
		</p>
		<p>
		Благодарности към екипа на Джум!Фиш, всички преводачи и Томи за невероятния дизайн на рибата.
		&nbsp;<br />
		Алекс</p>
		</p>
		</td>
		<td align="left" valign="top" nowrap>
			<?php HTML_joomfish::_sideMenu();?>
			<?php HTML_joomfish::_creditsCopyright(); ?>
		</td>
	<?php
		HTML_joomfish::_footer($act, $option);
  }		
	
	
	function showDinnermenu() {
		global $act, $task, $option, $mosConfig_live_site;
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_TITLE. ' ' ._JOOMFISH_ADMIN_HELP, 'support', false );
    ?>
	<tr align="center" valign="middle">
      <td align="left" valign="top" width="70%">
		<h2>От къде да започнем?</h2>
	   <p>Чудили ли сте се някога дали е възможно да изградите сайт на няколко езика използвайки Джумла? Джум!Фиш е един от възможните отговори.<br />
		&nbsp;<br />
		Компонентът Ви позволява да управлявате съдържанието в сайта, компонентите и модулите. Компонента е толкова гъвкав, че след инсталирането на други компоненти, трябва да добавите няколко файла, за да можете свободно да преведете и тях.<br />
		&nbsp;</p>
		
		<h2>Какво разбираме под съдържание?</h2>
		<p>Когато говорим за съдържание, имаме предвид текст или друга информация, която е записана в базата данни на Джумла! Има някой текстове, които са записани в езиковите файлове на Джумла! Тези файлове ви дават възможност да променяте текстовете в зависмост от избрания от потребителя език. 
		<strong>Но</strong>
		новините, статиите и цялото останало <em>съдържание</em> което създавате е само на езика на който Вие го пишете :-(.<br />
		&nbsp;<br />
		Джум!Фиш е решение за да ви помогнете да преведете съдържанието си ;-) и по този начин да направите сайта си мултиезичен. Всяка дефиниция от съдържанието ние наричаме елемент от съдържанието.<br />
		&nbsp;</p>

		<h2>Какво прави компонента за Вас?</h2>
		Ние не искаме да създадем метод за машинен превод или друг базиран на компютрите превод.
		Целта е да подпомогнем процеса на превод, който Вие ще правите в малко по-голяма среда.
		В момента в който Вие имате външни редактори и автори на съдържание, някой трябва да контролира процеса на превод.<br />
		&nbsp;<br />
		С Джум!Фиш това лице може да провери цялото съдържание и да види, кои части от него не са преведени. 
		Базирайки се на този човек, можете да преведете цялото съдържание по начин, който Вие желаете.</p>

		<h2>Как работи?</h2>
		<p>Доста лесно. В менюто компоненти, можете да видите <a href="index2.php?option=com_joomfish&act=config_component">"Настройки"</a> и да промените всички настройки на компонента. Това е нещо обичайно.<br />
		Основното което трябва да настроите в момента е на колко и кои езици искате да бъде превеждано съдържанието на сайта Ви.</p>

		<p>Втората част е по сложна. Дефиницията на елементите на съдържанието са директно свързани с базата данни. Поради тази причина ние решихме да забраним възможността за тяхното администриране през настройките на компонента!
	</p>		</td>
		<td align="left" valign="top" nowrap>
			<?php HTML_joomfish::_sideMenu();?>
			<?php HTML_joomfish::_creditsCopyright(); ?>
		</td>
	</tr>

<?php
		HTML_joomfish::_footer($act, $option);
  }

  function showMambotWarning(){
		global $act, $task, $option, $mosConfig_live_site, $mosConfig_absolute_path, $_VERSION;
		HTML_joomfish::_header();
		?>
     <td align="left" valign="top">
       <h2 style="color:red">Има проблем с инсталацията</h2>
       <p>Директорията "<?php echo $mosConfig_absolute_path?>/mambots/system/" е без права за запис</p>
       <p>Моля:</p>
       <ul>
       <li>Де-инсталирайте Джум!Фиш</li>
       <li>Променете правата върху директорията</li>
       <li>Преинсталирайте</li>
       </ul>
       <br/>Благодарим Ви.</p>
       </td>
	<?php
		HTML_joomfish::_footer($act, $option);
  	
  }
	function showPostInstall( $success=false ) {
		global $act, $task, $option, $mosConfig_live_site, $mosConfig_absolute_path, $_VERSION;
		HTML_joomfish::_header();
	?>
     <td align="left" valign="top">
       <h2>Добре дошли в Джум!Фиш</h2>
       <p>
       Компонентът Джум!Фиш Ви позволява да изградите мултиезичен сайт.<br />
       Самото изграждане на такъв сайт не е лесна работа, за това и компонента не е особенно лесен за управление.</p>
       Моля прочетете инструкциите внимателно, след което се опитайте да започнете с превода.
       Можете да получите помощ и поддръжка във форума на Джум!Фиш в <a href="http://forge.joomla.org/sf/discussion/do/listForums/projects.joomfish/discussion" target="_blank">http://forge.joomla.org</a>.

       Тази версия на Джум!Фиш работи единствено на версии 1.0.7+. Ако ползвате различна версия, моля обновете поне до 1.0.7.</p>
	   <p>
	   Сега моля инсталирайте всички езици (няма ограничения) чрез използването на <a href="/administrator/index2.php?option=com_installer&element=language">Сайт -> Езици -> Нов</a>.<br />
	   След като сте инсталирали езиците, които искате да ползвате, трябва да ги активирате през Джум!Фиш. Това става в езиковите настройки(<a href="/administrator/index2.php?option=com_joomfish&act=config_language">Компоненти -> Джум!Фиш -> Езици</a>).<br />
	   &nbsp;<br />
	   <b>Първо проверете:</b> При смяна на езика в сайта, дали се променя езика на някой определени дефиниции.</p>

	   <h2>Как да превеждаме съдържание?</h2>
	   Отидете в превод  изберете език и след това изберете вида на съдържанието, което искате да преведете. След което можете да натиснете върху определения обект, който искате да преведете и започвате превода.</p>
	   &nbsp;<br />

	   <h2>Какво знаем</h2>
	   Тази версия е доста дълго чакана. Има някой функции в администрацията, както и в настройките за достъп до преводите през самия сайт, които все още са в процес на разработка .<br />
		 &nbsp;<br />
		 Главния проблем е интеграция на класа за превеждане през сайта на всички компоненти. Поради проблеми с DHTML тези промени ще настъпят в следващата версия.
	   &nbsp;</p>
		 Има някой идеи за новата версия на компонента като:
		 <ul>
		 	<li>Автоматично известяване при промяна в оргиналното съдържание</li>
		 </ul>
	   	 Нещо друго? Моля добавете Вашите идеи и коментари в <a href="http://forge.joomla.org/sf/sfmain/do/viewProject/projects.joomfish" target="_blank">страницата на проекта</a>
	   	 и в пибличните форуми.
		 
	   <p>Благодарим Ви за интереса към нашия компонент<br>
		 &nbsp;<br />
		 Алекс</p>
	   </td>
		<td align="left" valign="top" nowrap>
			<?php HTML_joomfish::_sideMenu();?>
			<?php HTML_joomfish::_creditsCopyright(); ?>
		</td>
<?php
		HTML_joomfish::_footer($act, $option);
  }
}
?>
