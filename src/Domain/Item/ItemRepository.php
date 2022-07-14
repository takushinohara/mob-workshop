<?php
declare(strict_types=1);

namespace App\Domain\Item;

interface ItemRepository
{
    /**
     * @return Item[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Item
     * @throws ItemNotFoundException
     */
    public function findUserOfId(int $id): Item;
}
