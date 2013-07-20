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
 * Class ContentGde
 *
 * Front end content element "gde".
 * @copyright  Tobias Kahl 2013
 * @author     Tobias Kahl <http://www.tobiaskahl.de>
 * @package    Controller
 */
class ContentGde extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_gde';

	/**
	 * Dokument object
	 * @var Database_Result
	 */
	protected $objDocument;


	/**
	 * Get all Documents from Database
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');		
			$objDocument = Database::getInstance()
						->prepare('
							SELECT * FROM tl_gde WHERE id = ?
						')
						->execute($this->gde);
			$arrDocument = $objDocument->fetchAssoc();
			$objTemplate->wildcard = '### DOCUMENTS ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->gde;
			$objTemplate->link = $arrDocument['title'];
			$objTemplate->href = 'contao/main.php?do=gde&amp;act=edit&amp;id=' . $this->gde;
			return $objTemplate->parse();
		}
		return parent::generate();
	}

	/**
	 * Generate the content element
	 */
	protected function compile()
	{
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
		$objFile = new \File(FilesModel::findByPk($arrDocument['file'])->path, true);
		$this->Template->description = $arrDocument['description'];
		$this->Template->width = $arrDocument['width'];
		$this->Template->height = $arrDocument['height'];
		$this->Template->showDownloadLink = $arrDocument['showDownloadLink'];
		$this->Template->title = $arrDocument['title'];
		$this->Template->filepath = $objFile->path;
		$this->Template->filesize = $objFile->getReadableSize($objFile->filesize, 1);
	}
}
?>