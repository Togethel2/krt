<!DOCTYPE html>
<html lang="en">
<body>
     <?php include('layout/layout-1.php');?>  
     <!--overview start-->
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><strong>ส่งเอกสารภายใน</strong></h2>
              </div>
              <div class="panel-body">
                <div class="bs-example" data-example-id="bordered-table">
                  <div class="bs-example" data-example-id="basic-forms">
                    <form>
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
     <?php include('layout/layout-2.php');?>       
  
</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
     $('#sb').click(function(){   
            var file_name = $('#exampleInputFile').prop('files')[0];
            var form_data = new FormData();
            
            var file_name_modified = file_name.name;            
            form_data.append('file', file_name);
            
            $.ajax({
                url: 'http://localhost:80/krtservices/uploadin.php', 
                type: 'post',
                data: form_data,
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,                                      
            }).success(function(result){
                console.log('IMG Success');
                var sub_prison2_select = [];
                $('#Prisons2 option').each(function(){
                    sub_prison2_select.push($(this).val())
                })
                
                $.ajax({
                    url: 'http://localhost:80/krtservices/savedatain.php',
                    type: 'post',
                    data: {                         
                        file_name : file_name_modified  
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
