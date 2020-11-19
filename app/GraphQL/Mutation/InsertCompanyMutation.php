<?php

namespace App\GraphQL\Mutation;

use Closure;
use Exception;
use App\Models\Company;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class InsertCompanyMutation extends Mutation
{
    protected $attributes = [
        'name' => 'InsertCompany'
    ];

    public function type(): Type
    {
        return GraphQL::type('company');
    }

    public function args(): array
    {
        return [
            'input' => [
                'type' => GraphQL::type('CompanyInput')
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        try {
            $company = new Company;

            $company->name = $args['input']['name'];
            $company->description = $args['input']['description'];
            $company->user_id = $args['input']['user_id'];
    
            $company->save();

            return $company;
        } catch(Exception $e) {
            return $e;
        }
    }
}