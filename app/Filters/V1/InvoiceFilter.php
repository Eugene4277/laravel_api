<?php 

namespace App\Filters\V1;

use App\Filters\BaseFilter;

class InvoiceFilter extends BaseFilter {
    protected $allowedParams = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'billedDate' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'paidDate' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'status' => ['eq', 'ne'],
    ];
    protected $dbColumnsMap = [
        'customerId' => 'customer_id',
        'paidDate' => 'paid_date',
        'billedDate' => 'billed_date',
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