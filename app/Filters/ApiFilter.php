<?php

namespace App\Filters;

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
class ApiFilter
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

        protected $safeParms = [];

        protected $columnMap = [];

        protected $operatorMap = [];

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