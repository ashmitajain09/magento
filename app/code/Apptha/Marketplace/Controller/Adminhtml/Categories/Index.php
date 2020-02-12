<?php
/**
 * Apptha
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Accenture.com license that is
 * available through the world-wide-web at this URL:
 * https://www.accenture.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Accenture
 * @package     Accenture_training
 * @copyright   Copyright (c) Accenture (https://www.accenture.com/)
 * @license     https://www.accenture.com/LICENSE.txt
 */

namespace Apptha\Marketplace\Controller\Adminhtml\Categories;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
//use Magento\Framework\App\Action\Action;
//use Accenture\Trainings\Helper\Data ;


/**
 * Class Index
 * @package Accenture\training\Controller\Adminhtml\customer
 */
class Index extends Action
{
   

    /**
     * execute the action
     *
     * @return \Magento\Backend\Model\View\Result\Page|Page
     */

    //protected $allTainingsFactory;
	
	protected $resultPageFactory;

		//protected $helperData;

	
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
		//\Accenture\Trainings\Model\AlltrainingsFactory $allTrainingsFactory,
		//\Accenture\Trainings\Helper\Data $helperData
	) {
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
		//$this->allTrainingsFactory = $allTrainingsFactory;
		//$this->helperData = $helperData;
	}

	// public function execute()
	// {

		// $resultPage = $this->resultPageFactory->create();
		
		// return $resultPage;

		
		// /*$trainings = $this->allTrainingsFactory->create();
		// $trainingsCollection = $trainings >getCollection();
		
		// echo '<pre>';print_r($trainingsCollection->getData());*/
		
		// //$resultPage = $this->resultPageFactory->create();
		// //return $resultPage
	// }
	
	
	public function execute() {
        if ($this->getRequest ()->getQuery ( 'ajax' )) {
            $this->_forward ( 'grid' );
            return;
        }
        
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create ();
        $resultPage->setActiveMenu ( 'Apptha_Marketplace::main_menu' );
        $resultPage->getConfig ()->getTitle ()->prepend ( __ ( 'Manage Categories' ) );
        return $resultPage;
    }

}
