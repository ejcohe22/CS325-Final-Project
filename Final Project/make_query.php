<?php
// connect to database
$db = new PDO("mysql:dbname=ProjectCollection;host:localhost", "sam", "blueMooN#101");

// create global variables
$database = array();
$frontend = array();
$backend = array();

// construct query
if( isset($_POST['db']) ) {
    foreach($_POST['db'] as $word) {
        $database[] = $word;
    }
}
if( isset($_POST['frontend']) ) {
    foreach($_POST['frontend'] as $word) {
        $frontend[] = $word;
    }
}
if( isset($_POST['backend']) ) {
    foreach($_POST['backend'] as $word) {
        $backend[] = $word;
    }
}

// construct query
$p_query = "SELECT DISTINCT p.id FROM Projects p";
if( count($frontend) > 0 )  {
    $p_query .= " INNER JOIN ProjectFrontEnd pf ON p.id = pf.prj_id";
}
if( count($backend) > 0 )  {
    $p_query .= " INNER JOIN ProjectBackEnd pb ON p.id = pb.prj_id";
}
if( count($database) > 0 || count($frontend) > 0 || count($backend) > 0 ) {
    $p_query .= " WHERE ";
}

$is_first = true;
foreach($database as $word) {
    if(!$is_first) {
        $p_query .= " AND ";
    }
    $p_query .= "p.db=\"" . $word . "\"";
    $is_first = false;
}
foreach($frontend as $word) {
    if(!$is_first) {
        $p_query .= " AND ";
    }
    $p_query .= "pf.frontend=\"" . $word . "\"";
    $is_first = false;
}
foreach($backend as $word) {
    if(!$is_first) {
        $p_query .= " AND ";
    }
    $p_query .= "pb.backend=\"" . $word . "\"";
    $is_first = false;
}

// make query to get all project ids
echo $p_query . "\n";
$row_ids = $db->query($p_query);

// store ids in array
$ids = array();
foreach($row_ids as $id) {
    $ids[] = $id['id'];
    // echo $id['id'] . ", ";
}

// make end queries
$end_query = "";
$is_first = true;
if( count($ids) > 0 ) {
    $end_query .= " WHERE ";
}
foreach($ids as $id) {
    if(!$is_first) {
        $end_query .= " OR ";
    }
    $end_query .= "p.id=\"" . $id . "\"";
    $is_first = false;
}
if( count($ids) == 0 && (count($database) > 0 || count($frontend) > 0 || count($backend) > 0) ) {
    $end_query .= " WHERE '0'='1'";
}

// make final queries
$p_query = "SELECT id, name, class_year, class_name, db FROM Projects p" . $end_query;
$f_query = "SELECT p.id, pf.frontend FROM Projects p INNER JOIN ProjectFrontEnd pf ON p.id = pf.prj_id" . $end_query;
$b_query = "SELECT p.id, pb.backend FROM Projects p INNER JOIN ProjectBackEnd pb ON p.id = pb.prj_id" . $end_query;

// echo $p_query . "\n";
// echo $f_query . "\n";
// echo $b_query . "\n";

$projects = $db->query($p_query);
$f = $db->query($f_query);
$b = $db->query($b_query);

// return that data
foreach($projects as $row) {
    echo $row['id'] . "," . $row['name'] . "," . $row['class_year'] . "," . $row['class_name'] . "," . $row['db'] . "\n";
}
foreach($f as $row) {
    echo $row['id'] . "," . $row['frontend'] . "\n";
}
foreach($b as $row) {
    echo $row['id'] . "," . $row['backend'] . "\n";
}
?>
