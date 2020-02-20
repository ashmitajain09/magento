<?php

namespace Apptha\Marketplace\Model\Api\Data;

class Details extends \Magento\Framework\Model\AbstractModel implements
    \Apptha\Marketplace\Api\Data\SellerDataInterface 
{
    const KEY_EMAIL = 'email';
	
	const KEY_ID = 'id';
	
	const KEY_STATUS = 'status';
	
	const KEY_FB_ID = 'facebook';
	
	const KEY_TW_ID = 'twitter';
	
	const KEY_LN_ID = "linkedIn";
	
	const KEY_GL_ID = "google";
	
	const KEY_DESC = "Description";
	
	const KEY_CONTACT = "contact";
	
	const KEY_LOGO_NAME = "logo";
	
	const KEY_BANNER_NAME = "banner_name";
	
	const KEY_STATE = "state";
	
	const KEY_COUNTRY = "country";
	
	const KEY_COMMISSION = "commission";
	
	const KEY_STORE_URL = "store_url";
	
	const KEY_SHOW_PROFILE = "show_profile";
	
	const KEY_ADDRESS = "address";
	
	const KEY_NSA = "national_shipping_amount";
	
	const KEY_ISA = "international_shipping_amount";
	
	const KEY_STORE_NAME = "store_name";
	
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
	 * Get Seller Id
	 * @return int
	 */
	public function getId(){
		
		return $this->_getData(self::KEY_ID);
	}
	
	/**
	 * Set Seller Id
	 * @params int $seller_id 
	 * @return int
	 */
	public function setId($seller_id){
		return $this->setData(self::KEY_ID, $seller_id);
	}
	
	/**
	 * Get Email
	 * @return String
	 */
	public function getEmail(){
		
		return $this->_getData(self::KEY_EMAIL);
	}
	
	/**
	 * Set Email
	 * @params string $email 
	 * @return string
	 */
	public function setEmail($email){
		return $this->setData(self::KEY_EMAIL, $email);
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
	 * Get Facebook Id
	 * @return string
	 */
	public function getFacebookId(){
		return $this->_getData(self::KEY_FB_ID);
	}
	
	/**
	 * Set Facebook Id
	 * @params string $fb_id 
	 * @return string
	 */
	public function setFacebookId($fb_id){
		return $this->setData(self::KEY_FB_ID, $fb_id);
	}
	
	/**
	 * Get Twitter Id
	 * @return string
	 */
	public function getTwitterId(){
		return $this->_getData(self::KEY_TW_ID);
	}
	
	/**
	 * Set Twitter Id
	 * @params string $twitter_id 
	 * @return string
	 */
	public function setTwitterId($twitter_id){
		return $this->setData(self::KEY_TW_ID, $twitter_id);
	}
	
	
	/**
	 * Get Google Id
	 * @return string
	 */
	public function getGoogleId(){
		return $this->_getData(self::KEY_GL_ID);
	}
	
	/**
	 * Set Google Id
	 * @params string $g_id 
	 * @return string
	 */
	public function setGoogleId($g_id){
		return $this->setData(self::KEY_GL_ID, $g_id);
	}
	
	
	/**
	 * Get LinkedIn Id
	 * @return string
	 */
	public function getLinkedId(){
		return $this->_getData(self::KEY_LN_ID);
	}
	
	/**
	 * Set Linked Id
	 * @params string $id 
	 * @return string
	 */
	public function setLinkedId($id){
		return $this->setData(self::KEY_LN_ID, $id);
	}
	
	
	/**
	 * Get Desc
	 * @return string
	 */
	public function getDesc(){
		return $this->_getData(self::KEY_DESC);
	}
	
	/**
	 * Set Desc
	 * @params string $desc 
	 * @return string
	 */
	public function setDesc($desc){
		return $this->setData(self::KEY_DESC, $desc);
	}
	
	
	/**
	 * Get Store Name
	 * @return string
	 */
	public function getStoreName(){
		return $this->_getData(self::KEY_STORE_NAME);
	}
	
	/**
	 * Set Store Name
	 * @params string $store_name 
	 * @return string
	 */
	public function setStoreName($store_name){
		return $this->setData(self::KEY_STORE_NAME, $store_name);
	}
	
	
	
	/**
	 * Get Contact
	 * @return string
	 */
	public function getContact(){
		return $this->_getData(self::KEY_CONTACT);
	}
	
	/**
	 * Set Contact
	 * @params string $contact 
	 * @return string
	 */
	public function setContact($contact){
		return $this->setData(self::KEY_CONTACT, $contact);
	}
	
	
	
	/**
	 * Get Commission
	 * @return int
	 */
	public function getCommission(){
		return $this->_getData(self::KEY_COMMISSION);
	}
	
	/**
	 * Set Commission
	 * @params int $Commission 
	 * @return int
	 */
	public function setCommission($Commission){
		return $this->setData(self::KEY_COMMISSION, $Commission);
	}
	
	
	/**
	 * Get Country
	 * @return string
	 */
	public function getCountry(){
		return $this->_getData(self::KEY_COUNTRY);
	}
	
	/**
	 * Set Country
	 * @params int $commission 
	 * @return int
	 */
	public function setCountry($country){
		return $this->setData(self::KEY_COUNTRY, $country);
	}
	
	
	
	/**
	 * Get Stare
	 * @return string
	 */
	public function getState(){
		return $this->_getData(self::KEY_STATE);
	}
	
	/**
	 * Set State
	 * @params string $state 
	 * @return string
	 */
	public function setState($state){
		return $this->setData(self::KEY_STATE, $state);
	}
	
	
	
	/**
	 * Get Logo Name
	 * @return string
	 */
	public function getLogoName(){
		return $this->_getData(self::KEY_LOGO_NAME);
	}
	
	/**
	 * Set Logo Name
	 * @params string $logo_name 
	 * @return string
	 */
	public function setLogoName($logo_name){
		return $this->setData(self::KEY_LOGO_NAME, $logo_name);
	}
	
	
	
	/**
	 * Get Banner Name
	 * @return string
	 */
	public function getBannerName(){
		return $this->_getData(self::KEY_BANNER_NAME);
	}
	
	/**
	 * Set Banner Name
	 * @params string $banner_name 
	 * @return string
	 */
	public function setBannerName($banner_name){
		return $this->setData(self::KEY_BANNER_NAME, $banner_name);
	}
	
	
	/**
	 * Get Store Url
	 * @return string
	 */
	public function getStoreUrl(){
		return $this->_getData(self::KEY_STORE_URL);
	}
	
	/**
	 * Set Store Url
	 * @params string $store_url 
	 * @return string
	 */
	public function setStoreUrl($store_url){
		return $this->setData(self::KEY_STORE_URL, $store_url);
	}
	
	
	
	/**
	 * Get Show Profile
	 * @return string
	 */
	public function getShowProfile(){
		return $this->_getData(self::KEY_SHOW_PROFILE);
	}
	
	/**
	 * Set Show Profile
	 * @params string $show 
	 * @return string
	 */
	public function setShowProfile($show){
		return $this->setData(self::KEY_SHOW_PROFILE, $show);
	}
	
	
	/**
	 * Get Address 
	 * @return string
	 */
	public function getAddress(){
		return $this->_getData(self::KEY_ADDRESS);
	}
	
	/**
	 * Set Address
	 * @params string $address 
	 * @return string
	 */
	public function setAddress($address){
		return $this->setData(self::KEY_ADDRESS, $address);
	}
	
	
	/**
	 * Get National Shipping Amount 
	 * @return int
	 */
	public function getNationalShippinhAmount(){
		return $this->_getData(self::KEY_NSA);
	}
	
	/**
	 * Set National Shipping Amount 
	 * @params int $amount 
	 * @return int
	 */
	public function setNationalShippinhAmount($amount){
		return $this->setData(self::KEY_NSA, $amount);
	}
	
	
	/**
	 * Get International Shipping Amount 
	 * @return int
	 */
	public function getInternationalShippingAmount(){
		return $this->_getData(self::KEY_ISA);
	}
	
	/**
	 * Set International Shipping Amount
	 * @params int $amount 
	 * @return int
	 */
	public function setInternationalShippingAmount($amount){
		return $this->setData(self::KEY_ISA, $amount);
	}
}