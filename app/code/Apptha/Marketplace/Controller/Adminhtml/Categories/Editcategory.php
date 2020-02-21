<?php

namespace Apptha\Marketplace\Controller\Adminhtml\Categories;

/**
 * This class contains the seller review section
 */
 use Magento\Store\Model\Store;
 use Magento\Backend\App\Action\Context;
 
class Editcategory extends \Magento\Backend\App\Action
{
	protected $sellerCategoryFactory;
	protected $categoryFactory;	
	protected $session;
	
	
	public function __construct(
		Context $context,
		\Apptha\Marketplace\Model\CategoryFactory $sellerCategoryFactory,
		\Magento\Catalog\Model\CategoryFactory $categoryFactory
		
    )
    {
       $this->sellerCategoryFactory = $sellerCategoryFactory;
	   $this->categoryFactory = $categoryFactory;
	   parent::__construct($context);
    }
	
    /**
     * Save review for seller
     */
    public function execute()
    { 
      		
            /**
             * Getting query variables
             */
            $name = $this->getRequest()->getPost('name');
            $description = $this->getRequest()->getPost('description');
			$parentId = $this->getRequest()->getPost('parent_category');
			$categoryId = $this->getRequest()->getPost('category_id');
			$main_cat_status = $this->getRequest()->getPost('status');
			$category = $this->sellerCategoryFactory->create()->load($categoryId);
			$old_cat_status = $category->getStatus(); 
			$category->setCategoryName($name);
			$category->setCategoryDescription($description);
			$category->setParentCategoryId($parentId);
			if($main_cat_status == ''){
				$main_cat_status=1;
			}
			if($main_cat_status == 1 && ($old_cat_status == 0 || $old_cat_status == 2)){
			}
			$category->setStatus($main_cat_status);
			$category->save();
			
			if($category->getMageCategoryId() != '') {
				$categoryDetails = $this->categoryFactory->create()->load($category->getMageCategoryId());	
				//Updating main table on category update
				if($name != $categoryDetails->getName()){
					$mage_cat = $this->categoryFactory->create()->setStoreId(Store::DEFAULT_STORE_ID)->load($category->getMageCategoryId())
																 ->setData('name', $name)
																 ->setData('store_data' , Store::DEFAULT_STORE_ID)
																 ->save();
				}
				if($categoryDetails->getParentId() != $category->getParentCategoryId()){
						$mage_cat = $categoryDetails->move($category->getParentCategoryId() , null);
				}
			}
			
			$this->_redirect('marketplaceadmin/categories/index');
    }
}


			