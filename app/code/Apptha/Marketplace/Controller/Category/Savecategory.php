<?php

namespace Apptha\Marketplace\Controller\Category;

/**
 * This class contains the seller review section
 */
class Savecategory extends \Magento\Framework\App\Action\Action
{

    private $customerSession ;

    protected $storeManager;

    /**
     * Add constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\SessionFactory $customerSession,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Stdlib\DateTime\DateTime $dateTime,
        \Apptha\Marketplace\Model\CategoryFactory $categoryFactory,
        \Apptha\Marketplace\Model\SellerFactory $sellerFactory,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collecionFactory
    )
    {
        $this->customerSession = $customerSession;
        $this->storeManager = $storeManager;
        $this->dateTime = $dateTime;
        $this->categoryFactory = $categoryFactory;
        $this->sellerFactory = $sellerFactory;
        $this->collecionFactory = $collecionFactory;
        return parent::__construct($context);
    }


    /**
     * Save review for seller
     */
    public function execute()
    {

        /**
         * Creating current user object
         */
        $customerSession = $this->customerSession->create();

        /**
         * Checking user logged in or not
         */
        if ($customerSession->isLoggedIn()) {
            $customerId = $customerSession->getId();

            /**
             * Preparing review data
             */
            $id = null;
            /**
             * Creating a store object
             */
            $manager = $this->storeManager;
            $store = $manager->getStore($id);
            $storeId = $store->getId();
            /**
             * Getting query variables
             */
            $name = $this->getRequest()->getPost('name');
            $description = $this->getRequest()->getPost('description');
			$parentId = $this->getRequest()->getPost('parent_category');
            /**
             * Getting date data using datetime object
             */
            $date = $this->dateTime->gmtDate();

            $collection = $this->collecionFactory
                ->create()
                ->addAttributeToFilter('name',$name)
                ->setPageSize(1);

            if ($collection->getSize()) {
                $categoryId = $collection->getFirstItem()->getId();
                $this->messageManager->addNotice(__('Category %1 is already present', $name));
               
            }else{
                /**
                 * Saving category for seller
                 */
                $categoryModel = $this->categoryFactory->create();
                $categoryModel->setCustomerId($customerId);
                $categoryModel->setCategoryName($name);
                $categoryModel->setCategoryDescription($description);
                $categoryModel->setStoreId($storeId);
                $categoryModel->setParentCategoryId($parentId);
                
                $sellerId = $this->sellerFactory->create()->getCollection()->addFieldToSelect('id')->addFieldToFilter('customer_id' , $customerId)->getFirstItem()->getId();
                
                $categoryModel->setSellerId($sellerId);
                /**
                 * Checking for auto approval option
                 */

    //                $autoApproval = $this->_objectManager->create('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('marketplace/review/approval');

                /**
                 * Manipulate based on auto approval option setting
                 */
    //                if ($autoApproval == 1) {
    //                    $reveiwModel->setStatus(1);
    //                    $this->messageManager->addSuccess(__('Your review has been added successfully'));
    //                } else {
                $categoryModel->setStatus(0);
                $this->messageManager->addSuccess(__('Your category is awaiting for moderation'));
    //                }

                /**
                 * Save customer review module for seller
                 */
                $categoryModel->setCreatedAt($date);
                $categoryModel->save();
            }
            $this->_redirect($this->_redirect->getRefererUrl());
        }else{
            $this->_redirect ( 'marketplace/seller/login' );
        }
    }
}