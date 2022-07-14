<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Item;

use App\Domain\Item\Item;
use App\Domain\Item\ItemNotFoundException;
use App\Domain\Item\ItemRepository;

class InMemoryItemRepository implements ItemRepository
{
    /**
     * @var Item[]
     */
    private array $items;

    /**
     * @param Item[]|null $items
     */
    public function __construct(array $items = null)
    {
        $this->items = $items ?? [
            1 => new Item(1, 'Hot Coffee', 250),
            2 => new Item(2, 'Iced Coffee', 250),
            3 => new Item(3, 'Cafe Latte', 350),
            4 => new Item(4, 'Orange Juice', 200),
            5 => new Item(5, 'Sandwiches', 500),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->items);
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): Item
    {
        if (!isset($this->items[$id])) {
            throw new ItemNotFoundException();
        }

        return $this->items[$id];
    }
}
