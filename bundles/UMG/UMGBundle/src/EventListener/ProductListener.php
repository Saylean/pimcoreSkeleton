<?php

namespace UMG\UMGBundle\EventListener;
  
use Pimcore\Event\Model\ElementEventInterface;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Event\Model\AssetEvent;
use Pimcore\Event\Model\DocumentEvent;
use PHPClassic\PHPSShopify\ShopifySDK;
use Symfony\Component\Dotenv\Dotenv;
use Pimcore\Log\Simple;
use Pimcore\Log\Writer\Stream;

class ProductListener
{
    public function onPostUpdate(ElementEventInterface $e): void
    {
        //if ($e instanceof AssetEvent) {
            // do something with the asset
            //$foo = $e->getAsset(); 
        //} else if ($e instanceof DocumentEvent) {
            // do something with the document
            //$foo = $e->getDocument(); 
        //} else if ($e instanceof DataObjectEvent) {
            // do something with the object
            $foo = $e->getObject(); 
            $foo->setMyValue(microtime(true));
        //}
        $this->addProductToShopify($foo['name'],$foo['sku'],$foo['productType'],$foo['nprice']);    

    }

    function createShopifyProduct($productName, $productSku, $productType, $productPrice)   
    {
        // Load the environment variables from .env.local
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/.env.local');

        // Retrieve the Shopify configuration values
        $shopUrl = $_ENV['SHOPIFY_SHOP_URL'];
        $apiKey = $_ENV['SHOPIFY_API_KEY'];
        $apiPassword = $_ENV['SHOPIFY_API_PASSWORD'];

        // Instantiate the Shopify SDK
        $config = array(
            'ShopUrl' => $shopUrl,
            'ApiKey' => $apiKey,
            'Password' => $apiPassword,
        );
        $shopify = new ShopifySDK($config);

        // Prepare the product data
        $productData = array(
            'product' => array(
                'title' => $productName,
                'sku' => $productSku,
                'product_type' => $productType,
                'variants' => array(
                    array(
                        'price' => $productPrice,
                    ),
                ),
            ),
        );

        // Create the product on Shopify
        $createdProduct = $shopify->ProductV1->post($productData);

        // Handle the response
        if ($createdProduct) {
            // Product creation successful
            $logWriter = new Stream('event.log');
            $log = new Simple($logWriter);

            $log->info(sprintf('%s created on shopify', $createdProduct['id']));
           
            //echo "Product created successfully with ID: " . $productId;
        } else {
            // Product creation failed
            //echo "Failed to create product on Shopify";
        }
    }

    private function updateProductOnShopify()
    {
        
    }
}