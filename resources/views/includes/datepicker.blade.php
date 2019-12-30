<form id="form" name="form" class="form-inline" method="POST" action="{{route('filtered')}}">
    @csrf
   <div class="container">
    <div class="form-group"><strong>Start Date</strong></label>
        <input id="startDate" name="startDate" type="date" class="form-control" />
        <br>
        &nbsp;
        <label for="endDate"><strong>End Date</strong></label>
        <input id="endDate" name="endDate" type="date" class="form-control" />
        &nbsp;
        <button type="submit" id="submitter" class="btn btn-primary" onclick="return compare();" >Go</button> &nbsp;
        <button class="btn btn-success" ><a style="text-decoration:none" href="{{route('dashboard')}}">Reset</a></button>
    </div>
    <div>
    <p id="validation-errors"> </p>
    </div>
    </div>
</form>
{{--
<form id="form" name="form" class="form-inline" method="POST" action="{{route('search_filtered')}}">
    @csrf
   <div class="container">
    <div class="form-group"><strong>Search by Account Name:</strong></label>
        <input id="searchTerm" name="searchTerm" type="text" class="form-control" required />
        <br>
        <button type="submit" id="submitter" class="btn btn-primary" >Search</button> &nbsp;
    </div>
    <div>
    <p id="validation-errors"> </p>
    </div>
    </div>
</form>
--}}
{{-- <form action="{{route('dashboard_status_filtered')}}" method="POST" >
    @csrf

    <fieldset>
    &nbsp;&nbsp;&nbsp;
    <input type="radio" name="all" value="all" >All
    &nbsp;&nbsp;&nbsp;
    <input type="radio" name="disabled" value="disabled" >Disabled
    &nbsp;&nbsp;&nbsp;
    <input type="radio" name="active" value="active" >Active
    &nbsp;&nbsp;&nbsp;
    <input type="radio" name="unsettled" value="unsettled" >Un-settled
    &nbsp;&nbsp;&nbsp;
    <input type="radio" name="closed" value="closed" >Closed
    &nbsp;&nbsp;&nbsp;
    <button type="submit">Go</button>
    </fieldset>
    

</form> --}}





  

   
   
     