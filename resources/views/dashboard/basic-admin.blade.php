<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>gateway to facebook</title>


  <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/ionicons/css/ionicons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/typicons/src/font/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{asset('css/mycss.css')}}">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Kulim+Park&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="{{asset('/css/shared/style.css')}}">
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('css/demo_1/style.css')}}">
  <!-- End Layout styles -->
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
  <script src="{{asset('js/myjs.js')}}"></script>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">

        {{-- <img src="{{asset('images/logo.svg')}}" alt="logo" /> </a> --}}
        <h1 style="margin:10px ; color:#070707" class="profile-name">Admin Area</h1>
        <form class="logout" action="{{route('logout')}}" method="POST">
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
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-arrow"></i>
          </a>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            @include('includes.datepicker')
            @if($indexpage=="")
              <div class="col-lg-12 grid-margin" style="margin-top: 1%;margin-bottom: 0;">
                <label style="color:#4056F4; text-align:right;font-size:0.95rem;">&nbsp;<label style="color:black;font-size:0.95rem;">Spending Period: </label>&nbsp;&nbsp;&nbsp;({{$startDate}}&nbsp;&nbsp;<u>to</u>&nbsp;&nbsp;{{$endDate}}) </label>
              </div>
            @endif
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <div class="row container">
                    <div class="col-lg-5">
                      <h2 class="card-title" style="font-size: 1rem;padding-top: 5px;"> Ad Accounts </h2>
                    </div>
                    <div class="col-lg-4">
                      <span class="page_count" style="vertical-align: sub;">Page {{$page}} of {{$total_pages}}</span>
                    </div>
                    <div class="col-lg-3 row" style="height:40px">
                      @if($prev_link != "")
                      <form id="paginate_form2" action="{{route('first_page',["startDate"=>$startDate,"endDate"=>$endDate])}}" method="POST">
                        @csrf
                      <input type="hidden" name="sfpagination" id="sfpagination" value="{{$sfpagination}}" >
                        <button type="submit" class="btn btn-sm btn-success"><<</button>
                      </form>
                      &nbsp;
                      <form id="paginate_form" action="{{route('prev_paginator',["startDate"=>$startDate,"endDate"=>$endDate, "page"=>$page])}}" method="POST">
                        @csrf
                        <input type="hidden" name="sfpagination" id="sfpagination" value="{{$sfpagination}}" >
                        <button type="submit" class="btn btn-sm btn-primary"><</button>
                        <input type="hidden" name="prev" value="{{$prev_link}}">
                      </form>
                      @endif
                      &nbsp;
                      <form id="paginate_form3" action="{{route('next',["startDate"=>$startDate,"endDate"=>$endDate,"page"=>$page])}}" method="POST">
                        @csrf
                        @if($next_link != "")
                        <input type="hidden" name="sfpagination" id="sfpagination" value="{{$sfpagination}}" >
                        <button type="submit" class="btn btn-sm btn-primary">></button>
                        <input type="hidden" name="next" value="{{$next_link}}">
                        @endif
                      </form>
                      &nbsp;
                      <form id="paginate_form4" action="{{route('last_page',["startDate"=>$startDate,"endDate"=>$endDate])}}" method="POST">
                        @csrf
                        @if($next_link != "")
                        <input type="hidden" name="sfpagination" id="sfpagination" value="{{$sfpagination}}" >
                        <button type="submit" class="btn btn-sm btn-success">>></button>
                        @endif
                      </form>
                    </div>
                  </div>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> Account ID# </th>
                        <th> Account Name </th>
                        <th> Status </th>
                        <th> Amount Spent </th>
                      </tr>
                    </thead>
                    <tbody>
                      @for($i=0 ; $i<count($ids);$i++) <tr>
                        <td>
                          {{$ids[$i]}}
                        </td>
                        <td>
                          <a href="{{$links[$i]}}" target="_blank">{{$names[$i]}}</a>
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
                          ${{$spent[$i]/100}}
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

  <!--script files end here for date picker-->

</body>

</html>
<script>
  $("#startDate, #endDate, #searchTerm").click(function() {
    var para = document.getElementById("validation-errors");
    para.innerHTML = " ";
  });

  function setValues(){
    var para = document.getElementById("validation-errors");
    var searchTermValue = $("#searchTerm").val();
    var startDateValue = $("#startDate").val();
    var endDateValue = $("#endDate").val();
    //alert(startDateValue+' '+endDateValue);
    if((startDateValue != "" && endDateValue == "") || ((startDateValue == "" && endDateValue != ""))){
        para.innerHTML="* Please enter start/end dates.";
        return false;
    }
    else if( (new Date(startDateValue).getTime() > new Date(endDateValue).getTime()))
    {
        para.innerHTML="* Start date must occur before End date.";
        return false;
    }
    else if((startDateValue == "" || endDateValue == "") && (searchTermValue == "")){
        para.innerHTML="* Please select a search criteria.";
        return false;
    }

    // -1- for search term only  -2- for date value only  -3- for both search and date
    
    var type = 0;
    if(searchTermValue != "") {
      if(startDateValue != "" && endDateValue != ""){
        type = 3;
      }
      else{
        type = 1;
      } 
    }
    else if(startDateValue != "" && endDateValue != ""){
      type = 2;
    }
    $('#searchfilter').val(type);
    return true;
  }


</script>