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
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level']                 = array('Seitenebene', 'Bitte wählen Sie aus, von welcher Seitenebene die Inhaltselemente angezeigt werden sollen.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level_selection']       = array('Seitenebene auswählen', 'Bitte wählen Sie eine Seite von welcher Ebene die Inhaltselemente angezeigt werden sollen.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_type']                  = array('Inhaltselementtyp', 'Bitte wählen Sie aus, ob nur eine bestimmter Inhaltselementtyp aufgelistet werden soll.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_numberOfItems']         = array('Gesamtzahl der Inhaltselemente', 'Bitte wählen Sie die maximale Gesamtzahl der Inhaltselemente, die angezeigt werden sollen. Geben Sie 0 ein, um alle anzuzeigen.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_perPage']               = array('Inhaltselements pro Seite', 'Bitte geben Sie die Anzahl von Inhaltselementen pro Seite an. Geben Sie 0 ein, um den automatischen Seitenumbruch zu deaktivieren.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_only_first_article']    = array('Nur ersten Artikel anzeigen', 'Bitte wählen Sie, ob nur der erste Artikel einer Seite angezeigt werden soll.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_only_first_ce_element'] = array('Nur erstes Inhaltselement anzeigen', 'Bitte wählen Sie, ob nur das erste Inhaltselement eines Artikels angezeigt werden soll.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_page_fields']           = array('Seitenfelder', 'Bitte wählen Sie welche Felder der Seite auch im Frontend angezeigt werden sollen. Diese Felder sind erreichbar über <i>"page_&lt;DB_FELD_NAME&gt;"</i>.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_article_fields']        = array('Artikelfelder', 'Bitte wählen Sie welche Felder des Artikels auch im Frontend angezeigt werden sollen. Diese Felder sind erreichbar über <i>"article_&lt;DB_FELD_NAME&gt;"</i>.');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_random_output']         = array('Zufällige Ausgabe', 'Bitte wählen Sie ob die Inhaltselemente in zufälliger Reihenfolge ausgegeben werden sollen. ');
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_template']              = array('Listentemplate', 'Bitte wählen Sie das Template für die Liste aus.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_module']['additional_fields_legend'] = 'Zusätzliche Felder';

/**
 * Additional Labels.
 */
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_type']['all']          = 'Alle Inhaltselementtypen';
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level_type']['own']    = 'Eigene Ebene';
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level_type']['upper']  = 'Oberebene';
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level_type']['sub']    = 'Unterebene';
$GLOBALS['TL_LANG']['tl_module']['pl_ce_list_level_type']['select'] = 'Ebene auswählen';


?>