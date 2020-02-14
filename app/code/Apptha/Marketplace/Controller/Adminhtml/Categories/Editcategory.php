<?php

namespace Apptha\Marketplace\Controller\Adminhtml\Categories;

/**
 * This class contains the seller review section
 */
 use Magento\Backend\App\Action\Context;
 
class Editcategory extends \Magento\Backend\App\Action
{

	protected $categoryFactory;
	
	protected $session;
	
	
	public function __construct(
		Context $context,
		\Apptha\Marketplace\Model\CategoryFactory $categoryFactory
		
    )
    {
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
			$categoryStatus = $this->getRequest()->getPost('category_status');
			$category = $this->categoryFactory->create()->load($categoryId);
			$category->setCategoryName($name);
			$category->setCategoryDescription($description);
			$category->setStatus(2);
			$category->setCategoryStatus($categoryStatus);
			$category->save();
			$category->move($parentId , 2);
			$this->_redirect($this->_redirect->getRefererUrl());
    }
}