<?php

namespace App\Http\Controllers;

use App\BB\DataObject;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\VarDumper\VarDumper;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /*
     * @param Request $request
     * @param mixed $data
     * @param array $collections
     * @return Response
     */
    protected function jsonResponse(Request $request, $data, array $collections = []) : Response
    {
        $data = $this->processData($data, $collections);

        if ($request->query('debug'))
            return response()->make(VarDumper::dump($data));

        return response()->json($data);
    }

    protected function processPagination(LengthAwarePaginator $paginator) {
        $paginator->appends('per_page', $paginator->perPage());

        return [
            'items' => $paginator->items(),
            'total' => $paginator->total(),
            'perPage' => $paginator->perPage(),
            'currentPage' => $paginator->currentPage(),
            'lastPage' => $paginator->lastPage(),
            'nextPage' => $paginator->nextPageUrl()
        ];
    }

    private function processData($data, $collections) {
        if ($data instanceof DataObject) {
            return $data->toArray(null, $collections);
        } elseif (is_array($data)) {
            foreach ($data as $k => $d) {
                $data[$k] = $this->processData($d, $collections);
            }

            return $data;
        }

        return $data;
    }
}
