@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    <form class="form-horizontal" action="{{ route('admin.store') }}" method="POST">
                        {{ csrf_field() }}
                        <fieldset>

                        <!-- Form Name -->
                        <legend>ADD NEW BILL</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="customerId">Customer Id</label>  
                          <div class="col-md-4">
                          <input id="customerId" name="customerId" placeholder="" class="form-control input-md" required="" type="text">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="initial">Initial Reading</label>  
                          <div class="col-md-2">
                          <input id="initial" name="initial" placeholder="" class="form-control input-md" required="" type="text">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="final">Final Reading</label>  
                          <div class="col-md-2">
                          <input id="final" name="final" placeholder="" class="form-control input-md" required="" type="text">
                            
                          </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="month">Month</label>
                          <div class="col-md-4">
                            <select id="month" name="month" class="form-control">
                              <option value="January">January</option>
                              <option value="February">February</option>
                              <option value="March">March</option>
                              <option value="April">April</option>
                              <option value="May">May</option>
                              <option value="June">June</option>
                              <option value="July">July</option>
                              <option value="August">August</option>
                              <option value="September">September</option>
                              <option value="October">October</option>
                              <option value="November">November</option>
                              <option value="Decemeber">Decemeber</option>
                            </select>
                          </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="year">Year</label>
                          <div class="col-md-4">
                            <select id="year" name="year" class="form-control">
                              <option value="2015">2015</option>
                              <option value="2016">2016</option>
                              <option value="2017">2017</option>
                              <option value="2018">2018</option>
                              <option value="2019">2019</option>
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                              <option value="2028">2028</option>
                              <option value="2029">2029</option>
                            </select>
                          </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                          <div class="col-md-4 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>

                        </fieldset>
                        </form>
                        <form class="form-inline" action="{{ route('admin.updaterate') }}" method="POST">
                            {{ csrf_field() }}

                            <fieldset>

                            <!-- Form Name -->
                            <legend>Update Rate</legend>
                            <p class="current">Current Rate = <span>{{ Auth::user()->rate }} </span></p>
                            
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="rate">New Rate</label>  
                              <div class="col-md-2">
                              <input id="rate" name="rate" placeholder="" class="form-control input-md" required="" type="text">
                                
                              </div>
                            </div>
                            <!-- Button -->
                            <div class="form-group">
                              <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </div>

                            </fieldset>
                        </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
