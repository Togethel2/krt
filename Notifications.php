<?php 
  require_once('connect/databasehtml.php');
  if(!isset($_SESSION)) 
    { 
        session_start();

        if(empty($_SESSION)) 
        { 
          header( "location: index.php" );
        } 
        else
        {
           $id = $_SESSION['id'];
        }
    } 

?>  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Project</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    

  </head>

  <body>
     <?php include('layout/layout-1.php');?>  
      
              <!--overview start-->
                <div class="row">
                    
    </div>                

      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
               <h2><strong>กล่องข้อความ</strong></h2>
                </div>
                <div class="panel-body">
                   <div class="bs-example" data-example-id="bordered-table">
                    <div class="bs-example" data-example-id="simple-table"> 
                      <div id="tb_message"> </div>
                    </div>
                  </div>
                </div>
            </div> 
          </div>   
        </div>

              
     <?php include('layout/layout-2.php');?>       
  

    <!-- javascripts -->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
   
    <script>
    var id = '<?php echo $id; ?>';
    $.ajax({
        url: 'http://localhost:80/krtservices/document/GET_Notifications.php', 
        type: 'POST',
        data: {id:id},   
                                         
    }).success(function(res){
        var result = jQuery.parseJSON(res);
        var html = '';
        console.log(res);
        if(result['success'] == 1)
        {
          html += '<table class="table">';
          html += '<tr>';
          html += '<td> # </td>';
          html += '<td> ชื่อไฟล์ </td>';
          html += '<td> วันกำหนดส่ง </td>';
          html += '<td> จำนวนวัน </td>';         
          html += '<td> รหัสเอกสาร </td>';
         
          html += '<td> วันที่เหลือ </td>';
          
  
          html += '</tr>';
          for(var i in result['document_not'])
          {
            html += '<tr>';
              html += '<td>';
              html += parseInt(i)+1;
              html += '</td>';

              html += '<td>';
              html += result['document_not'][i]['filename'];
              html += '</td>';

              html += '<td>';
              html += result['document_not'][i]['out_docs'];
              html += '</td>';

              html += '<td>';
              html += result['document_not'][i]['deadline'];
              html += '</td>';

              html += '<td>';
              html += result['document_not'][i]['num_docs'];
              html += '</td>';

              if(result['document_not'][i]['Diff'] < 2){
                html += '<td style="color: red;">***';
                html += result['document_not'][i]['DiffDate'];
                html += '</td>';
              }else{
                html += '<td>';
                html += result['document_not'][i]['DiffDate'];
                html += '</td>';
              }
             

            html += '</tr>';
          }
          html += '</table>';
        }
        else
        {

        }

      $('#tb_message').html(html);
    }).error(function(result){
        console.log('error');
    });
      
    </script>
</body>
</html>


