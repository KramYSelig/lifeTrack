<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<head>
  <title>Exercise and Diet Tracker - By Mark Giles</title>
  <link rel="stylesheet" href="css/main.css">
  
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
    <h2>add stuff</h2>
    <h3>which table?</h3>
    <select name="selectForm" id="selectForm" onchange="buildAddForm(this.value)">
      <option>people</option>
      <option>locations</option>
      <option>exercises</option>
      <option>foodItems</option>
      <option>exerciseLogRecords</option>
      <option>foodLogRecords</option>
      <option>favoritePeopleFoodItems</option>
      <option>favoritePeopleExercises</option>
    </select>
    <div name="addForm" id="addForm">
      
    
    </div>
  </section>
  
  <section id="showStuff">
    <section id="people">
      <table>
        <caption>
          <h2>people</h2>
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
          <h2>locations</h2>
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
        <tbody id="locationstbody">
          
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="exercises">
      <table>
        <caption>
          <h2>exercises</h2>
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
        <tbody id="exercisestbody">
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="foodItems">
      <table>
        <caption>
          <h2>foodItems</h2>
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
        <tbody id="foodItemstbody">
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="exerciseLogRecords">
      <table>
        <caption>
          <h2>exerciseLogRecords</h2>
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
        <tbody id="exerciseLogRecordstbody">
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="foodLogRecords">
      <table>
        <caption>
          <h2>foodLogRecords</h2>
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
        <tbody id="foodLogRecordstbody">
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="favoritePeopleExercises">
      <table>
        <caption>
          <h2>favoritePeopleExercises</h2>
        </caption>
        <thead>
          <tr>
            <th>Person ID</th>
            <th>Exercise ID</th>
          </tr>
        </thead>
        <tbody id="favoritePeopleExercisestbody">
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>

    <section id="favoritePeopleFoodItems">
      <table>
        <caption>
          <h2>favoritePeopleFoodItems</h2>
        </caption>
        <thead>
          <tr>
            <th>Person ID</th>
            <th>Food ID</th>
          </tr>
        </thead>
        <tbody id="favoritePeopleFoodItemstbody">
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </section>
  </section>
</body>
<script src="js/main.js"></script>
</html>