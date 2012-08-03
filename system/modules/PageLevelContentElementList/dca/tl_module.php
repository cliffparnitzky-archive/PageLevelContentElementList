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
 
// Define special callback to translate content elements from dma_elementgenerator in the type drop down
if (in_array('dma_elementgenerator', $this->Config->getActiveModules()))
{
	$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('DMAElementGeneratorCallbacks', 'content_onload'); 
} 

/**
 * Load tl_page labels
 */
$this->loadLanguageFile('tl_page');
$this->loadLanguageFile('tl_article');

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'pl_ce_list_level';
$GLOBALS['TL_DCA']['tl_module']['palettes']['ModulePageLevelContentElementList'] = '{title_legend},name,headline,type;{config_legend},pl_ce_list_level,pl_ce_list_type,pl_ce_list_only_first_article,pl_ce_list_only_first_ce_element,pl_ce_list_numberOfItems,pl_ce_list_perPage;{additional_fields_legend},pl_ce_list_page_fields,pl_ce_list_article_fields;{template_legend:hide},pl_ce_list_random_output,pl_ce_list_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['pl_ce_list_level_select'] = 'pl_ce_list_level_selection';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['pl_ce_list_level'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level'],
	'default'                 => 'own', 
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('own', 'upper', 'sub', 'select'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level_type'],
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50', 'submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['pl_ce_list_level_selection'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level_selection'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'clr', 'fieldType'=>'radio')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['pl_ce_list_type'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_type'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_ModulePageLevelContentElementList', 'getContentElements'),
	'reference'               => &$GLOBALS['TL_LANG']['CTE'],
	'eval'                    => array('helpwizard'=>true, 'tl_class'=>'clr w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['pl_ce_list_only_first_article'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_only_first_article'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 clr')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['pl_ce_list_only_first_ce_element'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_only_first_ce_element'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['pl_ce_list_numberOfItems'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_numberOfItems'],
	'default'                 => 10,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50 clr')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['pl_ce_list_perPage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_perPage'],
	'default'                 => 0,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['pl_ce_list_page_fields'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_page_fields'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options_callback'        => array('tl_module_ModulePageLevelContentElementList', 'getPageFields'),
	'reference'               => $GLOBALS['TL_LANG']['tl_page'],
	'eval'                    => array('multiple'=>true, 'tl_class'=>'w50 clr')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['pl_ce_list_article_fields'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_article_fields'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options_callback'        => array('tl_module_ModulePageLevelContentElementList', 'getArticleFields'),
	'reference'               => $GLOBALS['TL_LANG']['tl_article'],
	'eval'                    => array('multiple'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['pl_ce_list_random_output'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_random_output'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 clr')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['pl_ce_list_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_template'],
	'default'                 => 'pl_ce_list_default',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_ModulePageLevelContentElementList', 'getListTemplates'),
	'eval'                    => array('tl_class'=>'clr')
);

/**
 * Class tl_module_ModulePageLevelContentElementList
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Cliff Parnitzky 2011
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class tl_module_ModulePageLevelContentElementList extends Backend
{
	/**
	 * Return all content elements as array
	 * @return array
	 */
	public function getContentElements()
	{
		$groups = array();
		
		$groups[''] = $GLOBALS['TL_LANG']['tl_module']['pl_ce_list_type']['all'];

		foreach ($GLOBALS['TL_CTE'] as $k=>$v)
		{
			foreach (array_keys($v) as $kk)
			{
				$groups[$k][] = $kk;
			}
		}
		return $groups;
	}
	
	/**
	 * Return all page fields as array
	 * @return array
	 */
	public function getPageFields()
	{
		$fields = array();
		
		$dbFields = $this->Database->getFieldNames('tl_page');
		
		foreach ($dbFields as $dbField)
		{
			$fields[$dbField] = $dbField;
		}

		return $fields;
	}
	
	/**
	 * Return all article fields as array
	 * @return array
	 */
	public function getArticleFields()
	{
		$fields = array();
		
		$dbFields = $this->Database->getFieldNames('tl_article');
		
		foreach ($dbFields as $dbField)
		{
			$fields[$dbField] = $dbField;
		}

		return $fields;
	}
	
	/**
	 * Return all templates as array
	 * @param object
	 * @return array
	 */
	public function getListTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('pl_ce_list_', $intPid);
	} 
}

?>