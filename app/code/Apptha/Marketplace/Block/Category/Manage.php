<?php

namespace Apptha\Marketplace\Block\Category;

use Magento\Framework\View\Element\Template;

class Manage extends \Magento\Framework\View\Element\Template
{

	protected $_categoryFactory;
	protected $_customerSessionFactory;
    /**
     * Add constructor.
     * @param Template\Context $context
     * @param \Apptha\Marketplace\Model\CategoryFactory $categoryFactory
     * @param array $data
     */
    public function __construct(Template\Context $context, \Apptha\Marketplace\Model\CategoryFactory $categoryFactory, 
	\Magento\Customer\Model\SessionFactory $customerSessionFactory, array $data = [])
    {
        $this->_categoryFactory = $categoryFactory;
		$this->_customerSessionFactory = $customerSessionFactory;
        parent::__construct($context, $data);
    }
	
	
	protected function _prepareLayout()
	{
	    parent::_prepareLayout();
	   	
	    if ($this->getCategories()) {
	        $pager = $this->getLayout()->createBlock(
	            'Magento\Theme\Block\Html\Pager',
	            'test.news.pager'
	        )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
	            $this->getCategories()
	        );
	        $this->setChild('pager', $pager);
	    }
	    return $this;
	}
	
	
	public function getCategories(){
		$customerSession = $this->_customerSessionFactory->create();
		$customer = $customerSession->getCustomer();
		$page=($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
		$pageSize=($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 1;
		$categories = $this->_categoryFactory->create();
		$categories->setPageSize($pageSize);
        $categories = $categories->setCurPage($page)->getCollection()->addFieldToFilter('customer_id', $customer->getId());
        return $categories;
	}
	
	public function getPagerHtml() {
        return $this->getChildHtml ( 'pager' );
    }

    

}