<form id="form" name="form" class="form-inline" method="GET" action="{{route('filtered2')}}">
    @csrf
   
    {{-- <input type="radio" name="all" value="all" >
    <input type="radio" name="all" value="all" >
    <input type="radio" name="all" value="all" > --}}
    <div class="form-group"><strong>Start Date</strong></label>
        <input id="startDate" name="startDate" type="date" class="form-control" required />
        <br>
        @if(count($errors)>0)
        @foreach ($errors->all() as $error )
            
        
    <p class="validation-errors">{{$error}}</p>
    @endforeach
    @endif
        &nbsp;
        <label for="endDate"><strong>End Date</strong></label>
        <input id="endDate" name="endDate" type="date" class="form-control" required/>
        &nbsp;
        <button type="submit" class="btn btn-primary" >Go</button> &nbsp;
        <button class="btn btn-success" ><a style="text-decoration:none" href="{{route('dashboard')}}">Reset</a></button>

    </div>
</form>

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





  

   
   
     