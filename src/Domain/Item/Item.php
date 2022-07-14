<?php
declare(strict_types=1);

namespace App\Domain\Item;

use JsonSerializable;

class Item implements JsonSerializable
{
    private int $id;

    private string $itemName;

    private int $price;

    /**
     * @param int $id
     * @param string $itemName
     * @param int $price
     */
    public function __construct(int $id, string $itemName, int $price)
    {
        $this->id = $id;
        $this->itemName = $itemName;
        $this->price = $price;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'itemName' => $this->itemName,
            'price' => $this->price
        ];
    }
}