<?php
    // Names: Samuel Munoz
    // Names: Erik Cohen
?>

<?php
try {
    $db = new PDO("mysql:dbname=smunoz23;host=localhost", "smunoz23", "blueMooN101");

    $id = $_POST['id'];

    // remove old entries of project selected in ProjectDeveloper, ProjectFrontEnd, and ProjectBackEnd
    $db->exec("DELETE FROM ProjectDeveloper WHERE prj_id='" . $id . "'");
    $db->exec("DELETE FROM ProjectFrontEnd WHERE prj_id='" . $id . "'");
    $db->exec("DELETE FROM ProjectBackEnd WHERE prj_id='" . $id . "'");

    // update new entries
    $query = "UPDATE Projects SET ";
    $query .= "db='" . $_POST['db'] . "'";
    $query .= " WHERE id='" . $id . "'";
    $db->exec($query);

    // query to link new developers to selected project
    $query = "INSERT INTO ProjectDeveloper(prj_id, dev_id, role) VALUES ";
    $devs = $_POST['devs'];
    for($i = 0; $i < count($devs); $i++) {
        $query .= "(" . $id . ", " . $devs[$i] . ", '" . $_POST['roles'][$i] . "')";
        if($i != count($devs)-1) {
            $query .= ", ";
        }
    }
    $db->exec($query);
    // echo $query;

    // query to link new frontend to selected project
    $query = "INSERT INTO ProjectFrontEnd(prj_id, frontend) VALUES ";
    $frontend = $_POST['frontend'];
    for($i = 0; $i < count($frontend); $i++) {
        $query .= "(" . $id . ", '" . $frontend[$i] . "')";
        if($i != count($frontend)-1) {
            $query .= ", ";
        }
    }
    $db->exec($query);

    // query to link new backend to selected project
    $query = "INSERT INTO ProjectBackEnd(prj_id, backend) VALUES ";
    $backend = $_POST['backend'];
    for($i = 0; $i < count($backend); $i++) {
        $query .= "(" . $id . ", '" . $backend[$i] . "')";
        if($i != count($backend)-1) {
            $query .= ", ";
        }
    }
    $db->exec($query);

    // print data for javascript
    $rows = $db->query("SELECT d.fname, d.lname, pd.role FROM Developers d INNER JOIN ProjectDeveloper pd ON d.id = pd.dev_id INNER JOIN Projects p ON p.id = pd.prj_id WHERE p.id='" . $id . "'");
    foreach($rows as $row) {
        echo "dev," . $row['fname'] . " " . $row['lname'] . "\n";
        echo "role," . $row['role'] . "\n";
    }

    $rows = $db->query("SELECT db FROM Projects WHERE id='" . $id . "'");
    foreach($rows as $row) {
        echo "db," . $row['db'] . "\n";
    }

    $rows = $db->query("SELECT frontend FROM ProjectFrontEnd pf INNER JOIN Projects p ON p.id = pf.prj_id WHERE p.id='" . $id . "'");
    foreach($rows as $row) {
        echo "frontend," . $row['frontend'] . "\n";
    }

    $rows = $db->query("SELECT backend FROM ProjectBackEnd pb INNER JOIN Projects p ON p.id = pb.prj_id WHERE p.id='" . $id . "'");
    foreach($rows as $row) {
        echo "backend," . $row['backend'] . "\n";
    }
}
catch(PDOexception $err) {
    echo $err->getMessage();
}
?>
