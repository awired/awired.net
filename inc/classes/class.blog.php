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

require_once dirname(__FILE__).'/class.blogpost.php';
require_once dirname(__FILE__).'/class.blogcomment.php';

/**
@class	blog

=== Introduction ===

La classe blog prend en charge toute la gestion du blog. Elle nécessite pour
fonctionner qu'un objet de type '''connection''' soit existant et que la librairie
'''files''' soit également disponible.

Avec cette classe, il est possible de réaliser toutes les tâches
d'administration (ajouts, modifications, suppressions d'éléments) ainsi que les
sélections de billets.

@param	connection	con			Objet connection
@param	string		encoding		Jeu de caractères
@param	string		t_post		Nom de la table post
@param	string		t_user		Nom de la table user
@param	string		t_categorie	Nom de la table categorie
@param	string		t_comment		Nom de la table comment
@param	string		t_ping		Nom de la table ping
@param	array		error		Tableau contenant les erreurs
@param	string		user_id		ID de l'utilisateur
@param	integer		pub_mode		Niveau de publication
@param	string		date_format	Format de la date
@param	string		time_format	Format de l'heure
@param	string		rs_blogpost	Nom de la classe gérant les billets
@param	string		rs_blogcomment	Nom de la classe gérant les commentaires
@param	string		lang			Langue
*/
class blog
{
	var $con;
	var $encoding;
	var $t_post;
	var $t_user;
	var $t_categorie;
	var $t_comment;
	var $t_ping;
	var $error;
	var $user_id;
	var $pub_mode;
	var $date_format;
	var $time_format;
	var $rs_blogpost;
	var $rs_blogcomment;
	var $lang;
	
	/** @doc
	=== Méthodes générales === */
	
	/**
	@function	blog
	
	'''Constructeur'''. Cette méthode initialise l'objet Blog.
	
	@param	string	con		Objet de type connection
	@param	string	prefix	Préfixe des noms des tables ('')
	@param	integer	pub_mode	Niveau de publication ('1')
	@param	string	encoding	Jeu de caractère ('ISO-8859-1')
	*/
	function blog(&$con,$prefix='',$pub_mode=1,$encoding='ISO-8859-1')
	{
		$this->con = $con;
		
		$this->encoding = $encoding;
		
		$this->t_post = $prefix.'post';
		$this->t_user = $prefix.'user';
		$this->t_categorie = $prefix.'categorie';
		$this->t_comment = $prefix.'comment';
		$this->t_ping = $prefix.'ping';
		$this->t_log = $prefix.'log';
		$this->t_link = $prefix.'link';
		
		$this->error = array();
		
		$this->setPubMode($pub_mode);
		$this->setLang(NULL);
		$this->setDateFormat();
		
		$this->user_id = '';
		
		$this->rs_blogpost = 'blogpost';
		$this->rs_blogcomment = 'blogcomment';
	}
	
	/**
	@function setPubMode
	
	Cette méthode définit le niveau de plublication des éléments (billets et
	commentaires) que l'on va traiter avec l'objet. Il prend les valeurs 0
	(éléments non publiés uniquement), 1 (éléments publiés uniquement) ou NULL
	(tous les éléments)
	
	Le niveau de publication sera pris en compte dans nombre de méthodes de
	sélection des billets ou des commentaires.
	
	@param	integer	mode		Niveau de publication
	*/
	function setPubMode($mode)
	{
		$this->pub_mode = $mode;
	}
	
	/**
	@function setLang
	
	Définit un critère de tri pour la langue des billets. Utilisable sur la
	partie publique si on souhaite n'afficher que les billets d'une certaine
	langue.
	
	@param	string	lang		Langue
	*/
	function setLang($lang)
	{
		$this->lang = $lang;
	}
	
	/**
	@function setDateFormat
	
	Définit le format de la date des éléments qui seront retournés.
	
	@param	string	d		Format de la date ('%A %e %B %Y')
	@param	string	h		Format de l'heure ('%H:%M')
	*/
	function setDateFormat($d='%A %e %B %Y',$h='%H:%M')
	{
		$this->date_format = $d;
		$this->time_format = $h;
	}
	
	/**
	@function setURL
	
	Définit les différents modèles d'URL du blog.
	
	@param	string	type		Type d'URL
	@param	string	url		Modèle d'URL
	*/
	function setURL($type,$url)
	{
		$this->front_url[$type] = $url;
	}
	
	/**
	@function resetError
	
	Remet les erreurs à zéro.
	*/
	function resetError()
	{
		$this->error = array();
	}
	
	/**
	@function setError
	
	Ajoute une erreur dans la pile des erreurs.
	
	@param	string	msg		Message
	@param	integer	no		Numéro de l'erreur (0)
	*/
	function setError($msg,$no=0)
	{
		$this->error[] = array($no,$msg);
	}
	
	/*
	TODO: revoir les erreurs au format non html
	*/
	/**
	@function error
	
	Récupère les erreurs et renvoie une chaîne ou ''false'' si aucune erreur.
	
	Le paramètre $html indique si l'on souhaite obtenir les erreurs au format
	HTML et $with_nb si la méthode doit également renvoyer les numéros
	(uniquement visibles au format HTML)
	
	@param	boolean	html		Au format HTML (false)
	@param	boolean	with_nb	Avec les numéros (true)
	@return	string
	*/
	function error($html=false,$with_nb=true)
	{
		if (count($this->error) > 0) {
			if (!$html) {
				return $this->error;
			} else {
				$res = '<ul>'."\n";
				foreach($this->error as $v) {
					$res .= '<li>'.
					( ($with_nb) ? '<span class="errno">'.$v[0].'</span> - ' : '').
					'<span class="errmsg">'.$v[1].'</span></li>'."\n";
				}
				return $res."</ul>\n";
			}
		} else {
			return false;
		}
	}
	
	/* ===================================================
	Utilisateurs
	=================================================== */
	/** @doc
	=== Méthodes de gestion des utilisateurs === */
	
	/**
	@function setUser
	
	Force un utilisateur, seulement si user_level est inférieur à 5
	ou si $force est vrai.
	
	@param	string	id		ID de l'utilisateur
	@param	boolean	force	Forcer l'utilisateur (false)
	*/
	function setUser($id,$force=false)
	{
		if (($rs = $this->getUser($id)) !== false && !$rs->isEmpty()) {
			if ($force || $rs->field('user_level') < 5) {
				$this->user_id = $id;
				$this->user_email = $rs->field('user_email');
			}
		}
	}
	
	/**
	@function checkUser
	
	Existence d'un utilisateur. Cette méthode renvoie vrai ou faux selon que
	l'utilisateur existe ou non. Les mots de passe et niveau sont optionnels.
	Le paramètre $md5 indique si la chaîne de mot de passe est passé en clair
	ou comme md5 à	la méthode.
	
	@param	string	id		ID de l'utilisateur
	@param	string	pwd		Mot de passe (NULL)
	@param	integer	level	Niveau de l'utilisateur (NULL)
	@param	boolean	md5		Passage du mot de passe en md5 (true)
	
	@return	boolean
	*/
	function checkUser($id,$pwd=NULL,$level=NULl,$md5=true)
	{
		$reqPlus = '';
		
		if ($pwd !== NULL) {
			$pwd = ($md5) ? md5($pwd) : $this->con->escapeStr($pwd);
			$reqPlus .= 'AND user_pwd = \''.$pwd.'\' ';
		}
		
		if ($level !== NULL) {
			$reqPlus .= 'AND user_level >= '.(integer) $level.' ';
		}
		
		$strReq = 'SELECT user_id FROM '.$this->t_user.' '.
				'WHERE user_id = \''.$this->con->escapeStr($id).'\' '.
				$reqPlus;
		
		if (($rs = $this->con->select($strReq)) !== false) {
			return !$rs->isEmpty();
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function	getUser
	
	Renvoie les données concernant un ou plusieurs utilisateurs. Si aucun
	paramètre $id n'est donné, tous les utilisateurs seront renvoyés dans un
	recordset. La méthode renvoie false si elle échoue.
	
	@param	string	id		ID de l'utilisateur ('')
	@return	recordset
	*/
	function getUser($id='')
	{
		$reqPlus = '';
		
		if ($id != '') {
			$reqPlus .= 'AND U.user_id = \''.$this->con->escapeStr($id).'\' ';
		}
		
		$strReq = 'SELECT U.user_id,user_level,user_nom,user_prenom,'.
				'user_pseudo,user_email,user_post_format,user_edit_size,'.
				'user_pref_cat, user_lang, user_delta, user_post_pub, '.
				'count(P.post_id) AS nb_post '.
				'FROM '.$this->t_user.' U '.
				'	LEFT JOIN '.$this->t_post.' P ON U.user_id = P.user_id '.
				'WHERE 1 '.
				$reqPlus.
				'GROUP BY U.user_id '.
				'ORDER BY U.user_id ASC ';
		
		if (($rs = $this->con->select($strReq)) !== false) {
			return $rs;
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function addUser
	
	Ajout d'un utilisateur. Renvoie vrai en cas de succès.
	
	@param	string	id			ID de l'utilisateur
	@param	integer	level		Niveau de l'utilisateur
	@param	string	pwd			Mot de passe
	@param	string	nom			Nom de l'utilisateur
	@param	string	prenom		Prénom de l'utilisateur
	@param	string	pseudo		Pseudo de l'utilisateur
	@param	string	email		Email de l'utilisateur
	@param	string	post_format	Format d'édition préféré ('html')
	@param	string	edit_size		Hauteur de la zone d'éditions (10)
	@param	integer	pref_cat		Catégorie préférée (1)
	@param	string	lang			Langue de l'utilisateur ('')
	@param	integer	delta		Décalage horaire (0)
	@param	boolean	post_pub		Status de publication par défaut (true)
	@return	boolean
	*/
	function addUser($id,$level,$pwd,$nom,$prenom,$pseudo,$email,
	$post_format='html',$edit_size=10,$pref_cat=1,$lang='',$delta=0,$post_pub=1)
	{
		# Vérifications habituelles
		if (!preg_match('|^[a-zA-Z0-9]+$|',trim($id))) {
			$this->setError(__('No such user ID or invalid user ID'),1000);
		}
		
		if (trim($level) != 0 && $level != 1 && $level != 5 && $level != 9) {
			$this->setError(__('Invalid user level'),1000);
		}
		
		if (trim($pwd) == '') {
			$this->setError(__('User password missing'),1000);
		}
		
		if (trim($nom) == '') {
			$this->setError(__('User name missing'),1000);
		}
		
		if (trim($email) != '' && !$this->isEmail($email)) {
			$this->setError(__('Invalid email address'),1000);
		}
		
		if ($post_format != 'html' && $post_format != 'wiki') {
			$this->setError(__('Invalid publication format'),1000);
		}
		
		if (!$this->checkCat($pref_cat)) {
			# Si la catégorie demandée n'existe pas on met la première
			$rs = $this->con->select('SELECT cat_id FROM '.
								$this->t_categorie.' '.
								'ORDER BY cat_id ASC LIMIT 0,1');
			if ($rs == false) {
				$this->setError('MySQL : '.$this->con->error(),2000);
				return false;
			}
			$pref_cat = $rs->field('cat_id');
		}
		
		if ((integer) $edit_size <= 0) {
			$this->setError(__('Invalid edit size'),1000);
		}
		
		if ($this->error() !== false) {
			return false;
		}
		
		# Insertion
		$insReq = 'INSERT INTO '.$this->t_user.' '.
				'(user_id,user_level,user_pwd,user_nom,user_prenom,'.
				'user_pseudo,user_email,user_post_format,user_edit_size,'.
				'user_pref_cat,user_lang,user_delta,user_post_pub) '.
				'VALUES '."\n".' ('.
				'\''.$this->con->escapeStr($this->secureString($id)).'\','.
				'\''.$this->con->escapeStr((integer) $level).'\','.
				'\''.md5(trim($pwd)).'\','.
				'\''.$this->con->escapeStr($this->secureString($nom)).'\','.
				'\''.$this->con->escapeStr($this->secureString($prenom)).'\','.
				'\''.$this->con->escapeStr($this->secureString($pseudo)).'\','.
				'\''.$this->con->escapeStr($this->secureString($email)).'\','.
				'\''.$this->con->escapeStr($this->secureString($post_format)).'\','.
				'\''.$this->con->escapeStr((integer) $edit_size).'\','.
				'\''.$this->con->escapeStr((integer) $pref_cat).'\','.
				'\''.$this->con->escapeStr($lang).'\','.
				'\''.$this->con->escapeStr((integer) $delta).'\','.
				'\''.$this->con->escapeStr((integer) $post_pub).'\''.
				') ';
		
		if (!$this->con->execute($insReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$this->triggerMassUpd();
			$this->tiggerLog('user',$id,'Create user');
			return true;
		}
	}
	
	/**
	@function updUser
	
	Modification d'un utilisateur. Renvoie vrai en cas de succès.
	
	Si le mot de passe est vide, il ne sera pas changé.
	
	@param	string	id			ID de l'utilisateur
	@param	string	new_id		Nouvel ID de l'utilisateur
	@param	integer	level		Niveau de l'utilisateur
	@param	string	pwd			Mot de passe
	@param	string	nom			Nom de l'utilisateur
	@param	string	prenom		Prénom de l'utilisateur
	@param	string	pseudo		Pseudo de l'utilisateur
	@param	string	email		Email de l'utilisateur
	@param	string	post_format	Format d'édition préféré ('html')
	@param	string	edit_size		Hauteur de la zone d'éditions (10)
	@param	integer	pref_cat		Catégorie préférée (1)
	@param	string	lang			Langue de l'utilisateur ('')
	@param	integer	delta		Décalage horaire (0)
	@param	boolean	post_pub		Status de publication par défaut (true)
	@return	boolean
	*/
	function updUser($id,$new_id,$level,$pwd,$nom,$prenom,$pseudo,$email,
	$post_format='html',$edit_size=10,$pref_cat=1,$lang='',$delta=0,$post_pub=1)
	{
		# Vérifications habituelles
		if (!preg_match('|^[a-zA-Z0-9]+$|',trim($id))) {
			$this->setError(__('No such user ID or invalid user ID'),1000);
		}
		
		if (trim($new_id) == '') {
			$new_id = $id;
		}
		
		if ($level != 0 && $level != 1 && $level != 5 && $level != 9) {
			$this->setError(__('Invalid user level'),1000);
		}
		
		if (trim($nom) == '') {
			$this->setError(__('User name missing'),1000);
		}
		
		if (trim($email) != '' && !$this->isEmail($email)) {
			$this->setError(__('Invalid email address'),1000);
		}
		
		if (trim($post_format) != 'html' && $post_format != 'wiki') {
			$this->setError(__('Invalid publication format'),1000);
		}
		
		if (!$this->checkCat($pref_cat)) {
			$this->setError(__('Category does not exist'),2005);
		}
		
		if ((integer) $edit_size <= 0) {
			$this->setError(__('Invalid edit size'),1000);
		}
		
		if ($this->error() !== false) {
			return false;
		}
		
		$reqPlus = '';
		if (trim($pwd) != '') {
			$reqPlus .= 'user_pwd = \''.md5(trim($pwd)).'\',';
		}
		
		# Modification
		$updReq = 'UPDATE '.$this->t_user.' SET '.
				$reqPlus.
				'user_id = \''.$this->con->escapeStr($this->secureString($new_id)).'\','.
				'user_level = \''.$this->con->escapeStr((integer) $level).'\','.
				'user_nom = \''.$this->con->escapeStr($this->secureString($nom)).'\','.
				'user_prenom = \''.$this->con->escapeStr($this->secureString($prenom)).'\','.
				'user_pseudo = \''.$this->con->escapeStr($this->secureString($pseudo)).'\','.
				'user_email = \''.$this->con->escapeStr($this->secureString($email)).'\','.
				'user_post_format = \''.$this->con->escapeStr($this->secureString($post_format)).'\','.
				'user_edit_size = \''.$this->con->escapeStr((integer) $edit_size).'\','.
				'user_pref_cat =  \''.$this->con->escapeStr((integer) $pref_cat).'\', '.
				'user_lang =  \''.$this->con->escapeStr($lang).'\', '.
				'user_delta =  \''.$this->con->escapeStr((integer) $delta).'\', '.
				'user_post_pub =  \''.$this->con->escapeStr((integer) $post_pub).'\' '.
				'WHERE user_id = \''.$this->con->escapeStr($id).'\' ';
		
		if (!$this->con->execute($updReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$this->triggerMassUpd();
			$this->tiggerLog('user',$id,'Update user');
			
			if (trim($id) != trim($new_id)) {
				# Si mise à jour de l'ID on le change dans les posts
				
				$ouvReq = 'UPDATE '.$this->t_post.' SET '.
						'user_id = \''.$this->con->escapeStr($this->secureString($new_id)).'\' '.
						'WHERE user_id = \''.$this->con->escapeStr($id).'\' ';
				
				if (!$this->con->execute($ouvReq)) {
					$this->setError('MySQL : '.$this->con->error(),2000);
					return false;
				}
			}
		}
		return true;
	}
	
	/**
	@function delUser
	
	Suppression d'un utilisateur. Renvoie vrai en cas de succès.
	
	@param	string	id			ID de l'utilisateur
	@return	boolean
	*/
	function delUser($id)
	{
		if (trim($id) == '') {
			$this->setError(__('No such user ID or invalid user ID'),1000);
		}
		
		$rs = $this->getUser($id);
		if ($rs->field('nb_post') > 0) {
			$this->setError(__('This user has entries'));
		}
		
		if ($this->error() !== false) {
			return false;
		}
		
		$delReq = 'DELETE FROM '.$this->t_user.' '.
				'WHERE user_id = \''.$this->con->escapeStr($id).'\' ';
		
		if (!$this->con->execute($delReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$this->triggerMassUpd();
			$this->tiggerLog('user',$id,'Delete user');
		}
	}
	
	/* ===================================================
	Categories
	=================================================== */
	/** @doc
	=== Méthodes de gestion des catégories === */
	
	/**
	@function checkCat
	
	Vérifie l'existence d'une catégorie. Renvoie vrai ou faux.
	
	@param	integer	cat_id		ID de la catégorie
	
	@return	boolean
	*/
	function checkCat($cat_id)
	{
		$strReq = 'SELECT count(*) FROM '.$this->t_categorie.' '.
				'WHERE cat_id = '.(integer) $this->con->escapeStr($cat_id).' ';
		$rs = $this->con->select($strReq);
		
		if ($rs == false || $rs->field(0) == '0') {
			return false;
		} else {
			return true;
		}
	}
	
	/**
	@function getCat
	
	Sélectionne une ou plusieurs catégories. La paramètre $cat_id peut être
	un entier, le champ ''cat_id'' sera alors pris en compte. S'il s'agit
	d'une chaine, la comparaison sera faite sur ''cat_libelle_url''.
	
	Si le paramètre $cat_id est une chaine vide, toutes les catégories seront
	renvoyées dans le recordset (fonctionnement par défaut).
	
	La méthode renvoie false en cas d'erreur.
	
	@param	mixed	cat_id		Identifiant de la catégorie ('')
	@param	string	order_by		Champ par lequel ordonner les résultats ('cat_ord')
	@return	recordset
	*/
	function getCat($cat_id='',$order_by='cat_ord')
	{
		$reqPlus = '';
		
		if ($cat_id != '') {
			if (preg_match('/^[0-9]+$/',$cat_id)) {
				$reqPlus .= 'AND C.cat_id = '.$this->con->escapeStr($cat_id).' ';
			} else {
				$reqPlus .= 'AND C.cat_libelle_url = \''.$this->con->escapeStr($cat_id).'\' ';
			}
		}
		
		if ($this->pub_mode !== NULL) {
			$reqPlus .= 'AND post_pub = '.(integer) $this->pub_mode.' ';
		}
		
		if ($this->lang !== NULL) {
			$reqPlus .= 'AND post_lang = \''.$this->con->escapeStr($this->lang).'\' ';
		}
		
		$strReq = 'SELECT C.cat_id, cat_libelle, cat_desc, cat_libelle_url, '.
				'cat_ord, count(P.post_id) AS nb_post '.
				'FROM '.$this->t_categorie.' C '.
					'LEFT JOIN '.$this->t_post.' P ON C.cat_id = P.cat_id '.
				'WHERE 1 '.
				$reqPlus.
				'GROUP BY C.cat_id '.
				'ORDER BY '.$this->con->escapeStr($order_by);
		
		if (($rs =$this->con->select($strReq)) !== false) {
			return $rs;
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function addCat
	
	Ajout d'un catégorie. Renvoie vrai en cas de succès.
	
	@param	string	libelle		Libellé de la catégorie
	@param	string	desc			Description de la catégorie ('')
	@param	string	libelle_url	Libellé "URLisé" de la catégorie ('')
	@return	boolean
	*/
	function addCat($libelle,$desc='',$libelle_url='')
	{
		$libelle = trim($libelle);
		$libelle_url = trim($libelle_url);
		
		if ($libelle == '') {
			$this->setError(__('Empty category title'),1000);
		}
		
		if ($this->error() !== false) {
			return false;
		}
		
		$libelle_url = ($libelle_url == '') ? $libelle : $libelle_url;
		$libelle_url = $this->str2url($libelle_url);
		
		# Ajout des protections sur le libelle_url
		$libelle_url = ucfirst(preg_replace('/^[0-9]{4,}/','',$libelle_url));
		
		if ($libelle_url == '') {
			$this->setError(__('Empty or invalid URLed title'),1000);
			return false;
		}
		
		$libelle = $this->secureString($libelle);
		
		$strReq = 'SELECT MAX(cat_ord) FROM '.$this->t_categorie;
		$rs = $this->con->select($strReq);
		if ($rs == false) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
		$max_ord = $rs->f(0);
		
		$insReq = 'INSERT INTO '.$this->t_categorie.' '.
				'(cat_libelle,cat_libelle_url,cat_desc,cat_ord) VALUES ('.
				'\''.$this->con->escapeStr($libelle).'\','.
				'\''.$this->con->escapeStr($libelle_url).'\', '.
				'\''.$this->con->escapeStr($desc).'\','.
				($max_ord+1).
				') ';
		
		if (!$this->con->execute($insReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$this->triggerMassUpd();
			$this->tiggerLog('categorie',$libelle,'Create category');
			return true;
		}
	}
	
	/**
	@function updCat
	
	Modification d'un catégorie. Renvoie vrai en cas de succès.
	
	@param	integer	cat_id		ID de la catégorie à modifier
	@param	string	libelle		Libellé de la catégorie
	@param	string	desc			Description de la catégorie ('')
	@param	string	libelle_url	Libellé "URLisé" de la catégorie ('')
	@return	boolean
	*/
	function updCat($cat_id,$libelle,$desc='',$libelle_url='')
	{
		$libelle = trim($libelle);
		$libelle_url = trim($libelle_url);
		
		if ($libelle == '') {
			$this->setError(__('Empty category title'),1000);
		}
		
		if (!$this->checkCat($cat_id)) {
			$this->setError(__('Category does not exist'),2005);
		}
		
		if ($this->error() !== false) {
			return false;
		}
		
		$libelle_url = ($libelle_url == '') ? $libelle : $libelle_url;
		$libelle_url = $this->str2url($libelle_url);
		
		# Ajout des protections sur le libelle_url
		$libelle_url = ucfirst(preg_replace('/^[0-9]{4,}/','',$libelle_url));
		
		if ($libelle_url == '') {
			$this->setError(__('Empty or invalid URLed title'),1000);
			return false;
		}
		
		$libelle = $this->con->escapeStr($this->secureString($libelle));
		
		$updReq = 'UPDATE '.$this->t_categorie.' SET '.
				'cat_libelle = \''.$libelle.'\','.
				'cat_desc = \''.$this->con->escapeStr($desc).'\', '.
				'cat_libelle_url = \''.$this->con->escapeStr($libelle_url).'\' '.
				'WHERE cat_id = '.$this->con->escapeStr($cat_id).' ';
		
		if (!$this->con->execute($updReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$this->triggerMassUpd();
			$this->tiggerLog('categorie',$cat_id,'Update category');
			return true;
		}
	}
	
	/**
	@function delCat
	
	Suppression d'une catégorie donnée. Renvoie vrai en cas de succès.
	
	@param	integer	cat_id		ID de la catégorie
	@return	boolean
	*/
	function delCat($cat_id)
	{
		if ($cat_id == '') {
			$this->setError(__('No category ID'),1000);
		}
		
		$rs = $this->getCat($cat_id);
		
		if($rs->f('nb_post') > 0) {
			$this->setError(__('This category is not empty'),2010);
		} 
		
		if ($this->error() !== false) {
			return false;
		}
		
		$delReq = 'DELETE FROM '.$this->t_categorie.' '.
				'WHERE cat_id = '.$this->con->escapeStr($cat_id).' ';
		
		if (!$this->con->execute($delReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$this->reordCats();
			$this->triggerMassUpd();
			$this->tiggerLog('categorie',$cat_id,'Delete category');
			return true;
		}
	}
	
	/**
	@function reordCats
	
	Réordonner les catégories. Cette méthode va remettre les catégorie dans
	l'ordre (selon les ID ou selon les noms si $byname est vrai).
	
	Si $check_url est vrai, les titres "URLisés" seront normalisés.
	
	@param	boolean	chekc_url		Normaliser les titres URLisés (false)
	@param	boolean	byname		Ordonner par noms (false)
	*/
	function reordCats($check_url=false,$byname=false)
	{
		$ordby = $byname ? 'cat_libelle' : 'cat_ord';
		
		$i = 0;
		$strReq = 'SELECT cat_id, cat_libelle_url '.
				'FROM '.$this->t_categorie.' '.
				'ORDER BY '.$ordby.' ';
		$rs = $this->con->select($strReq);
		if ($rs == false) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
		
		while (!$rs->EOF())
		{
			$reqPlus = '';
			if ($check_url &&
			preg_match('/^[a-z]/',$rs->f('cat_libelle_url')))
			{
					$reqPlus = ',cat_libelle_url = \''.ucfirst($rs->f('cat_libelle_url')).'\' ';
			}
			
			$updReq = 'UPDATE '.$this->t_categorie.' SET '.
					'cat_ord = '.$i.' '.
					$reqPlus.
					'WHERE cat_id = '.$rs->f('cat_id');
			
			if (!$this->con->execute($updReq)) {
				$this->setError('MySQL : '.$this->con->error(),2000);
				return false;
			}
			
			$i++;
			$rs->moveNext();
		}
		
		$this->triggerMassUpd();
		return true;
	}
	
	/**
	@function ordCats
	
	Ordonne les catégories en utilisant les valeurs du tableau $ord. La clé est
	l'identifiant de la catégorie et la valeur, l'ordre de celle-ci.
	
	La méthode renvoie vrai en cas de succès.
	
	@param	array	ord			Tableau contenant l'ordre de chaque catégorie
	@return	boolean
	*/
	function ordCats($ord)
	{
		if (!is_array($ord)) {
			$this->setError('Bad argument',1000);
			return false;
		}
		
		foreach ($ord as $k => $v)
		{
			$updReq = 'UPDATE '.$this->t_categorie.' SET '.
					'cat_ord = '.(integer) $v.' '.
					'WHERE cat_id = '.(integer) $k;
			
			if (!$this->con->execute($updReq)) {
				$this->setError('MySQL : '.$this->con->error(),2000);
				return false;
			}
		}
		
		$this->triggerMassUpd();
		return true;
	}
	
	/* ===================================================
	Billets
	=================================================== */
	/** @doc
	=== Méthodes de gestion des billets === */
	
	/**
	@function SQL
	
	Cette méthode renvoie une requête SQL prête à être exploitée pour
	sélectionner des billets selon divers critères.
	
	La valeur de $reqPlus doit commencer par ''AND''. $limit peut être un
	nombre ou un critère de limite classique (0,n).
	
	@param	string	reqPlus		Critères SQL supplémentaires ('')
	@param	string	order		Critère de tri des billets ('post_dt ASC')
	@param	string	limit		Critère de limitation des résultats
	@return	string
	*/
	function SQL($reqPlus='',$order='post_dt ASC',$limit='')
	{
		if ($this->pub_mode !== NULL) {
			$reqPlus .= 'AND post_pub = '.(integer) $this->pub_mode.' ';
		}
		
		if ($this->lang !== NULL) {
			$reqPlus .= 'AND post_lang = \''.$this->con->escapeStr($this->lang).'\' ';
		}
		
		if ($this->user_id != '') {
			$reqPlus .= 'AND P.user_id = \''.$this->con->escapeStr($this->user_id).'\' ';
		}
		
		$strReq = 'SELECT post_id, post_chapo, post_chapo_wiki, post_content, '.
				'post_content_wiki, post_notes, post_titre, post_titre_url, '.
				'post_dt, post_upddt, post_creadt, post_pub, '.
				'post_open_comment, post_open_tb, nb_comment, nb_trackback, '.
				'post_lang, post_selected, U.user_id, U.user_nom, '.
				'U.user_prenom, U.user_pseudo, U.user_email, '.
				'DATE_FORMAT(post_dt,\'%Y%m%d\') AS postdate, '.
				'DATE_FORMAT(post_dt,\'%H:%i\') AS posthour, '.
				'DATE_FORMAT(post_dt,\'%d\') AS postday, '.
				'DATE_FORMAT(post_dt,\'%m\') AS postmonth, '.
				'DATE_FORMAT(post_dt,\'%Y\') AS postyear, '.
				'P.cat_id, C.cat_libelle, C.cat_libelle_url '.
				'FROM '.$this->t_post.' P, '.$this->t_categorie.' C, '.
					$this->t_user.' U '.
				'WHERE P.cat_id = C.cat_id '.
				'AND U.user_id = P.user_id '.
				$reqPlus.
				'ORDER BY '.$this->con->escapeStr($order).' ';
		
		if ($limit != '') {
			$limit = (preg_match('/^[0-9]+$/',$limit)) ? '0,'.$limit : $limit;
			$strReq .= 'LIMIT '.$limit.' ';
		}
		
		return $strReq;
	}
	
	/**
	@function getLastNews
	
	Cette functions renvoie un recordset (ou l'objet défini par la propriété
	'''rs_blogpost''') contenant les n derniers billets.
	
	$cat peut être une chaîne ou un entier selon que l'on souhaite travailler
	avec ''cat_id'' ou ''cat_libelle_url''.
	
	@param	integer	limit		Nombre de résultats à renvoyer (20)
	@param	mixed	cat			Restreindre à la catégorié donnée
	@param	string	order		Critère de tri ('post_dt DESC')
	@param	boolean	selected		Uniquement les billets marqués ''post_selected'' (false)
	@param	string	lang			Restreindre à la langue donnée
	@return	recordset
	*/
	function getLastNews($limit=20,$cat='',$order='post_dt DESC',$selected=false,$lang='')
	{
		$reqPlus = '';
		
		if ($cat != '') {
			if (preg_match('/^[0-9]+$/',$cat)) {
				$reqPlus .= 'AND C.cat_id = '.$cat.' ';
			} else {
				$reqPlus .= 'AND C.cat_libelle_url = \''.$this->con->escapeStr($cat).'\' ';
			}
		}
		
		if ($selected) {
			$reqPlus .= 'AND P.post_selected = 1 ';
		}
		
		if ($lang != '') {
			$reqPlus .= 'AND P.post_lang = \''.$this->con->escapeStr($lang).'\' ';
		}
		
		$strReq = $this->SQL($reqPlus,$order,$limit);
		
		if (($rs = $this->con->select($strReq,$this->rs_blogpost)) !== false) {
			$rs->setBlog($this);
			return $rs;
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function getPostByID
	
	Sélection d'un billet par son ID. Cette méthode renvoie un recordset
	étendu (comme la précédente) contenant le billet sélectionné.
	
	@param	integer	id		ID du billet
	@return	recordset
	*/
	function getPostByID($id)
	{
		$reqPlus = 'AND post_id = '.(integer) $id.' ';
		
		$strReq = $this->SQL($reqPlus);
		
		if (($rs = $this->con->select($strReq,$this->rs_blogpost)) !== false) {
			$rs->setBlog($this);
			return $rs;
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function getPostByDate
	
	Sélection de billet par une date. Les paramètre de mois et d'année sont
	obligatoire. Les aures optionnels. La catégorie peut être une chaîne ou
	un entier.
	
	La méthode renvoie un recordset étendu.
	
	@param	integer	y			Année
	@param	integer	m			Mois
	@param	integer	d			Jour ('')
	@param	mixed	cat			Restreindre à la catégorié donnée
	@param	string	order		Critère de tri ('post_dt DESC')
	@param	boolean	selected		Uniquement les billets marqués ''post_selected'' (false)
	@param	string	lang			Restreindre à la langue donnée
	@return	recordset
	*/
	function getPostByDate($y,$m,$d='',$cat='',$order='post_dt DESC',$selected=false,$lang='')
	{
		$reqPlus = 'AND DATE_FORMAT(post_dt,\'%Y\') = \''.(integer) $y.'\' ';
		$reqPlus .= 'AND DATE_FORMAT(post_dt,\'%c\') = \''.(integer) $m.'\' ';
		
		if ($d != '') {
			$reqPlus .= 'AND DATE_FORMAT(post_dt,\'%e\') = \''.(integer) $d.'\' ';
		}
		
		if ($cat != '') {
			if (preg_match('/^[0-9]+$/',$cat)) {
				$reqPlus .= 'AND C.cat_id = '.$cat.' ';
			} else {
				$reqPlus .= 'AND C.cat_libelle_url = \''.$this->con->escapeStr($cat).'\' ';
			}
		}
		
		if ($selected) {
			$reqPlus .= 'AND P.post_selected = 1 ';
		}
		
		if ($lang != '') {
			$reqPlus .= 'AND P.post_lang = \''.$this->con->escapeStr($lang).'\' ';
		}
		
		$strReq = $this->SQL($reqPlus,$order);
		
		if (($rs = $this->con->select($strReq,$this->rs_blogpost)) !== false) {
			$rs->setBlog($this);
			return $rs;
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function searchPost
	
	Recherche d'un billet selon des mots clé et renvoie un recordset étendu. La
	recherche est faite sur les champs ''post_content'', ''post_titre'' et
	''post_chapo''.
	
	@param	string	w			Mots clé
	@return	recordset
	*/
	function searchPost($w)
	{
		$strip = array('+',')','(',',','\'');
		$w = strtolower($w);
		$w = str_replace($strip,' ',$w);
		$w = preg_replace('/( )+/',' ',$w);
		
		$reqPlus = '';
		foreach(explode(' ',$w) as $v)
		{
			$reqPlus .= 'AND (LOWER(post_content) LIKE \'%'.$this->con->escapeStr($v).'%\' OR '.
			'LOWER(post_titre) LIKE \'%'.$this->con->escapeStr($v).'%\' OR '.
			'LOWER(post_chapo) LIKE \'%'.$this->con->escapeStr($v).'%\') ';
		}
		
		$strReq = $this->SQL($reqPlus,'post_dt DESC');
		
		if (($rs = $this->con->select($strReq,$this->rs_blogpost)) !== false) {
			$rs->setBlog($this);
			return $rs;
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function getAllDates
	
	Obtenir les dates (jours ou mois) du blog. Cette méthode renvoie un
	tableau contenant toutes les dates du blog. On peut restreindre la
	recherche à une année, un mois (d'une année donnée) ou un jour.
	
	Le critère de catégorie peut être une chaîne ou un entier.
	
	La tableau renvoyé est un tableau de plusieurs lignes dont la clé est
	un timestamp et la valeur la date au format YYYY-MM-DD.
	
	@param	string	type			Type de date ; y, d ou m
	@param	integer	y			Année ('')
	@param	integer	m			Mois ('')
	@param	integer	d			Jour ('')
	@param	mixed	cat			Restreindre à la catégorié donnée ('')
	@return	array
	*/
	function getAllDates($type='m',$y='',$m='',$d='',$cat='')
	{
		if ($type == 'y') {
			$dt_f = '%Y-01-01';
		} elseif ($type == 'd') {
			$dt_f = '%Y%-%m-%d';
		} else {
			$dt_f = '%Y-%m-01';
		}
		
		$reqPlus = '';
		
		if ($this->pub_mode !== NULL) {
			$reqPlus .= 'AND post_pub = '.$this->pub_mode.' ';
		}
		
		if ($this->lang !== NULL) {
			$reqPlus .= 'AND post_lang = \''.$this->con->escapeStr($this->lang).'\' ';
		}
		
		if ($this->user_id != '') {
			$reqPlus .= 'AND P.user_id = \''.$this->con->escapeStr($this->user_id).'\' ';
		}
		
		if ($y != '') {
			$reqPlus .= 'AND DATE_FORMAT(post_dt,\'%Y\') = \''.(integer) $y.'\' ';
		}
		
		if ($m != '') {
			$reqPlus .= 'AND DATE_FORMAT(post_dt,\'%c\') = \''.(integer) $m.'\' ';
		}
		
		if ($d != '') {
			$reqPlus .= 'AND DATE_FORMAT(post_dt,\'%e\') = \''.(integer) $d.'\' ';
		}
		
		if ($cat != '') {
			if (preg_match('/^[0-9]+$/',$cat)) {
				$reqPlus .= 'AND C.cat_id = '.$cat.' ';
			} else {
				$reqPlus .= 'AND C.cat_libelle_url = \''.$this->con->escapeStr($cat).'\' ';
			}
		}
		
		$strReq = 'SELECT DISTINCT(DATE_FORMAT(post_dt,\''.$dt_f.'\')) '.
				'FROM '.$this->t_post.' P, '.$this->t_categorie.' C '.
				'WHERE P.cat_id = C.cat_id '.
				$reqPlus.
				'ORDER BY post_dt DESC ';
		
		if (($rs = $this->con->select($strReq)) === false) {
			echo htmlspecialchars($this->con->error());
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$res = array();
			while(!$rs->EOF()) {
				$res[strtotime($rs->field(0))] = $rs->field(0);
				$rs->moveNext();
			}
			return $res;
		}
	}
	
	/**
	@function getEarlierDate
	
	Renvoie la date au format standard du billet le plus récent ou false en cas
	d'erreur. $cat peut être une chaîne ou un entier.
	
	@param	mixed	cat			Identifiant de la catégorie
	@return	string
	*/
	function getEarlierDate($cat='')
	{
		$reqPlus = '';
		
		if ($cat != '') {
			if (preg_match('/^[0-9]+$/',$cat)) {
				$reqPlus .= 'AND C.cat_id = '.$cat.' ';
			} else {
				$reqPlus .= 'AND C.cat_libelle_url = \''.$this->con->escapeStr($cat).'\' ';
			}
		}
		
		if ($this->pub_mode !== NULL) {
			$reqPlus .= 'AND post_pub = '.$this->pub_mode.' ';
		}
		
		if ($this->lang !== NULL) {
			$reqPlus .= 'AND post_lang = \''.$this->con->escapeStr($this->lang).'\' ';
		}
		
		if ($this->user_id != '') {
			$reqPlus .= 'AND P.user_id = \''.$this->con->escapeStr($this->user_id).'\' ';
		}
		
		$strReq = 'SELECT MAX(post_dt) '.
				'FROM '.$this->t_post.' P, '.$this->t_categorie.' C '.
				'WHERE P.cat_id = C.cat_id '.
				$reqPlus;
		
		if (($rs = $this->con->select($strReq)) !== false) {
			return $rs->field(0);
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function getNextID
	
	Renvoie un recordset contenant l'id, le titre et la date du billet
	suivant le timestamp donné par $ts. $dir prend les valeurs 1 (billet
	suivant) ou 0 (billet précédent).
	
	@param	string	ts			Timestamp du billet
	@param	integer	dir			Direction de recherche
	@return	recordset
	*/
	function getNextID($ts,$dir=1)
	{
		$ts = (integer) $ts;
		
		$reqPlus = '';
		
		if($dir > 0) {
               $sign = '>';
               $order = 'ASC';
          }
          else {
               $sign = '<';
               $order = 'DESC';
          }
		
		if ($this->pub_mode !== NULL) {
			$reqPlus .= 'AND post_pub = '.$this->pub_mode.' ';
		}
		
		if ($this->lang !== NULL) {
			$reqPlus .= 'AND post_lang = \''.$this->con->escapeStr($this->lang).'\' ';
		}
		
		$strReq = 'SELECT post_id, post_titre, post_dt '.
				'FROM '.$this->t_post.' '.
				'WHERE UNIX_TIMESTAMP(post_dt) '.$sign.' \''.$ts.'\' '.
				$reqPlus.
				'ORDER BY post_dt '.$this->con->escapeStr($order).' '.
				'LIMIT 0,1 ';
		
		if (($rs = $this->con->select($strReq)) !== false) {
			return $rs;
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function getPostLanguages
	
	Renvoie un recordset contenant toutes les langues du blog, ou false en cas
	d'erreur.
	
	@return recordset
	*/
	function getPostLanguages()
	{
		$reqPlus = '';
		if ($this->pub_mode !== NULL) {
			$reqPlus .= 'AND post_pub = '.$this->pub_mode.' ';
		}
		
		$strReq = 'SELECT DISTINCT(post_lang) '.
				'FROM '.$this->t_post.' '.
				'WHERE post_lang <> \'\' '.
				$reqPlus.' '.
				'ORDER BY post_lang ASC ';
		
		if (($rs = $this->con->select($strReq)) !== false) {
			return $rs;
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function addPost
	
	Création d'un billet. Renvoie l'ID du billet en cas de succès et false en
	cas d'erreur.
	
	@param	string	user_id		ID de l'utilisateur
	@param	string	titre		Titre du billet
	@param	string	titre_url		Titre "URLisé" du billet
	@param	string	chapo		Chapo
	@param	string	content		Contenu
	@param	string	notes		Notes
	@param	integer	cat_id		ID de la catégorie du billet
	@param	string	format		Format du billet, html ou wiki ('html')
	@param	boolean	publish		Publier le billet (true)
	@param	boolean	open_comment	Ouvrir les commentaires du billet (true)
	@param	boolean	open_tb		Ouvrir les trackbacks sur le billet (true)
	@param	string	lang			Langue du billet ('')
	@param	boolean	selected		Billet sélectionné (false)
	@param	boolean	delta		Décalage horaire du rédacteur (0)
	@return	integer
	*/
	function addPost($user_id,$titre,$titre_url,$chapo,$content,$notes,$cat_id,
	$format='html',$publish=true,$open_comment=true,$open_tb=true,$lang='',
	$selected=false,$delta=0)
	{
		# Vérifications d'usage
		if ($this->checkUser($user_id) === false ) {
			$this->setError(__('No such user ID or invalid user ID'),1000);
		}
		
		if (trim($titre) == '') {
			$this->setError(__('Empty entry title'),1000);
		}
		
		if (trim($content) == '') {
			$this->setError(__('Empty entry content'),1000);
		}
		
		if ($this->error()) {
			return false;
		}
		
		$chapo_wiki = $content_wiki = '';
		if ($format == 'wiki')
		{
			$objWiki = new wiki2xhtml();
			
			if ($this->encoding != 'UTF-8') {
				$objWiki->setOpt('active_fix_word_entities',1);
			}
			
			if (strpos($lang,'fr') === 0) {
				$objWiki->setOpt('active_fr_syntax',1);
			}
			
			$content_wiki = $content;
			$content = $objWiki->transform($content);
			$chapo_wiki = $chapo;
			$chapo = $objWiki->transform($chapo);
		}
		
		$titre = htmlspecialchars($titre);
		
		if (trim($titre_url) == '') {
			$titre_url = $this->str2url($titre);
		}
		$titre_url = $this->str2url($titre_url);
		
		$insReq = 'INSERT INTO '.$this->t_post.' '.
				'(user_id,cat_id,post_dt,post_creadt,post_upddt,'.
				'post_titre,post_titre_url,post_chapo,post_chapo_wiki,'.
				'post_content,post_content_wiki,post_notes,post_pub,'.
				'post_open_comment,post_open_tb,post_lang,post_selected) '.
				'VALUES '.
				'(\''.$this->con->escapeStr($user_id).'\','.
				'\''.$this->con->escapeStr($cat_id).'\','.
				'ADDDATE(SYSDATE(),INTERVAL \''.$delta.'\' HOUR),'.
				'SYSDATE(),'.
				'ADDDATE(SYSDATE(),INTERVAL \''.$delta.'\' HOUR),'.
				'\''.$this->con->escapeStr($titre).'\','.
				'\''.$this->con->escapeStr($titre_url).'\','.
				'\''.$this->con->escapeStr($chapo).'\','.
				'\''.$this->con->escapeStr($chapo_wiki).'\','.
				'\''.$this->con->escapeStr($content).'\','.
				'\''.$this->con->escapeStr($content_wiki).'\','.
				'\''.$this->con->escapeStr($notes).'\','.
				'\''.(integer) $publish.'\','.
				'\''.(integer) $open_comment.'\','.
				'\''.(integer) $open_tb.'\','.
				'\''.$this->con->escapeStr($lang).'\','.
				'\''.(integer) $selected.'\') ';
		
		if (!$this->con->execute($insReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			# On récupère l'id et on refait une passe de mise à jour
			# si le format est en wiki
			$post_id = $this->con->getLastID();
			
			if ($format == 'wiki') {
				$objWiki->setOpt('note_prefix','pnote-'.$post_id);
				
				$content = $objWiki->transform($content_wiki);
				$chapo = $objWiki->transform($chapo_wiki);
				
				$updReq = 'UPDATE '.$this->t_post.' SET '.
				'post_chapo = \''.$this->con->escapeStr($chapo).'\', '.
				'post_content = \''.$this->con->escapeStr($content).'\' '.
				'WHERE post_id = '.$post_id.' ';
				
				if (!$this->con->execute($updReq)) {
					$this->setError('MySQL : '.$this->con->error(),2000);
					return false;
				}
			}
			
			$this->triggerMassUpd();
			$this->tiggerLog('post',$post_id,'Create post');
			return $post_id;
		}
	}
	
	/**
	@function updPost
	
	Modification d'un billet. Renvoie vrai en cas de succès.
	
	@param	string	post_id		ID du billet à modifier
	@param	string	titre		Titre du billet
	@param	string	titre_url		Titre "URLisé" du billet
	@param	string	chapo		Chapo
	@param	string	content		Contenu
	@param	string	notes		Notes
	@param	integer	cat_id		ID de la catégorie du billet
	@param	string	format		Format du billet, html ou wiki ('html')
	@param	boolean	publish		Publier le billet (true)
	@param	boolean	open_comment	Ouvrir les commentaires du billet (true)
	@param	boolean	open_tb		Ouvrir les trackbacks sur le billet (true)
	@param	string	date			Nouveau timestamp du billet
	@param	string	lang			Langue du billet ('')
	@param	boolean	selected		Billet sélectionné (false)
	@param	boolean	delta		Décalage horaire du rédacteur (0)
	@return	boolean
	*/
	function updPost($post_id,$titre,$titre_url,$chapo,$content,$notes,$cat_id,
	$format='html',$publish=true,$open_comment=true,$open_tb=true,$date='',
	$lang='',$selected=false,$delta=0)
	{
		# Vérifications d'usage
		if (trim($post_id) == '' ) {
			$this->setError(__('No such post ID'),1000);
		}
		
		if (trim($titre) == '') {
			$this->setError(__('Empty entry title'),1000);
		}
		
		if (trim($content) == '') {
			$this->setError(__('Empty entry content'),1000);
		}
		
		if ($this->error()) {
			return false;
		}
		
		$chapo_wiki = $content_wiki = '';
		if ($format == 'wiki')
		{
			$objWiki = new wiki2xhtml();
			
			if ($this->encoding != 'UTF-8') {
				$objWiki->setOpt('active_fix_word_entities',1);
			}
			
			if (strpos($lang,'fr') === 0) {
				$objWiki->setOpt('active_fr_syntax',1);
			}
			
			$objWiki->setOpt('note_prefix','pnote-'.$post_id);
			
			$content_wiki = $content;
			$content = $objWiki->transform($content);
			$chapo_wiki = $chapo;
			$chapo = $objWiki->transform($chapo);
		}
		
		$titre = htmlspecialchars($titre);
		
		if (trim($titre_url) == '') {
			$titre_url = $this->str2url($titre);
		}
		$titre_url = $this->str2url($titre_url);
		
		$reqPlus = '';
		
		if ($date != '') {
			$reqPlus = 'post_dt = \''.date('Y-m-d H:i:s',$date).'\', ';
		}
		
		$updReq = 'UPDATE '.$this->t_post.' SET '.
				'cat_id = \''.$this->con->escapeStr($cat_id).'\', '.
				'post_titre = \''.$this->con->escapeStr($titre).'\', '.
				'post_titre_url = \''.$this->con->escapeStr($titre_url).'\', '.
				'post_chapo = \''.$this->con->escapeStr($chapo).'\', '.
				'post_chapo_wiki = \''.$this->con->escapeStr($chapo_wiki).'\', '.
				'post_content = \''.$this->con->escapeStr($content).'\', '.
				'post_content_wiki = \''.$this->con->escapeStr($content_wiki).'\', '.
				'post_notes = \''.$this->con->escapeStr($notes).'\', '.
				'post_pub = \''.(integer) $this->con->escapeStr($publish).'\', '.
				'post_open_comment = \''.(integer) $this->con->escapeStr($open_comment).'\', '.
				'post_open_tb = \''.(integer) $this->con->escapeStr($open_tb).'\', '.
				'post_lang = \''.$this->con->escapeStr($lang).'\', '.
				'post_selected = \''.(integer) $selected.'\', '.
				$reqPlus.
				'post_upddt = ADDDATE(SYSDATE(),INTERVAL \''.$delta.'\' HOUR) '.
				'WHERE post_id = '.(integer) $post_id.' ';
		
		if (!$this->con->execute($updReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$this->triggerMassUpd();
			$this->tiggerLog('post',$post_id,'Update post');
			return true;
		}
	}
	
	/**
	@function updPostCat
	
	Change la catégorie d'un billet donné. Renvoi vrai en cas de succès.
	
	@param	integer	post_id		ID du billet
	@param	integer	cat_id		ID de la catégorie
	@return	boolean
	*/
	function updPostCat($post_id,$cat_id)
	{
		if (trim($post_id) == '' ) {
			$this->setError(__('No such post ID'),1000);
		}
		
		if (trim($cat_id) == '') {
			$this->setError(__('No such cat ID'),1000);
		}
		
		$updReq = 'UPDATE '.$this->t_post.' SET '.
				'cat_id = \''.$this->con->escapeStr($cat_id).'\' '.
				//',post_upddt = SYSDATE() '.
				'WHERE post_id = '.$post_id.' ';
		
		if (!$this->con->execute($updReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$this->triggerMassUpd();
			$this->tiggerLog('post',$post_id,'Update post category');
			return true;
		}
	}
	
	/**
	@function statusPost
	
	Inverse le status de publication d'un billet.
	
	@param	integer	id			ID du billet
	@return	boolean
	*/
	function statusPost($id)
	{
		$updReq = 'UPDATE '.$this->t_post.' SET '.
				'post_pub = 1-post_pub '.
				//',post_upddt = SYSDATE() '.
				'WHERE post_id = '.$id.' ';
		
		if (!$this->con->execute($updReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$this->triggerMassUpd();
			$this->tiggerLog('post',$id,'Change status');
			return true;
		}
	}
	
	/**
	@function delPost
	
	Supprime un billet et tous les commentaires associés. Renvoie vrai en cas
	de succès.
	
	@param	integer	id			ID du billet
	@return	boolean
	*/
	function delPost($id)
	{
		$delReq = 'DELETE FROM '.$this->t_post.' '.
				'WHERE post_id = '.(integer) $id.' ';
		
		if (!$this->con->execute($delReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$this->triggerMassUpd();
			$this->tiggerLog('post',$id,'Delete post');
			
			$delCom = 'DELETE FROM '.$this->t_comment.' '.
					'WHERE post_id = '.$id.' ';
			if (!$this->con->execute($delCom)) {
				$this->setError('MySQL : '.$this->con->error(),2000);
				return false;
			}
			return true;
		}
	}
	
	/**
	@function triggerMassUpd
	
	"Déclencheur" changeant la date d'un fichier pour indiquer la
	dernière modification. Le fichier est défini par la constante
	DC_UPDATE_FILE et la constante DC_UPDATE_FILE_W indique si ce dernier est
	accessible en écriture.
	*/
	function triggerMassUpd()
	{
		if (defined('DC_UPDATE_FILE_W') && DC_UPDATE_FILE_W) {
			files::touch(DC_UPDATE_FILE,time());
		}
	} 
	
	/**
	@function triggerPostNbComment
	
	"Déclencheur" pour mettre à jour le nombre de commentaires
	publiés d'un billet. Renvoie vrai en cas de succès.
	
	@param	integer	id			ID du billet
	@return	boolean
	*/
	function triggerPostNbComment($id)
	{
		$strReq = 'SELECT COUNT(comment_id) '.
				'FROM '.$this->t_comment.' '.
				'WHERE comment_trackback <> 1 '.
				'AND post_id = '.(integer) $id.' '.
				'AND comment_pub = 1 ';
		$rsC = $this->con->select($strReq);
		if ($rsC == false) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
		
		$strReq = 'SELECT COUNT(comment_id) '.
				'FROM '.$this->t_comment.' '.
				'WHERE comment_trackback = 1 '.
				'AND post_id = '.(integer) $id.' '.
				'AND comment_pub = 1 ';
		$rsT = $this->con->select($strReq);
		if ($rsT == false) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
		
		$updReq = 'UPDATE '.$this->t_post.' '.
				'SET nb_comment = '.$rsC->f(0).', '.
				'nb_trackback = '.$rsT->f(0).' '.
				'WHERE post_id = '.(integer) $id.' ';
		
		if (!$this->con->execute($updReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
		return true;
	}
	
	/**
	@function tiggerLog
	
	"Déclencheur" remplissant la table de logs. Renvoie vrai en cas de succès.
	
	@param	string	table		Nom de la table
	@param	string	key			Valeur de la clé de la table
	@param	string	log			Description du log
	@param	string	user			ID de l'utilisateur
	@return	boolean
	*/
	function tiggerLog($table,$key,$log,$user='')
	{
		if ($user == '') {
			if (!empty($_SESSION['sess_user_id'])) {
				$user = $_SESSION['sess_user_id'];
			} else {
				$user = $this->user_id;
			}
		}
		
		$insReq = 'INSERT INTO '.$this->t_log.' '.
				'(`user_id`,`table`,`key`,`date`,`ip`,`log`) VALUES ('.
				'\''.$this->con->escapeStr($user).'\','.
				'\''.$this->con->escapeStr($table).'\','.
				'\''.$this->con->escapeStr($key).'\','.
				'SYSDATE(),'.
				'\''.$this->con->escapeStr(@$_SERVER['REMOTE_ADDR']).'\','.
				'\''.$this->con->escapeStr($log).'\''.
				')';
		
		if (!$this->con->execute($insReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
		return true;
	}
	
	/* ===================================================
	Commentaires
	=================================================== */
	/** @doc
	=== Méthodes de gestion des commentaires === */
	
	/**
	@function getNbComments
	
	Retourn le nombre de commentaires d'un billet sous forme d'un entier.
	
	@param	integer	id			ID du billet
	@return	integer
	*/
	function getNbComments($id='')
	{
		$reqPlus = '';
		
		if ($this->pub_mode !== NULL) {
			$reqPlus .=
			'AND C.comment_pub = '.$this->pub_mode.' '.
			'AND P.post_pub = '.$this->pub_mode.' ';
		}
		
		if ($this->user_id != '') {
			$reqPlus .= 'AND P.user_id = \''.$this->con->escapeStr($this->user_id).'\' ';
		}
		
		if ($id != '') {
			$reqPlus .= 'AND P.post_id = '.(integer) $id.' ';
		}
		
		$strReq = 'SELECT count(comment_id) '.
				'FROM '.$this->t_comment.' C, '.$this->t_post.' P '.
				'WHERE P.post_id = C.post_id '.
				'AND comment_trackback <> 1 '.
				$reqPlus;
		
		if (($rs = $this->con->select($strReq)) !== false) {
			return $rs->field(0);
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function getNbTrackbacks
	
	Retourn le nombre de trackbacks d'un billet sous forme d'un entier.
	
	@param	integer	id			ID du billet
	@return	integer
	*/
	function getNbTrackbacks($id='')
	{
		$reqPlus = '';
		
		if ($this->pub_mode !== NULL) {
			$reqPlus .=
			'AND C.comment_pub = '.$this->pub_mode.' '.
			'AND P.post_pub = '.$this->pub_mode.' ';
		}
		
		if ($this->user_id != '') {
			$reqPlus .= 'AND P.user_id = \''.$this->con->escapeStr($this->user_id).'\' ';
		}
		
		if ($id != '') {
			$reqPlus .= 'AND P.post_id = '.(integer) $id.' ';
		}
		
		$strReq = 'SELECT count(comment_id) '.
				'FROM '.$this->t_comment.' C, '.$this->t_post.' P '.
				'WHERE P.post_id = C.post_id '.
				'AND comment_trackback = 1 '.
				$reqPlus;
		
		if (($rs = $this->con->select($strReq)) !== false) {
			return $rs->field(0);
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function getComments
	
	Sélection des commentaires et trackbacks d'un billet. Renvoie un recordset
	étendu du type défini par la propriété '''rs_blogcomment'''. Si la valeur de
	$post_id est vide, tous les commentaires seront renvoyés.
	
	@param	integer	post_id		ID du billet ('')
	@param	string	order		Send de l'ordre des commentaires, ASC ou DESC ('ASC')
	@param	integer	limit		Nombre de commentaires à séléctionner (NULL)
	@return	recordset
	*/
	function getComments($post_id='',$order='ASC',$limit=NULL)
	{
		$reqPlus = '';
		
		if ($this->pub_mode !== NULL) {
			$reqPlus .= 
			'AND C.comment_pub = '.$this->pub_mode.' '.
			'AND P.post_pub = '.$this->pub_mode.' ';
		}
		
		if ($this->user_id != '') {
			$reqPlus .= 'AND P.user_id = \''.$this->con->escapeStr($this->user_id).'\' ';
		}
		
		if ($post_id != '') {
			$reqPlus .= 'AND C.post_id = '.(integer) $post_id.' ';
		}
		
		$strReq = 'SELECT comment_id, comment_dt, comment_upddt, comment_auteur, '.
				'comment_email, comment_site, comment_content, comment_trackback, '.
				'comment_pub, comment_ip, P.post_titre, P.post_titre_url, P.post_id, '.
				'DATE_FORMAT(P.post_dt,\'%d\') AS postday, '.
				'DATE_FORMAT(P.post_dt,\'%m\') AS postmonth, '.
				'DATE_FORMAT(P.post_dt,\'%Y\') AS postyear, '.
				'DATE_FORMAT(comment_dt,\'%Y%m%d\') AS comment_date '.
				'FROM '.$this->t_comment.' C, '.$this->t_post.' P '.
				'WHERE P.post_id = C.post_id '.
				$reqPlus.
				'ORDER BY comment_dt '.$this->con->escapeStr($order).' ';
		
		if ($limit !== NULL) {
			$limit = (preg_match('/^[0-9]+$/',$limit)) ? '0,'.$limit : $limit;
			$strReq .= 'LIMIT '.$limit.' ';
		}
		
		if (($rs = $this->con->select($strReq,$this->rs_blogcomment)) !== false) {
			$rs->setBlog($this);
			return $rs;
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function getComment
	
	Récupération d'un commentaire par son ID. Renvoie un recordset étendu.
	
	@param	integer	id			ID du commentaire
	@return	recordset
	*/
	function getComment($id)
	{
		$reqPlus = '';
		
		if ($this->pub_mode !== NULL) {
			$reqPlus .=
			'AND C.comment_pub = '.$this->pub_mode.' '.
			'AND P.post_pub = '.$this->pub_mode.' ';
		}
		
		if ($this->user_id != '') {
			$reqPlus .= 'AND P.user_id = \''.$this->con->escapeStr($this->user_id).'\' ';
		}
		
		$strReq = 'SELECT comment_id, comment_dt, comment_upddt, comment_auteur, '.
				'comment_email, comment_site, comment_content, comment_trackback, '.
				'comment_pub, comment_ip, P.post_titre, P.post_id, P.user_id,'.
				'DATE_FORMAT(comment_dt,\'%Y%m%d\') AS comment_date '.
				'FROM '.$this->t_comment.' C, '.$this->t_post.' P '.
				'WHERE C.comment_id = '.(integer) $id.' '.
				'AND C.post_id = P.post_id '.
				$reqPlus;
		
		if (($rs = $this->con->select($strReq,$this->rs_blogcomment)) !== false) {
			$rs->setBlog($this);
			return $rs;
		} else {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
	}
	
	/**
	@function addComment
	
	Création d'un commentaire. Renvoie vrai en cas de succès.
	
	@param	integer	post_id		ID du billet
	@param	string	auteur		Nom de l'auteur du commentaire
	@param	string	email		Email de l'auteur du commentaire
	@param	string	site			Site de l'auteur du commentaire
	@param	string	content		Contenu du commentaire
	@param	boolean	trackback		Le commentaire est un trackback (false)
	@param	integer	delta		Décalage horaire de l'auteur du commentaire (0)
	@param	boolean	pub			Commentaire publié (true)
	@return	boolean
	*/
	function addComment($post_id,$auteur,$email,$site,$content,
	$trackback=false,$delta=0,$pub=1)
	{
		$post_id = (integer) $post_id;
		$auteur = $this->secureString($auteur);
		$email = $this->secureString($email);
		$site = $this->secureString($site);
		
		$pub = (integer) (boolean) $pub;
		
		# Vérifications
		if (!trim($post_id)) {
			$this->setError(__('No entry ID'),1000);
		}
		
		if (!trim($auteur)) {
			$this->setError(__('Empty comment author'),1000);
		}
		
		if (!trim($content)) {
			$this->setError(__('Empty comment content'),1000);
		}
		
		if ($email != '' && !$this->isEmail($email)) {
			$this->setError(__('Invalid email address'),1000);
		}
		
		if ($this->error() !== false) {
			return false;
		}
		
		$site = preg_replace('|^http://|','',$site);
		
		# Insertion
		$insReq = 'INSERT INTO '.$this->t_comment.' '.
				'(post_id,comment_dt,comment_upddt,comment_auteur,comment_email,'.
				'comment_site,comment_content,comment_ip,comment_pub,'.
				'comment_trackback) VALUES '.
				'(\''.$this->con->escapeStr($post_id).'\', '.
				'ADDDATE(SYSDATE(),INTERVAL \''.$delta.'\' HOUR),SYSDATE(), '.
				'\''.$this->con->escapeStr($auteur).'\', '.
				'\''.$this->con->escapeStr($email).'\', '.
				'\''.$this->con->escapeStr($site).'\', '.
				'\''.$this->con->escapeStr($content).'\', '.
				'\''.$this->con->escapeStr(@$_SERVER['REMOTE_ADDR']).'\', '.
				(integer) $pub.','.
				(integer) $trackback.') ';
		
		if (!$this->con->execute($insReq)) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$this->triggerMassUpd();
			$this->triggerPostNbComment($post_id);
			return true;
		}
	}
	
	/**
	@function updComment
	
	Modification d'un commentaire. Renvoie vrai en cas de succès.
	
	@param	integer	id			ID du commentaire
	@param	string	auteur		Nom de l'auteur du commentaire
	@param	string	email		Email de l'auteur du commentaire
	@param	string	site			Site de l'auteur du commentaire
	@param	string	content		Contenu du commentaire
	@param	boolean	pub			Commentaire publié (true)
	@return	boolean
	*/
	function updComment($id,$auteur,$email,$site,$content,$pub)
	{
		$id = (integer) $id;
		$auteur = $this->secureString($auteur);
		$email = $this->secureString($email);
		$site = $this->secureString($site);
		$content = $content;
		$pub = (integer) $pub;
		
		# Vérifications usuelles
		if (!$auteur) {
			$this->setError(__('Empty comment author'),1000);
		}
		
		if (!$content) {
			$this->setError(__('Empty comment content'),1000);
		}
		
		if ($email != '' && !$this->isEmail($email)) {
			$this->setError(__('Invalid email address'),1000);
		}
		
		if ($this->error() !== false) {
			return false;
		}
		
		$strReq = 'SELECT post_id FROM '.$this->t_comment.' '.
				'WHERE comment_id = \''.$id.'\' ';
		
		$rs = $this->con->select($strReq);

		if ($rs == false) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
		
		if (!$rs->isEmpty())
		{
			$site = preg_replace('|^http://|','',$site);
			
			$updReq = 'UPDATE '.$this->t_comment.' SET '.
					'comment_auteur = \''.$this->con->escapeStr($auteur).'\', '.
					'comment_email = \''.$this->con->escapeStr($email).'\', '.
					'comment_site = \''.$this->con->escapeStr($site).'\', '.
					'comment_content = \''.$this->con->escapeStr($content).'\', '.
					'comment_pub = '.(integer) $pub.', '.
					'comment_upddt = SYSDATE() '.
					'WHERE comment_id = '.(integer) $id.' ';
			
			if (!$this->con->execute($updReq)) {
				$this->setError('MySQL : '.$this->con->error(),2000);
				return false;
			} else {
				$this->tiggerLog('comment',$id,'Update comment');
				$this->triggerMassUpd();
				$this->triggerPostNbComment($rs->f('post_id'));
				return true;
			}
		}
	}
	
	/**
	@function statusComment
	
	Inversion du status d'un commentaire. Renvoie vrai en cas de succès.
	
	@param	integer	id			ID du commentaire
	@return	boolean
	*/
	function statusComment($id)
	{
		$strReq = 'SELECT post_id FROM '.$this->t_comment.' '.
				'WHERE comment_id = '.(integer) $id.' ';
		
		$rs = $this->con->select($strReq);
		if ($rs == false) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
		
		if (!$rs->isEmpty())
		{
			$updReq = 'UPDATE '.$this->t_comment.' SET '.
					'comment_pub = 1-comment_pub, '.
					'comment_upddt = SYSDATE() '.
					'WHERE comment_id = '.(integer) $id.' ';
			
			if (!$this->con->execute($updReq)) {
				$this->setError('MySQL : '.$this->con->error(),2000);
				return false;
			} else {
				$this->tiggerLog('comment',$id,'Change status');
				$this->triggerMassUpd();
				$this->triggerPostNbComment($rs->f('post_id'));
				return true;
			}
		}
	}
	
	/**
	@function delComment
	
	Suppression d'un commentaire. Renvoie vrai en cas de succès.
	
	@param	integer	id			ID du commentaire
	@return	boolean
	*/
	function delComment($id)
	{
		$strReq = 'SELECT post_id FROM '.$this->t_comment.' '.
				'WHERE comment_id = '.(integer) $id.' ';
		
		$rs = $this->con->select($strReq);
		if ($rs == false) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
		
		if (!$rs->isEmpty())
		{
			$delReq = 'DELETE FROM '.$this->t_comment.' '.
					'WHERE comment_id = '.(integer) $id.' ';
			
			if (!$this->con->execute($delReq)) {
				$this->setError('MySQL : '.$this->con->error(),2000);
				return false;
			} else {
				$this->tiggerLog('comment',$id,'Delete comment');
				$this->triggerMassUpd();
				$this->triggerPostNbComment($rs->f('post_id'));
				return true;
			}
		}
	}
	
	/* ===================================================
	Trackback et ping
	=================================================== */
	/** @doc
	=== Méthodes de gestion des trackback et des pings === */
	
	/**
	@function postTbPingURL
	
	Effectue un ping sur un autre blog. Renvoie vrai en cas de succès.
	
	Si le contenu du ping n'est pas donné, les 255 premier caractères du
	billet ou du chapo seront utilisés à la place.
	
	@param	integer	post_id		ID du billet
	@param	string	url			URL à pinguer
	@param	string	blog_name		Nom du blog à envoyer
	@param	string	content		Contenu facultatif du ping ('')
	@return	boolean
	*/
	function postTbPingURL($post_id,$url,$blog_name,$content='')
	{
		# le billet existe ?
		$post = $this->getPostByID($post_id);
		
		if ($post == false || $post->isEmpty()) {
			$this->setError(__('Entry does not exists'),1000);
			return false;
		}
		
		# On a déjà fait un ping pour cette url et ce billet ?
		/*if ($this->postPingCheck($post_id,$url) === true) {
			$this->setError('URI déjà pinguée pour ce billet',1200);
			return false;
		}*/
		
		# On test si l'url est bien du http
		$URL = parse_url($url);
		if (empty($URL['scheme']) || $URL['scheme'] != 'http' || empty($URL['path'])) {
			$this->setError('URL invalide',1000);
			return false;
		}
		
		# Reconstruction de l'url
		$host = $URL['host'];
		$port = (!empty($URL['port'])) ? $URL['port'] : 80;
		$user = (!empty($URL['user'])) ? $URL['user'] : '';
		$pass = (!empty($URL['pass'])) ? $URL['pass'] : '';
				
		$link = $URL['path'];
		$link .= (!empty($URL['query'])) ? '?'.$URL['query'] : '';
		$link .= (!empty($URL['fragment'])) ? '#'.$URL['fragment'] : '';
		
		# Tentative de ping
		$http = new HttpClient($host,$port);
		$http->timeout = 10;
		$http->setUserAgent('DotClear HTTP Client - http://www.dotclear.net/');
		$http->useGzip(false);
		$http->setPersistReferers(false);
		
		if ($user != '' || $pass != '') {
			$http->setAuthorization($user,$pass);
		}
		
		# On vérifie si on a un encoding utf-8
		$do_utf8 = false;
		if ($this->encoding == 'UTF-8')
		{
			if ($http->post($link,array('__info' => 1)) === false) {
				$this->setError('HTTP : '.$http->getError(),3000);
				return false;
			}
			
			$tmp = $http->getContent();
			
			if (preg_match('/<encoding>(UTF-8|utf-8)<\/encoding>/msU',$tmp)) {
				$do_utf8 = true;
			}
		}
		
		if (trim($content) == '') {
			$content = $post->f('post_content');
		}
		$content = strip_tags($content);
		
		if ($do_utf8) {
			$params = array(
			'title' => $post->f('post_titre'),
			'excerpt' => util::cutString($content,255),
			'url' => util::getHost().$post->getPermURL(),
			'blog_name' => $blog_name,
			'utf8' => 1
			);
		} elseif ($this->encoding == 'UTF-8') {
			$params = array(
			'title' => utf8_decode($post->f('post_titre')),
			'excerpt' => util::cutString(utf8_decode($content),255),
			'url' => util::getHost().$post->getPermURL(),
			'blog_name' => utf8_decode($blog_name)
			);
		} else {
			$params = array(
			'title' => $post->f('post_titre'),
			'excerpt' => util::cutString($content,255),
			'url' => util::getHost().$post->getPermURL(),
			'blog_name' => $blog_name
			);
		}
		
		# On fait le ping
		if ($http->post($link,$params) === false) {
			$this->setError('HTTP : '.$http->getError(),3000);
			return false;
		}
		
		# Tout va bien on continue
		$res = $http->getContent();
		
		$pattern = '|<response>.*<error>(.*)</error>(.*)'.
				'(<message>(.*)</message>(.*))?'.
				'</response>|msU';
		
		if (!preg_match($pattern,$res,$matches))
		{
			$this->setError(__('Source is not a ping URL'),3000);
			return false;
		}
		
		# On continue, le match est OK
		$ping_error = $matches[1];
		$ping_msg = (!empty($matches[4])) ? $matches[4] : '';
		
		if ($ping_error != '0') {
			$this->setError(__('Trackback error').' : '.$ping_msg,3000);
			return false;
		} else {
			# Oui ! Le trackback est passé ! champagne :))
			# On va faire la notification
			$this->postPingNotify($post_id,$url);
			return true;
		}
	}
	
	/**
	@function postPingNotify
	
	Notification du trackback dans la table d'historique des pings. Renvoie
	vrai en cas de succès.
	
	@param	integer	post_id		ID du billet
	@param	string	url			URL du ping
	@return	boolean
	*/
	function postPingNotify($post_id,$url)
	{
		$insReq = 'INSERT INTO '.$this->t_ping.' '.
				'(post_id,ping_url,ping_dt) VALUES '.
				'('.(integer) $post_id.','.
				'\''.$this->con->escapeStr($url).'\','.
				'SYSDATE()) ';
		
		if ($this->con->execute($insReq) === false) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			return true;
		}
	}
	
	/**
	@function postPingCheck
	
	Vérification si ping pas déjà fait pour un post. Renvoie vrai si il y a
	déjà un ping dans la table.
	
	@param	integer	post_id		ID du billet
	@param	string	url			URL du ping
	@return	boolean
	*/
	function postPingCheck($post_id,$url)
	{
		$strReq = 'SELECT post_id '.
				'FROM '.$this->t_ping.' '.
				'WHERE post_id = '.(integer) $post_id.' '.
				'AND ping_url = \''.$this->con->escapeStr($url).'\' ';
		
		$rs = $this->con->select($strReq);
		if ($rs == false) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
		return !$rs->isEmpty();
	}
	
	/**
	@function postGetPings
	
	Sélection des ping réalisés pour un post donnée. Renvoie un recordset.
	
	@param	integer	post_id		ID du billet
	@return	recordset
	*/
	function postGetPings($post_id)
	{
		$strReq = 'SELECT post_id,ping_url,ping_dt '.
				'FROM '.$this->t_ping. ' '.
				'WHERE post_id = '.(integer) $post_id.' ';
		
		return $this->con->select($strReq);
	}
	
	/* ===================================================
	Outils MySQL
	=================================================== */
	/** @doc
	=== Méthodes relatives à la base de données === */
	
	/**
	@function optimize
	
	Optimise les tables de la base de données. Les tables concernées sont
	uniquement celles prises en charge par la classe. Renvoie vrai en cas de
	succès.
	
	@return	boolean
	*/
	function optimize()
	{
		$strReq = 'OPTIMIZE TABLE '.
				'`'.$this->t_post.'`, '.
				'`'.$this->t_user.'`, '.
				'`'.$this->t_categorie.'`, '.
				'`'.$this->t_comment.'`, '.
				'`'.$this->t_ping.'`,'.
				'`'.$this->t_log.'`,'.
				'`'.$this->t_link.'`';
		
		if ($this->con->execute($strReq) === false) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		} else {
			$this->triggerMassUpd();
			return true;
		}
	}
	
	/**
	@function countAll
	
	Recompte l'ensemble des commentaires et trackbacks du blog.
	*/
	function countAll()
	{
		$strReq = 'SELECT COUNT(comment_id), post_id '.
				'FROM '.$this->t_comment.' '.
				'WHERE comment_trackback <> 1 '.
				'AND comment_pub = 1 '.
				'GROUP BY post_id ';
		$rsC = $this->con->select($strReq);
		if ($rsC == false) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
		
		$strReq = 'SELECT COUNT(comment_id), post_id '.
				'FROM '.$this->t_comment.' '.
				'WHERE comment_trackback = 1 '.
				'AND comment_pub = 1 '.
				'GROUP BY post_id ';
		$rsT = $this->con->select($strReq);
		if ($rsT == false) {
			$this->setError('MySQL : '.$this->con->error(),2000);
			return false;
		}
		
		while(!$rsC->EOF())
		{
			$updReq = 'UPDATE '.$this->t_post.' '.
					'SET nb_comment='.$rsC->f(0).' '.
					'WHERE post_id='.$rsC->f(1).' ';
			
			if ($this->con->execute($updReq) === false) {
				$this->setError('MySQL : '.$this->con->error(),2000);
				return false;
			}
			$rsC->moveNext();
		}
		
		while(!$rsT->EOF())
		{
			$updReq = 'UPDATE '.$this->t_post.' '.
					'SET nb_trackback='.$rsT->f(0).' '.
					'WHERE post_id='.$rsT->f(1).' ';
			
			if ($this->con->execute($updReq) === false) {
				$this->setError('MySQL : '.$this->con->error(),2000);
				return false;
			}
			$rsT->moveNext();
		}
		$this->triggerMassUpd();
	}
	
	/* ===================================================
	Utilitaires
	=================================================== */
	/** @doc
	=== Méthodes utilitaires === */
	
	/**
	@function parseContent
	
	Cette méthode remplace les URL et les liens mailto par des liens HTML dans
	la chaîne $string et renvoie une chaîne transformée.
	
	@param	string	string		Chaine à parser
	@return	string
	*/
	function parseContent($string)
	{
		$string = preg_replace_callback('/(http|https|ftp):(\/\/){0,1}([^\"\s]*)/i',
				array('blog','parseUri'),$string);
		
		$string = preg_replace(
				'|([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)|mi',
				'<a href="mailto:$1">$1</a>',
				$string
				);
		
		return $string;
	}
	
	/**
	@function parseUri
	
	Cette fonction est utilisée par ''parseContent'' pour créer le lien HTML
	depuis une URL. L'intitulé est raccourci si l'URL dépasse 25 caractères.
	
	C'est une fonction de callback qui n'est d'aucune utilité sortie de son
	contexte.
	
	@param	array	matches		Tableau contenant l'URL
	@return	string
	*/
	function parseUri($matches)
	{
		$uri = $matches[1].':'.$matches[2].$matches[3];
		$t = parse_url($uri);
		
		$link = (strlen($matches[3]) > 25) ? substr($matches[3],0,25).'...' : $matches[3];
		
		if (!empty($t['scheme'])) {
			return '<a href="'.$uri.'" title="'.$uri.'" rel="nofollow">'.$link.'</a>';
			//return '[<a href="'.$uri.'" title="'.$uri.'">URL <em>'.$t['host'].'</em></a>]';
		} else {
			return $uri;
		}
	}
	
	/**
	@function secureString
	
	Renvoie une chaîne après en avoir supprimé les tags HTML et passé les
	caractères spéciaux en entités.
	
	@param	string	str			Chaîne à sécurisé
	@return	string
	*/
	function secureString($str)
	{
		$str = trim($str);
		$str = stripslashes($str);
		$str = strip_tags($str);
		$str = htmlspecialchars($str);
		return $str;
	}
	
	/**
	@function isEmail
	
	Teste si une chaîne est une adresse email valide.
	
	@param	string	str			Chaîne à tester
	@return	boolean
	*/
	function isEmail($str)
	{
		return preg_match('/^[a-zA-Z0-9_+-]+(\.[a-zA-Z0-9_+-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*$/',$str);
	}
	
	/**
	@function getPart
	
	Renvoie une partie de la chaîne $string en coupant à la longueur $l
	désirée. La chaîne est coupée aux espaces.
	
	@param	string	string		Chaîne à couper
	@param	integer	l			Longueur désirée
	@return	string
	*/
	function getPart($string,$l=40)
	{
		$res = '';
		$r = explode(' ',$string);
		for($i=0;$i<count($r);$i++)
		{
			if($i<$l) {
				$res .= $r[$i].' ';
			} else {
				break;
			}
		}
		return $res;
	}
	
	/**
	@function toXML
	
	Renvoie une chaîne propre à être passée dans un fichier XML (entités
	numériques, etc.). La paramètre $utf8 n'est plus d'aucune utilité.
	
	@param	string	string		Chaîne à transformer
	@param	boolean	utf8			Chaîne en UTF-8 (false)
	@return	string
	*/
	function toXML($string,$utf8=false)
	{
		return htmlspecialchars($this->removeEntities($string),ENT_NOQUOTES);
	}
	
	/**
	@function removeEntities
	
	Remplace les entités d'une chaîne par leurs équivalents normaux. Les
	caractères provenant du jeu de caractère incorect de Windows sont également
	convertis.
	
	Cette méthode utilise la propriété '''encoding''' de la classe et transforme
	les caractères en UTF-8 si le jeu de caractère est UTF-8.
	
	Cette méthode est utilisée par la méthode ''toXML''.
	
	@param	string	string		Chaîne à transformer
	@return	string
	*/
	function removeEntities($string)
	{
		# Tableau des codes de 130 à 140 et 145 à 156
		$tags = array('‚' => '&sbquo;','ƒ' => '&fnof;','„' => '&bdquo;',
		'…' => '&hellip;','†' => '&dagger;','‡' => '&Dagger;','ˆ' => '&circ;',
		'‰' => '&permil;','Š' => '&Scaron;','‹' => '&lsaquo;','Œ' => '&OElig;',
		'‘' => '&lsquo;','’' => '&rsquo;','“' => '&ldquo;','”' => '&rdquo;',
		'•' => '&bull;','–' => '&ndash;','—' => '&mdash;','˜' => '&tilde;',
		'™' => '&trade;','š' => '&scaron;','›' => '&rsaquo;','œ' => '&oelig;',
		'Ÿ' => '&Yuml;','€' => '&euro;');
		
		$vtags = array(
		'‚' => '&#8218;','ƒ' => '&#402;','„' => '&#8222;','…' => '&#8230;',
		'†' => '&#8224;','‡' => '&#8225;','ˆ' => '&#710;','‰' => '&#8240;',
		'Š' => '&#352;','‹' => '&#8249;','Œ' => '&#338;','‘' => '&#8216;',
		'’' => '&#8217;','“' => '&#8220;','”' => '&#8221;','•' => '&#8226;',
		'–' => '&#8211;','—' => '&#8212;','˜' => '&#732;','™' => '&#8482;',
		'š' => '&#353;','›' => '&#8250;','œ' => '&#339;','Ÿ' => '&#376;',
		'€' => '&#8364;');
		
		if ($this->encoding == 'UTF-8') {
			$tags = get_html_translation_table(HTML_ENTITIES);
			$tags = array_flip($tags);
			array_walk($tags,create_function('&$v','$v = utf8_encode($v);'));
			$tags = array_flip($tags);
			$string = $this->decodeUnicodeEntities($string) ;
		} else {
			$tags = array_merge($tags,get_html_translation_table(HTML_ENTITIES));
		}
		
		foreach($tags as $k => $v) {
			$ASCIItags[$k] = '&#'.ord($k).';';
		}
		
		$string = str_replace($tags,array_flip($tags),$string);
		$string = str_replace($ASCIItags,array_flip($ASCIItags),$string);
		$string = str_replace(array_values($vtags),array_keys($vtags),$string);
		
		return $string;
	}
	
	
	function decodeUnicodeEntities($str)
	{
		return preg_replace_callback('/&#(\\d+);/',array($this,'code2utf'),$str);
	}
	
	function code2utf($m)
	{
		if ($m[1] < 128) {
			return chr($m[1]);
		}
		if ($m[1] < 2048) {
			return chr(($m[1] >> 6) + 192).chr(($m[1] & 63) + 128);
		}
		if ($m[1] < 65536) {
			return chr(($m[1] >> 12) + 224).chr((($m[1] >> 6) & 63) + 128).
			chr(($m[1] & 63) + 128);
		}
		if ($m[1] < 2097152) {
			return chr(($m[1] >> 18) + 240).chr((($m[1] >> 12) & 63) + 28).
			chr((($m[1] >> 6) & 63) + 128).chr(($m[1] & 63) + 128);
		}
		return '';
	}
	
	/**
	@function str2url
	
	Transforme la chaîne $str en une chaîne propre à être un élément d'une URL.
	
	@param	string	str			Chaîne à transformer
	@return	string
	*/
	function str2url($str)
	{
		if ($this->encoding == 'UTF-8') {
			$str = $this->removeEntities(utf8_decode($str));
		} else {
			$str = $this->removeEntities($str);
		}
		
		$str = strtr($str,
		"ÀÁÂÃÄÅàáâãäåÇçÒÓÔÕÖØòóôõöøÈÉÊËèéêëÌÍÎÏìíîïÙÚÛÜùúûü¾İÿıÑñ",
		"AAAAAAaaaaaaCcOOOOOOooooooEEEEeeeeIIIIiiiiUUUUuuuuYYyyNn");
		
		$str = str_replace('Æ','AE',$str);
		$str = str_replace('æ','ae',$str);
		$str = str_replace('¼','OE',$str);
		$str = str_replace('½','oe',$str);
		
		$str = preg_replace('/[^a-z0-9_\s\'\:\/\[\]-]/','',strtolower($str));
		
		$str = preg_replace('/[\s\'\:\/\[\]-]+/',' ',trim($str));
	
		$res = str_replace(' ','-',$str);
		
		return $res;
	}
}

/**
@doc

=== Exemples d'utilisation ===

Ces exemples supposent qu'un objet $blog soit une instance de la classe.

==== Sélection des derniers billets ====

Dans cet exemple, nous sélectionnons les 10 derniers billets du blog dans la
catégorie dont l'ID est 1, puis nous en affichons le titre.

{{{
#!php
<?php
$rs = $blog->getLastNews(10,1);
while ($rs->fetch()) {
	echo '<p>'.$rs->f('post_titre').'</p>';
}
?>
}}}
*/
?>