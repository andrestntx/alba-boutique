<?php
/**
 * Created by PhpStorm.
 * User: Rocio del Pilar
 * Date: 16/01/2015
 * Time: 9:30 AM
 */

namespace boutique\Repositories;
use boutique\Entities\Product;

class ProductRepo extends BaseRepo{

    public function getModel()
    {
        return new Product;
    }
    public function allVisible($numero_articulos)
    {
        return Product::whereVisible('1')->orderBy('name')->paginate($numero_articulos);
    }
}