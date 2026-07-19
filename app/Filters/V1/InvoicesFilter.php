<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

/**
* Class format should be upperCamelCase
* The first letter of every word is capitalized
*
* CustomersFilter
*
* @author Mydel-Ar Asturiano
* @copyright <Company Name>
*/
class InvoicesFilter extends ApiFilter
{
        /*
        |--------------------------------------------------------------------------
        | Condition accronyms stands for
        |--------------------------------------------------------------------------
        |
        | eq - Equal
        | lt - Less than
        | lte - Less than equal
        | gt - Greater than
        | gte - Greater than equal
        | ne - Not equal
        */

        protected $safeParms = [
                'customer_id' => ['eq'],
                'amount' => ['eq','lt','lte','gt','gte'],
                'status' => ['eq','ne'],
                'billed_dated' => ['eq','lt','lte','gt','gte'],
                'paid_dated' => ['eq','lt','lte','gt','gte']
        ];

        protected $columnMap = [
                'postalCode' => 'postal_code'
        ];

        protected $operatorMap = [
                'eq' => '=',
                'lt' => '<',
                'lte' => '<=',
                'gt' => '>',
                'gte' => '>=',
                'ne' => '!='
        ];
}