<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Facebook\Facebook;

use App\Http\Requests;

class SocialitePost extends Controller
{
    public function postFacebook(Request $request)
    {
    	//Set the Facebook Credential for posting
    	$fb = new Facebook([
		  'app_id' => '579351645565112',
		  'app_secret' => '767de25a9394e327622a7f09c29ae5fa',
		  'default_graph_version' => 'v2.5',
		]);

    	//set the default timezone for date
    	date_default_timezone_set('Asia/Jakarta');
		$today = date("d F o");

		//Get request from the form
    	$kota = $request->kota;

    	//prepare the set for get the weather API
    	$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
		$yql_query = 'select item.condition from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$kota.'")';
		$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";

		// Make call with cURL
		$session = curl_init($yql_query_url);
		curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
		$json = curl_exec($session);
		// Convert JSON to PHP object
		$phpObj =  json_decode($json);
		// print_r($phpObj);

		//Get the weather string
		$cuaca = $phpObj->query->results->channel->item->condition->text;

		//Add the message
		$message = "The weather of ".$kota." at ".$today." is ".$cuaca;
		$params = [
			'message' => $message
		];

		//Get Access token from session
		$pageaccesstoken = $request->session()->get('access_token');

		//Post using Facebook API
		$fb->post('/me/feed',$params,  $pageaccesstoken );

		//Store flash success session
		$request->session()->flash('sukses','misi sukses, silahkan cek timeline Anda');

		//redirecting to facebook
		return redirect('facebook');
    }

    public function postTwitter(Request $request)
    {
    	//set the default timezone for date
    	date_default_timezone_set('Asia/Jakarta');
		$today = date("d F o");

		//Get request from the form
    	$kota = $request->kota;

		//prepare the set for get the weather API
    	$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
		$yql_query = 'select item.condition from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$kota.'")';
		$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";

		// Make call with cURL
		$session = curl_init($yql_query_url);
		curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
		$json = curl_exec($session);

		// Convert JSON to PHP object
		$phpObj =  json_decode($json);

		//Get the weather string
		$cuaca = $phpObj->query->results->channel->item->condition->text;

		//Add the message
		$message = "The weather of ".$kota." at ".$today." is ".$cuaca;
		$message2 = "cek update";
		$twitterMessage = urlencode($message2);

		//Post using URL POST Twitter API
		$postTwitterUrl = "https://api.twitter.com/1.1/statuses/update.json";
		$call = curl_init($postTwitterUrl);
		curl_setopt($call, CURLOPT_POST, "status=".$twitterMessage);
		curl_setopt($call, CURLOPT_RETURNTRANSFER,true);
		$callback = curl_exec($call);

		return $callback;
    }

    public function postGoogle(Request $request)
    {
    	//set the default timezone for date
    	date_default_timezone_set('Asia/Jakarta');
		$today = date("d F o");

		//Get request from the form
    	$kota = $request->kota;

		//prepare the set for get the weather API
    	$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
		$yql_query = 'select item.condition from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$kota.'")';
		$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";

		// Make call with cURL
		$session = curl_init($yql_query_url);
		curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
		$json = curl_exec($session);

		// Convert JSON to PHP object
		$phpObj =  json_decode($json);

		//Get the weather string
		$cuaca = $phpObj->query->results->channel->item->condition->text;

		//Add the message
		$message = "The weather of ".$kota." at ".$today." is ".$cuaca;
		$message2 = "cek update";
		$googleMessage = urlencode($message2);

		//Post using URL POST Twitter API
		$urlUserId = urlencode($request->session()->get('userId'));
		$postGoogleUrl = "https://www.googleapis.com/plusDomains/v1/people/".$urlUserId."/activities";
		$call = curl_init($postGoogleUrl);
		curl_setopt($call, CURLOPT_POST, 1);
		curl_setopt($call, CURLOPT_POSTFIELDS, "originalContent=love you");
		curl_setopt($call, CURLOPT_RETURNTRANSFER,true);
		$callback = curl_exec($call);

		var_dump($callback);
    }
}
