<?php

namespace App\GraphQL\Input;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class UserInput extends InputType
{
    protected $attributes = [
        'name' => 'userInput',
        'description' => 'User input object'
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'alias' => 'name',
                'description' => 'Fullname (250 max chars)',
                'type' => Type::string(),
                'rules' => ['max:250']
            ],
            'email' => [
                'alias' => 'email',
                'description' => 'Email (250 max chars)',
                'type' => Type::string(),
                'rules' => ['min:10', 'max:250']
            ],
            'phone' => [
                'alias' => 'phone',
                'description' => 'A phone number (3 to 20)',
                'type' => Type::string(),
                'rules' => ['min:3', 'max:20']
            ],
            'password' => [
                'alias' => 'password',
                'description' => 'A password (6 to 30)',
                'type' => Type::string(),
                'rules' => ['min:6', 'max:30']
            ]
        ];
    }
}