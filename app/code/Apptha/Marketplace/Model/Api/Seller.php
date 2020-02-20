<?php
namespace Apptha\Marketplace\Model\Api;
use Apptha\Marketplace\Api\SellerManagementInterface;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
class Seller implements SellerManagementInterface
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

    /**
     * @param int $sellerId
     * @param ProductFactory $productFactory
     * @param int $page
     * @param int $limit
     * @return Collection|mixed
     */
    public function getProducts($sellerId ,Collection $productFactory,$page = 1 , $limit = 20) {

        $product = $productFactory->addAttributeToSelect ( '*' )->addAttributeToFilter ( 'seller_id', $sellerId );
        $product->addAttributeToFilter ( 'visibility', array (
            'eq' => \Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH
        ) );
        $product->addAttributeToSort ( 'entity_id', 'DESC' );
        /**
         * Return product object
         */
        return $product;
    }
}