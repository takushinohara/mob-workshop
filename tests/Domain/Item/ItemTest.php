<?php
declare(strict_types=1);

namespace Tests\Domain\Item;

use App\Domain\Item\Item;
use App\Domain\User\User;
use Tests\TestCase;

class ItemTest extends TestCase
{
    public function itemProvider()
    {
        return [
            [1, 'Hot Coffee', 250],
            [2, 'Iced Coffee', 250],
            [3, 'Cafe Latte', 350],
            [4, 'Orange Juice', 200],
            [5, 'Sandwiches', 500],
        ];
    }

    /**
     * @dataProvider ItemProvider
     * @param int $id
     * @param string $itemName
     * @param int $price
     */
    public function testJsonSerialize(int $id, string $itemName, int $price)
    {
        $item = new Item($id, $itemName, $price);

        $expectedPayload = json_encode([
            'id' => $id,
            'itemName' => $itemName,
            'price' => $price,
        ]);

        $this->assertEquals($expectedPayload, json_encode($item));
    }
}
