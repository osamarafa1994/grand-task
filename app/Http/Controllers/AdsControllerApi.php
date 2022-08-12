<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Ads;
use DB;

class AdsControllerApi extends Controller
{
    public function filterByCategory(Request $request)
    {
        $category_id = $request->get('category_id');

        $ads = Ads::with('tags','category')->where('category_id', $category_id)->get();

        return Response::json([
            'data' => $ads
        ]);
    }

    public function filterByTag(Request $request)
    {
        $tag_ids = $request->get('tag_ids');

        $ads =  Ads::with('tags','category')->whereExists(function ($query) use($tag_ids) {
                    $query->select("ads_tags.id")
                        ->from('ads_tags')
                        ->whereRaw('ads.id = ads_tags.ads_id')
                        ->whereIn('ads_tags.tag_id', $tag_ids);
                })
                ->get();


        return Response::json([
            'data' => $ads
        ]);
    }
}
