<?php

namespace Apptha\Marketplace\Model\Api\Data;

class Category extends \Magento\Framework\Model\AbstractModel implements
    \Apptha\Marketplace\Api\Data\CategoryDataInterface 
{
    const KEY_NAME = 'name';
	
	const KEY_ID = 'id';
	
	const KEY_STORE_ID = 'store_id';
	
	const KEY_STATUS = 'status';
	
	const KEY_PARENT_CATEGORY_ID = 'parent_id';
	
	const KEY_MAGENTO_CATEGORY_ID = 'magento_category_id';
	
	const KEY_CATEGORY_STATUS = 'category_status';


     public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }


    public function getName()
    {
        return $this->_getData(self::KEY_NAME);
    }


    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::KEY_NAME, $name);
    }
	
	
	
	/**
	 * Get Category Id
	 * @return int
	 */
	public function getId(){
		return $this->_getData(self::KEY_ID);
	}
	
	/**
	 * Set Category Id
	 * @params int $category_id 
	 * @return int
	 */
	public function setId($category_id){
		return $this->setData(self::KEY_ID, $category_id);
	}
	
	
	/**
	 * Get Category Name
	 * @return string
	 */
	public function getCategoryName(){
		return $this->_getData(self::KEY_NAME);
	}
	
	/**
	 * Set Category Name
	 * @params int $category_name
	 * @return string
	 */
	public function setCategoryName($category_name){
		return $this->setData(self::KEY_NAME, $category_name);
	}
	
	
	/**
	 * Get Store Id
	 * @return int
	 */
	public function getStoreId(){
		return $this->_getData(self::KEY_STORE_ID);
	}
	
	/**
	 * Set Store Id
	 * @params int $store_id
	 * @return int
	 */
	public function setStoreId($store_id){
		return $this->setData(self::KEY_STORE_ID, $store_id);
	}
	
	
	/**
	 * Get Status
	 * @return int
	 */
	public function getStatus(){
		return $this->_getData(self::KEY_STATUS);
	}
	
	/**
	 * Set Status
	 * @params int $status
	 * @return int
	 */
	public function setStatus($status){
		return $this->setData(self::KEY_STATUS, $status);
	}
	
	
	/**
	 * Get Parent Category Id
	 * @return int
	 */
	public function getParentCategoryId(){
		return $this->_getData(self::KEY_PARENT_CATEGORY_ID);
	}
	
	/**
	 * Set Parent Category Id
	 * @params int $id
	 * @return int
	 */
	public function setParentCategoryId($id){
		return $this->setData(self::KEY_PARENT_CATEGORY_ID, $id);
	}
	
	
	/**
	 * Get Magento Category Id
	 * @return int
	 */
	public function getMageCategoryId(){
		return $this->_getData(self::KEY_MAGENTO_CATEGORY_ID);
	}
	
	/**
	 * Set Magento Category Id
	 * @params int $id
	 * @return int
	 */
	public function setMageCategoryId($id){
		return $this->setData(self::KEY_MAGENTO_CATEGORY_ID, $id);
	}
	
	
	/**
	 * Get Category Status
	 * @return int
	 */
	public function getCategoryStatus(){
		return $this->_getData(self::KEY_CATEGORY_STATUS);
	}
	
	/**
	 * Set category Status
	 * @params int $id
	 * @return int
	 */
	public function setCategoryStatus($id){
		return $this->setData(self::KEY_CATEGORY_STATUS, $id);
	}


}