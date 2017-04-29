<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/pdfmake-0.1.18/dt-1.10.13/af-2.1.3/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.css"/>

</head>
<body>
  <h1>Hello, world!</h1>
  <div class="">
    <table id="datatables" class="table table-hover cell-border display nowrap w-100">
      <thead>
        <tr>
          <th>remote host</th>
          <th>timeestamp</th>
          <th>request method</th>
          <th>request protocol</th>
          <th>request uri</th>
          <th>status</th>
          <th>bytes</th>
          <th>referer</th>
          <th>site</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>remote host</th>
          <th>timeestamp</th>
          <th>request method</th>
          <th>request protocol</th>
          <th>request uri</th>
          <th>status</th>
          <th>bytes</th>
          <th>referer</th>
          <th>site</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/pdfmake-0.1.18/dt-1.10.13/af-2.1.3/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
  <script type="text/javascript" src=https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.9.0/jquery.mark.min.js></script>
  <!-- remote_host, time_stamp, request_method, request_protocol, request_uri, status, bytes, referer, site -->
  <script>
  $(document).ready(function() {
    $('#datatables').DataTable({
      "ajax": "http://localhost/html/sfd/index.php/api/get/<?php echo $remote_host; echo $this->input->get('filter') ? '?filter=true':'';?>",
      "columns" :  [
        { "data" : "remote_host" },
        { "data" : "time_stamp" },
        { "data" : "request_method" },
        { "data" : "request_protocol" },
        { "data" : "request_uri" },
        { "data" : "status" },
        { "data" : "bytes" },
        { "data" : "referer" },
        { "data" : "site" }
      ],
      "columnDefs": [{
        "render" : function(data, type, row){
          return "<a href='http://localhost/html/sfd/index.php/showdata/index/"+ row['remote_host']  +"'>" + row['remote_host'] +"</a>"
        },
        "targets" : [0]
      }]
    }).on( 'draw', function(){
      $("td").markRegExp(/(%20)|(%00)|(\|)|(\!)|(%7C)|(%21)|(%3E)|(>)|(<)|(%3C)|(<\?)|(')|(%27)|(\.\.)/g);
    });
  } );
  </script>
</body>
</html>
