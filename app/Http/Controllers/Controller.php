<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * remove null fields in languages.
     * @param Request $request
     * @return Request
     */
    public function removeNullFields(Request $request)
    {
        $request = $request->all();
        foreach ($request as $inputs => $value) {
            if (is_array($value)) {
                foreach ($value as $items => $item) {
                    if ($item == null)
                        unset($request[$inputs][$items]);

                }
            }
        }
        $newRequest = new Request();
        $newRequest->initialize(array_filter($request));
        return $newRequest;
    }

}
