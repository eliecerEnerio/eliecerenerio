<?php
    $db = dbConnect();

    if(isset($_GET['q']))
    {
        $chases = $_GET['q'];
        
        $sql = "SELECT * FROM chasis ";
        
        if( !empty($chases) || !is_null($chases) || $chases !== null){
            $sql = $sql . "WHERE chassis_sku LIKE '%" . $chases."%'";
        }
        
        $result = execute($db, $sql);
        
        foreach($result as $k){
            
            $data[] = [
                "id" => $k['id'],
                "text" => $k['chassis_sku']
            ];
        }

        echo json_encode($data);
    }
    else
    {
        $sql = "SELECT * FROM chasis ";
        $result = execute($db, $sql);
        
        foreach($result as $k){
            
            $data[] = [
                "id" => $k['id'],
                "text" => $k['chassis_sku']
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