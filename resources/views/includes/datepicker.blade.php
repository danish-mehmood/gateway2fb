<div class="container row">
    <div class="col-lg-7 col-sm-7 col-md-7" style="padding:0">
        <form id="form" name="form" class="form-inline" method="POST" action="{{route('filtered')}}">
            @csrf
            <div class="container">
                <div style="margin-bottom: 1%;"><h5>Please select the spending period using these dates:&nbsp;</h5></div>
                <div class="form-group">
                    <label for="startDate" style="padding-right: 2%; width:92px; font-size:0.95rem;">Start Date&nbsp;</label>
                    <input id="startDate" name="startDate" type="date" class="form-control" />
                    <br>
                    &nbsp;
                    <label for="endDate" style="padding-right: 2%; width:92px; font-size:0.95rem;">End Date&nbsp;</label>
                    <input id="endDate" name="endDate" type="date" class="form-control" />
                    &nbsp;
                    <button type="submit" id="submitter" class="btn btn-primary" onclick="return compare();">Go</button> &nbsp;
                </div>
                <div>
                    <p id="validation-errors"> </p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4">
        <form id="form" name="form" class="form-inline" method="POST" action="{{route('search_filtered')}}">
            @csrf
            <div class="container">
            <div style="margin-bottom: 5%;"><h5>Please enter a term to search Accounts:&nbsp;</h5></div>
                <div class="form-group">
                    {{--<label for="searchTerm" style="padding-right: 2%; width:55px; font-size:0.95rem;">Enter:&nbsp;</label>--}}
                    <input id="searchTerm" name="searchTerm" type="text" class="form-control" style="width:260px" required />&nbsp;
                    <br>
                    <button type="submit" id="submitter" class="btn btn-primary">Go</button> &nbsp;
                </div>
                <div>
                    <p id="validation-errors"></p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-1 col-sm-1 col-md-1" style="margin-top: 3.7%;">
    <button class="btn btn-success"><a style="color:white" href="{{route('dashboard')}}">Reset</a></button>
    </div>
</div>
{{-- <form action="{{route('dashboard_status_filtered')}}" method="POST" >
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