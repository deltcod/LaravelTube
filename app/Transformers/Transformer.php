<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 20/04/16
 * Time: 16:49.
 */

namespace App\Transformers;

abstract class Transformer
{
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    abstract public function transform($item);
}
