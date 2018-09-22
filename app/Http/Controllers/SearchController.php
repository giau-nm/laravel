<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Services\SearchService;
use Illuminate\Http\Request;
use App\Helpers\Util;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchService = new SearchService();
        $searchService->createSearch($request);
        return response()->json([
        	'isShowNotification' => false,
        	'notificationData' => [
        		'type' => 'basic',
			    'iconUrl' => url('/images/icons/icon_test.jpg'),
			    'title' => 'Test Title',
			    'message' => 'Test message',
			    'eventTime' => 5000,
			    // 'imageUrl' => url('/images/pictures/picture1.jpg'),
        	]
		]);
    }
}
