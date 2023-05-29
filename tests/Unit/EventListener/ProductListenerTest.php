<?php
declare(strict_types=1);

//tests/EventListener/ProductListenerTest.php

namespace App\Tests\EventListener;

use UMG\UMGBundle\EventListener\ProductListener;
use Codeception\Test\Unit;
use Pimcore\Event\Model\AssetEvent;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Event\Model\DocumentEvent;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\Document;
use PHPUnit\Framework\TestCase;

class ProductListenerTest extends Unit
{
    /*
    public function testOnPostAddWithAssetEvent()
    {
        // Create a mock AssetEvent object
        $event = $this->createMock(AssetEvent::class);

        // Create a mock Asset object
        $asset = $this->createMock(Asset::class);

        // Mock necessary methods
        $event->expects($this->once())
            ->method('getAsset')
            ->willReturn($asset);

        // Set up any required expectations or assertions for the Asset object
        // ...

        // Create an instance of the ProductListener
        $listener = new ProductListener();

        // Call the onPostAdd method
        $listener->onPostAdd($event);

        // Perform assertions as needed
        // ...
    }

    
    public function testOnPostAddWithDocumentEvent()
    {
        // Create a mock DocumentEvent object
        $event = $this->createMock(DocumentEvent::class);

        // Create a mock Document object
        $document = $this->createMock(Document::class);

        // Mock necessary methods
        $event->expects($this->once())
            ->method('getDocument')
            ->willReturn($document);

        // Set up any required expectations or assertions for the Document object
        // ...

        // Create an instance of the ProductListener
        $listener = new ProductListener();

        // Call the onPostAdd method
        $listener->onPostAdd($event);

        // Perform assertions as needed
        // ...
    }
    */

    public function testOnPostAddWithDataObjectEvent()
    {
        // Create a mock DataObjectEvent object
        $event = $this->createMock(DataObjectEvent::class);

        // Create a mock Concrete object (representing a Data Object)
        $dataObject = $this->createMock(Concrete::class);

        // Mock necessary methods
        $event->expects($this->once())
            ->method('getObject')
            ->willReturn($dataObject);

        // Set up any required expectations or assertions for the Data Object
        // ...

        // Create an instance of the ProductListener
        $listener = new ProductListener();

        // Call the onPostAdd method
        $listener->onPostAdd($event);

        // Perform assertions as needed
        // ...
    }
}
