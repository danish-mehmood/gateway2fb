<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>gateway to facebook</title>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- plugins:css -->
  <!--datepicker files -->
  <!--end of css files here-->

  <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/ionicons/css/ionicons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/typicons/src/font/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{asset('css/mycss.css')}}">
  
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('/css/shared/style.css')}}">
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('css/demo_1/style.css')}}">
  <!-- End Layout styles -->
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
      
          {{-- <img src="{{asset('images/logo.svg')}}" alt="logo" /> </a> --}}
          <h1 style="margin:10px ; color:#070707" class="profile-name">Admin Area</h1>
          <form  class="logout" action="{{route('logout')}}" method="POST" >
            @csrf
            <button type="submit" class="btn btn-xs btn-danger">logout</button>
          </form>
      
          
      </div>
      
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="profile-image">
                <img class="img-xs rounded-circle" src="https://graph.facebook.com/1638510629730912/picture?width=50&height=50&access_token=EAAGaTYfPjj0BACgSABEPJxAX7WEsfp66iXLofSj60IjZBrUBoCJI0ulPED8bqji8RGbnI1rKIeTwU0kgwZAZAIjvVm2modPTyBrvAImXIz40ZBhQ5SdUxaZAmUrCyoePjWHS2NsHnyxNKYcSF6ev7IgmFnlj8oefVPC92BMsy1P54R9RpT4x1u124S7jDUJgZD" alt="profile image">
                <div class="dot-indicator bg-success"></div>
              </div>
              <div class="text-wrapper">
                <p class="profile-name">Kurt Snow</p>
                <p class="designation">Admin user</p>
              </div>
            </a>
          </li>
          <li class="nav-item nav-category">Main Menu</li>
          <li class="nav-item">
          <a class="nav-link" href="{{route('dashboard')}}">
              <i class="menu-icon typcn typcn-document-text"></i>
              <span class="menu-title" >Dashboard</span>
            </a>
          </li>
          {{-- <li class="nav-item"> --}}
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              
              {{-- <span class="menu-title">Basic UI Elements</span> --}}
              <i class="menu-arrow"></i>
            </a>
            {{-- <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu"> --}}
                {{-- <li class="nav-item"> --}}
                  {{-- <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a> --}}
                {{-- </li> --}}
                {{-- <li class="nav-item"> --}}
                  {{-- <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Dropdowns</a> --}}
                {{-- </li> --}}
                {{-- <li class="nav-item"> --}}
                  {{-- <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a> --}}
                {{-- </li> --}}
              {{-- </ul> --}}
            {{-- </div> --}}
          {{-- </li> --}}
          {{-- <li class="nav-item">
            {{-- <a class="nav-link" href="../../pages/forms/basic_elements.html"> --}}
              
              {{-- <span class="menu-title">Form elements</span> --}}
            </a>
          {{-- </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link" href="../../pages/charts/chartjs.html">
              <i class="menu-icon typcn typcn-th-large-outline"></i>
              {{-- <span class="menu-title">Charts</span> --}}
            </a>
          {{-- </li>  --}}
          {{-- <li class="nav-item">
            <a class="nav-link" href="../../pages/tables/basic-table.html">
              <i class="menu-icon typcn typcn-bell"></i>
              {{-- <span class="menu-title">Tables</span> --}}
            {{-- </a> --}}
          {{-- </li>  --}}
          {{-- <li class="nav-item">
            <a class="nav-link" href="../../pages/icons/font-awesome.html">
              <i class="menu-icon typcn typcn-user-outline"></i>
              {{-- <span class="menu-title">Icons</span> --}}
            {{-- </a> --}}
          {{-- </li>  --}}
          {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon typcn typcn-document-add"></i>
              {{-- <span class="menu-title">User Pages</span> --}}
              {{-- <i class="menu-arrow"></i>
            </a> --}}
            {{-- <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../pages/samples/login.html"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a>
                </li>
              </ul>
            </div> --}}
          {{-- </li>  --}}
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          {{-- previous and nex buttons for the need of pagination  --}}
            {{-- <div class="siema">
              <div><img src="https://pawelgrzybek.com/siema/assets/siema--pink.svg" alt="Siema image" /></div>
              <div><img src="https://pawelgrzybek.com/siema/assets/siema--yellow.svg" alt="Siema image" /></div>
              <div><img src="https://pawelgrzybek.com/siema/assets/siema--pink.svg" alt="Siema image" /></div>
              <div><img src="https://pawelgrzybek.com/siema/assets/siema--yellow.svg" alt="Siema image" /></div>
            </div> --}}
            
           


            @include('includes.datepicker')
            <div class="col-lg-12 grid-margin" style="margin-top: 1%;margin-bottom: 0;">
            <label style="color:#4056F4; text-align:right;font-size:0.95rem;">&nbsp;<label style="color:black;font-size:0.95rem;">Spending Period: </label>&nbsp;&nbsp;&nbsp;({{$startDate}}&nbsp;&nbsp;<u>to</u>&nbsp;&nbsp;{{$endDate}}) </label>
            </div> 
            
            <div class="col-lg-12 grid-margin stretch-card" >
              <div class="card">
                <div class="card-body">

                <div class="row container">
<div class="col-lg-5">
<h2 class="card-title" style="font-size: 1rem;padding-top: 5px;"> Ad Accounts  </h2>
</div>
<div class="col-lg-4">
<span class="page_count" style="vertical-align: sub;">Page {{$page}} of {{$total_pages}}</span>
</div>
<div class="col-lg-3 row" style="height:40px">
<form id="paginate_form2" action="{{route('first_page_date_filter',["startDate"=>$startDate,"endDate"=>$endDate , "page"=>$page])  }}" method="POST">
              @csrf 
              
                    {{-- <input type="submit" value="Next"> --}}
                    <button type="submit" class="btn btn-sm btn-success"><<</button>
                  {{-- <input type="hidden" name="next" value="{{$next_link}}"> --}}
          
                  </form>
          &nbsp;
        
          <form id="paginate_form" action="{{route('prev_date_paginator',["startDate"=>$startDate,"endDate"=>$endDate , "page"=>$page])}}" method="POST">  
            @csrf
          @if($prev_link != "")
          <button type="submit" class="btn btn-sm btn-primary"><</button>
          <input type="hidden" name="prev" value="{{$prev_link}}">
          @endif
        </form>
    &nbsp;

      <form id="paginate_form2" action="{{route('next_date_paginator',["startDate"=>$startDate,"endDate"=>$endDate,"page"=>$page])}}" method="POST">
        @csrf 
        @if($next_link != "")
        <button type="submit" class="btn btn-sm btn-primary">></button>
            <input type="hidden" name="next" value="{{$next_link}}">
            @endif
            </form>
                  &nbsp;

                  <form id="paginate_form2" action="{{route('last_page_date_filter' ,["startDate"=>$startDate,"endDate"=>$endDate]) }}" method="POST">
                    @csrf 
                    @if($next_link != "")
                          {{-- <input type="submit" value="Next"> --}}
                          <button type="submit" class="btn btn-sm btn-success">>></button>
                        {{-- <input type="hidden" name="next" value="{{$next_link}}"> --}}
                        @endif
                        </form>
            </div>

                
                  
                  {{-- <p class="card-description"> Add class <code>.table-bordered</code> </p> --}}
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> Account ID# </th>
                        <th> Account Name </th>
                        <th> Status </th>
                        <th> Amount Spent </th>
                        {{-- <th> Deadline </th> --}}
                      </tr>
                    </thead>
                    <tbody>                       
                    {{-- @foreach($ids as $id) 
                      @foreach($names as $name) 
                      @foreach($status as $stat) 
                      @foreach($spent as $spents) 
                      <tr>
                        <td> {{$id}} </td>
                        <td> {{$name}} </td>
                        <td> {{$stat}} </td>
                        <td> {{$spents}} </td>
                      </tr>
                      @endforeach  
                      @endforeach
                      @endforeach
                      @endforeach  --}}
                      
                      @for($i=0 ; $i<count($ids);$i++)
                      <tr>
                            <td>
                            {{$ids[$i]}}
                          </td>
                          
                          
                            <td>
                            <a href="{{$links[$i]}}" target="_blank"> {{$names[$i]}}</a>
                          </td>
                          
                          
                            <td>
                              @if($status[$i] == 1)
                            <span style="color:#47A025">ACTIVE</span>
                            @endif
                            @if($status[$i] == 101)
                            <span style="color:#A50104">CLOSED</span>
                          
                              
                            @endif
                            @if($status[$i] == 2)
                            <span style="color:#A50104">DISABLED</span>
                          
                              
                            @endif
                            @if($status[$i] == 3)
                            <span style="color:#A50104">UNSETTLED</span>
                          
                              
                            @endif
                            @if($status[$i] == 7)
                            <span style="color:#A50104">PENDING_RISK_REVIEW</span>
                          
                              
                            @endif
                            @if($status[$i] == 8)
                            <span style="color:#A50104">PENDING_SETTLEMENT</span>
                          
                              
                            @endif
                            @if($status[$i] == 9)
                            <span style="color:#A50104">IN_GRACE_PERIOD</span>
                          
                              
                            @endif
                            @if($status[$i] == 100)
                            <span style="color:#A50104">PENDING_CLOSURE</span>
                          
                              
                            @endif
                            @if($status[$i] == 201)
                            <span style="color:#A50104">ANY_ACTIVE</span>
                          
                              
                            @endif
                            @if($status[$i] == 202)
                            <span style="color:#A50104">ANY_CLOSED</span>
                          
                              
                            @endif
                                                        
                            
                            
                          </td>
                          
                          
                            <td>
                            ${{$spent[$i]}}
                          </td>
                        </tr>
                      @endfor
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('js/shared/off-canvas.js')}}"></script>
  <!--<script src="{{asset('js/shared/misc.js')}}"></script>-->

  

  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->


  <!--script files for date picker-->
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
  <script src="{{asset('js/myjs.js')}}"></script>
  <!--script files end here for date picker-->

</body>
</html>
<script>
$("#startDate, #endDate").click(function(){
var para = document.getElementById("validation-errors");
para.innerHTML=" ";
});
</script>