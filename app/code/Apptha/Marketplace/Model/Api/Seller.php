<?php

<?php
namespace Apptha\Marketplace\Model\Api;
use Apptha\Marketplace\Api\SellerManagementInterface;
 
class Seller implements HelloInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param int $sellerId Seller Id.
	 * @param int $page Current Page.
	 * @param int $limit limit per page.
     * @return string Greeting message with users name.
     */
    public function getCategories($sellerId ,$page = 1 , $limit = 20) {
        return "Hello, " . $sellerId;
    }
}