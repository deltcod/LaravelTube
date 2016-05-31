<?php

namespace App\Http\Controllers;

/**
 * Class AnalyticsController.
 */
class AnalyticsController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function likesDislikes()
    {
        return view('analytics-likes-dislikes');
    }
}
