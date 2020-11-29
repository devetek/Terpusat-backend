<?php

namespace App\GraphQL\Input;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class CompanyInput extends InputType
{
    protected $attributes = [
        'name' => 'companyInput',
        'description' => 'Company input object'
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'alias' => 'name',
                'description' => 'Name (250 max chars)',
                'type' => Type::string(),
                'rules' => ['max:250']
            ],
            'description' => [
                'alias' => 'description',
                'description' => 'Description (long string)',
                'type' => Type::string(),
                'rules' => ['min:20', 'max:1000']
            ],
            'user_id' => [
                'alias' => 'user_id',
                'description' => 'User id (integer)',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }
}