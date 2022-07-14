<?php
declare(strict_types=1);

use App\Domain\Item\ItemRepository;
use App\Infrastructure\Persistence\Item\InMemoryItemRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        ItemRepository::class => \DI\autowire(InMemoryItemRepository::class),
    ]);
};
