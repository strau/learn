<?php

namespace App\Http\Controllers\TestVue;

use Faker\Generator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class CrudsController extends Controller
{
    public $id = 1;
    public $cruds = [];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \response($this->getData(), \Illuminate\Http\Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Generator $faker)
    {
        $crud = [];
        $crud['id']    = $this->getId() + 1;
        $crud['name']  = $faker->lexify('??????');
        $crud['color'] = $faker->boolean ? 'red': 'green';
        $cruds   = array_merge($this->getData(), [$crud]);

        $this->setId($this->getId() + 1);
        $this->setData($cruds);

        return response($crud, \Illuminate\Http\Response::HTTP_CREATED);
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
        //
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
        $data = $this->getData();
        foreach ($data as &$crud) {
            if ($crud['id'] == $id) {
                $crud['color'] = $request->color;
            }
        }
        $this->setData($data);

        return response(null, \Illuminate\Http\Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->getData();
        foreach ($data as $k => $crud) {
            if ($crud['id'] == $id) {
                unset($data[$k]);
            }
        }

        $this->setData($data);

        return response(null, \Illuminate\Http\Response::HTTP_OK);
    }

    public function getId()
    {
        return Cache::get('vue_id', 1);
    }

    public function getData()
    {
        return Cache::get('vue_data', []);
    }

    public function setId($id = 1)
    {
        Cache::put('vue_id', $id, 7200);
    }

    public function setData($data = [])
    {
        Cache::put('vue_data', $data, 7200);
    }
}
