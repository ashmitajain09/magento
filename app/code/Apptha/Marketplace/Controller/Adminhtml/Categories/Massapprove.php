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
use Magento\Store\Model\Store;

class Massapprove extends \Magento\Backend\App\Action {

	protected $sellerCategoryFactory;
	
	protected $categoryFactory;
	
	public function __construct(
        \Magento\Backend\App\Action\Context $context,
		\Apptha\Marketplace\Model\CategoryFactory $sellerCategoryFactory,
		\Magento\Catalog\Model\CategoryFactory $categoryFactory,
		\Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
	
		$this->sellerCategoryFactory = $sellerCategoryFactory;
		$this->categoryFactory = $categoryFactory;
		$this->_storeManager = $storeManager;
        parent::__construct($context);
    }
	
	
    /**
     *
     * @return void
     */
    public function execute() {
        $approvalIds = $this->getRequest ()->getParam ( 'approve' );
        foreach ( $approvalIds as $approvalId ) {
            try {
                $category = $this->sellerCategoryFactory->create();
               	$categoryDetails = $category->load ( $approvalId );
				if($categoryDetails->getMageCategoryId() == NULL ) {
					$categoryDetails->setStatus ( 1 )->setCategoryStatus ( 1 )->save ();
	                $categoryDetails = $category->load ( $approvalId );
	                $catId = $categoryDetails->getId ();
					$catName = $categoryDetails->getCategoryName ();
					$parentId = $categoryDetails->getParentCategoryId();
					$cateId = $this->save_category($catName , $parentId);
					$category->load ( $approvalId )->setMageCategoryId( $cateId  )->save ();
				}elseif($categoryDetails->getStatus() == 2){
					$storeManagerDataList = $this->_storeManager->getStores();
				//echo $value->getId();exit;
					$status = $categoryDetails->getCategoryStatus() == 2  ? 0 : $categoryDetails->getCategoryStatus();
				    $mage_cat = $this->categoryFactory->create()->setStoreId(0)->load($categoryDetails->getMageCategoryId())
													  ->setData('is_active' , $status)
											          ->setData('name', $categoryDetails->getCategoryName())
													  ->save();
					
					if($mage_cat->getParentId() != $categoryDetails->getParentCategoryId()){
						$mage_cat = $mage_cat->move($categoryDetails->getParentCategoryId() , null);
					}
					$categoryDetails->setStatus ( 1 )->save();
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
	
	public function save_category($CategoryName=NULL , $parentId = 2) {
		if($CategoryName!=NULL) {
			//$parentId = \Magento\Catalog\Model\Category::TREE_ROOT_ID; //This will return value 1
			//$parentId = 2; // We have set parent category as a DEFAULT CATEGORY
			$parentCategory = $this->categoryFactory->create()->load($parentId);
			$category = $this->categoryFactory->create();
			
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
