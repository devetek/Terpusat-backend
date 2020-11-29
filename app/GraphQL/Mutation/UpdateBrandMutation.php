<?php

namespace App\GraphQL\Mutation;

use Closure;
use Exception;
use App\Models\Brand;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateBrandMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateBrand'
    ];

    public function type(): Type
    {
        return GraphQL::type('brand');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'input' => [
                'type' => GraphQL::type('BrandInput')
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        try {
            $brand = Brand::find($args['id']);;

            if (@$brand) {
                if (@$args['input']['name']) {
                    $brand->name = $args['input']['name'];
                }

                if (@$args['input']['description']) {
                    $brand->description = $args['input']['description'];
                }

                if (@$args['input']['company_id']) {
                    $brand->company_id = $args['input']['company_id'];
                }

                $brand->save();
            }

            return $brand;
        } catch (Exception $e) {
            return $e;
        }
    }
}
