<?php

/**
 * Apptha
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.apptha.com/LICENSE.txt
 *
 * ==============================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * ==============================================================
 * This package designed for Magento COMMUNITY edition
 * Apptha does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * Apptha does not provide extension support in case of
 * incorrect edition usage.
 * ==============================================================
 *
 * @category    Apptha
 * @package     Apptha_Marketplace
 * @version     1.2
 * @author      Apptha Team <developers@contus.in>
 * @copyright   Copyright (c) 2017 Apptha. (http://www.apptha.com)
 * @license     http://www.apptha.com/LICENSE.txt
 *
 */
namespace Apptha\Marketplace\Controller\Adminhtml\Categories;

use Apptha\Marketplace\Controller\Adminhtml\Categories;

class Massapprove extends Categories {
    /**
     *
     * @return void
     */
    public function execute() {
        $approvalIds = $this->getRequest ()->getParam ( 'approve' );
        foreach ( $approvalIds as $approvalId ) {
            try {
                $category = $this->_objectManager->get ( '\Apptha\Marketplace\Model\Category' );
                $category->load ( $approvalId )->setStatus ( 1 )->setCategoryStatus ( 1 )->save ();
                $categoryDetails = $category->load ( $approvalId );
                $catId = $categoryDetails->getId ();
				$catName = $categoryDetails->getCategoryName ();
				if($catName!="") {
					$cateId = $this->save_category($catName);
					$category->load ( $approvalId )->setMageCategoryId( $cateId  )->save ();
				}
            } catch ( \Exception $e ) {
                $this->messageManager->addError ( $e->getMessage () );
            }
        }
        if (count ( $approvalIds )) {
            $this->messageManager->addSuccess ( __ ( 'A total of %1 record(s) were approved.', count ( $approvalIds ) ) );
        }
        $this->_redirect ( '*/*/index' );
    }
	
	public function save_category($CategoryName=NULL) {
		if($CategoryName!=NULL) {
			//$parentId = \Magento\Catalog\Model\Category::TREE_ROOT_ID; //This will return value 1
			$parentId = 2; // We have set parent category as a DEFAULT CATEGORY
			$parentCategory = $this->_objectManager->create('Magento\Catalog\Model\Category')->load($parentId);
			$category = $this->_objectManager->create('Magento\Catalog\Model\Category');
			
			//Check exist category
			$cate = $category->getCollection()
				->addAttributeToFilter('name',$CategoryName)
				->getFirstItem();

			if($cate->getId()==NULL) {
				$category->setPath($parentCategory->getPath())
					->setParentId($parentId)
					->setName($CategoryName)
					->setIsActive(true);
				$category->save();
				return $category->getId();
			} else {
				return $cate->getId();
			}		
		} else {
			return "Please enter valid category name.";
		}		
	}	
}
