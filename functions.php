<?php
    function assignmentsLoop() {
        $assignments = array();
        //Assignments Array
        $assignments[0] = '<a href="sqlserver.html">Set Up Your PHP/MySQL Server</a>';
        $assignments[1] = "Create Your First PHP Web Page: Download Links: " . '<a href="download.php?file=index.php">index.php</a>' . ' - ' . '<a href="download.php?file=vars.php">vars.php</a>';
        $assignments[2] = "Create a PHP Web Page That Uses a Loop, a Function, and Arrays " . '<a href="download.php?file=index.php"> index.php</a>' . ' - ' . '<a href="download.php?file=vars.php"> vars.php</a>' . '<a href="download.php?file=lfa.php"> lfa.php</a>' . ' - ' . '<a href="download.php?file=functions.php"> functions.php</a>';
        $assignments[3] = "Create a PHP Web Page That Reads and Writes a Text File" . '<a href="download.php?file=io.php"> io.php</a>' . ' - ' . '<a href="download.php?file=cis475_ior.txt"> cis475_ior.txt</a>';
        $assignments[4] = "Create and Populate a MySQL Table" . '<a href="download.php?file=db.php"> db.php</a>' . ' - ' . '<a href="download.php?file=functions.php"> functions.php</a>' ;
        $assignments[5] = "Create a PHP Table Page From a MySQL Table";
        $assignments[6] = "Create a PHP Form Page That Writes to a MySQL Table";
        $assignments[7] = "Create a Final PHP Web Site";

        echo "<ol>";

        for ($i=0; $i < count($assignments); $i++) { 
            echo "<li>" . $assignments[$i] . "</li>"; //Assignments Loop
        }

        echo "</ol>";
    }

    function calendarTable() { //Function for Months of the year
        $monthNumber = array(); //Create Arays
        $monthName = array();
        $monthDays = array();

        $monthNumber[0] = "1";
        $monthNumber[1] = "2";
        $monthNumber[2] = "3";
        $monthNumber[3] = "4";
        $monthNumber[4] = "5";
        $monthNumber[5] = "6";
        $monthNumber[6] = "7";
        $monthNumber[7] = "8";
        $monthNumber[8] = "9";
        $monthNumber[9] = "10";
        $monthNumber[10] = "11";
        $monthNumber[11] = "12";

        $monthName[0] = "January";
        $monthName[1] = "Febuary";
        $monthName[2] = "March";
        $monthName[3] = "April";
        $monthName[4] = "May";
        $monthName[5] = "June";
        $monthName[6] = "July";
        $monthName[7] = "Augest";
        $monthName[8] = "September";
        $monthName[9] = "October";
        $monthName[10] = "November";
        $monthName[11] = "December";

        $monthDays[0] = "31";
        $monthDays[1] = "28";
        $monthDays[2] = "31";
        $monthDays[3] = "30";
        $monthDays[4] = "31";
        $monthDays[5] = "30";
        $monthDays[6] = "31";
        $monthDays[7] = "31";
        $monthDays[8] = "30";
        $monthDays[9] = "31";
        $monthDays[10] = "30";
        $monthDays[11] = "31";

        //Header of Table
        echo "<table>";
        echo "<tr>";
        echo "<th>Month Number</th>";
        echo "<th>Month Name</th>";
        echo "<th>Days</th>";
        echo "</tr>";

        for ($i=0; $i < count($monthNumber); $i++) { 
            if ($i % 2 != 0) {
                echo "<tr style='background-color: #dddddd;'>"; //Change background if even or 0.
            } else {
                echo "<tr>"; //Start Row
            }

            echo "<td>" . $monthNumber[$i] . "</td>"; //Number
            echo "<td>" . $monthName[$i] . "</td>"; //Month Nane
            echo "<td>" . $monthDays[$i] . "</td>"; //Days of Month
            echo "</tr>"; //End Row

        }

        echo "</table>"; //End Table


    }

    function readWrite(){
        $monthNumber = array(); //Create Arrays
        $monthName = array(); //Create Arrays
        $monthDays = array(); //Create Arrays
        $textFile = "cis475_io.txt";
        $open = fopen($textFile,"rt");
        $lineCount = 0;
        

        //Uses fgetcsv because of comma seperated file.

        while(($lineInput = fgetcsv($open)) !== FALSE){
			$monthNumber[$lineCount] = @$lineInput[0];
			$monthName[$lineCount] = @$lineInput[1];
			$monthDays[$lineCount] = @$lineInput[2];
			$lineCount++;
        }
        
        //Header of Table
        echo "<table>";
        echo "<tr>";
        echo "<th>Month Number</th>";
        echo "<th>Month Name</th>";
        echo "<th>Days</th>";
        echo "</tr>";

        for ($i=0; $i < count($monthNumber); $i++) { 
            if ($i % 2 != 0) {
                echo "<tr style='background-color: #dddddd;'>"; //Change background if even or 0.
            } else {
                echo "<tr>"; //Start Row
            }

            echo "<td>" . $monthNumber[$i] . "</td>"; //Number
            echo "<td>" . $monthName[$i] . "</td>"; //Month Nane
            echo "<td>" . $monthDays[$i] . "</td>"; //Days of Month
            echo "</tr>"; //End Row

        }

        echo "</table>"; //End Table
        //Closes first open
        fclose($open);
        
        
        //Opens new file for writing to file.
		$writeFile = fopen("cis475_ior.txt","w") or die("Error!");
		for($i=11;$i>=0;$i--){
			$writeLine = $monthDays[$i]; //Places array in reverse.
			$writeLine .= ",";
			$writeLine .= $monthName[$i];
			$writeLine .= ",";
			$writeLine .= $monthNumber[$i];
			$writeLine .="\r\n"; // new line
			fwrite($writeFile,$writeLine);
		}
		fclose($writeFile);
        
    }

    $result = '';

    function dbInput() {
        $monthNumber = array(); //Create Arrays
        $monthName = array(); //Create Arrays
        $monthDays = array(); //Create Arrays
        $success = "Success!";
        $failure = "Failure!";
        $textFile = "cis475_io.txt";
        $open = fopen($textFile,"rt");

        $lineCount = 0;
        $dbServername = "localhost";
        $dbUsername = "colonav01";
        $dbPassword = "dePA8WlUdmtlitqQ";
        $dbName = "colonav01";
        
        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

        mysqli_query($conn,"DROP TABLE IF EXISTS monthsTable;");
        
        $sql = "create table monthsTable(
            monthsID INT(2),
            monthName VARCHAR(10),
            monthDays INT(2)
            )";

        $query = mysqli_query($conn, $sql);

        if ($query){
            echo "<script type='text/javascript'>alert('$success');</script>";
        } else {
            echo "<script type='text/javascript'>alert('$failure');</script>";
        }

        while(($lineInput = fgetcsv($open)) !== FALSE){
			$monthNumber[$lineCount] = @$lineInput[0];
			$monthName[$lineCount] = @$lineInput[1];
            $monthDays[$lineCount] = @$lineInput[2];
            
            $sql = "INSERT INTO monthsTable (monthsID, monthName, monthDays) 
            VALUES('$monthNumber[$lineCount]', '$monthName[$lineCount]', '$monthDays[$lineCount]');  ";
            $query = mysqli_query($conn, $sql);

			$lineCount++;
        }
    }
