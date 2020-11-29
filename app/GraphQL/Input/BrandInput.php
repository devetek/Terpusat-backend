<?php

namespace App\GraphQL\Input;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class BrandInput extends InputType
{
    protected $attributes = [
        'name' => 'brandInput',
        'description' => 'Brand input object'
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'alias' => 'name',
                'description' => 'Name (250 max chars)',
                'type' => Type::string(),
                'rules' => ['min:3', 'max:250']
            ],
            'description' => [
                'alias' => 'description',
                'description' => 'Description (long string)',
                'type' => Type::string(),
                'rules' => ['min:20', 'max:1000']
            ],
            'company_id' => [
                'alias' => 'company_id',
                'description' => 'Company id (integer)',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }
}