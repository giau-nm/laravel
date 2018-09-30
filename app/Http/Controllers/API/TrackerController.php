<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SearchRepository;
use App\Repositories\configRepository;
use App\Repositories\IpdomainRepository;

class TrackerController extends Controller
{

    public function __construct(SearchRepository $searchRepo, IpdomainRepository $ipdomainRepo, configRepository $configRepo)
    {
        $this->searchRepoRepository = $searchRepo;
        $this->ipdomainRepository = $ipdomainRepo;
        $this->configRepository = $configRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->searchRepoRepository->createSearch($request);
        $response = $this->searchRepoRepository->generateNotification($this->configRepository->getConfig());
        return response()->json($response);
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

    public function checkSecurity (Request $request)
    {
        $response = $this->ipdomainRepository->checkSecurity($request);
        return response()->json(['status' => $response]);
    }
}
