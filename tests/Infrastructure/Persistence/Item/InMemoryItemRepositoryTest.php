<?php
declare(strict_types=1);

namespace Tests\Infrastructure\Persistence\User;

use App\Domain\Item\Item;
use App\Domain\Item\ItemNotFoundException;
use App\Infrastructure\Persistence\Item\InMemoryItemRepository;
use Tests\TestCase;

class InMemoryItemRepositoryTest extends TestCase
{
    public function testFindAll()
    {
        $item = new Item(1, 'Hot Coffee', 250);

        $itemRepository = new InMemoryItemRepository([1 => $item]);

        $this->assertEquals([$item], $itemRepository->findAll());
    }

    public function testFindAllItemsByDefault()
    {
        $items = [
            1 => new Item(1, 'Hot Coffee', 250),
            2 => new Item(2, 'Iced Coffee', 250),
            3 => new Item(3, 'Cafe Latte', 350),
            4 => new Item(4, 'Orange Juice', 200),
            5 => new Item(5, 'Sandwiches', 500),
        ];

        $itemRepository = new InMemoryItemRepository();

        $this->assertEquals(array_values($items), $itemRepository->findAll());
    }

    public function testFindUserOfId()
    {
        $item = new Item(1, 'Hot Coffee', 250);

        $itemRepository = new InMemoryItemRepository([1 => $item]);

        $this->assertEquals($item, $itemRepository->findUserOfId(1));
    }

    public function testFindUserOfIdThrowsNotFoundException()
    {
        $itemRepository = new InMemoryItemRepository([]);
        $this->expectException(ItemNotFoundException::class);
        $itemRepository->findUserOfId(1);
    }
}
