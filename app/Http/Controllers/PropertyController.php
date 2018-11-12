<?php

namespace App\Http\Controllers;

use App\BB\Entities\Property;
use App\BB\Repositories\PropertyRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends Controller
{
    protected $properties;

    function __construct(PropertyRepository $properties)
    {
        $this->properties = $properties;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        return $this->jsonResponse(
            $request,
            $this->processPagination(
                $this->properties->all(
                    $request->query('per_page')
                        ? $request->query('per_page')
                        : 10
                )
            ),
            ['rooms', 'location.city.locations']
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param string $name
     * @return Response
     */
    public function create($name): Response
    {
        return $this->properties->add(new Property(['name' => $name]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return Response
     */
    public function show(Request $request, $id): Response
    {
        return $this->jsonResponse($request, $this->properties->find($id));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param string $name
     * @return Response
     */
    public function find(Request $request, $name): Response
    {
        return $this->jsonResponse($request, $this->properties->findByName($name));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id): Response
    {
        $property = $this->properties->find($id);
        $property->setName($request->input('name'));

        $this->properties->update($property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return Response
     */
    public function destroy(Request $request, $id): Response
    {
        return $this->jsonResponse($request, $this->properties->remove($id));
    }
}
