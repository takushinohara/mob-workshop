<?php
declare(strict_types=1);

namespace Tests\Application\Actions\User;

use App\Application\Actions\ActionPayload;
use App\Domain\Item\Item;
use App\Domain\Item\ItemRepository;
use DI\Container;
use Tests\TestCase;

class ListItemActionTest extends TestCase
{
    public function testAction()
    {
        $app = $this->getAppInstance();

        /** @var Container $container */
        $container = $app->getContainer();

        $item = new Item(1, 'Hot Coffee', 250);

        $itemRepositoryProphecy = $this->prophesize(ItemRepository::class);
        $itemRepositoryProphecy
            ->findAll()
            ->willReturn([$item])
            ->shouldBeCalledOnce();

        $container->set(ItemRepository::class, $itemRepositoryProphecy->reveal());

        $request = $this->createRequest('GET', '/items');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $expectedPayload = new ActionPayload(200, [$item]);
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }
}
