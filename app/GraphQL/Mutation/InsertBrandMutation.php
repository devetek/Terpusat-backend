<?php

namespace App\GraphQL\Mutation;

use Closure;
use Exception;
use App\Models\Brand;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class InsertBrandMutation extends Mutation
{
    protected $attributes = [
        'name' => 'InsertBrand'
    ];

    public function type(): Type
    {
        return GraphQL::type('brand');
    }

    public function args(): array
    {
        return [
            'input' => [
                'type' => GraphQL::type('BrandInput')
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        try {
            $brand = new Brand;

            $brand->name = $args['input']['name'];
            $brand->description = $args['input']['description'];
            $brand->company_id = $args['input']['company_id'];
    
            $brand->save();

            return $brand;
        } catch(Exception $e) {
            return $e;
        }
    }
}