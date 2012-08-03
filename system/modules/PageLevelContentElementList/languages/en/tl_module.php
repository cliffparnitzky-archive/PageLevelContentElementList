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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level']                 = array('Pagelevel', 'Please select of which page leve the content elements should be displayed.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level_selection']       = array('Select pagelevel', 'Please select a page of which level the content elements should be displayed.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_type']                  = array('Content element type', 'Please select if only a certain content element type should be listed.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_numberOfItems']         = array('Maximum number of content elements ', 'Please select the maximum number of content elements to be displayed. Set to 0 to show all.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_perPage']               = array('Content elements per page', 'Please select the number of content elements per page. Set to 0 to disable pagination.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_only_first_article']    = array('Show only first article', 'Please select if only the first article of a page should be shown.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_only_first_ce_element'] = array('Show only first content element', 'Please select if only the first content element of an article should be shown.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_page_fields']           = array('Page fields', 'Please select which fields of the page should also be displayed in the frontend. This fields will be accessible via <i>"page_&lt;DB_FIELD_NAME&gt;"</i>.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_article_fields']        = array('Article fields', 'Please select which fields of the article should also be displayed in the frontend. This fields will be accessible via <i>"article_&lt;DB_FIELD_NAME&gt;"</i>.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_random_output']         = array('Random output', 'Please select if the content elements should be displayed in random order.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_template']              = array('Listtemplate', 'Please select the template for the list.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_module']['additional_fields_legend'] = 'Additional fields';

/**
 * Additional Labels.
 */
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_type']['all']          = 'All content element types';
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level_type']['own']    = 'Own level';
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level_type']['upper']  = 'Upper level';
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level_type']['sub']    = 'Sublevel';
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level_type']['select'] = 'Select level';


?>