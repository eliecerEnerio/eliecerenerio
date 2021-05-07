<?php
    if(isset($_POST["id"]))
    {
        $db = dbConnect();
        $sql = "SELECT * FROM coding WHERE id = ".$_POST["id"];
        $result = execute($db, $sql);

        foreach($result as $k){
            
            $data = [
                "id" => $k['id'],
                "chassis_sku" => $k['chassis_sku'],
                "chassis_title" => $k['chassis_title'],
                "form_factor" => $k['form_factor'],
                "mother_board" => $k['mother_board'],
                "back_plane" => $k['back_plane']
            ];
        }

        echo json_encode($data);
    }

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