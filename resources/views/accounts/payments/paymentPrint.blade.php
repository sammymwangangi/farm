<!DOCTYPE html>
<html>
<head>
    <title>Payment Record</title>
    <style type="text/javascript">
    #layout {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        display: table;
        border-collapse: collapse;
        width: 100%;
        margin-top: 10px;
        caption-side: top;
    }

    #layout td, #layout th {
        border: 1px solid #000;
        padding: 8px;
    }
 caption{
font-size: 20px;
font-weight: bold;
color:#222222;
padding: .2em .8em;
}
   /* Create 2 unequal columns that floats next to each other */

.column {
    float: left;
    padding: 10px;
    height: 5px; /* Should be removed. Only for demonstration */
}

.left {
  width: 35%;
}

.right {
  width: 65%;
}
.header{
    margin-bottom: 110px;
}
/* Clear floats after the columns */
.header:after {
    content: "";
    display: table;
    clear: both;
}
    </style>
</head>
<body>
      <div class="header">
    <div class="column left"><img src="{{ public_path('/images/'.$setting->logo) }}" ></div>
    <div class="column right"><h2>{{strtoupper($setting->school_name) ?? ''}}.</h2>
                              <h4>{{$setting->box_address ?? ''}},{{$setting->location ?? ''}}</h4>
                              <h5><i>Motto:{{$setting->motto ?? ''}}</i></h5>
                          </div>
              </div>
              <h6>&nbsp;</h6>
<table id="layout">
    		<tr>
    			<td>
    				@foreach($records as $record)
    				<h6>Payment Voucher No: .........</h6>
    				<h6><strong>Payee's Name and Address:</strong> {{$record->payee_name}}<br> {{$record->address}}</h6>
    			</td>
    		</tr>
    	</table>

    	<table  id="layout">
    		<tr>
    			<th>DATE</th>
    			<th>PARTICULARS</th>
    			<th>AMOUNT</th>
    		</tr>
    		<tr>
    			<td>{{ date('Y-m-d', strtotime($record->created_at))}}</td>
    			<td>{{$record->particulars}}</td>
    			<td>{{$record->amount}}</td>
    		</tr>
    	</table>
    	@endforeach
    	<table id="layout">
    		<tr>
    	        <td><h5>Payment Authorised by ............</h5>
    			<h5>Cash Cheque No ............</h5></td>
    		</tr>
    		<tr>
    			<td><h4>Date.....................</h4></td>
    		</tr>
    	</table>		
    	@foreach($records as $record)
       <table id="layout">
          <thead>
    	      <tr>
    	      <th>VOTEHEADS</th>
    	      <th>DESCRIPTION</th>
    	      </tr>
          </thead>
          <tbody>
          <tr>
          	<td>{{$record->name}}</td>
          	<td>{{$record->description}}</td>
          </tr>
          </tbody>
            @endforeach              
        </table>
    </section>
</body>
</html>