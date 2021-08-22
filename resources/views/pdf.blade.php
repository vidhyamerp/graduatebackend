<html>

<head>
  <meta charset="utf-8">
  <title></title>
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
  </style>
</head>

<body>
    <div>
    <?php $logo = env('LOGO_LINK').'logo_new.png'?>
          <img src="{{$logo}}" style="padding-left:15%">   
    <p style="font-size:10px;padding-left:95px;"><b>State university | Re-accredited with "A" Grade By NACC  | Ranked 13th among Indian Universities by MHRD-NIRF</b></p>
    <h2 style="padding-left: 20%;padding-top:10px">Online Graduate Registration -  {{$show->district}}</h2>
</div>
  <table class="table table-bordered" >
    <tbody>
    <tr>
        <td colspan="2">{{$show->session}}</td>
        <td>
         Reg.No : {{$show->registration_number}}
        </td>
      </tr>
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
          <?php $photo = env('STORAGE_PATH').'images/'.$show->photo; ?>
          <img style="padding-top:20px" src="{{$photo}}" height=100 width=100> <br>       
          @endif
          {{$show->name}} 
        </td>
      </tr>
      <tr>
          <td colspan="2">Is there a change of name?</td>
          <td>
          @if($show->name_change === 1)
            <span>YES</span>
          @endif
          @if($show->name_change === 0)
            <span>NO</span>
            @endif
          </td>
        </tr>
        @if($show->name_change === 1)
        <tr>
        <td colspan="2">Communication for Change of Name</td>
        <td>
          <span><b>Communication No:</b> {{$show->communication_number}}</span><br/><br/>
            <span><b>Date of Name Change:</b> {{$show->name_change_date}}</span><br/><br/>
            <span><b>Proof of Name Change</b> 
            <?php $name_change_docs = env('STORAGE_PATH').'images/' .$show->name_change_docs; ?>
          <img src="{{$name_change_docs}}" height=100 width=100>   
          </span><br/>
        </td>
      </tr>
      @endif
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
              <td colspan="2">Date of Birth</td>
              <td>
                <?php $date=date_create($show->dob); $dob=date_format($date,"d-m-Y");?>
                {{$dob}}
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
              <td colspan="2">Communication Address</td>
              <td>
                {{$show->present_address}}
              </td>
            </tr>
            <tr>
              <td colspan="2">Residential Address</td>
              <td>
                {{$show->residential_add}}
              </td>
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
      <td colspan="2" rowpan="2">Payment</td>
      @if($slip)
        <td>
          {{$slip->status}}
        </td>
        @else
        <td>
         Not Paid
        </td>
        @endif
      </tr>
      <tr>
      <td colspan="2">Date of Submission</td>
        <td>
          {{$show->date_of_submission}}
        </td>
      </tr>
      <tr>
      <td colspan="2">Signature</td>
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
 </div>
</body>

</html>