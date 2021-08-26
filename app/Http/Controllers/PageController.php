<?php


namespace App\Http\Controllers;
use App\page;

class PageController extends Controller
{
    public function __construct()
    {
    }

    public function index($slug = null)
    {
        $pages = PageController::select('page_name','slug')
            ->where('status', '=', 'active')
            ->get();

        if($slug === null) {
            return view('index', ['pageSlugs' => $pages->toArray()]);
        } else {
            $pageContent = PageController::where('slug', '=', $slug)
                ->where('status', '=', 'active')
                ->first();

            if (is_object($pageContent)) {
                return view('page', ['pageSlugs' => $pages->toArray(),
                    'pageTitle' => $pageContent->page_name,
                    'pageContent' => $pageContent->content
                ]);
            } else {
                return 'page not found';
            }
        }
    }
}
