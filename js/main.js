/******************************************************************************
 * Function Name: add(form)
 *
 *
 *****************************************************************************/
function add(form) {
  var req = new XMLHttpRequest(),
    reqParam,
    url = 'PHPdbFiles/db.php';
  
  reqParam = 'action=' + form.action.value;
  reqParam += '&username=' + form.pUsername.value;
  reqParam += '&password=' + form.pPassword.value;
  reqParam += '&email=' + form.pEmail.value;
  reqParam += '&fName=' + form.pFName.value;
  reqParam += '&lName=' + form.pLName.value;
  reqParam += '&age=' + form.pAge.value;
  reqParam += '&weight=' + form.pWeight.value;
  reqParam += '&table=' + form.table.value;

  req.onreadystatechange = function () {
    if (this.readyState === 4) {
      console.log(this.responseText);
    }
  };
  
  console.log(reqParam);
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
    if (this.readyState === 4) {
      document.getElementById(table + 'tbody').innerHTML = this.responseText;
    }
  };

  req.open('POST', url, true);
  req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  req.send(reqParam);
}

window.onload = load('people');