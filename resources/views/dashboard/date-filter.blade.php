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
              {{-- <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic Table</h4>
                    <p class="card-description"> Add class <code>.table</code> </p>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Profile</th>
                          <th>VatNo.</th>
                          <th>Created</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Jacob</td>
                          <td>53275531</td>
                          <td>12 May 2017</td>
                          <td>
                            <label class="badge badge-danger">Pending</label>
                          </td>
                        </tr>
                        <tr>
                          <td>Messsy</td>
                          <td>53275532</td>
                          <td>15 May 2017</td>
                          <td>
                            <label class="badge badge-warning">In progress</label>
                          </td>
                        </tr>
                        <tr>
                          <td>John</td>
                          <td>53275533</td>
                          <td>14 May 2017</td>
                          <td>
                            <label class="badge badge-info">Fixed</label>
                          </td>
                        </tr>
                        <tr>
                          <td>Peter</td>
                          <td>53275534</td>
                          <td>16 May 2017</td>
                          <td>
                            <label class="badge badge-success">Completed</label>
                          </td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td>20 May 2017</td>
                          <td>
                            <label class="badge badge-warning">In progress</label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> --}}
              {{-- <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Hoverable Table</h4>
                    <p class="card-description"> Add class <code>.table-hover</code> </p>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>User</th>
                          <th>Product</th>
                          <th>Sale</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Jacob</td>
                          <td>Photoshop</td>
                          <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i>
                          </td>
                          <td>
                            <label class="badge badge-danger">Pending</label>
                          </td>
                        </tr>
                        <tr>
                          <td>Messsy</td>
                          <td>Flash</td>
                          <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i>
                          </td>
                          <td>
                            <label class="badge badge-warning">In progress</label>
                          </td>
                        </tr>
                        <tr>
                          <td>John</td>
                          <td>Premier</td>
                          <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i>
                          </td>
                          <td>
                            <label class="badge badge-info">Fixed</label>
                          </td>
                        </tr>
                        <tr>
                          <td>Peter</td>
                          <td>After effects</td>
                          <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i>
                          </td>
                          <td>
                            <label class="badge badge-success">Completed</label>
                          </td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i>
                          </td>
                          <td>
                            <label class="badge badge-warning">In progress</label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> --}}
              {{-- <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> Add class <code>.table-striped</code> </p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> User </th>
                          <th> First name </th>
                          <th> Progress </th>
                          <th> Amount </th>
                          <th> Deadline </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                            <img src="{{asset('assets/images/faces-clipart/pic-1.png')}}" alt="image" /> </td>
                          <td> Herman Beck </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="{{asset('assets/images/faces-clipart/pic-2.png')}}" alt="image" /> </td>
                          <td> Messsy Adam </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $245.30 </td>
                          <td> July 1, 2015 </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="{{asset('assets/images/faces-clipart/pic-3.png')}}" alt="image" /> </td>
                          <td> John Richards </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $138.00 </td>
                          <td> Apr 12, 2015 </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="{{asset('assets/images/faces-clipart/pic-4.png')}}" alt="image" /> </td>
                          <td> Peter Meggik </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="{{asset('images/faces-clipart/pic-1.png')}}" alt="image" /> </td>
                          <td> Edward </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 160.25 </td>
                          <td> May 03, 2015 </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="{{asset('images/faces-clipart/pic-2.png')}}" alt="image" /> </td>
                          <td> John Doe </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 123.21 </td>
                          <td> April 05, 2015 </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../../assets/images/faces-clipart/pic-3.png" alt="image" /> </td>
                          <td> Henry Tom </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 150.00 </td>
                          <td> June 16, 2015 </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> --}}
            {{-- previous and nex buttons for the need of pagination  --}}
              {{-- <div class="siema">
                <div><img src="https://pawelgrzybek.com/siema/assets/siema--pink.svg" alt="Siema image" /></div>
                <div><img src="https://pawelgrzybek.com/siema/assets/siema--yellow.svg" alt="Siema image" /></div>
                <div><img src="https://pawelgrzybek.com/siema/assets/siema--pink.svg" alt="Siema image" /></div>
                <div><img src="https://pawelgrzybek.com/siema/assets/siema--yellow.svg" alt="Siema image" /></div>
              </div> --}}
          
          
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

              @include('includes.datepicker')


               <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title"> Ad Accounts <span style="color:#4056F4">&nbsp;<span style="color:black; margin-left:200px">spending period</span>&nbsp;&nbsp;&nbsp;({{$startDate}}&nbsp;&nbsp;to &nbsp;&nbsp;{{$endDate}}) </span><span class="page_count">Page {{$page}} of {{$total_pages}}</span> </h2>
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
              {{-- <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Inverse table</h4>
                    <p class="card-description"> Add class <code>.table-dark</code> </p>
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> First name </th>
                          <th> Amount </th>
                          <th> Deadline </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td> 1 </td>
                          <td> Herman Beck </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                        </tr>
                        <tr>
                          <td> 2 </td>
                          <td> Messsy Adam </td>
                          <td> $245.30 </td>
                          <td> July 1, 2015 </td>
                        </tr>
                        <tr>
                          <td> 3 </td>
                          <td> John Richards </td>
                          <td> $138.00 </td>
                          <td> Apr 12, 2015 </td>
                        </tr>
                        <tr>
                          <td> 4 </td>
                          <td> Peter Meggik </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                        </tr>
                        <tr>
                          <td> 5 </td>
                          <td> Edward </td>
                          <td> $ 160.25 </td>
                          <td> May 03, 2015 </td>
                        </tr>
                        <tr>
                          <td> 6 </td>
                          <td> John Doe </td>
                          <td> $ 123.21 </td>
                          <td> April 05, 2015 </td>
                        </tr>
                        <tr>
                          <td> 7 </td>
                          <td> Henry Tom </td>
                          <td> $ 150.00 </td>
                          <td> June 16, 2015 </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> --}}
              {{-- <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Table with contextual classes</h4>
                    <p class="card-description"> Add class <code>.table-{color}</code> </p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> First name </th>
                          <th> Product </th>
                          <th> Amount </th>
                          <th> Deadline </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="table-info">
                          <td> 1 </td>
                          <td> Herman Beck </td>
                          <td> Photoshop </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                        </tr>
                        <tr class="table-warning">
                          <td> 2 </td>
                          <td> Messsy Adam </td>
                          <td> Flash </td>
                          <td> $245.30 </td>
                          <td> July 1, 2015 </td>
                        </tr>
                        <tr class="table-danger">
                          <td> 3 </td>
                          <td> John Richards </td>
                          <td> Premeire </td>
                          <td> $138.00 </td>
                          <td> Apr 12, 2015 </td>
                        </tr>
                        <tr class="table-success">
                          <td> 4 </td>
                          <td> Peter Meggik </td>
                          <td> After effects </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                        </tr>
                        <tr class="table-primary">
                          <td> 5 </td>
                          <td> Edward </td>
                          <td> Illustrator </td>
                          <td> $ 160.25 </td>
                          <td> May 03, 2015 </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> --}}
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