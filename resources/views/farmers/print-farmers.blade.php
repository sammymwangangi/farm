<!DOCTYPE html>
<html>
<head>
    <title>Farmers List</title>
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
    <caption>FARMER'S LIST</caption>
     <thead>
        <tr class="">
            <th>#</th>
            <th>FARMER No.</th>
            <th>FARMER NAME.</th>
            <th>FARMER_ID</th>
            <th>FARMER LOCALITY</th>
            <th>FARMER PHONE</th>
            <th>FARMER ACCOUNT</th><!-- 
            <th>Phone</th>
            <th>Email</th> -->
        </tr>
    </thead>
    <tbody>
           @forelse($farmers as $i=> $farmer)
        <tr>
         <td>{{ $i+1 }}</td>
         <td>{{ $farmer->no }}</td>
         <td>{{ $farmer->name }}</td>
         <td>{{ $farmer->nid }}</td>
         <td>{{ $farmer->locality }}</td>
         <td>{{ $farmer->phone }}</td>
         <td>{{ $farmer->acno }}</td><!-- 
         <td>{{ $farmer->last_paid }}</td>
         <td>{{ $farmer->photo}}</td> -->

   

        </tr>
          @empty
         <p>No data found</p>
         @endforelse
    </tbody>
</table>
</body>
</html>

