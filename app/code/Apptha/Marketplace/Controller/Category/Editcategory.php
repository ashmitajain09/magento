<?php

namespace Apptha\Marketplace\Controller\Category;

/**
 * This class contains the seller review section
 */
 use Magento\Framework\App\Action\Context;
 
class Editcategory extends \Magento\Framework\App\Action\Action
{

	protected $categoryFactory;
	
	protected $session;
	
	
	public function __construct(
		Context $context,
		\Apptha\Marketplace\Model\CategoryFactory $categoryFactory,
		\Magento\Customer\Model\Session $session
		
    )
    {
       $this->categoryFactory = $categoryFactory;
	   $this->session = $session;
	   parent::__construct($context);
    }
	
    /**
     * Save review for seller
     */
    public function execute()
    {

        

        /**
         * Checking user logged in or not
         */
        if ($this->session->isLoggedIn()) {
            $customerId = $this->session->getId();

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
			$category->setParentCategoryId($parentId);
			$category->setStatus(2);
			$category->setCategoryStatus($categoryStatus);
			$category->save();
			$this->_redirect($this->_redirect->getRefererUrl());
        }else{
            $this->_redirect ( 'marketplace/seller/login' );
        }
    }
}