<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <style>
    div{
      line-height: 2px;
    }
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      padding:10px;
    }
    body {
  margin: 0;
  padding: 0;
  background-color: #FAFAFA;
  font: 12pt "Tahoma";
}
.page-break {
    page-break-after: always;
}
  </style>
</head>

<body>
    <div>
    <?php $logo = env('IMAGE_LINK').env('STORAGE_PATH').'assets/logo_new.png'?>
          <img src="{{$logo}}" style="padding-left:15%">   
    <p style="font-size:10px;padding-left:95px;"><b>State university | Re-accredited with "A" Grade By NACC  | Ranked 13th among Indian Universities by MHRD-NIRF</b></p>
    <h2 style="padding-left: 32%;padding-top:10px">Online Graduate Registration</h2>
</div>
  <table class="table table-bordered" >
    <tbody>
    <tr>
        <td colspan="2">Application No</td>
        <td>
         {{$show->application_no}}
        </td>
      </tr>
      <tr>
        <td colspan="2">Name in full(as entered in the
            degree certificate) Change of name, if any,recognized by the university should alos be entered with the number
            and date of the communication permitting the changes.</td>
        <td>
          @if($show->photo)
          <?php $photo = env('IMAGE_LINK').'images/'.$show->photo; ?>
          <img style="padding-top:20px" src="{{$photo}}" height=100 width=100> <br>       
          @endif
          {{$show->name}} 
        </td>
      </tr>
      <tr>
      <td colspan="2">Father's/Husband's Name</td>
        <td>
          {{$show->father_or_husband_name	}}
        </td>
      </tr>
      <tr>
      <td colspan="2">Aadhar Card Number</td>
        <td>
          {{$show->aadhar_number}}
        </td>
      </tr>
      <tr>
      <td colspan="3">Educational Qualification</td>
      </tr>
      <tr colspan="2">
        <td>Name of the Degree</td>
        <td>Name of the University</td>
        <td>Year of Passing</td>
     </tr>
     <tr colspan="2">
        <td> {{$show->degree_name}}</td>
        <td> {{$show->university}}</td>
        <td> {{$show->year_of_passing}}</td>
     </tr>
     <tr>
      <td colspan="2">Occupation</td>
        <td>
          {{$show->occupation}}
        </td>
      </tr>
      <tr>
      <td colspan="2">Mobile Number</td>
        <td>
          {{$show->mobile_no}}
        </td>
      </tr>
      <tr>
      <td colspan="2">Present Address</td>
        <td>
          {{$show->present_address}}
        </td>
      </tr>
      <tr>
      <td colspan="2">Whether the Bank Draft for rs.25/- towards the registration fee is attached</td>
      @if($show->dd_check == 1)
         
           <td>Yes</td>
         
         @else
           <td>No</td>
         
         @endif
      </tr>
      <tr>
      <td colspan="2">Whether,the original cerificate
              or copy of the degree Cerificate or provisional certificate duly attested by gazetted
              officer,Syndicate/Senate Member of Barathiyar university in proof of qualification is attested.</td>
        @if($show->deg_provitional_cerificate)
              <td>Yes</td>
        @else
            <td> No</td>
        @endif
      </tr>
      <tr>
      <td colspan="2">Signature</td>
        <td>
        @if($show->signature)
        <?php $sign = env('IMAGE_LINK').'images/' .$show->signature; ?>
          <img src="{{$sign}}" height=50 width=60>   
          @endif
        </td>
      </tr>
    </tbody>
  </table>
  <div>
  @if($show->aadhar_proof)
  <div class="page-break"></div>
  <?php $aadhar =env('IMAGE_LINK').'images/' .$show->aadhar_proof; ?>
          <img src="{{$aadhar}}">  
  @endif
 </div>
 <div>
  @if($show->address_proof)
  <div class="page-break"></div>
  <?php $address = env('IMAGE_LINK').'images/' .$show->address_proof; ?>
          <img src="{{$address}}" >   
  @endif
 </div>
 <div>
  @if($show->deg_provitional_cerificate	)
  <div class="page-break"></div>
  <?php $degree = env('IMAGE_LINK').'images/'.$show->deg_provitional_cerificate; ?>
  <img src="{{$degree}}" >   
  @endif
 </div>
</body>

</html>