<?php

namespace Apptha\Marketplace\Controller\Category;

/**
 * This class contains the seller review section
 */
class Savecategory extends \Magento\Framework\App\Action\Action
{
    /**
     * Save review for seller
     */
    public function execute()
    {

        /**
         * Creating current user object
         */
        $customerSession = $this->_objectManager->create('Magento\Customer\Model\Session');

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
            $manager = $this->_objectManager->get('Magento\Store\Model\StoreManagerInterface');
            $store = $manager->getStore($id);
            $storeId = $store->getId();
            /**
             * Getting query variables
             */
            $name = $this->getRequest()->getPost('name');
            $description = $this->getRequest()->getPost('description');

            /**
             * Getting date data using datetime object
             */
            $date = $this->_objectManager->get('Magento\Framework\Stdlib\DateTime\DateTime')->gmtDate();
            /**
             * Saving category for seller
             */
            $categoryModel = $this->_objectManager->create('Apptha\Marketplace\Model\Category');
            $categoryModel->setCustomerId($customerId);
            $categoryModel->setCategoryName($name);
            $categoryModel->setCategoryDescription($description);
            $categoryModel->setStoreId($storeId);

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
            $this->_redirect($this->_redirect->getRefererUrl());
        }else{
            $this->_redirect ( 'marketplace/seller/login' );
        }
    }
}