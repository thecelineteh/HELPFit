// formValidation.js

function registerAccount() {
  var pwd = document.forms["registerMember"]["inputPswd"].value;
  var pwd2 = document.forms["registerMember"]["confirmPswd"].value;
  var pwd3 = document.forms["registerTrainer"]["inputPswd"].value;
  var pwd4 = document.forms["registerTrainer"]["confirmPswd"].value;

  if ((pwd != pwd2) || (pwd3 != pwd4)) {
    alert("Your two password entries are not the same.");
    document.forms["registerMember"]["confirmPswd"].focus();
    document.forms["registerMember"]["confirmPswd"].select();
    document.forms["registerTrainer"]["confirmPswd"].focus();
    document.forms["registerTrainer"]["confirmPswd"].select();
    return false
  }

  if (document.activeElement.id == 'registerMBtn'){
    var level = document.forms["registerMember"]["level"].value;
    if (level === "Choose your level"){
      alert("Level must be either Beginner, Advanced, or Expert.");
      document.forms["registerMember"]["level"].focus();
      return false;
    }
  }
}


function updateSession() {
    var date = document.forms["updateSession"]["sessionDate"].value;
    var time = document.forms["updateSession"]["sessionTime"].value;
    var fee = document.forms["updateSession"]["sessionFee"].value;
    var status = document.forms["updateSession"]["sessionStatus"].value;
    var classType = document.forms["updateSession"]["sessionType"].value;
    if (date === ""){
      alert("Date cannot be blank.");
      document.forms["updateSession"]["sessionDate"].focus();
      return false;
    }
    else if (time === ""){
      alert("Time cannot be blank.");
      document.forms["updateSession"]["sessionTime"].focus();
      return false;
    }
    else if (fee === ""){
      alert("Fee cannot be blank.");
      document.forms["updateSession"]["sessionFee"].focus();
      return false;
    }
    else if (status === "Choose status"){
      alert("Status must be either Cancelled, Completed, or Available.");
      document.forms["updateSession"]["sessionStatus"].focus();
      return false;
    }
    else if (classType === "Choose class type"){
      alert("Class type must be either Sport, Dance, or MMA.");
      document.forms["updateSession"]["sessionType"].focus();
      return false;
    }
    else{
      alert("Session updated successfully !");
    }
}
