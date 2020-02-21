<?php 
namespace Apptha\Marketplace\Api\Data;
 
 
interface SellerDataInterface {


	/**
	 * Get Seller Id
	 * @return int
	 */
	public function getId();
	
	/**
	 * Set Seller Id
	 * @params int $seller_id 
	 * @return int
	 */
	public function setId($seller_id);
	
	/**
	 * Get Email
	 * @return String
	 */
	public function getEmail();
	
	/**
	 * Set Email
	 * @params string $email 
	 * @return string
	 */
	public function setEmail($email);
	
	
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
	 * Get Facebook Id
	 * @return string
	 */
	public function getFacebookId();
	
	/**
	 * Set Facebook Id
	 * @params string $fb_id 
	 * @return string
	 */
	public function setFacebookId($fb_id);
	
	/**
	 * Get Twitter Id
	 * @return string
	 */
	public function getTwitterId();
	
	/**
	 * Set Twitter Id
	 * @params string $twitter_id 
	 * @return string
	 */
	public function setTwitterId($twitter_id);
	
	
	/**
	 * Get Google Id
	 * @return string
	 */
	public function getGoogleId();
	
	/**
	 * Set Google Id
	 * @params string $g_id 
	 * @return string
	 */
	public function setGoogleId($g_id);
	
	
	/**
	 * Get LinkedIn Id
	 * @return string
	 */
	public function getLinkedId();
	
	/**
	 * Set Linked Id
	 * @params string $id 
	 * @return string
	 */
	public function setLinkedId($id);
	
	
	/**
	 * Get Desc
	 * @return string
	 */
	public function getDesc();
	
	/**
	 * Set Desc
	 * @params string $desc 
	 * @return string
	 */
	public function setDesc($desc);
	
	
	/**
	 * Get Store Name
	 * @return string
	 */
	public function getStoreName();
	
	/**
	 * Set Store Name
	 * @params string $store_name 
	 * @return string
	 */
	public function setStoreName($store_name);
	
	
	
	/**
	 * Get Contact
	 * @return string
	 */
	public function getContact();
	
	/**
	 * Set Contact
	 * @params string $contact 
	 * @return string
	 */
	public function setContact($contact);
	
	
	
	/**
	 * Get Commission
	 * @return int
	 */
	public function getCommission();
	
	/**
	 * Set Commission
	 * @params int $Commission 
	 * @return int
	 */
	public function setCommission($Commission);
	
	
	/**
	 * Get Country
	 * @return string
	 */
	public function getCountry();
	
	/**
	 * Set Country
	 * @params int $commission 
	 * @return int
	 */
	public function setCountry($country);
	
	
	
	/**
	 * Get Stare
	 * @return string
	 */
	public function getState();
	
	/**
	 * Set State
	 * @params string $state 
	 * @return string
	 */
	public function setState($state);
	
	
	
	/**
	 * Get Logo Name
	 * @return string
	 */
	public function getLogoName();
	
	/**
	 * Set Logo Name
	 * @params string $logo_name 
	 * @return string
	 */
	public function setLogoName($logo_name);
	
	
	
	/**
	 * Get Banner Name
	 * @return string
	 */
	public function getBannerName();
	
	/**
	 * Set Banner Name
	 * @params string $banner_name 
	 * @return string
	 */
	public function setBannerName($banner_name);
	
	
	/**
	 * Get Store Url
	 * @return string
	 */
	public function getStoreUrl();
	
	/**
	 * Set Store Url
	 * @params string $store_url 
	 * @return string
	 */
	public function setStoreUrl($store_url);
	
	
	
	/**
	 * Get Show Profile
	 * @return string
	 */
	public function getShowProfile();
	
	/**
	 * Set Show Profile
	 * @params string $show 
	 * @return string
	 */
	public function setShowProfile($show);
	
	
	/**
	 * Get Address 
	 * @return string
	 */
	public function getAddress();
	
	/**
	 * Set Address
	 * @params string $address 
	 * @return string
	 */
	public function setAddress($address);
	
	
	/**
	 * Get National Shipping Amount 
	 * @return int
	 */
	public function getNationalShippinhAmount();
	
	/**
	 * Set National Shipping Amount 
	 * @params int $amount 
	 * @return int
	 */
	public function setNationalShippinhAmount($amount);
	
	
	/**
	 * Get International Shipping Amount 
	 * @return int
	 */
	public function getInternationalShippingAmount();
	
	/**
	 * Set International Shipping Amount
	 * @params int $amount 
	 * @return int
	 */
	public function setInternationalShippingAmount($amount);

}