<?php
namespace FluidTYPO3\FluidcontentCore\Controller;
/*****************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Claus Due <claus@namelesscoder.net>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 *****************************************************************/

use FluidTYPO3\Flux\Controller\AbstractFluxController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class CoreContentController extends AbstractFluxController {

	/**
	 * @var string
	 */
	protected $fluxRecordField = 'content_options';

	/**
	 * @var string
	 */
	protected $fluxTableName = 'tt_content';

	/**
	 * Filled with an integer-or-string -> Fluid section name
	 * map which maps machine names of menu types to human
	 * readable values that are sensible as Fluid section names.
	 * When type is selected in menu element, corresponding
	 * section gets rendered.
	 *
	 * @var array
	 */
	protected $menuTypeToSectionNameMap = array(
		'0' => 'SelectedPages',
		'1' => 'SubPagesOfSelectedPages',
		'4' => 'SubPagesOfSelectedPagesWithAbstract',
		'7' => 'SubPagesOfSelectedPagesWithSections',
		'2' => 'SiteMap',
		'8' => 'SiteMapsOfSelectedPages',
		'3' => 'SectionIndex',
		'5' => 'RecentlyUpdated',
		'6' => 'RelatedPages',
		'categorized_pages' => 'CategorizedPages',
		'categorized_content' => 'CategorizedContent'
	);

	/**
	 * @return void
	 */
	protected function initializeProvider() {
		$this->provider = $this->objectManager->get('FluidTYPO3\FluidcontentCore\Provider\ContentProvider');
	}

	/**
	 * @return void
	 */
	protected function initializeViewVariables() {
		$row = $this->getRecord();
		$flexFormData = $this->configurationService->convertFlexFormContentToArray($row['pi_flexform']);
		$this->settings = GeneralUtility::array_merge_recursive_overrule($this->settings, $flexFormData, FALSE, FALSE);
		parent::initializeViewVariables();
	}

	/**
	 * @return void
	 */
	public function defaultAction() {

	}

	/**
	 * @return void
	 */
	public function headerAction() {

	}

	/**
	 * @return void
	 */
	public function textAction() {

	}

	/**
	 * @return void
	 */
	public function imageAction() {

	}

	/**
	 * @return void
	 */
	public function bulletsAction() {

	}

	/**
	 * @return void
	 */
	public function uploadsAction() {

	}

	/**
	 * @return void
	 */
	public function tableAction() {

	}

	/**
	 * @return void
	 */
	public function mediaAction() {

	}

	/**
	 * @return void
	 */
	public function menuAction() {
		$record = $this->getRecord();
		$menuType = $record['menu_type'];
		$partialTemplateName = $this->menuTypeToSectionNameMap[$menuType];
		$this->view->assign('menuPartialTemplateName', $partialTemplateName);
	}

	/**
	 * @return void
	 */
	public function shortcutAction() {

	}

	/**
	 * @return void
	 */
	public function divAction() {

	}

	/**
	 * @return void
	 */
	public function htmlAction() {

	}

}
