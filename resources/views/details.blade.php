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
  </style>
</head>

<body>
  
  <table class="table table-bordered" >
<thead>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
  </tr>
</thead>
    <tbody>
    <tr>
      <td>
     {{$show->first_name}}
</td>
<td>
{{$show->last_name}}
</td>
</tr>
    </tbody>
  </table>
</body>

</html>