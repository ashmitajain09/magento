<?php

namespace Apptha\Marketplace\Block\Adminhtml\Categories;

use Magento\Framework\View\Element\Template;

class Edit extends \Magento\Framework\View\Element\Template
{

	protected $_categoryFactory;
	
	protected $formKey;
	
    /**
     * Add constructor.
     * @param Template\Context $context
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     * @param array $data
     */
    public function __construct(Template\Context $context, 
	\Apptha\Marketplace\Model\CategoryFactory $categoryFactory,
	\Magento\Framework\Message\ManagerInterface $messageManager, 
	\Magento\Framework\Data\Form\FormKey $formKey,
	array $data = [])
    {
		$this->_categoryFactory = $categoryFactory;
        $this->messageManager = $messageManager;
		$this->formKey = $formKey;
        parent::__construct($context, $data);
    }

    

    /**
     * @return string
     */
    public function saveCategoryUrl() {
        return $this->getUrl ( 'marketplaceadmin/categories/editcategory' );
    }
	
	
	public function getCurrentCategory(){
		$category = $this->_categoryFactory->create()->load($this->getRequest()->getParam('id'));
		return $category;
	}
	
	public function getFormKey()
	{
     	return $this->formKey->getFormKey();
	}
	
	

}