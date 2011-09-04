<?php
define ("_JOOMFISH_ADMIN_POLLNAME_ALL","All polls");
define ("_JOOMFISH_ADMIN_POLLNAME", "Which Poll");

class translationPollnameFilter extends translationFilter
{
	function translationPollnameFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="pollname";
		$this->filterField = $contentElement->getFilter("pollname");
		parent::translationFilter($contentElement);
	}
	
	/**
 * Creates vm_pollname filter 
 *
 * @param unknown_type $filtertype
 * @param unknown_type $contentElement
 * @return unknown
 */
	function _createfilterHTML(){
		global $database;

		if (!$this->filterField) return "";
		$pollnameOptions=array();
		$pollnameOptions[] = mosHTML::makeOption( '-1',_JOOMFISH_ADMIN_POLLNAME_ALL );

		//	$sql = "SELECT c.id, c.title FROM #__categories as c ORDER BY c.title";
		$sql = "SELECT DISTINCT p.id, p.title FROM #__polls as p, #__".$this->tableName." as c
			WHERE c.".$this->filterField."=p.id ORDER BY p.title";
		$database->setQuery($sql);
		$cats = $database->loadObjectList();
		$catcount=0;
		foreach($cats as $cat){
			$pollnameOptions[] = mosHTML::makeOption( $cat->id,$cat->title);
			$catcount++;
		}
		$pollnameList=array();
		$pollnameList["title"]=_JOOMFISH_ADMIN_POLLNAME;
		$pollnameList["html"] = mosHTML::selectList( $pollnameOptions, 'pollname_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

		return $pollnameList;
	}

}

?>