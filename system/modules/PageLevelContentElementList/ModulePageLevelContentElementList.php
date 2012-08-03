<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2011-2012 
 * @author     Cliff Parnitzky
 * @package    PageLevelContentElementList
 * @license    LGPL
 * @filesource
 */

/**
 * Class ModulePageLevelContentElementList
 *
 * Front end module.
 * @copyright  Cliff Parnitzky 2011-2012 
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class ModulePageLevelContentElementList extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'pl_ce_list_type_default';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### PAGE LEVEL CONTENT ELEMENT LIST ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}
		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
		global $objPage;
		
		if ($this->pl_ce_list_template != 'pl_ce_list_type_default')
		{
			$this->strTemplate = $this->pl_ce_list_template;

			$this->Template = new FrontendTemplate($this->strTemplate);
			$this->Template->setData($this->arrData);
		}
		
		$queryPageFields = "";
		$pageFields = deserialize($this->pl_ce_list_page_fields);
		if (is_array($pageFields))
		{
			foreach ($pageFields as $field)
			{
				$queryPageFields .= "page." . $field . " AS page_" . $field . ", ";
			}
		}
		
		$queryArticleFields = "";
		$articleFields = deserialize($this->pl_ce_list_article_fields);
		if (is_array($articleFields))
		{
			foreach ($articleFields as $field)
			{
				$queryArticleFields .= "article." . $field . " AS article_" . $field . ", ";
			}
		}

		$queryType = "";
		$queryOnlyFirstArticle = "";
		$queryOnlyFirstCeElement = "";
		
		if (strlen($this->pl_ce_list_type) > 0)
		{
			$queryType = "AND content.type = '" . $this->pl_ce_list_type . "' ";
		}
		if ($this->pl_ce_list_only_first_article)
		{
			$queryOnlyFirstArticle = "AND article.sorting = (SELECT min(subarticle.sorting) FROM tl_article AS subarticle WHERE subarticle.published = '1' AND subarticle.pid = article.pid) ";
		}
		if ($this->pl_ce_list_only_first_ce_element)
		{
			$queryOnlyFirstCeElement = "AND content.sorting = (SELECT min(subcontent.sorting) FROM tl_content AS subcontent WHERE subcontent.invisible = '' AND subcontent.pid = content.pid";
			
			if (strlen($this->pl_ce_list_type) > 0)
			{
				$queryOnlyFirstCeElement .= " AND subcontent.type = '" . $this->pl_ce_list_type . "' ";
			}

			$queryOnlyFirstCeElement .= ") ";
		}
		
		$pageLevelId = $objPage->pid; // the id of the parent page ... all pages with this pid are on the same level
		switch ($this->pl_ce_list_level)
		{
			case 'upper' : $pageLevelId = $this->getParentPageId($objPage->pid); break;
			case 'sub' : $pageLevelId = $objPage->id; break;
			case 'select' : $pageLevelId = $this->getParentPageId($this->pl_ce_list_level_selection); break;
		}
		
		// Get items
		$objElements = $this->Database->prepare("SELECT " . $queryPageFields . " " . $queryArticleFields . "content.* "
																					. "FROM tl_page AS page "
																					. "JOIN tl_article AS article ON page.id = article.pid "
																					. "JOIN tl_content AS content ON article.id = content.pid "
																					. "WHERE page.pid = ? "
																					. "AND page.published = '1' "
																					. "AND article.published = '1' "
																					. "AND content.invisible = '' "
																					. $queryType
																					. $queryOnlyFirstArticle
																					. $queryOnlyFirstCeElement
																					. "ORDER BY page.sorting, article.sorting, content.sorting")
									->limit($this->pl_ce_list_numberOfItems)
									->execute($pageLevelId);
		
		if ($objElements->numRows)
		{
			while ($arrElement = $objElements->fetchAssoc())
			{
				$arrItems[] = $arrElement;
			}
		}
		
		if (count($arrItems) > 1 && $this->pl_ce_list_random_output)
		{
			shuffle($arrItems);
		}

		$limit = count($arrItems);
		$offset = 0;

		// Split pages
		if ($this->pl_ce_list_perPage > 0)
		{
			$page = $this->Input->get('page') ? $this->Input->get('page') : 1;
			$offset = (($page - 1) * $this->pl_ce_list_perPage);
			$limit = $this->pl_ce_list_perPage + $offset;

			$objPagination = new Pagination(count($arrItems), $this->pl_ce_list_perPage);
			$this->Template->pagination = $objPagination->generate("\n  ");
		}

		$items = array();
		$last = min($limit, count($arrItems)) - 1;

		for ($i=$offset; $i<$limit && $i<count($arrItems); $i++)
		{
			$items[$i] = $arrItems[$i];
		}

		$this->Template->elements = array_values($items);
	}
	
	/**
	 * Returns the pid of the page with given id.
	 *
	 * Returns "-1" if no parent page was found.
	 */
	private function getParentPageId($pageId)
	{
		$parentId = $this->Database->prepare("SELECT DISTINCT pid FROM tl_page WHERE id = ?")
									->execute($pageId);
									
		if ($parentId->numRows)
		{
			return $parentId->pid;
		}
		
		return -1;
	}
}

?>