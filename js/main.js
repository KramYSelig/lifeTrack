/******************************************************************************
 * Function Name: add(form)
 *
 *
 *****************************************************************************/
function add(form) {
  var req = new XMLHttpRequest(),
    reqParam,
    url = 'PHPdbFiles/db.php',
    addErrorMessage,
    addSuccMessage,
    errorLi = document.createElement('li');
  
  addErrorMessage = "Add failed, please ensure required fields are completed ";
  addErrorMessage += "and that you are not attempting to enter duplicate ";
  addErrorMessage += "information for fields that require unique values.";
  addSuccMessage = "Add succeeded!";
  reqParam = 'action=' + form.action.value;
  reqParam += '&table=' + form.table.value;
  
  
  if (form.table.value === 'people') {
    reqParam += '&username=' + form.username.value;
    reqParam += '&password=' + form.password.value;
    reqParam += '&email=' + form.email.value;
    reqParam += '&fName=' + form.fName.value;
    reqParam += '&lName=' + form.lName.value;
    reqParam += '&age=' + form.age.value;
    reqParam += '&weight=' + form.weight.value;
  }
  if (form.table.value === 'locations' || form.table.value === 'exercises' || form.table.value === 'foodItems') {
    reqParam += '&entityName=' + form.entityName.value;
    reqParam += '&description=' + form.description.value;
    reqParam += '&category=' + form.category.value;
    reqParam += '&creatorID=' + form.creatorID.value;
  }
  if (form.table.value === 'locations') {
    reqParam += '&phone=' + form.phone.value;
    reqParam += '&addressLine1=' + form.addressLine1.value;
    reqParam += '&addressLine2=' + form.addressLine2.value;
    reqParam += '&city=' + form.city.value;
    reqParam += '&state=' + form.state.value;
    reqParam += '&postalCode=' + form.postalCode.value;  
  }
  if (form.table.value === 'exercises') {
    reqParam += '&muscleGroup=' + form.muscleGroup.value;  
  }
  if (form.table.value === 'foodItems') {
    reqParam += '&sugar=' + form.sugar.value;
    reqParam += '&carbohydrate=' + form.carbohydrate.value;
    reqParam += '&protein=' + form.protein.value;
    reqParam += '&fat=' + form.fat.value;
    reqParam += '&calorie=' + form.calorie.value;
    reqParam += '&unit=' + form.unit.value;  
  }
  if (form.table.value === 'exerciseLogRecords' || form.table.value === 'foodLogRecords' || form.table.value === 'favoritePeopleExercises' || form.table.value === 'favoritePeopleFoodItems') {
    reqParam += '&personID=' + form.personID.value;
  }
  if (form.table.value === 'exerciseLogRecords' || form.table.value === 'foodLogRecords') {
    reqParam += '&locationID=' + form.locationID.value;
    reqParam += '&notes=' + form.notes.value;
    reqParam += '&dateTimeSubmitted=' + form.dateTimeSubmitted.value;
  }
  if (form.table.value === 'exerciseLogRecords' || form.table.value === 'favoritePeopleExercises') {
    reqParam += '&exerciseID=' + form.exerciseID.value;
  }
  if (form.table.value === 'exerciseLogRecords') {
    reqParam += '&dateTimePerformed=' + form.dateTimePerformed.value;
    reqParam += '&duration=' + form.duration.value;
    reqParam += '&distance=' + form.distance.value;
    reqParam += '&speed=' + form.speed.value;
    reqParam += '&repetitions=' + form.repetitions.value;
    reqParam += '&weight=' + form.weight.value;
  }
  if (form.table.value === 'foodLogRecords' || form.table.value === 'favoritePeopleFoodItems') {
    reqParam += '&foodID=' + form.foodID.value;  
  }
  if (form.table.value === 'foodLogRecords') {
    reqParam += '&dateTimeConsumed=' + form.dateTimeConsumed.value;
    reqParam += '&quantity=' + form.quantity.value;  
  }

  req.onreadystatechange = function () {
    if (this.readyState === 4)
    {
      if (this.responseText !== "") {
        document.getElementById('addMessages').innerHTML = "";
        errorLi.appendChild(document.createTextNode(addErrorMessage));
        document.getElementById('addMessages').appendChild(errorLi);
      }
      else {
        document.getElementById('addMessages').innerHTML = "";
        errorLi.appendChild(document.createTextNode(addSuccMessage));
        document.getElementById('addMessages').appendChild(errorLi);
        loadTables();
      }
    }
  };
  
  req.open('POST', url, true);
  req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  req.send(reqParam);
}

/******************************************************************************
 * Function Name: load(table)
 *
 *
 *****************************************************************************/
function load(table) {
  var req = new XMLHttpRequest(),
    reqParam,
    url = 'PHPdbFiles/db.php';

  reqParam = 'action=load';
  reqParam += '&table=' + table;

  req.onreadystatechange = function () {
    if (this.readyState === 4) 
    {
      document.getElementById(table + 'tbody').innerHTML = this.responseText;
    }
  };

  req.open('POST', url, true);
  req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  req.send(reqParam);
}

/******************************************************************************
 * Function Name: remove(table, id)
 *
 *
 *****************************************************************************/
function remove(table, id) {
  var req = new XMLHttpRequest(),
    reqParam,
    url = 'PHPdbFiles/db.php',
    removeFail,
    removeSucc,
    errorLi = document.createElement('li');
  
  clearMessages();
  clearAddForm();
  clearEditForm();
  document.getElementById('removeMessages').innerHTML = "";
  removeFail = "Remove failed. Please ensure the item you are trying ";
  removeFail += "to remove is not referenced by another table. If it is, ";
  removeFail += "you will need to remove it from that table first.";
  removeSucc = "Remove succeeded!";
  
  reqParam = 'action=remove';
  reqParam += '&table=' + table;
  reqParam += '&id=' + id;

  req.onreadystatechange = function () {
    if (this.readyState === 4) 
    {
      if (this.responseText !== "") {
        errorLi.appendChild(document.createTextNode(removeFail));
        document.getElementById('removeMessages').appendChild(errorLi);
      }
      else {
        errorLi.appendChild(document.createTextNode(removeSucc));
        document.getElementById('removeMessages').appendChild(errorLi);
        loadTables();
      }
    }
  };
  
  req.open('POST', url, true);
  req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  req.send(reqParam);
}

/******************************************************************************
 * Function Name: getValues(table, fieldName)
 *
 *
 *****************************************************************************/

function getValues(table, field, idName, errorMessagesID) {
  var req = new XMLHttpRequest(),
    reqParam,
    url = 'PHPdbFiles/db.php',
    selects = document.getElementsByTagName('select'),
    i,
    errorLi = document.createElement('li');

  reqParam = 'action=getValues';
  reqParam += '&table=' + table;
  reqParam += '&field=' + field;
  reqParam += '&idName=' + idName;
  
  for (i = 0; i < selects.length; i++) {
    document.getElementsByTagName('select')[i].setAttribute('disabled', true);
  }

  req.onreadystatechange = function () {
    if (this.readyState === 4) 
    {
      if (this.responseText.substring(0, 5) === 'ERROR') {
        document.getElementById(idName).innerHTML = "";
        errorLi.appendChild(document.createTextNode(this.responseText));
        document.getElementById(errorMessagesID).appendChild(errorLi);
      }
      else {
        document.getElementById(idName).innerHTML = this.responseText;
      }
      
      selects = document.getElementsByTagName('select');
      for (i = 0; i < selects.length; i++) {
        document.getElementsByTagName('select')[i].removeAttribute('disabled');
      }
    }
  };

  req.open('POST', url, true);
  req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  req.send(reqParam);
}

/******************************************************************************
 * Function Name: buildEditIDSelector(formName)
 *
 *
 *****************************************************************************/
function buildEditIDSelector(formName) {
  document.getElementById('editMessages').innerHTML = "";
  document.getElementById('editForm').innerHTML = "";
  getValues(formName, 'id', 'editIDSelector', 'editMessages');
}

/******************************************************************************
 * Function Name: buildEditForm(table, id)
 *
 *
 *****************************************************************************/
function buildEditForm(table, id) {
  var req = new XMLHttpRequest(),
    reqParam,
    url = 'PHPdbFiles/db.php';
  
  clearMessages();
  
  if (id !== "") {
    reqParam = 'action=getRecord';
    reqParam += '&table=' + table;
    reqParam += '&id=' + id;

    req.onreadystatechange = function () {
      if (this.readyState === 4) 
      {
        document.getElementById('editForm').innerHTML = this.responseText;
      }
    };

    req.open('POST', url, true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send(reqParam);
  }
}
/******************************************************************************
 * Function Name: clearMessages()
 *
 *
 *****************************************************************************/
function clearMessages() {
  document.getElementById('removeMessages').innerHTML = "";
  document.getElementById('editMessages').innerHTML = "";
  document.getElementById('addMessages').innerHTML = "";
}

/******************************************************************************
 * Function Name: clearAddForm()
 *
 *
 *****************************************************************************/
function clearAddForm() {
  document.getElementById('addForm').innerHTML = "";
}

/******************************************************************************
 * Function Name: clearEditForm()
 *
 *
 *****************************************************************************/
function clearEditForm() {
  document.getElementById('editForm').innerHTML = "";
}

/******************************************************************************
 * Function Name: clearEditForm()
 *
 *
 *****************************************************************************/

function clearForms() {
  clearEditForm();
  clearAddForm();
}
/******************************************************************************
 * Function Name: buildAddForm(formName)
 *
 *
 *****************************************************************************/
function buildAddForm(formName) {
  var formString = "<form>";
  clearMessages();
  if (formName === 'people') {
    formString += "<label for='username'>Username<input type='text' id='username' name='username'></label>";
    formString += "<label for='password'>Password<input type='password' id='password' name='password'></label>";
    formString += "<label for='email'>Email Address<input type='email' id='email' name='email'></label>";
    formString += "<label for='fName'>First Name<input type='text' id='fName' name='fName'></label>";
    formString += "<label for='lName'>Last Name<input type='text' id='lName' name='lName'></label>";
    formString += "<label for='age'>Age<input type='number' id='age' name='age'></label>";
    formString += "<label for='weight'>Weight<input type='number' id='weight' name='weight'></label>";
  }
  if (formName === 'locations' || formName === 'exercises' || formName === 'foodItems') {
    formString += "<label for='entityName'>name<input type='text' id='entityName' name='entityName'></label>";
    formString += "<label for='description'>description<input type='text' id='description' name='description'></label>";
    formString += "<label for='creatorID'>creator id<select id='creatorID' name='creatorID'></select></label>";
    getValues('people', 'id', 'creatorID', 'addMessages');
    if (formName === 'locations') {
      formString += "<label for='category'>category<input type='text' id='category' name='category'></label>";
    }
    else if (formName === 'exercises') {
      formString += "<label for='category'>category<input type='text' id='category' name='category'></label>";
    }
    else if (formName === 'foodItems') {
      formString += "<label for='category'>category<input type='text' id='category' name='category'></label>";
    }
  }
  if (formName === 'locations') {
    formString += "<label for='phone'>phone number<input type='text' id='phone' name='phone'></label>";
    formString += "<label for='addressLine1'>address line 1<input type='text' id='addressLine1' name='addressLine1'></label>";
    formString += "<label for='addressLine2'>address line 2<input type='text' id='addressLine2' name='addressLine2'></label>";
    formString += "<label for='city'>city<input type='text' id='city' name='city'></label>";
    formString += "<label for='state'>state<input type='text' id='state' name='state'></label>";
    formString += "<label for='postalCode'>zip code<input type='text' id='postalCode' name='postalCode'></label>";
  }
  if (formName === 'exercises') {
    formString += "<label for='muscleGroup'>muscle group<input type='text' id='muscleGroup' name='muscleGroup'></label>";
  }
  if (formName === 'foodItems') {
    formString += "<label for='sugar'>sugar<input type='number' id='sugar' name='sugar'></label>";
    formString += "<label for='carbohydrate'>carbohydrate<input type='number' id='carbohydrate' name='carbohydrate'></label>";
    formString += "<label for='protein'>protein<input type='number' id='protein' name='protein'></label>";
    formString += "<label for='fat'>fat<input type='number' id='fat' name='fat'></label>";
    formString += "<label for='calorie'>calorie<input type='number' id='calorie' name='calorie'></label>";
    formString += "<label for='unit'>unit<input type='text' id='unit' name='unit'></label>";
  }
  if (formName === 'exerciseLogRecords' || formName === 'foodLogRecords' || formName === 'favoritePeopleExercises' || formName === 'favoritePeopleFoodItems') {
    formString += "<label for='personID'>personID<select id='personID' name='personID'></select></label>";
    getValues('people', 'id', 'personID', 'addMessages');
  }
  if (formName === 'exerciseLogRecords' || formName === 'favoritePeopleExercises') {
    formString += "<label for='exerciseID'>exerciseID<select id='exerciseID' name='exerciseID'></select></label>";
    getValues('exercises', 'id', 'exerciseID', 'addMessages');
  }
  if (formName === 'foodLogRecords' || formName === 'favoritePeopleFoodItems') {
    formString += "<label for='foodID'>foodID<select id='foodID' name='foodID'></select></label>";
    getValues('foodItems', 'id', 'foodID', 'addMessages');
  }
  if (formName === 'exerciseLogRecords' || formName === 'foodLogRecords') {
    formString += "<label for='locationID'>locationID<select id='locationID' name='locationID'></select></label>";
    getValues('locations', 'id', 'locationID', 'addMessages');
    formString += "<label for='notes'>notes<input type='text' id='notes' name='notes'></label>";
    formString += "<label for='dateTimeSubmitted'>Date/Time Submitted<input type='number' id='dateTimeSubmitted' name='dateTimeSubmitted'></label>";
  }
  if (formName === 'exerciseLogRecords') {
    formString += "<label for='dateTimePerformed'>Date/Time Performed<input type='number' id='dateTimePerformed' name='dateTimePerformed'></label>";
    formString += "<label for='duration'>fat<input type='number' id='duration' name='duration'></label>";
    formString += "<label for='distance'>distance<input type='number' id='distance' name='distance'></label>";
    formString += "<label for='speed'>speed<input type='number' id='speed' name='speed'></label>";
    formString += "<label for='repetitions'>repetitions<input type='number' id='repetitions' name='repetitions'></label>";
    formString += "<label for='weight'>weight<input type='number' id='weight' name='weight'></label>";
  }
  if (formName === 'foodLogRecords') {
    formString += "<label for='dateTimeConsumed'>Date/Time Consumed<input type='number' id='dateTimeConsumed' name='dateTimeConsumed'></label>";
    formString += "<label for='quantity'>quantity<input type='number' id='quantity' name='quantity'></label>";
  }
  formString += "<input type='hidden' id='table' name='table' value='" + formName + "'>";
  formString += "<input type='hidden' id='action' name='action' value='add'>";
  formString += "<button type='button' onclick='add(this.form)' id='addFormLink'>add to " + formName + "</button>";
  formString += "</form>";

  document.getElementById('addForm').innerHTML = formString;
}

function loadTables() {
  load('people');
  load('locations');
  load('exercises');
  load('foodItems');
  load('exerciseLogRecords');
  load('foodLogRecords');
  load('favoritePeopleExercises');
  load('favoritePeopleFoodItems');

  buildEditIDSelector('people');
  clearAddForm();
  clearEditForm();
}

window.onload = loadTables();