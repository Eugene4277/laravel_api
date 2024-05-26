<?php 

namespace App\Filters\V1;

use App\Filters\BaseFilter;

class CustomerFilter extends BaseFilter {
    protected $allowedParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt'],
    ];
    protected $dbColumnsMap = [
        'postalCode' => 'postal_code',
    ];

    protected $operationMap = [
        'eq' => '=', 
        'gt' => '>', 
        'gte' => '>=', 
        'lt' => '<', 
        'lte' => '<=', 
        'ne' => '!='
    ];
}