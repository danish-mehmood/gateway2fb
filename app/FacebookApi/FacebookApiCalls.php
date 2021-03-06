<?php
namespace App\FacebookApi;

class FacebookApiCalls{

    private $access_token="EAAGaTYfPjj0BACgSABEPJxAX7WEsfp66iXLofSj60IjZBrUBoCJI0ulPED8bqji8RGbnI1rKIeTwU0kgwZAZAIjvVm2modPTyBrvAImXIz40ZBhQ5SdUxaZAmUrCyoePjWHS2NsHnyxNKYcSF6ev7IgmFnlj8oefVPC92BMsy1P54R9RpT4x1u124S7jDUJgZD";
    private $user_id = "1638510629730912";
    public static $page_number=0;
    public function GetAllAccounts(){

        $curl = curl_init();
        // $url ="https://graph.facebook.com/v5.0/$this->user_id/adaccounts?fields=name,account_id,account_status,amount_spent/?access_token=$this->access_token";
        // $url ="https://graph.facebook.com/v4.0/$this->user_id/adaccounts/?access_token=$this->access_token";
        $url ="https://graph.facebook.com/v5.0/$this->user_id/adaccounts/?fields=name,account_status,account_id,amount_spent&access_token=$this->access_token";
        // $url=$link;
        curl_setopt($curl , CURLOPT_URL , $url);
        curl_setopt($curl , CURLOPT_RETURNTRANSFER , 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        $json = json_decode($result , true );
        curl_close($curl);

        return $json;
    }

    public function Paginate($url){
       $curl = curl_init();
       $link = $url ;
       curl_setopt($curl , CURLOPT_URL , $link);
       curl_setopt($curl , CURLOPT_RETURNTRANSFER , 1);
       curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
       $result = curl_exec($curl);
       $json = json_decode($result , true );
       curl_close($curl);

       return $json;
    }

    public function Date_filter($startDate  , $endDate){
        $curl = curl_init();
        // $link = $url ;
        // $url ="https://graph.facebook.com/v5.0/$this->user_id/adaccounts/?fields=name,account_status,account_id,amount_spent&access_token=$this->access_token";
        $url="https://graph.facebook.com/v5.0/$this->user_id/adaccounts?fields=name,insights.time_range({'since':'$startDate','until':'$endDate'}){spend},account_status,account_id&access_token=$this->access_token";
        // return $url;
        curl_setopt($curl , CURLOPT_URL , $url);
        curl_setopt($curl , CURLOPT_RETURNTRANSFER , 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        $json = json_decode($result , true );
        curl_close($curl);
 
        return $json;
     }

     public function Search_Filter($searchTerm){
      $curl = curl_init();
      $url="https://graph.facebook.com/v5.0/$this->user_id/adaccounts?fields=name,account_status,account_id,amount_spent&filtering=[{'field':'name','operator':'CONTAIN','value':'$searchTerm'}]&access_token=$this->access_token&limit=1000";
      // return $url;
      curl_setopt($curl , CURLOPT_URL , $url);
      curl_setopt($curl , CURLOPT_RETURNTRANSFER , 1);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
      $result = curl_exec($curl);
      $json = json_decode($result , true );
      curl_close($curl);
      
      return $json;
   }

   public function Combined_Filter($startDate,$endDate,$searchTerm){
      $curl = curl_init();
      $url = "https://graph.facebook.com/v5.0/$this->user_id/adaccounts?fields=name,account_status,account_id";
      //dd($startDate,$endDate,$searchTerm);
      if($endDate != null && $startDate != null){
         $url = $url.",insights.time_range({'since':'$startDate','until':'$endDate'}){spend}";
      }
      else{
         $url = $url.",amount_spent";
      }
      if($searchTerm != null){
         $url = $url."&filtering=[{'field':'name','operator':'CONTAIN','value':'$searchTerm'}]&limit=1000";
      }
      $url = $url."&access_token=$this->access_token";

      // return $url;
      //dd($url);
      curl_setopt($curl , CURLOPT_URL , $url);
      curl_setopt($curl , CURLOPT_RETURNTRANSFER , 1);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
      $result = curl_exec($curl);
      $json = json_decode($result , true );
      curl_close($curl);
      
      return $json;
   }

     public function  getMoreData($url , $number){
       $url = $url."&limit=$number";
       $curl = curl_init();
       curl_setopt($curl , CURLOPT_URL , $url);
        curl_setopt($curl , CURLOPT_RETURNTRANSFER , 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        $json = json_decode($result , true );
        curl_close($curl);
 
        return $json;
       
     }

     public function createLink($account){
         $url="https://business.facebook.com/adsmanager/manage/accounts?act=$account&business_id=281136205409884";
         
         return $url;
     }
     public function getPageCount(){
        $curl = curl_init();
        $url ="https://graph.facebook.com/v5.0/$this->user_id/adaccounts/?fields=name,account_status,account_id,amount_spent&access_token=$this->access_token&limit=10000";
        curl_setopt($curl , CURLOPT_URL , $url);
        curl_setopt($curl , CURLOPT_RETURNTRANSFER , 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        $json = json_decode($result , true );
        curl_close($curl);

        return round(count($json["data"])/25);
        // return count($json['data']);

     }
   
     public function getAllData(){

        $curl = curl_init();
        $url ="https://graph.facebook.com/v5.0/$this->user_id/adaccounts/?fields=name,account_status,account_id,amount_spent&access_token=$this->access_token&limit=1000000";
        curl_setopt($curl , CURLOPT_URL , $url);
        curl_setopt($curl , CURLOPT_RETURNTRANSFER , 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        $json = json_decode($result , true );
        curl_close($curl);

        return $json;

     }

     public function getAllDataDateFilter($startDate  , $endDate){
        $curl = curl_init();
        // $link = $url ;
        // $url ="https://graph.facebook.com/v5.0/$this->user_id/adaccounts/?fields=name,account_status,account_id,amount_spent&access_token=$this->access_token";
        $url="https://graph.facebook.com/v5.0/$this->user_id/adaccounts?fields=name,insights.time_range({'since':'$startDate','until':'$endDate'}){spend},account_status,account_id&access_token=$this->access_token&limit=100000";
        // return $url;
        curl_setopt($curl , CURLOPT_URL , $url);
        curl_setopt($curl , CURLOPT_RETURNTRANSFER , 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        $json = json_decode($result , true );
        curl_close($curl);
 
        return $json;
        
     }

    
}
?>