<?php 

namespace App\Filters;

use Illuminate\Http\Request;

class BaseFilter {
    protected $allowedParams = [];
    protected $dbColumnsMap = [];

    protected $operationMap = [];

    public function transform(Request $request) {
        $query = [];

        foreach ($this->allowedParams as $param => $operations) {
            $q = $request->query($param);

            if (!isset($q)) {
                continue;
            }

            $column = $this->dbColumnsMap[$param] ?? $param;

            foreach ($operations as $op) {
                if (isset($q[$op])) {
                    $query[] = [$column, $this->operationMap[$op], $q[$op]];
                }
            }
        }
        return $query;
    }
}