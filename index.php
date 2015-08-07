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
    <h2>By Mark Giles</h2>
  </header>
  
  <section id="userGuide">
    <h2>user guide</h2>
    <h4>basic info for using the forms and tables below</h4>
  </section>
  
  <section id="addStuff">
    <h2>add stuff</h2>
    <h4>which table?</h4>
    
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
    <ul id="addMessages">
    
    </ul>
  </section>
  <section id="editStuff">
    <h2>edit stuff</h2>
    <h4>select the table below to choose a row to edit</h4>
    <form name="selectEditForm" id="selectEditForm">
      <select name="tableEditSelect" id="tableEditSelect" onchange="buildEditIDSelector(this.value)">
        <option>people</option>
        <option>locations</option>
        <option>exercises</option>
        <option>foodItems</option>
        <option>exerciseLogRecords</option>
        <option>foodLogRecords</option>
        <option>favoritePeopleFoodItems</option>
        <option>favoritePeopleExercises</option>
      </select>
      <label for="editIDSelector">id
        <select name="editIDSelector" id="editIDSelector">
        </select>
      </label>
      <a href='javascript: buildEditForm(this.tableEditSelect.value, this.editIDSelector.value)' id="editFormLink">show element</a>
    </form>
    <form name="editForm" id="editForm">
      
    </form>
    <ul id="editMessages">
    
    </ul>
  </section>
  
  <section id="viewStuff">
    <h2>view and remove stuff</h2>
    <section id="people">
      <table>
        <caption>
          <h3>people</h3>
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
          <h3>locations</h3>
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
            <th>Remove</th>
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
          <h3>exercises</h3>
        </caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>MuscleGroup</th>
            <th>Category</th>
            <th>Creator ID</th>
            <th>Remove</th>
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
          <h3>foodItems</h3>
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
            <th>Remove</th>
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
          <h3>exerciseLogRecords</h3>
        </caption>
        <thead>
          <tr>
            <th>ID</th>
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
            <th>Remove</th>
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
          <h3>foodLogRecords</h3>
        </caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Person ID</th>
            <th>Food ID</th>
            <th>Location ID</th>
            <th>Date/Time Consumed</th>
            <th>Date/Time Submitted</th>
            <th>Quantity</th>
            <th>Notes</th>
            <th>Remove</th>
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
          <h3>favoritePeopleExercises</h3>
        </caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Person ID</th>
            <th>Exercise ID</th>
            <th>Remove</th>
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
          <h3>favoritePeopleFoodItems</h3>
        </caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Person ID</th>
            <th>Food ID</th>
            <th>Remove</th>
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