<html>
    <head>
        <title>Print Receipt</title>
        
    <style>
    div{
      line-height: 2px;
    }
    table,
    th{
      border: 1px solid black;
      border-collapse: collapse;
      padding:10px;
    }
    td {
      border: 1px solid black;
      border-collapse: collapse;
      padding:20x;
    }
    body {
  margin: 0;
  padding: 0;
  font: 12pt "Tahoma";
}
.page-break {
    page-break-after: always;
}
.rowClass {
vertical-align:middle !important;
height:90px;
}
.cellClass {
vertical-align:middle !important;
height:90px;
}
  </style>
    </head>
    <body>
    <div class="text-center" align="center">
    <?php $logo = env('LOGO_LINK').'logo_new.png'?>
          <img src="{{$logo}}" >   
    <h2>Online Graduate Registration - Receipt</h2>
</div>
<div align="center">

  <table class="table table-bordered" style="width:100%" align="center">
    <tbody>
    <tr>
        <td colspan="2"><b>Status</b></td>
        <td>
         {{$details->status}}
        </td>
      </tr>
    <tr>
        <td colspan="2"><b>Name<b></td>
        <td>
        {{$details->name}}
        </td>
      </tr>
      <tr>
        <td colspan="2"><b>Email<b></td>
        <td>
        {{$details->email}}
        </td>
      </tr>
      <tr>
        <td colspan="2"><b>Transaction Date<b></td>
        <td>
        {{$details->transaction_date}}
        </td>
      </tr>
      <tr>
        <td colspan="2"><b>Amount<b></td>
        <td>
        {{$details->amount}}
        </td>
      </tr>
      <tr>
        <td colspan="2"><b>Tansaction ID<b></td>
        <td>
        {{$details->transaction_id}}
        </td>
      </tr>
</tbody>
</table>
</div>
    </body>
</html>