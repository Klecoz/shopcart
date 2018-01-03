//Declaring variables and Array
var assignments = new Array();

assignments[0] = '<a href="sqlserver.html">Set Up Your PHP/MySQL Server</a>';
assignments[1] = "Create Your First PHP Web Page: Download Links: " + '<a href="download.php?file=index.php">index.php</a>' + ' - ' + '<a href="download.php?file=vars.php">vars.php</a>';
assignments[2] = "Create a PHP Web Page That Uses a Loop, a Function, and Arrays";
assignments[3] = "Create a PHP Web Page That Reads and Writes a Text File";
assignments[4] = "Create and Populate a MySQL Table";
assignments[5] = "Create a PHP Table Page From a MySQL Table";
assignments[6] = "Create a PHP Form Page That Writes to a MySQL Table";
assignments[7] = "Create a Final PHP Web Site";



//Calls the printAssignments function
printAssignments();


//function definition
function printAssignments () {
  var htmlOutput = "";
  //outputs an ol tag
  htmlOutput += "<ol>";

//Runs through the assignments array
  for (var i =0; i < assignments.length; i++) {
      //outputs all the array elements in an li tag.
      htmlOutput += "<li>" + assignments[i] + "</li>";
  }
//closes the ol
  htmlOutput += "</ol>";

  //inserts the contents of htmlOutput into the div with the ID "assign"
  document.getElementById("assign").innerHTML = htmlOutput;

  document.getElementById("dateTime").innerHTML = Date();
}
