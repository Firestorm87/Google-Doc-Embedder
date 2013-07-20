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
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_gde'  => 'system/modules/gde/templates',
));
