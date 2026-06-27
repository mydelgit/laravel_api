<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;

/**
* Class format should be upperCamelCase
* The first letter of every word is capitalized
*
* CustomersFilter
*
* @author Mydel-Ar Asturiano
* @copyright <Company Name>
*/
class CustomersFilter extends ApiFilter
{
        /*
        |--------------------------------------------------------------------------
        | Condition accronyms stands for
        |--------------------------------------------------------------------------
        |
        | eq - Equal
        | gt - Greater than
        | gte - Greater than equal
        | lt - Less than
        | lte - Less than equal
        */

        protected $safeParms = [
                'name' => ['eq'],
                'type' => ['eq'],
                'email' => ['eq'],
                'address' => ['eq'],
                'city' => ['eq'],
                'state' => ['eq'],
                'postalCode' => ['eq','gt','lt']
        ];

        protected $columnMap = [
                'postalCode' => 'postal_code'
        ];

        protected $operatorMap = [
                'eq' => '=',
                'lt' => '<',
                'lte' => '<=',
                'gt' => '>',
                'gte' => '>='
        ];

        public function transform(Request $request) {
                $eloQuery = [];

                foreach ($this->safeParms as $parm => $operators) {
                        $query = $request->query($parm);

                        if (!isset($query)) {
                                continue;
                        }

                        $column = $this->columnMap[$parm] ?? $parm;

                        foreach ($operators as $operator) {
                                if (isset($query[$operator])) {
                                        $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                                }
                        }
                }

                return $eloQuery;
        }
}