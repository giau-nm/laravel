<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\SearchRepository;
use Illuminate\Http\Request;
use App\Helpers\Util;


class SearchController extends Controller
{
    public function __construct(SearchRepository $searchRepo)
    {
        $this->searchRepoRepository = $searchRepo;
    }

    public function index(Request $request)
    {
        $pageTitle = trans('label.search.lbl_search_list_heading');
        $sortLinks = $this->searchRepoRepository->getSortData($request);
        $searchs = $this->searchRepoRepository->list($request);

        return view('searchs.index', compact('pageTitle', 'sortLinks', 'searchs'));
    }
}
