<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2013 Tobias Kahl
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
 * @copyright  Tobias Kahl 2013
 * @author     Tobias Kahl <http://www.tobiaskahl.de>
 * @package    gde
 * @license    LGPL
 * @filesource
 */

/**
 * Table tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['gde'] = '{title_legend},name,headline,type;{document_legend},gde;{expert_legend:hide},guests,space';

$GLOBALS['TL_DCA']['tl_module']['fields']['gde'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['gde'],
    'inputType' => 'select',
    'eval' => array(
        'mandatory' => true,
        'includeBlankOption' => true,
        'chosen' => true
    ),
    'foreignKey' => 'tl_gde.title',
    'sql' => "int(10) unsigned NOT NULL default '0'"
);
?>