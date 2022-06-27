<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClockIn;

use App\User;

use DB;

class ClockInController extends Controller
{
    function index(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        } 
        
        $searchuserid = "";
        if($request->has("userid")){
            $searchuserid = $request->userid;
        }
        
        $sqlstr = "select c.clockindate,c.userid,u.realname, sb.sbtime,xb.xbtime from (select distinct(date(created_at)) as clockindate,userid from clockins) as c "
                . " left join (select min(created_at) sbtime,  userid as sbuserid from clockins where citype=1 group by date(created_at),userid) as sb "
                . " on date(sb.sbtime)=c.clockindate and sb.sbuserid=c.userid "
                . " left join (select max(created_at) as xbtime,userid as xbuserid from clockins where citype=2 group by date(created_at), userid ) as xb "
                . " on date(xb.xbtime)=c.clockindate and xb.xbuserid=c.userid "
                . " left join users as u on u.id=c.userid where 1=1 ";
        
        if($searchfromdate != ""){
            $sqlstr .= " and c.clockindate >='" . $searchfromdate . "'";
        }
        
        if($searchtodate != ""){
            $sqlstr .= " and c.clockindate <='" . $searchtodate . "'";
        }
        
        if($searchuserid != "" && $searchuserid != "-1"){
            $sqlstr .= " and c.userid=" . $searchuserid;
        }
        
        $sqlstr .=  " order by c.clockindate desc ";
        
        $clockins = DB::select($sqlstr);
        
        $users = User::orderBy("id", "asc")
                ->where("username", "<>", "admin")
                ->select("id", "realname")
                ->get();
        
        return view("/stat/clockins", [
            "clockins"=>$clockins,
            "users"=>$users,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchuserid"=>$searchuserid
        ]);
    }
}
