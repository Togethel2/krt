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
                               
                                <input type="text" class="form-control" id="num_docs" >
                            <div class="form-group">
                                <label for="disabledSelect">กรุณาเลือกผู้รับเอกสาร</label>
                                <select id="disabledSelect" id="select_prison" name="select_prison" class="form-control">
                                    <option value="0">Disabled select</option>
                                    <option value="1">เรือนจำเขตที่1</option>
                                    <option value="2">เรือนจำเขตที่2</option>
                                    <option value="3">เรือนจำเขตที่3</option>
                                    <option value="4">เรือนจำเขตที่4</option>
                                    <option value="5">เรือนจำเขตที่5</option>
                                    <option value="6">เรือนจำเขตที่6</option>
                                    <option value="7">เรือนจำเขตที่7</option>
                                    <option value="8">เรือนจำเขตที่8</option>
                                    <option value="9">เรือนจำเขตที่9</option>
                                    <option value="10">เรือนจำเขตอิสระ</option>
                                </select>
                            </div>
                            <div id="show_test">
                                <div class="row">
                                  <div class="col-md-4">
                                        <select class="form-group" id="Prisons1" name="data1" multiple style="width:100%;height: 150px;">                                          
                                        </select>
                                  </div>
                                  <div class="col-md-1">
                                    <button class="form-control" id="btn_next" type="button"> >> </button>
                                    <button class="form-control" id="btn_previos" type="button"> << </button>
                                  </div>
                                  <div class="col-md-4">
                                       <select class="form-group" id="Prisons2" name="data2" multiple style="width:100%;height: 150px;">
                                          
                                        </select>
                                  </div>
                                   
                                </div>
                            </div>
                                    <div class="form-group">
                                    <label for="disabledSelect2">เลือกฟอร์มเอกสารที่ต้องการส่ง</label>
                                    <select id="doctype" class="form-control" name="doctype">
                                        <option>Disabled select</option>
                                        <option>เอกสารของบประมาณ</option>
                                        <option>เอกสารประเมินผล</option>                             
                                    </select>
                            </div>
                            <label for="exampleInputFile">เลือกเอกสารที่ต้องการส่ง</label>
                            <input type="file" id="exampleInputFile">       
                            <div class="form-group">
                                    <label for="disabledSelect2">กำหนดวันส่ง</label>
                                    <select id="deadline_select" class="form-control">
                                        <option value="3">3 วัน</font></option>
                                        <option value="7">7 วัน</option>
                                        <option value="14">2 สัปดาห์</option>
                                        <option value="21">3 สัปดาห์</option>
                                        <option value="30">1 เดือน</option>
                                        <option value="60">2 เดือน</option>
                                    </select>
                            </div>
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
    $('.outfile ').addClass('active')
    var select_subprison = [];
    $( document ).ready(function() {
        var Prisons ;
        $('#disabledSelect').change(function() {
            $('#Prisons1 option').remove();
            var id = $('#disabledSelect option:selected').val();
            $.ajax({
                url:"http://localhost:80/krtservices/get_prison_in_area.php",
                type:"POST",
                data: {id : id}
                
            }).success(function(result){
                var value = JSON.parse(result);
                var temp_array= [];
                Prisons = value;
                select_subprison.sort();

                $.each(Prisons.data, function(key, value) {  
                    temp_array.push(value.id);    
                    if(select_subprison == ""){           
                        $('#Prisons1')
                         .append($("<option></option>")
                            .attr("value",value.id)
                            .text(value.name_prison));  
                    }else{
                        unselect_subprison = inverseintersect(select_subprison, temp_array.sort());
                        for(i=0;i<unselect_subprison.length;i++){
                            if(unselect_subprison[i] == value.id){
                                 $('#Prisons1').append($("<option></option>")
                                    .attr("value",value.id)
                                    .text(value.name_prison));  
                            }
                        }
                    }                  
                });
                // console.log(select_subprison);
                // console.log();

              
            });    
        });

        function inverseintersect(a,b){
            var temp = [], result = [];
                for (var i = 0; i < a.length; i++) {
                    temp[a[i]] = true;               
                }
                for (var i = 0; i < b.length; i++) {
                    if (temp[b[i]]) {
                        delete temp[b[i]];
                    } else {
                        temp[b[i]] = true;
                    }
                }
                for (var k in temp) {
                    result.push(k);
                }
            return result;
        }

        $('#btn_next').click(function(){   
            var text  = $('#Prisons1 option:selected').text();
            var value = $('#Prisons1 option:selected').val();
            if(text !== ""){
                select_subprison.push(value);
                $('#Prisons2').append($("<option></option>")
                    .attr("value",value)
                    .text(text)
                );
                $('#Prisons1 option:selected').remove();
            }
            console.log('next',select_subprison);
        });
        
        $('#btn_previos').click(function(){
            var text  = $('#Prisons2 option:selected').text();
            var value = $('#Prisons2 option:selected').val();
            
            for(i=0;i<select_subprison.length-1;i++){
                if(value == select_subprison[i]){
                    var temp = select_subprison[i];
                    select_subprison[i] = select_subprison[select_subprison.length-1];
                    select_subprison[select_subprison.length-1] = temp;
                }
                
                select_subprison.pop();
            }
             $('#Prisons1').append($("<option></option>")
                .attr("value",value)
                .text(text)
            );
            $('#Prisons2 option:selected').remove();
            console.log('previos',select_subprison);
        });

        $('#sb').click(function(){   
            var file_name = $('#exampleInputFile').prop('files')[0];
            var form_data = new FormData();
            
            var file_name_modified = file_name.name;            
            form_data.append('file', file_name);
            
            $.ajax({
                url: 'http://localhost:80/krtservices/upload.php', 
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
                    url: 'http://localhost:80/krtservices/savedata.php',
                    type: 'post',
                    data: {
                        //todate : today_date(),
                        //formdate : today_date($('#deadline_select option:selected').val()),
                        num_docs : $('#num_docs').val(),
                        doc_type : $('#doctype option:selected').val(),
                        prison_name : $('#disabledSelect option:selected').text(),
                        sub_select : sub_prison2_select,
                        deadline_select : $('#deadline_select option:selected').val(),  
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
</html>
