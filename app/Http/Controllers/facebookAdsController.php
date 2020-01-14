<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacebookApi\FacebookApiCalls;
use App\Http\Requests\DateFilterRequest;

class facebookAdsController extends Controller
{
    public function index(FacebookApiCalls $fb)
    {
        // $access_token="EAAGaTYfPjj0BACgSABEPJxAX7WEsfp66iXLofSj60IjZBrUBoCJI0ulPED8bqji8RGbnI1rKIeTwU0kgwZAZAIjvVm2modPTyBrvAImXIz40ZBhQ5SdUxaZAmUrCyoePjWHS2NsHnyxNKYcSF6ev7IgmFnlj8oefVPC92BMsy1P54R9RpT4x1u124S7jDUJgZD";
        // $user_id = "1638510629730912";
        // $url="https://graph.facebook.com/v5.0/$user_id/adaccounts/?fields=name,account_status,account_id,amount_spent&access_token=$access_token";

        $data = $fb->GetAllAccounts();
        $cont = 'first';
        $sfpagination = 0;
        $page = 1;

        $mod = $this->pushItemsInArray($data,$fb,0);
        $pag = $this->paginationHelper($data);
        return view("dashboard.basic-admin")->with([
            'spent' => $mod['spent_ammount'], 'names' => $mod['account_name'],
            'ids' => $mod['account_id'], 'status' => $mod['status'], 'next_link' => $pag['next_page'], 'prev_link' => $pag['prev_page'], "links" => $mod['links'],
            "total_pages" => $mod['total_pages'], "page" => $page, 'indexpage' => $cont, 'sfpagination' => $sfpagination,
            "startDate" => "", "endDate" => "", "searchTerm" => ""
        ]);
    }

    public function prev_paginator(Request $request, FacebookApiCalls $fb)
    {
        $data = $fb->Paginate($request->prev);
        $sf = $request->sfpagination;

        if ($sf == 0) {
            $page = $request->page - 1;
            $pag = $this->paginationHelper($data);
            $mod = $this->pushItemsInArray($data,$fb,0);
            $cont = 'first';
            // echo '<pre>';
            // print_r($mod);
            // exit;
        } else if ($sf == 2) {
            $page = $request->page - 1;
            $pag = $this->paginationHelper($data);
            $mod = $this->pushItemsInArray($data,$fb,1);

            return view("dashboard.basic-admin")->with([
                'spent' => $mod['spent_ammount'], 'names' => $mod['account_name'],
                'ids' => $mod['account_id'], 'status' => $mod['status'], 'next_link' => $pag['next_page'], 'prev_link' => $pag['prev_page'],
                "startDate" => $request->startDate, "endDate" => $request->endDate, "links" => $mod['links'], "total_pages" => $mod['total_pages'],
                "page" => $page, 'indexpage' => "", 'sfpagination' => $sf, "searchTerm" => ""
            ]);
        }
        return view("dashboard.basic-admin")->with([
            'spent' => $mod['spent_ammount'], 'names' => $mod['account_name'],
            'ids' => $mod['account_id'], 'status' => $mod['status'], 'next_link' => $pag['next_page'], 'prev_link' => $pag['prev_page'], "links" => $mod['links'],
            "total_pages" => $mod['total_pages'], "page" => $page, 'indexpage' => $cont, 'sfpagination' => $sf,
            "startDate" => "", "endDate" => "", "searchTerm" => ""
        ]);
    }
    public function next_paginator(Request $request, FacebookApiCalls $fb)
    {
        $data = $fb->Paginate($request->next);
        $sf = $request->sfpagination;

        if ($sf == 0) {
            $page = $request->page + 1;
            $pag = $this->paginationHelper($data);
            $mod = $this->pushItemsInArray($data,$fb,0);
            $cont = 'first';
        } else if ($sf == 2) {
            $page = $request->page + 1;
            $pag = $this->paginationHelper($data);
            $mod = $this->pushItemsInArray($data,$fb,1);
            return view("dashboard.basic-admin")->with([
                'spent' => $mod['spent_ammount'], 'names' => $mod['account_name'],
                'ids' => $mod['account_id'], 'status' => $mod['status'], 'next_link' => $pag['next_page'], 'prev_link' => $pag['prev_page'], "startDate" => $request->startDate,
                "endDate" => $request->endDate, "links" => $mod['links'], "total_pages" => $mod['total_pages'], 'indexpage' => "", 'sfpagination' => $sf,
                "page" => $page, "searchTerm" => ""
            ]);
        }
        return view("dashboard.basic-admin")->with([
            'spent' => $mod['spent_ammount'], 'names' => $mod['account_name'],
            'ids' => $mod['account_id'], 'status' => $mod['status'], 'next_link' => $pag['next_page'], 'prev_link' => $pag['prev_page'], 
            'links' => $mod['links'], 'total_pages' => $mod['total_pages'], "page" => $page, 'indexpage' => $cont, 'sfpagination' => $sf,
            "startDate" => "","endDate" => "", "searchTerm" => ""
        ]);
    }

    public function testFiltered(Request $request, FacebookApiCalls $fb)
    {
        $data = $fb->Combined_Filter($request->startDate, $request->endDate, $request->searchTerm);
        $next_page = "";
        $prev_page = "";
        $page = 1;
        $sf = $request->searchfilter;
        $st = $request->searchTerm;
        if ($sf == 1) {
            $mod = $this->pushItemsInArray($data,$fb,0);
            $cont = 'first';
            return view("dashboard.basic-admin")->with([
                'spent' => $mod['spent_ammount'], 'names' => $mod['account_name'],
                'ids' => $mod['account_id'], 'status' => $mod['status'], 'next_link' => $next_page, 'prev_link' => $prev_page, 
                "links" => $mod['links'], "total_pages" => $page, "page" => $page, 'indexpage' => $cont, 
                'sfpagination' => $sf, "startDate" => "", "endDate" => "", "searchTerm" => $st
            ]);
        } else if ($sf == 2 || $request->sfpagination == 2) {
            $pag = $this->paginationHelper($data);
            $mod = $this->pushItemsInArray($data,$fb,1);
            $std = $request->startDate;
            $end = $request->endDate;
            return view("dashboard.basic-admin")->with([
                'spent' => $mod['spent_ammount'], 'names' => $mod['account_name'],
                'ids' => $mod['account_id'], 'status' => $mod['status'], 'next_link' => $pag['next_page'], 'prev_link' => $pag['prev_page'],
                "startDate" => $std, "endDate" => $end, "links" => $mod['links'], "total_pages" => $mod['total_pages'],
                "page" => $page, 'indexpage' => "", 'sfpagination' => $sf, "searchTerm" => ""
            ]);
        } else if ($sf == 3) {
            $mod = $this->pushItemsInArray($data,$fb,1);
            $std = $request->startDate;
            $end = $request->endDate;
            return view("dashboard.basic-admin")->with([
                'spent' => $mod['spent_ammount'], 'names' => $mod['account_name'],
                'ids' => $mod['account_id'], 'status' => $mod['status'], 'next_link' => $next_page, 'prev_link' => $prev_page,
                "startDate" => $std, "endDate" => $end, "links" => $mod['links'], "total_pages" => $mod['total_pages'],
                "page" => $page, 'indexpage' => "", 'sfpagination' => $sf, "searchTerm" => $st
            ]);
        }
    }

    public function last_page(Request $request, FacebookApiCalls $fb)
    {
        $sf = $request->sfpagination;
        $account_id = array();
        $links = array();
        $status =array();
        $spent_ammount =array();
        $account_name =array();
        $total_pages = $fb->getPageCount();
        $page=$total_pages;

        if ($sf == 0) {
            $data = $fb->getAllData();
            $data = $data["data"];
            $total_data = count($data);
            $left_data = $total_data - floor(count($data)/25)*25;
            $data = array_slice($data ,-$left_data,$left_data );
            
            for($i=0 ; $i<=count($data)-1; $i++){
                $id =$data[$i]['account_id'] ;
                $status_data=$data[$i]['account_status'];
                $spent=$data[$i]['amount_spent'];
                $name=$data[$i]['name'];
                $link = $fb->createLink($data[$i]['account_id'] ); 
                array_push($links, $link);
                array_push($account_id , $id);
                array_push($status , $status_data);
                array_push($account_name , $name);
                array_push($spent_ammount, $spent);
            }
            return view("dashboard.basic-admin")->with(['spent'=>$spent_ammount ,'names'=>$account_name,
            'ids'=>$account_id,'status'=>$status, 'indexpage' => "first", 'sfpagination' => $sf,"startDate"=>"", "endDate"=>"",
            "links"=>$links , "total_pages"=>$total_pages ,"page"=>$page,'next_link'=>"",'prev_link'=>"", "searchTerm" => ""]);
        } 
        else if ($sf == 2) {
            $data = $fb->getAllDataDateFilter($request->startDate , $request->endDate);
            $data = $data["data"];
            $total_data = count($data);
            $left_data = $total_data - floor(count($data)/25)*25;
            $data = array_slice($data ,-17,17 );
        
            for($i=0; $i<=count($data)-1 ; $i++){
                $id =$data[$i]['account_id'] ;
                $status_data=$data[$i]['account_status'];
                $link = $fb->createLink($data[$i]['account_id'] ); 
            
                $name=$data[$i]['name'];
                $has = array_keys($data[$i]);
                if( in_array('insights',$has)){
                    $spent=$data[$i]['insights']['data'][0]['spend'];
                    array_push($spent_ammount, $spent);
                }
                else{
                    array_push($spent_ammount, "0");
                }
                array_push($account_id , $id);
                array_push($status , $status_data);
                array_push($account_name , $name);
                array_push($links, $link);
            }
            return view("dashboard.basic-admin")->with(['spent'=>$spent_ammount ,'names'=>$account_name,
            'ids'=>$account_id,'status'=>$status,'next_link'=>"",'prev_link'=>'', 'indexpage' => "", 'sfpagination' => $sf,
             "startDate"=>$request->startDate , "endDate"=>$request->endDate,"links"=>$links , "total_pages"=>$total_pages,
             "page"=>$total_pages, "searchTerm" => ""]);
        }
    }

    public function paginationHelper($data){
        $has = array_keys($data["paging"]);
        if (in_array('next', $has)) {
            $next_page = $data['paging']['next'];
        } else {
            $next_page = "";
        }
        if (in_array('previous', $has)) {
            $prev_page = $data['paging']['previous'];
        } else {
            $prev_page = "";
        }
        return (["next_page"=>$next_page,"prev_page"=>$prev_page]);
    }

    public function pushItemsInArray($data,$fb,$withInsights){
        $account_id = array();
        $status = array();
        $spent_ammount = array();
        $account_name = array();
        $links = array();
        $total_pages = $fb->getPageCount();
        
        for ($i = 0; $i <= count($data['data']) - 1; $i++) {
            $id = $data['data'][$i]['account_id'];
            $status_data = $data['data'][$i]['account_status'];
            $link = $fb->createLink($data['data'][$i]['account_id']);
            $name = $data['data'][$i]['name'];
            if($withInsights==1){
                $has = array_keys($data['data'][$i]);
                if (in_array('insights', $has)) {
                    $spent = $data['data'][$i]['insights']['data'][0]['spend'];
                    array_push($spent_ammount, $spent);
                } else {
                    array_push($spent_ammount, "0");
                }
            }
            else{
                $spent = $data['data'][$i]['amount_spent'];
                array_push($spent_ammount, $spent);
            }
            array_push($links, $link);
            array_push($account_id, $id);
            array_push($status, $status_data);
            array_push($account_name, $name);
        }
        return (["account_id"=>$account_id,"status"=>$status,"spent_ammount"=>$spent_ammount,"account_name"=>$account_name,
        "links"=>$links,"total_pages"=>$total_pages]);
    }

    /*
    public function dashboard_status_filtered(Request $request, FacebookApiCalls $fb)
    {
        $account_id = array();
        $status = array();
        $spent_ammount = array();
        $account_name = array();
        $total_pages = $fb->getPageCount();
        $data = $fb->GetAllAccounts();
        $has = array_keys($data["paging"]);

        if (in_array('next', $has)) {
            $next_page = $data['paging']['next'];
        } else {
            $next_page = "";
        }
        if (in_array('previous', $has)) {
            $prev_page = $data['paging']['previous'];
        } else {
            $prev_page = "";
        }
        // dd($prev_page);

        // closed ==101
        //active ==1
        //unsettled ==3
        //disable ==2

        if ($request->has('active')) {
            for ($i = 0; $i < count($data['data']) - 1; $i++) {
                if ($data['data'][$i]['account_status'] == 1) {
                    $id = $data['data'][$i]['account_id'];
                    $status_data = $data['data'][$i]['account_status'];
                    $spent = $data['data'][$i]['amount_spent'];
                    $name = $data['data'][$i]['name'];
                    array_push($account_id, $id);
                    array_push($status, $status_data);
                    array_push($account_name, $name);
                    array_push($spent_ammount, $spent);
                }
            }
            if (count($account_id) < 25) {
                $number = 25 - count($account_id);
                $data = $fb->getMoreData($next_page, $number);
                for ($i = 0; $i < $number; $i++) {
                    if ($data['data'][$i]['account_status'] == 1) {
                        $id = $data['data'][$i]['account_id'];
                        $status_data = $data['data'][$i]['account_status'];
                        $spent = $data['data'][$i]['amount_spent'];
                        $name = $data['data'][$i]['name'];
                        array_push($account_id, $id);
                        array_push($status, $status_data);
                        array_push($account_name, $name);
                        array_push($spent_ammount, $spent);
                    }
                }
                // dd($url); 
                $has = array_keys($data["paging"]);

                if (in_array('next', $has)) {
                    $next_page = $data['paging']['next'];
                } else {
                    $next_page = "";
                }
                if (in_array('previous', $has)) {
                    $prev_page = $data['paging']['previous'];
                } else {
                    $prev_page = "";
                }
                $next_page = $next_page . "&limit=25";
                $prev_page = $prev_page . "&limit=25";
                // dd($next_page);
            }
        }

        if ($request->has('closed')) {
            for ($i = 0; $i < count($data['data']) - 1; $i++) {
                if ($data['data'][$i]['account_status'] == 101) {
                    $id = $data['data'][$i]['account_id'];
                    $status_data = $data['data'][$i]['account_status'];
                    $spent = $data['data'][$i]['amount_spent'];
                    $name = $data['data'][$i]['name'];
                    array_push($account_id, $id);
                    array_push($status, $status_data);
                    array_push($account_name, $name);
                    array_push($spent_ammount, $spent);
                }
            }
            if (count($account_id) < 25) {
                $number = 25 - count($account_id);

                $data = $fb->getMoreData($next_page, $number);
                // dd($data);
                for ($i = 0; $i < $number; $i++) {
                    if ($data['data'][$i]['account_status'] == 101) {
                        $id = $data['data'][$i]['account_id'];
                        $status_data = $data['data'][$i]['account_status'];
                        $spent = $data['data'][$i]['amount_spent'];
                        $name = $data['data'][$i]['name'];
                        array_push($account_id, $id);
                        array_push($status, $status_data);
                        array_push($account_name, $name);
                        array_push($spent_ammount, $spent);
                    }
                }
                dd($account_id);
                $has = array_keys($data["paging"]);

                if (in_array('next', $has)) {
                    $next_page = $data['paging']['next'];
                } else {
                    $next_page = "";
                }
                if (in_array('previous', $has)) {
                    $prev_page = $data['paging']['previous'];
                } else {
                    $prev_page = "";
                }
                $next_page = $next_page . "&limit=25";
                $prev_page = $prev_page . "&limit=25";
                // dd($next_page);
            }
        }


        if ($request->has('disabled')) {
            for ($i = 0; $i < count($data['data']) - 1; $i++) {
                if ($data['data'][$i]['account_status'] == 2) {
                    $id = $data['data'][$i]['account_id'];
                    $status_data = $data['data'][$i]['account_status'];
                    $spent = $data['data'][$i]['amount_spent'];
                    $name = $data['data'][$i]['name'];
                    array_push($account_id, $id);
                    array_push($status, $status_data);
                    array_push($account_name, $name);
                    array_push($spent_ammount, $spent);
                }
            }
        }


        if ($request->has('unsettled')) {
            for ($i = 0; $i < count($data['data']) - 1; $i++) {
                if ($data['data'][$i]['account_status'] == 3) {
                    $id = $data['data'][$i]['account_id'];
                    $status_data = $data['data'][$i]['account_status'];
                    $spent = $data['data'][$i]['amount_spent'];
                    $name = $data['data'][$i]['name'];
                    array_push($account_id, $id);
                    array_push($status, $status_data);
                    array_push($account_name, $name);
                    array_push($spent_ammount, $spent);
                }
            }
        }

        dd($spent_ammount);
        return view("dashboard.status_filter")->with([
            'spent' => $spent_ammount, 'names' => $account_name,
            'ids' => $account_id, 'status' => $status, 'next_link' => $next_page, 'prev_link' => $prev_page
        ]);
    }
    */
}
