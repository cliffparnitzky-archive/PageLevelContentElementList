-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************

--
-- Table `tl_module`
--

CREATE TABLE `tl_module` (
	`pl_ce_list_level` varchar(10) NOT NULL default '',
	`pl_ce_list_level_selection` int(10) unsigned NOT NULL default '0',
	`pl_ce_list_type` varchar(32) NOT NULL default '',
	`pl_ce_list_numberOfItems` smallint(5) unsigned NOT NULL default '0',
	`pl_ce_list_perPage` smallint(5) unsigned NOT NULL default '0',
	`pl_ce_list_only_first_article` char(1) NOT NULL default '',
	`pl_ce_list_only_first_ce_element` char(1) NOT NULL default '',
	`pl_ce_list_page_fields` blob NULL,
	`pl_ce_list_article_fields` blob NULL,
	`pl_ce_list_random_output` char(1) NOT NULL default '',
	`pl_ce_list_template` varchar(32) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;