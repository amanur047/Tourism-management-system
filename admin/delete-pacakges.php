<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM tbltourpackages WHERE Packageid='" . $_GET["pid"] . "'";

    $conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "
" . $e->getMessage();
    }

$conn = null;

?>
<html>
<body>


<button onclick="myFunction()">Go back to manage</button>

<script>
function myFunction() {
  location.replace("http://localhost/TMS/admin/manage-packages.php")
}
</script>

</body>
</html> 
