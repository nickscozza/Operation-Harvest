<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
        <script src="table2excel.js"></script></head>
        <link rel="stylesheet" href="style.css">
        
<body>
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
            ?>
    <div class="header">
		<a href="contactList.php">
            ack
        </a>
		<h1>Contact Record Form</h1>
	</div> 
    <div class="topnav">
    <div id="topnav">
        <a href="index.php">Create New Contact Record</a>
        <a href="contactList.php">Contact Record List</a>
        <a href="https://larascolari.com/au/">Lara's website</a>
    </div>
    </div>
    <h1>Contact Us Today</h1>
    <div class="form-container">
        <form  method="POST" action = "process-form.php">
            <div class="form-group">
                <label for="name">First Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="notes">Notes:</label>
                <textarea id="notes" name="notes"></textarea>
            </div>
            <div class="form-group">
                    <button type="submit">Submit</button>
            </div>
        </form>
        <div class="form-links">
            <div class="link-item">
                <a href="#">
                    <img src="artworkLinkImages\lara scolari artwork 1.jpg" alt="Link 1">
                </a>
                <span>Artwork Title</span>
            </div>
            <div class="link-item">
                <a href="#">
                    <img src="artworkLinkImages\lara scolari artwork 2.jpg" alt="Link 2">
                </a>
                <span>Artwork Title</span>
            </div>
            <div class="link-item">
                <a href="#">
                    <img src="artworkLinkImages\lara scolari artwork 3.jpg" alt="Link 3">
                </a>
                <span>Artwork Title</span>
            </div>
            <div class="link-item">
                <a href="#">
                    <img src="artworkLinkImages\lara scolari artwork 4.jpg" alt="Link 4">
                </a>
                <span>Artwork Title</span>
            </div>
            <div class="link-item">
                <a href="#">
                    <img src="artworkLinkImages\lara scolari artwork 5.jpg" alt="Link 5">
                </a>
                <span><a href="https://www.google.com/">Artwork Title</a></span>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('downloadexcel').addEventListener('click', function() {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#example-table"));
            });
            </script>
</body>
</html>