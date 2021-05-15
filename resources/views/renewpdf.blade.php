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
    <?php $logo = env('LOGO_LINK').'logo_new.png'?>
          <img src="{{$logo}}" style="padding-left:15%">   
    <p style="font-size:10px;padding-left:95px;"><b>State university | Re-accredited with "A" Grade By NACC  | Ranked 13th among Indian Universities by MHRD-NIRF</b></p>
    <h2 style="padding-left: 32%;padding-top:10px">Online Graduate Renewal</h2>
</div>
  <table class="table table-bordered" >
    <tbody>
    <tr>
        <td>Application No</td>
        <td>
         {{$show->application_no}}
        </td>
      </tr>
      <tr>
        <td>Name in full(as entered in the
            degree certificate) Change of name, if any,recognized by the university should alos be entered with the number
            and date of the communication permitting the changes.</td>
        <td>
          @if($show->photo)
          <?php $photo = env('STORAGE_PATH').'images/'.$show->photo; ?>
          <img style="padding-top:20px" src="{{$photo}}" height=100 width=100> <br>       
          @endif
          {{$show->name}} 
        </td>
      </tr>
      <tr>
      <td>Father's/Husband's Name</td>
        <td>
          {{$show->father_or_husband_name	}}
        </td>
      </tr>
      <tr>
      <td>Aadhar Card Number</td>
        <td>
          {{$show->aadhar_number}}
        </td>
      </tr>
     <tr>
      <td>Occupation</td>
        <td>
          {{$show->occupation}}
        </td>
      </tr>
      <tr>
      <td>Mobile Number</td>
        <td>
          {{$show->mobile_no}}
        </td>
      </tr>
      <tr>
      <td>Present Address</td>
        <td>
          {{$show->present_address}}
        </td>
      </tr>
      <tr>
      <td>Whether the Bank Draft for Rs.10/- towards the registration fee is attached</td>
      @if($show->dd_check == 1)
         
           <td>Yes</td>
         
         @else
           <td>No</td>
         
         @endif
      </tr>
      <tr>
      <td>Whether,the original cerificate
              or copy of the degree Cerificate or provisional certificate duly attested by gazetted
              officer,Syndicate/Senate Member of Barathiyar university in proof of qualification is attested.</td>
        @if($show->deg_provitional_cerificate)
              <td>Yes</td>
        @else
            <td> No</td>
        @endif
      </tr>
      <tr>
      <td>Date of Submission</td>
        <td>
          {{$show->date_of_submission}}
        </td>
      </tr>
      <tr>
      <td>Signature</td>
        <td>
        @if($show->signature)
        <?php $sign = env('STORAGE_PATH').'images/' .$show->signature; ?>
          <img src="{{$sign}}" height=50 width=60>   
          @endif
        </td>
      </tr>
    </tbody>
  </table>
  <div>
  @if($show->aadhar_proof)
  <div class="page-break"></div>
  <?php $aadhar =env('STORAGE_PATH').'images/' .$show->aadhar_proof; ?>
          <img src="{{$aadhar}}">  
  @endif
 </div>
 <div>
  @if($show->address_proof)
  <div class="page-break"></div>
  <?php $address = env('STORAGE_PATH').'images/' .$show->address_proof; ?>
          <img src="{{$address}}" >   
  @endif
 </div>
 <div>
  @if($show->deg_provitional_cerificate	)
  <div class="page-break"></div>
  <?php $degree = env('STORAGE_PATH').'images/'.$show->deg_provitional_cerificate; ?>
  <img src="{{$degree}}" >   
  @endif
  @if($show->dd_image	)
  <div class="page-break"></div>
  <?php $dd_image = env('STORAGE_PATH').'images/'.$show->dd_image; ?>
  <img src="{{$dd_image}}" >   
  @endif
 </div>
</body>

</html>