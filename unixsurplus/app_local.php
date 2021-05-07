<?php
    $db = dbConnect();
    $sql = "SELECT * FROM chasis";
    $result = execute($db, $sql);
    
    function dbConnect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        return mysqli_connect($servername, $username, $password, "unix_surplus");
    }

    function execute($con, $sql)
    {
        return mysqli_query($con, $sql);
    }
?>


<!DOCTYPE html>


<html>
    <head>  
        <script type="text/javascript" src="web/jquery/jquery-3.2.1.min"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css"/>
        
    </head>

    <style>
            .header {
                overflow: hidden;
                background-color: #f1f1f0;
                padding: 20px 10px;
            }

            .table-responsive {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                overflow: hidden;
                background-color: #f1f1f0;
            }
        }
    </style>

    <body>
        <div class="container" style="width:900px;">
            <div class="header">
                <h2 align="center">Unix Surplus</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                        <!-- <select <select name="data_list" id="data_list" class="form-control">
                            <option value="">Select a chasis...</option>
                            <?php 
                                foreach($result as $k)
                                {
                                    echo '<option value="'. $k["id"] .'">' . $k['chassis_sku'] . '</option>';
                                }
                            ?>
                        </select> -->

                        <select name="data_list" id="data_list" class="form-control">
                        </select>
                        
                </div>
                <div class="col-md-4">
                    <button type="button" name="fetch" id="fetch" class="btn btn-primary">Fetch</button>
                </div>
            </div>
            <br>
            <div class="table-responsive" id="details" style="display:none">

                <table class="table table-bordered">
                    <tr>
                        <td width="20%" align="right"><b>Chasis Title</b></span></td>
                        <td width="80%"><span id="chasis_title"></span></td>
                    </tr>
                    <tr>
                        <td width="20%" align="right"><b>Mother Board</b></span></td>
                        <td width="80%"><span id="mother_board"></span></td>
                    </tr>
                    <tr>
                        <td width="20%" align="right"><b>Price</b></span></td>
                        <td width="80%"><span id="price"></span></td>
                    </tr>
                    <tr>
                        <td width="20%" align="right"><b>Form Factor</b></span></td>
                        <td width="80%"><span id="form_factor"></span></td>
                    </tr>
                    <tr>
                        <td width="20%" align="right"><b>Back Lane</b></span></td>
                        <td width="80%"><span id="back_lane"></span></td>
                    </tr>
                    <tr>
                        <td width="20%" align="right"><b>CPU family</b></span></td>
                        <td width="80%"><span id="cpu_family"></span></td>
                    </tr>
                    <tr>
                        <td width="20%" align="right"><b>Memory Type</b></span></td>
                        <td width="80%"><span id="memory_type"></span></td>
                    </tr>
                    <tr>
                        <td width="20%" align="right"><b>OB Nick</b></span></td>
                        <td width="80%"><span id="ob_nick"></span></td>
                    </tr>
                </table>          

                <!-- horizontal headers -->
                <!-- <table class="table table-boarder">
                    <tr>
                        <th align="center"><b>Chasis Title</b></th>
                        <th align="center"><b>Mother Board</b></th>
                        <th align="center"><b>Price</b></th>
                        <th align="center"><b>Form Factor</b></th>
                        <th align="center"><b>Back Lane</b></th>
                        <th align="center"><b>CPU family</b></th>
                        <th align="center"><b>Memory Type</b></th>
                        <th align="center"><b>OB Nick</b></th>
                    </tr>
                    <tr>
                        <td ><span id="chasis_title"></span></td>
                        <td ><span id="mother_board"></span></td>
                        <td ><span id="price"></span></td>
                        <td ><span id="form_factor"></span></td>
                        <td ><span id="back_lane"></span></td>
                        <td ><span id="cpu_family"></span></td>
                        <td ><span id="memory_type"></span></td>
                        <td ><span id="ob_nick"></span></td>
                        
                    </tr>
                </table> -->
            </div>
        </div>
    </body>
</html>

<script>

    $(document).ready(function(){

        $("#data_list").select2({
            placeholder: "Select a chases...",
            ajax: {
                url: "list.php",
                type: "GET",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    }
                },
                processResults: function(data){
                    return {
                        results: data
                    }
                },
                cache:true
            }
        });

        $('#fetch').click( function() {
            var id = $('#data_list').val();

            if(id != null){
                $.ajax({
                    url: "data.php",
                    method: "POST",
                    data:{id:id},
                    dataType:"JSON",
                    success:function(data){
                        $('#details').css("display", "block");
                        $('#chasis_title').text(data.chassis_title);
                        $('#form_factor').text(data.form_factor);
                        $('#back_lane').text(data.back_lane);
                        $('#mother_board').text(data.mother_board);
                        $('#price').text(data.price);
                        $('#cpu_family').text(data.cpu_family);
                        $('#memory_type').text(data.memory_type);
                        $('#ob_nick').text(data.ob_nick);
                    }
                })
            }else{
                alert('Please Select a chasis');
                $('#details').css("display", "none");
            }

        })
    });
    
</script>
