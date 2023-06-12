<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Contact Record List</title>
    <link rel="stylesheet" href="style.css">
    <script src="table2excel.js"></script>
</head>

<body>
<div class="header">
    <h1>Contact Record List</h1>
</div>
<div class="topnav">
    <div id="topnav">
        <a href="index.php">Create New Contact Record</a>
        <a href="contactList.php">Contact Record List</a>
        <a href="https://larascolari.com/au/">Lara's website</a>
    </div>
</div>
    <div class="container my-5">
        <br>
        <h2> Contact Records Created <button type='button' id = "downloadexcel" class='btn btn-success' >Export list to Excel</button><a class="btn btn-primary" href="index.php" role="button">New Contact Record</a></h2>
        <table class="table" id = "example-table">
            <thead>
                <tr>
                    <th>Contact Record ID</th>
                    <th>Enquiree Name</th>
                    <th>Enquiree Email</th>
                    <th>Enquiree Notes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $servername = "localhost"; // Our server is called localhost as the server is installed on this PC
                 $username = "root"; // Our username is called root as that is the default username
                 $password = ""; // Our Password is empty as default
                 $database = "contact_db"; // The database is known as clinicaltesting
     
                 // Create a connection to the database
                 $connection = new mysqli($servername, $username, $password, $database);
     
                 // Check if the connection is successful
                 if ($connection->connect_error) {
                     die("Connection failed: " . $connection->connect_error);
                 }
     
                 //SQL to read all the rows on the clinicalstudies table
                 $sql = "SELECT * FROM contact";
                 //The query will be executed and stored in the $result variable
                 $result = $connection->query($sql);
     
                 //To check if the query has been excuted or not
                 if (!$result) {
                     die("Invalid query: " . $connection->connect_error);
                     //die means exit the excution of the query. If any errors occur, the program will exit.
                 }
     
                 //while loop to read each row of the table
                 while ($row = $result->fetch_assoc()) {
                     echo "
                     <tr>
                     <td>$row[id]</td>
                     <td>$row[name]</td>
                     <td>$row[email]</td>
                     <td>$row[notes]</td>
                     </tr>
                     ";
                 }
                ?>
            </tbody>
        </table>
        <script>
            document.getElementById('downloadexcel').addEventListener('click', function() {
                var table2excel = new Table2Excel();
                table2excel.export(document.querySelectorAll("#example-table"));
            });
        </script>
    </div>

    
</body>

</html>
