<?php
require_once ("perpage.php");
include("includes/conexion_bd.php");

$db_handle = new DBController();

$name = "";
$code = "";
$queryCondition = "";

$objconexion= new conexion();
$proyectos=$objconexion->consultar("SELECT * FROM `productos`");

echo $proyectos


if (! empty($_POST["busqueda"])) {
    foreach ($_POST["search"] as $k => $v) {
        if (! empty($v)) {
            $queryCases = array(
                "name",
                "code"
            );
            if (in_array($k, $queryCases)) {
                if (! empty($queryCondition)) {
                    $queryCondition .= " AND ";
                } else {
                    $queryCondition .= " WHERE ";
                }
            }
            switch ($k) {
                case "name":
                    $name = $v;
                    $queryCondition .= "name LIKE '" . $v . "%'";
                    break;
                case "code":
                    $code = $v;
                    $queryCondition .= "code LIKE '" . $v . "%'";
                    break;
            }
        }
    }
}
$orderby = " ORDER BY id desc";
$sql = "SELECT * FROM toy " . $queryCondition;
$href = 'index.php';

$perPage = 2;
$page = 1;
if (isset($_POST['page']))
    $page = $_POST['page'];
$start = ($page - 1) * $perPage;
if ($start < 0)
    $start = 0;

$query = $sql . $orderby . " limit " . $start . "," . $perPage;
$result = $db_handle->runQuery($query);

if (! empty($result))
    $result["perpage"] = showperpage($sql, $perPage, $href);
?>