<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class VideoController
 * @package App\Http\Controllers
 */
class VideoController extends ApiController
{


    /**
     * VideoController constructor.
     */
    public function __construct()
    {

    }

    /**
     * Return all Videos
     */
    public function index()
    {
        //TODO
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //TODO
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //TODO
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        //TODO
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {

    }
}
