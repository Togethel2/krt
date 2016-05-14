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
<body>
    <?php include('layout/layout-1.php');?> 
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><strong>ส่งเอกสารภายนอก</strong></h2>
                </div>
                <div class="panel-body">
                <div class="bs-example" data-example-id="bordered-table">
                    <div class="bs-example" data-example-id="basic-forms">
                        <form name="form1">
                            <div class="form-group">
                                <label>รหัสเอกสาร</label>   
                                 <select class="form-control" id="num_docs" >
                                    <option>------------ กรุณาเลือกเอกสาร ------------</option>
                                 </select>                            
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">เลือกเอกสารที่ต้องการส่ง</label>
                                <input type="file" id="exampleInputFile">
                            </div>
                              <button type="button" class="btn btn-default" id="sb">Submit</button>
                              <button type="cancel" class="btn btn-default">Cancel</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>   
     </div>
</body>
<?php include('layout/layout-2.php');?>       
<script src="js/scripts.js"></script>
    <script type="text/javascript">
    var id = '<?php echo $id; ?>';
    $( document ).ready(function() {
        $.ajax({
            url: 'http://localhost:80/krtservices/document/GET_document_userid.php', 
            type: 'post',
            data: {id:id},                                   
        }).success(function(res){
            var result = jQuery.parseJSON(res);
            console.log(result);
            $.each(result.document,function(key,value){
                console.log(value);
                $('#num_docs')
                .append($("<option></option>")
                   .attr("value",value.num_docs)
                    .text(value.num_docs + '-' + value.filename));  
            });
        });
        function getFileExtend(filename) {
            return filename.split(".").pop();
        }
         $('#sb').click(function(){   

            var file_data = $('#exampleInputFile').prop('files')[0];
            var form_data = new FormData();
          
            var file_type = getFileExtend(file_data.name);            
            var file_name = (file_data.name).split(".");
            var file_name_modified = file_name[0] + '-' +id +'.'+ file_type;    
    
            console.log(file_name_modified);
            form_data.append('file', file_data);
            
            $.ajax({
                url: 'http://localhost:80/krtservices/upload-return.php?filename='+file_name_modified, 
                type: 'post',
                data: form_data,
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,                                      
            }).success(function(result){
                console.log('IMG Success');
                 $.ajax({
                    url: 'http://localhost:80/krtservices/save_upload_return.php',
                    type: 'post',
                    data: {                        
                        num_docs : $('#num_docs').val(),
                        emp_id : id  ,
                        filename_new : file_name_modified
                    }
                }).success(function(result){
                    console.log('Data success');
                });
            }).error(function(result){
                console.log('error');
            });
       
        });
    });
    </script>
</html>
