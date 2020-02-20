<?php

namespace Apptha\Marketplace\Block\Category;

use Magento\Framework\View\Element\Template;

class Manage extends \Magento\Framework\View\Element\Template
{

	protected $_categoryFactory;
	protected $_customerSessionFactory;
	
	protected $_collectionFactory;
    /**
     * Add constructor.
     * @param Template\Context $context
     * @param \Apptha\Marketplace\Model\CategoryFactory $categoryFactory
     * @param array $data
     */
    public function __construct(Template\Context $context, \Apptha\Marketplace\Model\CategoryFactory $categoryFactory, 
	\Magento\Customer\Model\SessionFactory $customerSessionFactory,
	\Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collecionFactory,
	 array $data = [])
    {
        $this->_categoryFactory = $categoryFactory;
		$this->_customerSessionFactory = $customerSessionFactory;
		$this->_collectionFactory = $collecionFactory;
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
		$pageSize=($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 5;
        $categories = $this->_categoryFactory->create()->getCollection()->addFieldToFilter('customer_id', $customer->getId())->setOrder('id', 'desc')->setCurPage($page)->setPageSize($pageSize);
        return $categories;
	}
	
	public function getPagerHtml() {
        return $this->getChildHtml ( 'pager' );
    }
	
	
	public function getCategoryNameById($id){
		$categoryName = "root";
		$collection = $this->_collectionFactory
                ->create()
                ->addAttributeToFilter('entity_id',$id)
				->addAttributeToSelect('name')
                ->setPageSize(1);

		if ($collection->getSize()) {
		    $categoryName = $collection->getFirstItem()->getName();
		}
		return $categoryName;
	}

    

}