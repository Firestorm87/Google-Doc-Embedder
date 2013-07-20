<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2013 Tobias Kahl
 * 
 * @package gde
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'ContentGde' => 'system/modules/gde/modules/ContentGde.php',
	'ModuleGde'  => 'system/modules/gde/modules/ModuleGde.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_gde'  => 'system/modules/gde/templates',
	'mod_gde' => 'system/modules/gde/templates',
));
