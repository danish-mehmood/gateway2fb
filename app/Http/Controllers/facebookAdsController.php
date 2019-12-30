<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacebookApi\FacebookApiCalls;
use App\Http\Requests\DateFilterRequest;
class facebookAdsController extends Controller
{
    //
    
//    static $page_number=0;
//    static function getIncrementedPageNumber(){
//     // $page = self::$page_number+1;
//     return self::$page_number++;

//  } 
//   static function getDecrementedPageNumber(){
//     //  $page = self::$page_number-1;
//      return self::$page_number--;

//   } 

    public function index( FacebookApiCalls $fb){
        // $access_token="EAAGaTYfPjj0BACgSABEPJxAX7WEsfp66iXLofSj60IjZBrUBoCJI0ulPED8bqji8RGbnI1rKIeTwU0kgwZAZAIjvVm2modPTyBrvAImXIz40ZBhQ5SdUxaZAmUrCyoePjWHS2NsHnyxNKYcSF6ev7IgmFnlj8oefVPC92BMsy1P54R9RpT4x1u124S7jDUJgZD";
        // $user_id = "1638510629730912";
        // $url="https://graph.facebook.com/v5.0/$user_id/adaccounts/?fields=name,account_status,account_id,amount_spent&access_token=$access_token";
        
        $account_id = array();
        $links = array();
        $status =array();
        $spent_ammount =array();
        $account_name =array();
        $data = $fb->GetAllAccounts();
        
        $total_pages = $fb->getPageCount();
        // dd($total_pages);
        $page = 1;

    
     
        
        // if(count($data['paging'])==3){
        //     $next_page =$data['paging']['next'];
        //     $prev_page =$data['paging']['previous'];
        // }
        // else{
        //     $next_page =$data['paging']['next'];
        //     $prev_page="";
        // }

        $has=array_keys($data["paging"]);
        
        if(in_array('next',$has)){
            $next_page=$data['paging']['next'];
        }
        else{
            $next_page="";
        }
        if(in_array('previous',$has)){
            $prev_page=$data['paging']['previous'];
        }
        else{
            $prev_page="";
        }
        // dd($prev_page);
            
        


        for($i=0 ; $i<count($data['data'])-1 ; $i++){
            $id =$data['data'][$i]['account_id'] ;
            $status_data=$data['data'][$i]['account_status'];
            $spent=$data['data'][$i]['amount_spent'];
            $name=$data['data'][$i]['name'];
            $link = $fb->createLink($data['data'][$i]['account_id'] ); 
            array_push($links, $link);
            array_push($account_id , $id);
            array_push($status , $status_data);
            array_push($account_name , $name);
            array_push($spent_ammount, $spent);
           
           
        }
        //   dd($links);
        return view("dashboard.basic-admin")->with(['spent'=>$spent_ammount ,'names'=>$account_name,
        'ids'=>$account_id,'status'=>$status,'next_link'=>$next_page
        ,'prev_link'=>$prev_page ,"links"=>$links  , "page"=>$page , "total_pages"=>$total_pages]);



    
    }

    public function prev_paginator(Request $request ,FacebookApiCalls $fb){
        $data = $fb->Paginate($request->prev);
       
        $account_id = array();
          $status =array();
          $spent_ammount =array();
          $account_name =array();
          $links = array();
          $total_pages = $fb->getPageCount();
          $page=$request->page-1;
          $has=array_keys($data["paging"]);
        //  dd($data); 
          if(in_array('next',$has)){
              $next_page=$data['paging']['next'];
          }
          else{
              $next_page="";
          }
          if(in_array('previous',$has)){
              $prev_page=$data['paging']['previous'];
          }
          else{
              $prev_page="";
          }
          
          for($i=0 ; $i<=count($data['data'])-1; $i++){
              $id =$data['data'][$i]['account_id'] ;
              $status_data=$data['data'][$i]['account_status'];
              $spent=$data['data'][$i]['amount_spent'];
              $name=$data['data'][$i]['name'];
              $link = $fb->createLink($data['data'][$i]['account_id'] ); 
              array_push($links, $link);
              array_push($account_id , $id);
              array_push($status , $status_data);
              array_push($account_name , $name);
              array_push($spent_ammount, $spent);
             
          }
  
          return view("dashboard.basic-admin")->with(['spent'=>$spent_ammount ,'names'=>$account_name,
          'ids'=>$account_id,'status'=>$status,'next_link'=>$next_page,'prev_link'=>$prev_page,"links"=>$links, "total_pages"=>$total_pages
           , "page"=>$page]);
  
    
      }
    public function next_paginator(Request $request ,FacebookApiCalls $fb){
      $data = $fb->Paginate($request->next);
    //   dd(gettype($request->next));
      $account_id = array();
    //   $page =$this->getIncrementedPageNumber();
        $status =array();
        $spent_ammount =array();
        $account_name =array();
        $links = array();
        $page=$request->page+1;
        // dd($page);
        // dd($page);
        $total_pages = $fb->getPageCount();
      
        $has=array_keys($data["paging"]);
    //    dd($data); 
        if(in_array('next',$has)){
            $next_page=$data['paging']['next'];
        }
        else{
            $next_page="";
        }
        if(in_array('previous',$has)){
            $prev_page=$data['paging']['previous'];
        }
        else{
            $prev_page="";
        }
        
        for($i=0 ; $i<=count($data['data'])-1; $i++){
            $id =$data['data'][$i]['account_id'] ;
            $status_data=$data['data'][$i]['account_status'];
            $spent=$data['data'][$i]['amount_spent'];
            $name=$data['data'][$i]['name'];
            $link = $fb->createLink($data['data'][$i]['account_id'] ); 
            array_push($links, $link);
            array_push($account_id , $id);
            array_push($status , $status_data);
            array_push($account_name , $name);
            array_push($spent_ammount, $spent);
           
        }

        return view("dashboard.basic-admin")->with(['spent'=>$spent_ammount ,'names'=>$account_name,
        'ids'=>$account_id,'status'=>$status,'next_link'=>$next_page,'prev_link'=>$prev_page,"links"=>$links
        , "total_pages"=>$total_pages , "page"=>$page]);

  
    }

    public function  filtered(Request $request , FacebookApiCalls $fb){
    //    dd($request->startDate);
    $this->validate($request,[
        'endDate'        => 'required|date|date_format:Y-m-d|after:startDate',
        // 'startDate'        => 'required|date|date_format:Y-m-d|before:endDate',
    ]);
       $data =$fb->Date_filter($request->startDate, $request->endDate);
        $account_id = array();
        $status =array();
        $spent_ammount =array();
        $account_name =array();
        $total_pages = $fb->getPageCount();
        $next_page ="";
        $prev_page ="";
        $start_date = $request->startDate;
        $end_date = $request->endDate;
        $links = array();
        $page = 1;
        // dd($data);
        //  dd(gettype($request->startDate));
        $has=array_keys($data["paging"]);
        
        if(in_array('next',$has)){
            $next_page=$data['paging']['next'];
        }
        else{
            $next_page="";
        }
        if(in_array('previous',$has)){
            $prev_page=$data['paging']['previous'];
        }
        else{
            $prev_page="";
        }

      
        for($i=0; $i<=count($data['data'])-1 ; $i++){
            $id =$data['data'][$i]['account_id'] ;
            $status_data=$data['data'][$i]['account_status'];
            $link = $fb->createLink($data['data'][$i]['account_id'] ); 
            
            
            $name=$data['data'][$i]['name'];
            $has = array_keys($data['data'][$i]);
            if( in_array('insights',$has)){
                $spent=$data['data'][$i]['insights']['data'][0]['spend'];
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

        // dd($spent_ammount);
    //   dd($data);
    //    return view("dashboard.date-filter");
        
           
   

    return view("dashboard.date-filter")->with(['spent'=>$spent_ammount ,'names'=>$account_name,
    'ids'=>$account_id,'status'=>$status,'next_link'=>$next_page,'prev_link'=>$prev_page,
         "startDate"=>$start_date , "endDate"=>$end_date,"links"=>$links , "total_pages"=>$total_pages,
         "page"=>$page]);
    

}

public function next_date_paginator(Request $request , FacebookApiCalls $fb){
// dd($request->startDate);
    $data = $fb->Paginate($request->next);
    $account_id = array();
      $status =array();
      $page = $request->page+1;
      $spent_ammount =array();
      $account_name =array();
      $total_pages = $fb->getPageCount();
      $links = array();
    
      $has=array_keys($data["paging"]);
      
      if(in_array('next',$has)){
          $next_page=$data['paging']['next'];
      }
      else{
          $next_page="";
      }
      if(in_array('previous',$has)){
          $prev_page=$data['paging']['previous'];
          
      }
      else{
          $prev_page="";
      }
      
      for($i=0 ; $i<=count($data['data'])-1 ; $i++){
        $id =$data['data'][$i]['account_id'] ;
        $status_data=$data['data'][$i]['account_status'];
        $link = $fb->createLink($data['data'][$i]['account_id'] ); 
        array_push($links, $link);
        
        $name=$data['data'][$i]['name'];
        $has = array_keys($data['data'][$i]);
        if( in_array('insights',$has)){
            $spent=$data['data'][$i]['insights']['data'][0]['spend'];
            array_push($spent_ammount, $spent);
        }
        else{
            array_push($spent_ammount, "0");
        }
        array_push($account_id , $id);
        array_push($status , $status_data);
        array_push($account_name , $name);
        
         
      }

      return view("dashboard.date-filter")->with(['spent'=>$spent_ammount ,'names'=>$account_name,
      'ids'=>$account_id,'status'=>$status,'next_link'=>$next_page,'prev_link'=>$prev_page,"startDate"=>$request->startDate,
      "endDate"=>$request->endDate,"links"=>$links, "total_pages"=>$total_pages,
      "page"=>$page]);
}


public function prev_date_paginator(Request $request , FacebookApiCalls $fb){

    $data = $fb->Paginate($request->prev);
    $account_id = array();
      $status =array();
      $spent_ammount =array();
      $total_pages = $fb->getPageCount();
      $account_name =array();
      $links = array();
      $page = $request->page-1;
    
      $has=array_keys($data["paging"]);
      
      if(in_array('next',$has)){
          $next_page=$data['paging']['next'];
      }
      else{
          $next_page="";
      }
      if(in_array('previous',$has)){
          $prev_page=$data['paging']['previous'];
          
      }
      else{
          $prev_page="";
      }
      
      for($i=0 ; $i<=count($data['data'])-1 ; $i++){
        $id =$data['data'][$i]['account_id'] ;
        $status_data=$data['data'][$i]['account_status'];
        $link = $fb->createLink($data['data'][$i]['account_id'] ); 
        array_push($links, $link);
        
        $name=$data['data'][$i]['name'];
        $has = array_keys($data['data'][$i]);
        if( in_array('insights',$has)){
            $spent=$data['data'][$i]['insights']['data'][0]['spend'];
            array_push($spent_ammount, $spent);
        }
        else{
            array_push($spent_ammount, "0");
        }
        array_push($account_id , $id);
        array_push($status , $status_data);
        array_push($account_name , $name);
        
         
      }

      return view("dashboard.date-filter")->with(['spent'=>$spent_ammount ,'names'=>$account_name,
      'ids'=>$account_id,'status'=>$status,'next_link'=>$next_page,'prev_link'=>$prev_page,
      "startDate"=>$request->startDate,"endDate"=>$request->endDate,"links"=>$links
      , "total_pages"=>$total_pages,
      "page"=>$page]);
}

public function last_page(FacebookApiCalls $fb){
    
    $data = $fb->getAllData();
    $data = $data["data"];
    // dd(count($data["data"]));
    $total_data = count($data);
    $left_data = $total_data - floor(count($data)/25)*25;
    $data = array_slice($data ,-17,17 );
    // dd($final_data);
    $account_id = array();
    $links = array();
    $status =array();
    $spent_ammount =array();
    $account_name =array();
    $total_pages = $fb->getPageCount();
    $page=$total_pages;
    
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
    'ids'=>$account_id,'status'=>$status,
     "links"=>$links , "total_pages"=>$total_pages ,"page"=>$page,'next_link'=>"",'prev_link'=>""]);
    
}

public function last_page_date_filter(Request $request , FacebookApiCalls $fb){
 
$data = $fb->getAllDataDateFilter($request->startDate , $request->endDate);
$data = $data["data"];
    // dd(count($data["data"]));
    $total_data = count($data);
    $left_data = $total_data - floor(count($data)/25)*25;
    $data = array_slice($data ,-17,17 );
    // dd($final_data);
    $account_id = array();
    $links = array();
    $status =array();
    $spent_ammount =array();
    $account_name =array();
    $total_pages = $fb->getPageCount();
    $page=$total_pages;
    
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


    return view("dashboard.date-filter")->with(['spent'=>$spent_ammount ,'names'=>$account_name,
    'ids'=>$account_id,'status'=>$status,'next_link'=>"",'prev_link'=>"",
         "startDate"=>$request->startDate , "endDate"=>$request->endDate,"links"=>$links , "total_pages"=>$total_pages,
         "page"=>$total_pages]);

  

}


public function dashboard_status_filtered(Request $request , FacebookApiCalls $fb){
    $account_id = array();
    $status =array();
    $spent_ammount =array();
    $account_name =array();
    $total_pages = $fb->getPageCount();
    $data = $fb->GetAllAccounts();
   
    
    // if(count($data['paging'])==3){
    //     $next_page =$data['paging']['next'];
    //     $prev_page =$data['paging']['previous'];
    // }
    // else{
    //     $next_page =$data['paging']['next'];
    //     $prev_page="";
    // }

    $has=array_keys($data["paging"]);
    
    if(in_array('next',$has)){
        $next_page=$data['paging']['next'];
    }
    else{
        $next_page="";
    }
    if(in_array('previous',$has)){
        $prev_page=$data['paging']['previous'];
    }
    else{
        $prev_page="";
    }
    // dd($prev_page);
        
    // closed ==101
    //active ==1
    //unsettled ==3
    //disable ==2

    if($request->has('active')){
    for($i=0 ; $i<count($data['data'])-1 ; $i++){
        if($data['data'][$i]['account_status'] ==1){
        $id =$data['data'][$i]['account_id'] ;
        $status_data=$data['data'][$i]['account_status'];
        $spent=$data['data'][$i]['amount_spent'];
        $name=$data['data'][$i]['name'];
        array_push($account_id , $id);
        array_push($status , $status_data);
        array_push($account_name , $name);
        array_push($spent_ammount, $spent);
    }
       
    }
    if(count($account_id)<25){
        $number = 25-count($account_id);
        $data = $fb->getMoreData($next_page,$number); 
        for($i=0 ; $i<$number ; $i++){
            if($data['data'][$i]['account_status'] ==1){
            $id =$data['data'][$i]['account_id'] ;
            $status_data=$data['data'][$i]['account_status'];
            $spent=$data['data'][$i]['amount_spent'];
            $name=$data['data'][$i]['name'];
            array_push($account_id , $id);
            array_push($status , $status_data);
            array_push($account_name , $name);
            array_push($spent_ammount, $spent);
        }
           
        }
        // dd($url); 
        $has=array_keys($data["paging"]);
    
        if(in_array('next',$has)){
            $next_page=$data['paging']['next'];
        }
        else{
            $next_page="";
        }
        if(in_array('previous',$has)){
            $prev_page=$data['paging']['previous'];
        }
        else{
            $prev_page="";
        }
        $next_page = $next_page."&limit=25";
        $prev_page = $prev_page."&limit=25";
        // dd($next_page);
    }
}

if($request->has('closed')){
    for($i=0 ; $i<count($data['data'])-1 ; $i++){
        if($data['data'][$i]['account_status'] ==101){
        $id =$data['data'][$i]['account_id'] ;
        $status_data=$data['data'][$i]['account_status'];
        $spent=$data['data'][$i]['amount_spent'];
        $name=$data['data'][$i]['name'];
        array_push($account_id , $id);
        array_push($status , $status_data);
        array_push($account_name , $name);
        array_push($spent_ammount, $spent);
    }
       
    }
    if(count($account_id)<25){
        $number = 25-count($account_id);
        
        $data = $fb->getMoreData($next_page,$number); 
        // dd($data);
        for($i=0 ; $i<$number ; $i++){
            if($data['data'][$i]['account_status'] ==101){
            $id =$data['data'][$i]['account_id'] ;
            $status_data=$data['data'][$i]['account_status'];
            $spent=$data['data'][$i]['amount_spent'];
            $name=$data['data'][$i]['name'];
            array_push($account_id , $id);
            array_push($status , $status_data);
            array_push($account_name , $name);
            array_push($spent_ammount, $spent);
        }
           
        }
        dd($account_id); 
        $has=array_keys($data["paging"]);
    
        if(in_array('next',$has)){
            $next_page=$data['paging']['next'];
        }
        else{
            $next_page="";
        }
        if(in_array('previous',$has)){
            $prev_page=$data['paging']['previous'];
        }
        else{
            $prev_page="";
        }
        $next_page = $next_page."&limit=25";
        $prev_page = $prev_page."&limit=25";
        // dd($next_page);
    }
}


if($request->has('disabled')){
    for($i=0 ; $i<count($data['data'])-1 ; $i++){
        if($data['data'][$i]['account_status'] ==2){
        $id =$data['data'][$i]['account_id'] ;
        $status_data=$data['data'][$i]['account_status'];
        $spent=$data['data'][$i]['amount_spent'];
        $name=$data['data'][$i]['name'];
        array_push($account_id , $id);
        array_push($status , $status_data);
        array_push($account_name , $name);
        array_push($spent_ammount, $spent);
    }
       
    }
}


if($request->has('unsettled')){
    for($i=0 ; $i<count($data['data'])-1 ; $i++){
        if($data['data'][$i]['account_status'] ==3){
        $id =$data['data'][$i]['account_id'] ;
        $status_data=$data['data'][$i]['account_status'];
        $spent=$data['data'][$i]['amount_spent'];
        $name=$data['data'][$i]['name'];
        array_push($account_id , $id);
        array_push($status , $status_data);
        array_push($account_name , $name);
        array_push($spent_ammount, $spent);
    }
       
    }
}

   dd($spent_ammount);
    return view("dashboard.status_filter")->with(['spent'=>$spent_ammount ,'names'=>$account_name,
    'ids'=>$account_id,'status'=>$status,'next_link'=>$next_page,'prev_link'=>$prev_page]);


}
}