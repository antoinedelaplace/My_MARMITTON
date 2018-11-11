<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 25/02/2016
 * Time: 23:16
 */

require_once "Model/Database.php";
require_once "Model/autoimplement.class.php";
$auto = new autoimplement();
$table = $auto->get_table_unity();

header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<list>";
foreach($table as $unity) {
    echo "<item>";
    echo "<champ name=\"" . $unity . "\" />";
    echo "</item>";
}
echo "</list>";

?>