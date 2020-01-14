{{--
<form action="{{route('dashboard_status_filtered')}}" method="POST" >
@csrf

<fieldset>
    &nbsp;&nbsp;&nbsp;
    <input type="radio" name="all" value="all">All
    &nbsp;&nbsp;&nbsp;
    <input type="radio" name="disabled" value="disabled">Disabled
    &nbsp;&nbsp;&nbsp;
    <input type="radio" name="active" value="active">Active
    &nbsp;&nbsp;&nbsp;
    <input type="radio" name="unsettled" value="unsettled">Un-settled
    &nbsp;&nbsp;&nbsp;
    <input type="radio" name="closed" value="closed">Closed
    &nbsp;&nbsp;&nbsp;
    <button type="submit">Go</button>
</fieldset>


</form> --}}

<div class="container row" style="margin-bottom: 5px;">
    <div class="col-lg-11">
    <form id="form" name="form" class="form-inline" style="width: inherit;" method="POST" action="{{route('test_filtered')}}">
        @csrf
        <input type="hidden" name="searchfilter" id="searchfilter" value="" >
        <div class="col-lg-7 col-sm-7 col-md-7" style="padding:0">
            <div style="margin-bottom: 1%;">
                <h5>Please select the spending period using these dates:&nbsp;</h5>
            </div>
            <div class="form-group">
                <label for="startDate" style="padding-right:0%; width:80px; font-size:0.95rem;">Start Date</label>
            <input id="startDate" name="startDate" type="date" class="form-control" value="{{$startDate}}" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label for="endDate" style="padding-right:0%; width:80px; font-size:0.95rem;">End Date</label>
                <input id="endDate" name="endDate" type="date" class="form-control" value="{{$endDate}}" />
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4" style="padding:0">
            @csrf
            <div class="container">
                <div style="margin-bottom: 3%;">
                    <h5>Please enter a term to search:&nbsp;</h5>
                </div>
                <div class="form-group">
                    <input id="searchTerm" name="searchTerm" type="text" class="form-control" style="width:80%" value="{{$searchTerm}}" />&nbsp;
                    <br>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-sm-1 col-md-1" style="margin-top:3%;line-height:0px;">
            <button type="submit" id="submitter" class="btn btn-primary" onclick="return setValues();">Search</button> &nbsp;
        </div>
    </form>
</div>
<div class="col-lg-1"style="margin-top: 2.8%;padding: 0;">
    <button class="btn btn-success"><a style="color:white" href="{{route('dashboard')}}">Reset All</a></button>
</div>
    <div>
        <p id="validation-errors"> </p>
    </div>
</div>