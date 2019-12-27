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
             
             
          
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
             
        
            {{-- <h1>{{$prev_link}}</h1>           --}}
            <form id="paginate_form" action="{{route('prev_paginator')}}" method="POST">  
              @csrf
            @if($prev_link != "")
            <button type="submit" class="btn btn-sm btn-primary"><</button>
            <input type="hidden" name="prev" value="{{$prev_link}}">
            @endif
          </form>

        &nbsp;
        <form id="paginate_form2" action="{{route('next')}}" method="POST">
          @csrf 
          @if($next_link != "")
               {{-- <input type="submit" value="Next"> --}}
               <button type="submit" class="btn btn-sm btn-primary">></button>
             <input type="hidden" name="next" value="{{$next_link}}">
             @endif
              </form>

              @include('includes.datepicker')
             

               <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title"> Ad Accounts  </h2>
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
                              <a href="{{$links[$i]}}">{{$names[$i]}}</a>
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
                      
                     
                     
                     
                        {{-- @foreach($ids as $id)
                        <tr>
                          <td> {{$id}} </td>
                          @endforeach
                        @foreach($names as $name)   
                        <td> {{$name}} </td>
                        @endforeach
                        @foreach($status as $stat)
                        <td> {{$stat}} </td> 
                        @endforeach
                        @foreach($spent as $spents) 
                        <td> {{$spents}} </td>
                      </tr> 
                        @endforeach --}}
                      

                        
                       
                         
                      {{-- </tr> --}}
                          {{-- <td> Herman Beck </td>
                          <td>
                           
                          </td>
                          <td> $ 77.99 </td> --}}
                          {{-- <td> May 15, 2015 </td> --}}
                        {{-- </tr>
                        <tr> --}}
                          {{-- <td> 2 </td>
                          <td> Messsy Adam </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $245.30 </td>
                          {{-- <td> July 1, 2015 </td> --}}
                        {{-- </tr> --}}
                        {{-- <tr>
                          <td> 3 </td>
                          <td> John Richards </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $138.00 </td>
                          {{-- <td> Apr 12, 2015 </td> --}}
                        {{-- </tr>  --}}
                        {{-- <tr>
                          <td> 4 </td>
                          <td> Peter Meggik </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 77.99 </td>
                          {{-- <td> May 15, 2015 </td> --}}
                        {{-- </tr> --}}
                        {{-- <tr>
                          <td> 5 </td>
                          <td> Edward </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 160.25 </td>
                          {{-- <td> May 03, 2015 </td> --}}
                        {{-- </tr>  --}}
                        {{-- <tr>
                          <td> 6 </td>
                          <td> John Doe </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 123.21 </td>
                          {{-- <td> April 05, 2015 </td> --}}
                        {{-- </tr>/ --}}
                        {{-- <tr>
                          <td> 7 </td>
                          <td> Henry Tom </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 150.00 </td>
                          {{-- <td> June 16, 2015 </td> --}}
                        {{-- </tr>  --}}
                      </tbody>
                    </table>
                   
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          {{-- <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="#" target="_blank">gateway2facebook</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>by aspire logics
              </span>
            </div>
          </footer> --}}
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
    <script src="{{asset('js/shared/misc.js')}}"></script>

    

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->


    <!--script files for date picker-->
    
    <!--script files end here for date picker-->

  </body>
</html>