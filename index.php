<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<head>
  <title>Exercise and Diet Tracker - By Mark Giles</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="js/main.js"></script>
</head>
<html>
<body>
  <header>
    <div id="logo">
    
    </div>
    <h1>Exercise and Diet Tracker</h1>
    <h3>By Mark Giles</h3>
  </header>
  <section id="addStuff">
    <form>
      <h2>Add A Person</h2>
      <label for="pUsername">Username
        <input type="text" id="pUsername" name="pUsername">
      </label>
      <label for="pPassword">Password
        <input type="password" id="pPassword" name="pPassword">
      </label>
      <label for="pEmail">Email Address
        <input type="email" id="pEmail" name="pEmail">
      </label>
      <label for="pFName">First Name
        <input type="text" id="pFName" name="pFName">
      </label>
      <label for="pLName">Last Name
        <input type="text" id="pLName" name="pLName">
      </label>
      <label for="pAge">Age
        <input type="number" id="pAge" name="pAge">
      </label>
      <label for="pWeight">Weight
        <input type="number" id="pWeight" name="pWeight">
      </label>
      <input type="hidden" id="table" name="table" value="people">
      <input type="hidden" id="action" name="action" value="add">
      <a href="javascript: add(this)">Add A Person</a>
    </form>
  </section>
  
  <section id="showStuff">
    <section id="people">
      <table>
        <caption>
          <h2>Table: People</h2>
        </caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Weight</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody id="peopletbody">

        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="locations">
      <table>
        <caption>
          <h2>Table: Locations</h2>
        </caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Phone Number</th>
            <th>Address Line 1</th>
            <th>Address Line 2</th>
            <th>City</th>
            <th>Type</th>
            <th>Postal Code</th>
            <th>State</th>
            <th>Creator ID</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="exercises">
      <table>
        <caption>
          <h2>Table: Exercises</h2>
        </caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>MuscleGroup</th>
            <th>Category</th>
            <th>Creator ID</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="foodItems">
      <table>
        <caption>
          <h2>Table: Food Items</h2>
        </caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Sugar</th>
            <th>Carbohydrate</th>
            <th>Protein</th>
            <th>Fat</th>
            <th>Calorie</th>
            <th>Unit</th>
            <th>Creator ID</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="exerciseLogRecords">
      <table>
        <caption>
          <h2>Table: Exercise Log Records</h2>
        </caption>
        <thead>
          <tr>
            <th>Person ID</th>
            <th>Exercise ID</th>
            <th>Location ID</th>
            <th>Date/Time Performed</th>
            <th>Date/Time Submitted</th>
            <th>Duration</th>
            <th>Distance</th>
            <th>Speed</th>
            <th>Repetitions</th>
            <th>Weight</th>
            <th>Notes</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="foodLogRecords">
      <table>
        <caption>
          <h2>Table: Food Log Records</h2>
        </caption>
        <thead>
          <tr>
            <th>Person ID</th>
            <th>Food ID</th>
            <th>Location ID</th>
            <th>Date/Time Consumed</th>
            <th>Date/Time Submitted</th>
            <th>Quantity</th>
            <th>Notes</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="favoritePeopleExercises">
      <table>
        <caption>
          <h2>Table: Favorite People/Exercises</h2>
        </caption>
        <thead>
          <tr>
            <th>Person ID</th>
            <th>Exercise ID</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="favoritePeopleFoodItems">
      <table>
        <caption>
          <h2>Table: Favorite People/Food Items</h2>
        </caption>
        <thead>
          <tr>
            <th>Person ID</th>
            <th>Food ID</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>
  </section>
</body>
</html>