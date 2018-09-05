<?php

namespace App\Http\Controllers;

use App\BB\Entities\Property;
use App\BB\Repositories\PropertyRepository;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd($this->properties->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param string $name
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        $this->properties->add(new Property($name));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($this->properties->find($id)->getRooms());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
