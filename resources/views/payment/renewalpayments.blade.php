<html>
    <head>
        <title>Print Receipt</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
      padding:10px;
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
.bg{
  color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    padding:5px;
    border-radius:4px;
}
  </style>
    </head>
    <body>
    <div class="text-center" align="center">
    <?php $logo = env('LOGO_LINK').'logo_new.png'?>
          <img src="{{$logo}}" >   
    <p><b>State university | Re-accredited with "A" Grade By NACC  | Ranked 13th among Indian Universities by MHRD-NIRF</b></p>
    <h2>Online Graduate Renewal</h2>
</div>
<div align="center">
<script>
    function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
    var value = readCookie('user_id');
    console.log(value)
</script>
  <table class="table table-bordered" style="width:50%">
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
        <td colspan="2"><b>Transaction ID<b></td>
        <td>
        {{$details->transaction_id}}
        </td>
      </tr>
      <tr>
        <td colspan="3"><a class="button bg" class="btn btn-primary" onclick="goToUrl()" target="blank"  id="print">Print Receipt</a></td>
        <!-- <td colspan="2"><button class="button" class="btn btn-primary" onclick="closed()">Home</button></td> -->
        <script>
     function goToUrl(){
let url = "http://budca.in/erp/links/public/api/downloadrenewalreceipt/" + value;

window.location.href = url;
}

  </script>
      </tr>
</tbody>
</table>
</div>
    </body>
</html>