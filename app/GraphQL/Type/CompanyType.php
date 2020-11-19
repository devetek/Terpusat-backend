<?php

namespace App\GraphQL\Type;

use App\Models\Company;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CompanyType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'Company',
        'description'   => 'A company',
        'model'         => Company::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the company',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of company',
                'resolve' => function($root, $args) {
                    // If you want to resolve the field yourself,
                    // it can be done here
                    return $root->name;
                }
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of company',
                'resolve' => function($root, $args) {
                    // If you want to resolve the field yourself,
                    // it can be done here
                    return $root->description;
                }
            ],
            'owner' => [
                'type' => GraphQL::type('user'),
                'description' => 'Company owner',
            ],
        ];
    }
}