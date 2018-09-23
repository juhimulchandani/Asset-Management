
var TableDatatables=function(){
    var handleStudentTable=function(){
        var studentTable=jQuery("#student_list");
        
        var oTable= studentTable.dataTable({
            "processing": true,
            "serverSide":true,
            "ajax":{
                url:
                "http://localhost/Asset Management/managestudents.php",
                type:"POST",
            },
            "lengthmenu":[
                [5,15,20,-1],
                [5,15,25,"ALL"]
            ],
            "pageLength":15,//set the default length
            "order":[
                [1," desc"]
            ],
            "columnDefs":[{
                'orderable':false,
                'targets':[0,-1,-2]
            }],
//            "columnDefs":[{
//                'orderable':false,
//                'targets':[0],
//                'data':"img",
//                "render": function(data,type,row)
//                {
//                    var image_name=row[0];
//                    var res=image_name.split(".");
//                    if(res[1]!="")
//                        {
//                            return "<img class='img-responsive' height='75px' src='http://localhost/erp/assets/product/images/"+row[0]+"'/>";
//                        }
//                    else{
//                        return '<img height="75px" class="img-responsive" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />';
//                    }
//                }
//            }],
        });
        productTable.on('click','.edit',function(e){
            $id=$(this).attr('id');
            $("#edit_product_id").val($id);
            //fetching all th eother values from databse using ajax call and loading gthem onto their respective fields
//            alert($id);
            $.ajax({
                url:"http://localhost/erp/pages/scripts/product/fetch.php",
                method:"POST",
                data:{supplier_id: $id},
                dataType:"json",
                success: function(data){
                    $("#supplier_name").val(data.supplier_name);
                    $("#supplier_address").val(data.supplier_address);
                    $("#supplier_email").val(data.supplier_email);
                    $("#supplier_contact").val(data.supplier_contact);
                    $("#gst_no").val(data.gst_no);
                    $("#editModal").modal('show');
                },
            });
        });
        productTable.on('click','.delete',function(e){
            $id=$(this).attr('id');
            $("#recordID").val($id);
        });
        
   }
    return{
        //main function in javascript to handle all the initialization part
        init:function(){
            handleStudentTable();
        }
    };
}();

jQuery(document).ready(function(){
    TableDatatables.init();  
});