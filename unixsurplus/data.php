<?php
    $db = dbConnect();

    if(isset($_POST["id"]))
    {
        $sql = "SELECT 
                    a.id,
                    a.chassis_sku,
                    a.chassis_title,
                    a.form_factor,
                    a.backplane,
                    b.model as motherboard,
                    b.cpu_family,
                    b.memory_type,
                    b.ob_nick,
                    c.price
                FROM chasis a
                LEFT JOIN motherboards b on a.id = b.chasis_id
                LEFT JOIN prices c on c.motherboard_id = b.id
                WHERE a.id = ".$_POST["id"];
        $result = execute($db, $sql);

        foreach($result as $k){
            
            $data = [
                "id" => $k['id'],
                "chassis_sku" => $k['chassis_sku'],
                "chassis_title" => $k['chassis_title'],
                "form_factor" => $k['form_factor'],
                "mother_board" => $k['motherboard'],
                "back_lane" => $k['backplane'],
                "cpu_family" => $k['cpu_family'],
                "memory_type" => $k['memory_type'],
                "ob_nick" => $k['ob_nick'],
                "price" => $k['price']
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