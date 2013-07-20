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
 * @package    Frontend
 * @license    LGPL
 * @filesource
 */

/**
 * Class ModuleGde
 *
 * Front end module "gde".
 * @copyright  Tobias Kahl 2013
 * @author     Tobias Kahl <http://www.tobiaskahl.de>
 * @package    Controller
 */
class ModuleGde extends Module {

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_gde';

    /**
     * generate the module
     * @return string
     */
    public function generate() {
        return parent::generate();
    }

    /**
     * Generate the module
     */
    protected function compile() {
        $time = time();
        $objDocument = Database::getInstance()
                ->prepare(
                        'SELECT *
						FROM tl_gde 
						WHERE id = ?
							AND published = ?
							AND (start = ? OR start < ?)
							AND (stop = ? OR stop > ?)'
                )
                ->execute($this->gde, 1, '', $time, '', $time);
        $arrDocument = $objDocument->fetchAssoc();
        $this->Template->gde_data = $arrDocument;
    }
}
?>