@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to eLECTRA online billing portal</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>User details:-
                    <ul id="">
                        <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
                        <li><strong>Registered email-id:</strong>{{ Auth::user()->email }}</li>
                        <li><strong>Connection Id: </strong>{{ Auth::user()->customerId }}</li>
                        <li><strong>Billing Address:</strong> {{Auth::user()->address}}  </li>
                    </ul>
                    </p>
                    <p class="amount col-md-offset-7">
                        You Have a pending Bill Amount of 
                        <br>
                        <span>Rs  @php
                                    use App\Http\Controllers\billController;
                                    echo billController::calculate(Auth::user()->customerId);
                                    @endphp                
                        </span>
                        <!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Select Method</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="radios-0">
      <input name="radios" id="radios-0" value="1" checked="checked" type="radio">
      Credit Card
    </label>
    </div>
  <div class="radio">
    <label for="radios-1">
      <input name="radios" id="radios-1" value="2" type="radio">
      Debit Card
    </label>
    </div>
  <div class="radio">
    <label for="radios-2">
      <input name="radios" id="radios-2" value="3" type="radio">
      Net Banking
    </label>
    </div>
  </div>
</div>
                        <br><a href="/home/pay"><button type="button" class="btn btn-warning">PAY NOW</button></a>
                        
                    </p>
                    <br>
                    <p class="pastBills col-md-8 col-md-offset-5">Issued Bills</p>
                    <table class="table">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">Month</th>
                          <th scope="col">Year</th>
                          <th scope="col">Status</th>
                          <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $value)
                        <tr>
                              <td>{{$value->month}}</td>
                              <td>{{$value->year}}</td>
                              <td>{{$value->status}}</td>
                              <td>{{$value->amount}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <p class="downl col-md-offset-5">Download Bills</p>
                    <form class="form-inline" action="{{route('home.pdf')}}" method="POST">
                        {{csrf_field()}}
                        <fieldset>

                        <!-- Form Name -->
                        

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
                                <button type="submit" class="btn btn-danger">Download</button>
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
