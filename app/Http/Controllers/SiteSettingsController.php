<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\SellerSocialMedia;
use App\Models\GoogleAnalytic;
use Redirect;
use File;
use Hash;
use Session;
use Auth;
use DB;
use Carbon\Carbon;
use Validator;
use Response;

class SiteSettingsController extends Controller
{
    public function Get_SiteSettings()
    {
        if (Auth::check()) {
            $uid = Auth::id();
            $seller_id = Seller::where('user_id', $uid)->first()->id;
        } else {
            return redirect()->route('seller.login');
        }

        $sm = SellerSocialMedia::where('seller_id', $seller_id)->first();
        $ga=GoogleAnalytic::where('seller_id', $seller_id)->first();
        return view('seller.accounts&settings.site_settings', compact('sm','ga'));
    }

    public function Post_SocialMedia(Request $request)
    {

        if (Auth::check()) {
            $uid = Auth::id();
            $seller_id = Seller::where('user_id', $uid)->first()->id;
        } else {
            return redirect()->route('seller.login');
        }

        $sm = new SellerSocialMedia();
        $sm->seller_id = $seller_id;
        $sm->facebook = $request->Facebook;
        $sm->twitter = $request->Twitter;
        $sm->google = $request->Google;
        $sm->youtube = $request->YouTube;
        $sm->linkedin = $request->LinkedIn;
        $sm->telegram = $request->Telegram;
        $sm->whatsapp = $request->Whatsapp;
        $sm->instagram = $request->Instagram;
        $sm->rss = $request->rss;

        try {
            $sm->save();
            return response()->json(['status' => 1, 'msg' => 'created successfull..!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e,]);
        }
    }
    public function PostEdit_SocialMedia(Request $request)
    {
        $id = $request->sm_id;

        try {
            SellerSocialMedia::where('id', $id)->update([
                'facebook' => $request->Facebook,
                'twitter' => $request->Twitter,
                'google' => $request->Google,
                'youtube' => $request->YouTube,
                'linkedin' => $request->LinkedIn,
                'telegram' => $request->Telegram,
                'whatsapp' => $request->Whatsapp,
                'instagram' => $request->Instagram,
                'rss' => $request->rss,
            ]);
            return response()->json(['status' => 1, 'msg' => 'Updated successfull..!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e,]);
        }
    }

    public function Post_Google_Analytics(Request $request){
        
         if (Auth::check()) {
            $uid = Auth::id();
            $seller_id = Seller::where('user_id', $uid)->first()->id;
        } else {
            return redirect()->route('seller.login');
        }

        $ga = new GoogleAnalytic();
        $ga->seller_id = $seller_id;
        $ga->analytics_id = $request->GoogleAnalyticsId;
         $ga->ad_conversion_id = $request->GoogleAdConversionId;
          $ga->ad_conversion_label = $request->GoogleAdConversionLabel;
   

        try {
            $ga->save();
            return response()->json(['status' => 1, 'msg' => 'created successfull..!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e,]);
        }

    }
    public function PostEdit_Google_Analytics(Request $request){

$id = $request->g_id;

        try {
            GoogleAnalytic::where('id', $id)->update(['analytics_id'=> $request->GoogleAnalyticsId,
                                                       'ad_conversion_id'=>$request->GoogleAdConversionId ,
                                                       'ad_conversion_label'=> $request->GoogleAdConversionLabel,
                                                       ]);
               return response()->json(['status' => 1, 'msg' => 'Updated successfull..!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e,]);
        }

    }
}
