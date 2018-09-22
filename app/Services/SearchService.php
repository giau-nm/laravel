<?php
namespace App\Services;

use App\Models\Search;
use Carbon\Carbon;

class SearchService
{
    public function createSearch($request)
    {
        $search = new Search();
        $search->user_id = '';
        $search->search_str = '';

        if ($request->user_id) $search->user_id = $request->user_id;
        if ($request->search_str) $search->search_str = $request->search_str;
        $search->created_at = Carbon::now()->toDateTimeString();
        $search->ip = $request->ip();
        $search->user_agent = $request->header('user-agent');

        return $search->save();
    }
}
