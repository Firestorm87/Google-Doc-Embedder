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
 * Table tl_gde
 */
$GLOBALS['TL_DCA']['tl_gde'] = array
    (
    // Config
    'config' => array
        (
        'dataContainer' => 'Table',
        'enableVersioning' => true,
        'sql' => array
            (
            'keys' => array
                (
                'id' => 'primary'
            )
        )
    ),
    // List
    'list' => array
        (
        'sorting' => array
            (
            'mode' => 1,
            'fields' => array('title ASC'),
            'flag' => 1,
            'panelLayout' => 'filter;search,limit'
        ),
        'label' => array
            (
            'fields' => array('file'),
            'format' => '%s',
			'label_callback'   => array('tl_gde', 'getFilePath')
        ),
        'global_operations' => array
            (
            'all' => array
                (
                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array
            (
            'edit' => array
                (
                'label' => &$GLOBALS['TL_LANG']['tl_gde']['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif'
            ),
            'copy' => array
                (
                'label' => &$GLOBALS['TL_LANG']['tl_gde']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif'
            ),
            'delete' => array
                (
                'label' => &$GLOBALS['TL_LANG']['tl_gde']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'toggle' => array
                (
                'label' => &$GLOBALS['TL_LANG']['tl_gde']['toggle'],
                'icon' => 'visible.gif',
                'attributes' => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
                'button_callback' => array('tl_gde', 'toggleIcon')
            ),
            'show' => array
                (
                'label' => &$GLOBALS['TL_LANG']['tl_gde']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            )
        )
    ),
    // Palettes
    'palettes' => array
        (
        'default' => '{title_legend},title,description;{document_legend},file,width,height;{behaviour_legend:hide},showDownloadLink,published,start,stop'
    ),
    // Fields
    'fields' => array
        (
        'id' => array(
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array(
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'title' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_gde']['title'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'long'),
            'sql' => "varchar(255) NOT NULL default ''"
        ),
        'description' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_gde']['description'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'textarea',
            'eval' => array('rte' => 'tinyMCE', 'tl_class' => 'clr'),
            'sql' => "text NULL"
        ),
        'file' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_gde']['file'],
            'inputType' => 'fileTree',
			'eval' => array('fieldType' => 'radio', 'extensions' => 'JPEG,PNG,GIF,TIFF,BMP,WebM,MPEG4,3GPP,MOV,AVI,MPEGPS,WMV,FLV,TXT,CSS,HTML,PHP,C,CPP,H,HPP,JS,DOC,DOCX,XLS,XLSX,PPT,PPTX,PDF,PAGES,AI,PSD,TIFF,DXF,SVG,EPS,PS,TTF,XPS,ZIP,RAR', 'filesOnly' => true, 'files' => true, 'mandatory' => true, 'tl_class' => 'clr'),
            'sql' => "binary(16) NULL"
        ),
        'width' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_gde']['width'],
            'inputType' => 'text',
            'exclude' => true,
            'eval' => array('mandatory' => false, 'mandatory' => true, 'tl_class' => 'w50'),
            'sql' => "varchar(10) NOT NULL default '100%'"
        ),
        'height' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_gde']['height'],
            'inputType' => 'text',
            'exclude' => true,
            'eval' => array('mandatory' => false, 'mandatory' => true, 'tl_class' => 'w50'),
            'sql' => "varchar(10) NOT NULL default '700px'"
        ),
        'showDownloadLink' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_gde']['showDownloadLink'],
            'exclude' => true,
            'filter' => true,
            'flag' => 1,
            'inputType' => 'checkbox',
            'eval' => array('doNotCopy' => true),
            'sql' => "char(1) NOT NULL default ''"
        ),
        'published' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_gde']['published'],
            'exclude' => true,
            'filter' => true,
            'flag' => 1,
            'inputType' => 'checkbox',
            'eval' => array('doNotCopy' => true),
            'sql' => "char(1) NOT NULL default ''"
        ),
        'start' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_gde']['start'],
            'exclude' => true,
            'inputType' => 'text',
            'eval' => array('rgxp' => 'datim', 'datepicker' => true, 'tl_class' => 'w50 wizard'),
            'sql' => "varchar(10) NOT NULL default ''"
        ),
        'stop' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_gde']['stop'],
            'exclude' => true,
            'inputType' => 'text',
            'eval' => array('rgxp' => 'datim', 'datepicker' => true, 'tl_class' => 'w50 wizard'),
            'sql' => "varchar(10) NOT NULL default ''"
        )
    )
);

/**
 * Class tl_gde
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Tobias Kahl 2013
 * @author     Tobias Kahl <http://www.tobiaskahl.de>
 * @package    Controller
 */
class tl_gde extends Backend {

    /**
     * Import the back end user object
     */
    public function __construct() {
        parent::__construct();
        $this->import('BackendUser', 'User');
    }

    /**
     * Compile Document for the backend view
     * @param array
     * @return string
     */
    public function compileDocument($arrRow) {
        $objDocument = new gde((int) $arrRow['id']);
        return '
		<div class="cte_type"><strong>' . $arrRow['title'] . '</strong></div>
		<div class="limit_height' . (!$GLOBALS['TL_CONFIG']['doNotCollapse'] ? ' h64' : '') . ' block">
		' . $objDocument->generate() . '
		</div>' . "\n";
    }
	
	/**
	 * List records
	 * @param array
	 * @return string
	 */
	public function getFilePath($arrRow)
	{
		return FilesModel::findByUuid($arrRow['file'])->name;
	}


    /**
     * Return the "toggle visibility" button
     * @param array
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @return string
     */
    public function toggleIcon($row, $href, $label, $title, $icon, $attributes) {
        if (strlen($this->Input->get('tid'))) {
            $this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 1));
            $this->redirect($this->getReferer());
        }

        // Check permissions AFTER checking the tid, so hacking attempts are logged
        if (!$this->User->isAdmin && !$this->User->hasAccess('tl_gde::published', 'alexf')) {
            return '';
        }

        $href .= '&amp;tid=' . $row['id'] . '&amp;state=' . ($row['published'] ? '' : 1);

        if (!$row['published']) {
            $icon = 'invisible.gif';
        }

        return '<a href="' . $this->addToUrl($href) . '" title="' . specialchars($title) . '"' . $attributes . '>' . $this->generateImage($icon, $label) . '</a> ';
    }

    /**
     * Disable/enable a user group
     * @param integer
     * @param boolean
     */
    public function toggleVisibility($intId, $blnVisible) {
        // Check permissions to publish
        if (!$this->User->isAdmin && !$this->User->hasAccess('tl_gde::published', 'alexf')) {
            $this->log('Not enough permissions to publish/unpublish FAQ ID "' . $intId . '"', 'tl_gde toggleVisibility', TL_ERROR);
            $this->redirect('contao/main.php?act=error');
        }

        $this->createInitialVersion('tl_gde', $intId);

        // Trigger the save_callback
        if (is_array($GLOBALS['TL_DCA']['tl_gde']['fields']['published']['save_callback'])) {
            foreach ($GLOBALS['TL_DCA']['tl_gde']['fields']['published']['save_callback'] as $callback) {
                $this->import($callback[0]);
                $blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
            }
        }

        // Update the database
        $this->Database->prepare("UPDATE tl_gde SET tstamp=" . time() . ", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
                ->execute($intId);

        $this->createNewVersion('tl_gde', $intId);
    }

}

?>