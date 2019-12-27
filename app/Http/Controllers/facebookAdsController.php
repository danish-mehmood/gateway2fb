<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacebookApi\FacebookApiCalls;
use App\Http\Requests\DateFilterRequest;
class facebookAdsController extends Controller
{
    //

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
        'ids'=>$account_id,'status'=>$status,'next_link'=>$next_page,'prev_link'=>$prev_page ,"links"=>$links]);



    
    }

    public function prev_paginator(Request $request ,FacebookApiCalls $fb){
        $data = $fb->Paginate($request->prev);
       
        $account_id = array();
          $status =array();
          $spent_ammount =array();
          $account_name =array();
          $links = array();
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
          'ids'=>$account_id,'status'=>$status,'next_link'=>$next_page,'prev_link'=>$prev_page,"links"=>$links]);
  
    
      }
    public function next_paginator(Request $request ,FacebookApiCalls $fb){
      $data = $fb->Paginate($request->next);
    //   dd(gettype($request->next));
      $account_id = array();
        $status =array();
        $spent_ammount =array();
        $account_name =array();
        $links = array();
      
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
        'ids'=>$account_id,'status'=>$status,'next_link'=>$next_page,'prev_link'=>$prev_page,"links"=>$links]);

  
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
        $next_page ="";
        $prev_page ="";
        $start_date = $request->startDate;
        $end_date = $request->endDate;
        $links = array();
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
         "startDate"=>$start_date , "endDate"=>$end_date,"links"=>$links ]);
    

}

public function next_date_paginator(Request $request , FacebookApiCalls $fb){
// dd($request->startDate);
    $data = $fb->Paginate($request->next);
    $account_id = array();
      $status =array();
      $spent_ammount =array();
      $account_name =array();
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
      "endDate"=>$request->endDate,"links"=>$links]);
}


public function prev_date_paginator(Request $request , FacebookApiCalls $fb){

    $data = $fb->Paginate($request->prev);
    $account_id = array();
      $status =array();
      $spent_ammount =array();
      $account_name =array();
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
      'ids'=>$account_id,'status'=>$status,'next_link'=>$next_page,'prev_link'=>$prev_page,
      "startDate"=>$request->startDate,"endDate"=>$request->endDate,"links"=>$links]);
}

public function dashboard_status_filtered(Request $request , FacebookApiCalls $fb){
    $account_id = array();
    $status =array();
    $spent_ammount =array();
    $account_name =array();
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