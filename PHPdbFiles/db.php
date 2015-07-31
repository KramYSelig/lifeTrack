<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_POST['action']) {
  if ($_POST['action'] == 'load') {
    load($_POST['table']);
  }
  else if ($_POST['action'] == 'add') {
    add($_POST['table']);
  }
}
else {
  // Error ET0001: No action key specified in POST array
  echo 'ET0001';
}

function add($table) {
  require 'storedInfo.php';
  $mysqli = new mysqli($dbHostname, $dbUser, $dbPassword, $dbName);
  
  if(!$mysqli || $mysqli->connect_errno) {
    echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
  }

  if ($table == 'people') {
    if (!($stmt = $mysqli->prepare("INSERT INTO people(username,
                                                       password,
                                                       email,
                                                       fName,
                                                       lName,
                                                       age,
                                                       weight)
                                    VALUES (?, ?, ?, ?, ?, ?, ?)"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    } 

    if (!$stmt->bind_param("sssssii", $_POST['username'],
                                      $_POST['password'],
                                      $_POST['email'],
                                      $_POST['fName'],
                                      $_POST['lName'],
                                      $_POST['age'],
                                      $_POST['weight'])) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
  }
  else if ($table == 'locations') {
    if (!($stmt = $mysqli->prepare("INSERT INTO locations(name,
                                                          description,
                                                          phoneNumber,
                                                          addressLine1,
                                                          addressLine2,
                                                          city,
                                                          type,
                                                          postalCode,
                                                          state,
                                                          creatorID)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    } 

    if (!$stmt->bind_param("ssissssssi", $_POST['name'],
                                         $_POST['description'],
                                         $_POST['phoneNumber'],
                                         $_POST['addressLine1'],
                                         $_POST['addressLine2'],
                                         $_POST['city'],
                                         $_POST['type'],
                                         $_POST['postalCode'],
                                         $_POST['state'],
                                         $_POST['creatorID'])) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
  }
  else if ($table == 'exercises') {
    if (!($stmt = $mysqli->prepare("INSERT INTO exercises(name,
                                                          description,
                                                          muscleGroup,
                                                          category,
                                                          creatorID)
                                    VALUES (?, ?, ?, ?, ?)"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    } 

    if (!$stmt->bind_param("ssssi", $_POST['name'],
                                    $_POST['description'],
                                    $_POST['muscleGroup'],
                                    $_POST['category'],
                                    $_POST['creatorID'])) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
  }
  else if ($table == 'fooditems') {
    if (!($stmt = $mysqli->prepare("INSERT INTO fooditems(name,
                                                          description,
                                                          category,
                                                          sugar,
                                                          carbohydrate,
                                                          protein,
                                                          fat,
                                                          calorie,
                                                          unit,
                                                          creatorID)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    } 

    if (!$stmt->bind_param("sssiiiiisi", $_POST['name'],
                                         $_POST['description'],
                                         $_POST['category'],
                                         $_POST['sugar'],
                                         $_POST['carbohydrate'],
                                         $_POST['protein'],
                                         $_POST['fat'],
                                         $_POST['calorie'],
                                         $_POST['unit'],
                                         $_POST['creatorID'])) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
  }
  else if ($table == 'exerciselogrecords') {
    if (!($stmt = $mysqli->prepare("INSERT INTO exerciselogrecords(personID,
                                                                   exerciseID,
                                                                   locationID,
                                                                   dateTimePerformed,
                                                                   dateTimeSubmitted,
                                                                   duration,
                                                                   distance,
                                                                   speed,
                                                                   repetitions,
                                                                   weight,
                                                                   notes)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    } 

    if (!$stmt->bind_param("iiissiiiiis", $_POST['personID'],
                                          $_POST['exerciseID'],
                                          $_POST['locationID'],
                                          $_POST['dateTimePerformed'],
                                          $_POST['dateTimeSubmitted'],
                                          $_POST['duration'],
                                          $_POST['distance'],
                                          $_POST['speed'],
                                          $_POST['repetitions'],
                                          $_POST['weight'],
                                          $_POST['notes'])) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
  }
  else if ($table == 'foodlogrecords') {
    if (!($stmt = $mysqli->prepare("INSERT INTO foodlogrecords(personID,
                                                               foodID,
                                                               locationID,
                                                               dateTimeEaten,
                                                               dateTimeSubmitted,
                                                               quantity,
                                                               notes)
                                    VALUES (?, ?, ?, ?, ?, ?, ?)"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    } 

    if (!$stmt->bind_param("iiissis", $_POST['personID'],
                                      $_POST['foodID'],
                                      $_POST['locationID'],
                                      $_POST['dateTimeEaten'],
                                      $_POST['dateTimeSubmitted'],
                                      $_POST['quantity'],
                                      $_POST['notes'])) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
  }
  else if ($table == 'favoritepeopleexercises') {
    if (!($stmt = $mysqli->prepare("INSERT INTO favoritepeopleexercises(personID,
                                                                        exerciseID)
                                    VALUES (?, ?)"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    } 

    if (!$stmt->bind_param("ii", $_POST['personID'],
                                 $_POST['exerciseID'])) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
  }
  else if ($table == 'favoritepeoplefooditems') {
    if (!($stmt = $mysqli->prepare("INSERT INTO favoritepeoplefooditems(personID,
                                                                        foodID)
                                    VALUES (?, ?)"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    } 

    if (!$stmt->bind_param("ii", $_POST['personID'],
                                 $_POST['foodID'])) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
  }

  if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
  }
  
  $stmt->close();
}

function load($table) {
  require 'storedInfo.php';
  $mysqli = new mysqli($dbHostname, $dbUser, $dbPassword, $dbName);
  
  if (!($stmt = $mysqli->prepare("SELECT * FROM $table"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }
  if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }
 
  if ($table == 'people') {
    if (!$stmt->bind_result($id,
                            $username,
                            $password,
                            $email,
                            $fName,
                            $lName,
                            $age,
                            $weight)) {
      echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    
    $id = NULL;
    $username = NULL;
    $password = NULL;
    $email = NULL;
    $fName = NULL;
    $lName = NULL;
    $age = NULL;
    $weight = NULL;
    
    while($stmt->fetch()) {
      echo '<tr>';
      echo '<td>' . $id . '</td>';
      echo '<td>' . $username . '</td>';
      echo '<td>' . $password . '</td>';
      echo '<td>' . $email . '</td>';
      echo '<td>' . $fName . '</td>';
      echo '<td>' . $lName . '</td>';
      echo '<td>' . $age . '</td>';
      echo '<td>' . $weight . '</td>';
      echo '</tr>';
    }
  }

  $stmt->close();
}
?>