<?php 
namespace Apptha\Marketplace\Api\Data;
 
 
interface CategoryDataInterface {


	/**
	 * Get Category Id
	 * @return int
	 */
	public function getId();
	
	/**
	 * Set Category Id
	 * @params int $category_id 
	 * @return int
	 */
	public function setId($category_id);
	
	
	/**
	 * Get Category Name
	 * @return string
	 */
	public function getCategoryName();
	
	/**
	 * Set Category Name
	 * @params int $category_name
	 * @return string
	 */
	public function setCategoryName($category_name);
	
	
	/**
	 * Get Store Id
	 * @return int
	 */
	public function getStoreId();
	
	/**
	 * Set Store Id
	 * @params int $store_id
	 * @return int
	 */
	public function setStoreId($store_id);
	
	
	/**
	 * Get Status
	 * @return int
	 */
	public function getStatus();
	
	/**
	 * Set Status
	 * @params int $status
	 * @return int
	 */
	public function setStatus($status);
	
	
	/**
	 * Get Parent Category Id
	 * @return int
	 */
	public function getParentCategoryId();
	
	/**
	 * Set Parent Category Id
	 * @params int $id
	 * @return int
	 */
	public function setParentCategoryId($id);
	
	
	/**
	 * Get Magento Category Id
	 * @return int
	 */
	public function getMageCategoryId();
	
	/**
	 * Set Magento Category Id
	 * @params int $id
	 * @return int
	 */
	public function setMageCategoryId($id);
	
	
	/**
	 * Get Category Status
	 * @return int
	 */
	public function getCategoryStatus();
	
	/**
	 * Set category Status
	 * @params int $id
	 * @return int
	 */
	public function setCategoryStatus($id);
}