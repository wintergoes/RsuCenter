<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DataApiClient;
use App\Datatypes;

class DataApiClientController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }    
    
    function index(Request $request){
        $dataapiclients = DataApiClient::orderBy('id', 'desc')
                ->paginate(20);
        
        return view('/other/dataapiclients', [
           "dataapiclients" => $dataapiclients 
        ]);
    }
    
    function addDataApiClient(Request $request){
        $datatype = new Datatypes();
        $newkey = $datatype->guid();
        
        return view('/other/adddataapiclient', [
            "newkey" => $newkey
        ]);
    }

    function addDataApiClientSave(Request $request){
        if($request->clientname == "" || $request->clientkey == ""){
            return "缺少参数!";
        }
        
        $client = new DataApiClient();
        $client->clientname = $request->clientname;
        $client->clientkey = $request->clientkey;
        $client->clientisvalid = $request->clientisvalid;
        $client->clientremark = $request->clientremark;
        $client->save();
        
        return redirect('/dataapiclients');
    }

    function editDataApiClient(Request $request){
        $clients = DataApiClient::where('id', $request->clientid)
                ->get();
        
        if (count($clients) == 0){
            return "不存在该数据![clientid: " . $request->clientid . "]";
        }
        
        return view("/other/adddataapiclient", [
            "apiclient" => $clients[0]
        ]);
    }

    function editDataApiClientSave(Request $request){
        if($request->clientname == "" || $request->clientkey == ""){
            return "缺少参数!";
        }
        
        $clients = DataApiClient::where('id', $request->clientid)
                ->get();
        
        if (count($clients) == 0){
            return "不存在该数据![clientid: " . $request->clientid . "]";
        }        
        
        $client = $clients[0];
        $client->clientname = $request->clientname;
        $client->clientkey = $request->clientkey;
        $client->clientisvalid = $request->clientisvalid;
        $client->clientremark = $request->clientremark;
        $client->save(); 
        
        return redirect('/dataapiclients');
    }  
}
