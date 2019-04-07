<!DOCTYPE html>
<html>
<head>
    <title>Employees List</title>
     <style>
    #layout {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-top: 110px;
        caption-side: top;
    }

    #layout td, #layout th {
        border: 1px solid #ddd;
        padding: 8px;
    }


    #layout tr:hover {background-color: #ddd;}

    #layout th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color:#eceff1;
        color: #222222;
    }
 caption{
font-size: 26px;
font-weight: bold;
color:#222222;
padding: .2em .8em;
}
   /* Create 2 unequal columns that floats next to each other */
}
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
    <div class="column left"><img src="{{ public_path('/images/logo.jpg') }}" alt="LOGO"></div>
    <div class="column right"><h1>MKULIMA DIGITAL</h1>
                              <h4>P.O. BOX 96 NAIROBI</h4>
                              <h4><i>The Best Dairy Management System</i></h4>
                          </div>
              </div>
              <h6>&nbsp;</h6>

<table id="layout">
    <caption>EMPLOYEES LIST</caption>
     <thead>
        <tr class="">
            <th>#</th>
            <th>EMPLOYEE NAME.</th>
            <th>EMPLOYEE_ID</th>
            <th>EMPLOYEE PHONE</th>
            <th>EMPLOYEE PAYROLL NUMBER</th>
            <th>EMPLOYEE EMAIL</th>
        </tr>
    </thead>
    <tbody>
           @forelse($employees as $i=> $employee)
        <tr>
         <td>{{ $i+1 }}</td>
         <td>{{ $employee->name }}</td>
         <td>{{ $employee->nid }}</td>
         <td>{{ $employee->phone }}</td>
         <td>{{ $employee->payroll_no }}</td>
         <td>{{ $employee->email }}</td>

   

        </tr>
          @empty
         <p>No data found</p>
         @endforelse
    </tbody>
</table>
</body>
</html>

