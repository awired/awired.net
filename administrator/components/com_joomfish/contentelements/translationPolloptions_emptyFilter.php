<?php


class translationPolloptions_emptyFilter extends translationFilter
{
	function translationPolloptions_emptyFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="polloptions_empty";
		$this->filterField = $contentElement->getFilter("polloptions_empty");
		parent::translationFilter($contentElement);
	}
	
	function _createFilter(){
		global $database;
		if (!$this->filterField ) return "";
		// always hide empty poll options
		$filter = 'c.'.$this->filterField.' !=""';
		return $filter;
	}
	

	/**
 * Creates vm_category filter 
 *
 * @param unknown_type $filtertype
 * @param unknown_type $contentElement
 * @return unknown
 */
	function _createfilterHTML(){
		return "";
	}

}

?>