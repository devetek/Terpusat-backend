<?php

namespace App\GraphQL\Mutation;

use Closure;
use Exception;
use App\Models\Company;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateCompanyMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateCompany'
    ];

    public function type(): Type
    {
        return GraphQL::type('company');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'input' => [
                'type' => GraphQL::type('CompanyInput')
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        try {
            $company = Company::find($args['id']);

            if (@$args['input']['name']) {
                $company->name = $args['input']['name'];
            }

            if (@$args['input']['description']) {
                $company->description = $args['input']['description'];
            }

            if (@$args['input']['user_id']) {
                $company->user_id = $args['input']['user_id'];
            }

            if (@$company) {
                $company->save();
            }

            return $company;
        } catch(Exception $e) {
            return $e;
        }
    }
}