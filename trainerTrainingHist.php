<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "helpfit";
  $con = new mysqli($servername, $username, $password, $dbname);

  if (!$con) {
    die("Could not connect to database.");
  }
  echo "Database connected."."</br>";

  $theTrainer = $_SESSION ['user'];

   // Queries
   $q_pSession = "SELECT * FROM personalsessions WHERE sessionTrainer='$theTrainer'";
   $q_gSession = "SELECT * FROM groupsessions WHERE sessionTrainer='$theTrainer'";

   // Results
   $r_pSession = mysqli_query($con, $q_pSession);
   $r_gSession = mysqli_query($con, $q_gSession);

   if (mysqli_num_rows($r_pSession) > 0)
   {
      while ($row = mysqli_fetch_assoc($r_pSession))
      {
        echo $row["sessionID"] . $row["title"] . $row["date"] . $row["time"];
      }
   }
   else if (mysqli_num_rows($r_gSession) > 0)
   {

   }

  mysqli_close($con);
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href ="css/bootstrap-social.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title> Training History </title>
    <style>
      .pull-right {margin: 5px;}
      .container {border: 1px solid black; margin-top: 30px; margin-bottom: 30px; padding: 10px}
      .session-group {border-bottom: 1px solid black;}
      .formContent{background-color:#fafafa;
                  color:#000000;}
    </style>
  </head>

  <body class="main">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script type = "text/javascript"  src = "logoutConfirmation.js"></script>

    <header>
      <div class="row">
        <div class="col-xs-8 col-md-9 col-lg-10">
          <a href="welcomeTrainer.html">
            <img src="images/helpfitLogo.png" alt="HELPFit Logo" width="350" height="90">
          </a>
        </div>
          <br />

          <div class="input-group-btn col-xs-4 col-md-3 col-lg-2 pull-right">
            <button type="button" class="btn btn-default btn-md dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user"></span> Ben Lee
              <b class="caret"></b>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="displayTrainerProfile.html">View profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="dropdown-item" href="signOut.php" onclick="return logOut()">Logout</a></li>
            </ul>
          </div>
        </div>

        <div class="row">
            <ul class="nav nav-pills nav-justified">
              <li><a href="welcomeTrainer.html"> Home </a></li>
              <li><a href="trainingSession.html"> Record Training Session </a></li>
              <li class="active"><a href="trainerTrainingHist.html"> Training History </a></li>
              <li><a href="updateRecord.html"> Update Training Record </a></li>
            </ul>
        </div>
      </div>
    </header>

    <div class="container">
      <h2 align="center">Training History</h2>

      <div class="row">
        <div class="col-xs-5 col-sm-3">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary glyphicon glyphicon-search" type="button">
              </button>
            </span>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-5 col-sm-3 pull-right">
            <select class="form-control">
              <option value="Sort by" selected disabled>Sort by</option>
              <option value="sessionID">Session ID</option>
              <option value="Date">Date</option>
              <option value="Class Type">Class Type</option>
            </select>
          </div>
        </div>
      </div>

      <br />

      <div class="table-responsive">
        <table class="table table-hover table-condensed table-bordered">
          <tr class="success">
            <th>SessionID</th>
            <th>Title</th>
            <th>Date</th>
            <th>Time</th>
            <th>Class Type</th>
            <th>Update Record</th>
          </tr>
          <tr>
            <td class="info"><a data-toggle="modal" data-target="#viewRecord1">S100</a></td>
            <td>Be a Good Sport with Cross Country!</td>
            <td>2017-09-30</td>
            <td>6:00 PM</td>
            <td class="warning">Group (Sport)</td>
            <td><a data-toggle="modal" data-target="#updateRecord1">Update session</a></td>
          </tr>
          <tr>
            <td class="info">S101</td>
            <td>Build Up Your Skills with Trainer Ben</td>
            <td>2017-10-05</td>
            <td>10:00 AM</td>
            <td class="danger">Personal</td>
          </tr>
          <tr>
            <td class="info">S102</td>
            <td>Personal Zumba + Yoga Session</td>
            <td>2017-10-07</td>
            <td>4:00 PM</td>
            <td class="danger">Personal</td>
          </tr>
          <tr>
            <td colspan="6" align="center">
              <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </td>
          </tr>
        </table>
      </div>

      <br />

      <div class="col-xs-12 col-md-11 pull-right">
        <a href="updateRecord.html">
          <button type="submit" class="btn btn-primary btn-lg pull-right">Update Training Record</button>
        </a>
      </div>
    </div>

    <!-- Pop-up overlay to view record for session S100-->
    <div class="container2">
      <div class="modal fade" id="viewRecord1" role="dialog">
        <div class="modal-dialog">
          <div class="viewRecord_1">

            <div class="FormContent">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" align="center">Group Training Record</h2>
              </div>

              <div class="modal-body" align="right">
                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-5 col-sm-4">Session ID :</label>
                    <div class="col-xs-6 col-sm-6" align="left">
                      S100
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-5 col-sm-4">Title :</label>
                    <div class="col-xs-6 col-sm-6" align="left">
                      Be a Good Sport with Cross Country!
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-5 col-sm-4">Date :</label>
                    <div class="col-xs-6 col-sm-6" align="left">
                      2017-09-30
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-5 col-sm-4">Time :</label>
                    <div class="col-xs-6 col-sm-6" align="left">
                      6:00 PM
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-5 col-sm-4">Fee (RM):</label>
                    <div class="col-xs-6 col-sm-6" align="left">
                      RM 10
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-5 col-sm-4">Status :</label>
                    <div class="col-xs-6 col-sm-6" align="left">
                      Completed
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-5 col-sm-4">Class type :</label>
                    <div class="col-xs-6 col-sm-6" align="left">
                      Sport
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-5 col-sm-4">Max participants :</label>
                    <div class="col-xs-6 col-sm-6" align="left">
                      10
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-5 col-sm-4">Num participants :</label>
                    <div class="col-xs-6 col-sm-6" align="left">
                      7
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Pop-up overlay to update record for session S100-->
    <div class="container3">
      <div class="modal fade" id="updateRecord1" role="dialog">
        <div class="modal-dialog">
          <div class="updateRecord_1">

            <form name="updateSession" onsubmit="return updateSession()" method="post">

            <div class="FormContent">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" align="center">Update Group Training Record</h2>
              </div>

              <div class="modal-body" align="right">
                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-3 col-sm-4">Session ID :</label>
                    <div class="col-xs-6 col-sm-6" align="left">
                      S100
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-3 col-sm-4">Title :</label>
                    <div class="col-xs-6 col-sm-6" align="left">
                      Be a Good Sport with Cross Country!
                    </div>
                  </div>
                </div>

                <br />

                <script type="text/javascript" src="date.js"></script>

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-3 col-sm-4">Date :</label>
                    <div class="col-xs-6 col-sm-6">
                      <input type="date" name="sessionDate" class="form-control input-md" id="sessionDate"
                      min="2017-10-03" max="2100-12-31" placeholder="Enter Date (e.g. DD-MM-YYY)" required>
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-3 col-sm-4">Time :</label>
                    <div class="col-xs-6 col-sm-6">
                      <input type="time" name="sessionTime" class="form-control input-lg" id="sessionTime"
                        placeholder="Enter Time (e.g. 10:00 AM)" required>
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-3 col-sm-4">Fee (RM):</label>
                    <div class="col-xs-6 col-sm-6">
                      <input type="number" name="sessionFee" class="form-control input-md" id="sessionFee" placeholder="RM" min="0" required>
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-3 col-sm-4">Status :</label>
                    <div class="col-xs-6 col-sm-6">
                      <select class="form-control" id="sessionStatus" required>
                        <option value="Choose status" selected disabled>Choose status</option>
                        <option value="Cancelled">Cancelled</option>
                        <option value="Completed">Completed</option>
                        <option value="Available">Available</option>
                      </select>
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="form-group">
                    <label class="col-xs-3 col-sm-4">Class type :</label>
                    <div class="col-xs-6 col-sm-6">
                      <select class="form-control" id="sessionType" required>
                        <option value="Choose class type" selected disabled>Choose class type</option>
                        <option value="Sport">Sport</option>
                        <option value="Dance">Dance</option>
                        <option value="MMA">MMA</option>
                      </select>
                    </div>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="col-xs-12 col-md-12">
                    <button type="submit" class="btn btn-primary btn-lg pull-right">Update</button>
                  </div>
                </div>

              </div>
            </div>

            </form>

          </div>
        </div>
      </div>
    </div>

    <footer>
      <div align="center">
        Copyright &copy; HELPFIT 2017
      </div><br />
      <div align="center">
          <a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/"> <span class="fa fa-linkedin"></span></a>
          <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/"> <span class="fa fa-facebook"></span></a>
          <a class="btn btn-social-icon btn-instagram" href="https://www.instagram.com/"> <span class="fa fa-instagram"></span></a>
          <a class="btn btn-social-icon btn-twitter" href="https://twitter.com/"> <span class="fa fa-twitter"></span></a>
      </div></br />
      <div align="center">
      <nav>
        <a class="footNav" href="welcomeTrainer.html">Home</a>&nbsp; &#9474; &nbsp;
        <a class="footNav" href="trainingSession.html">Record Training Session</a>&nbsp;  &#9474; &nbsp;
        <a class="footNav" href="trainerTrainingHist.html">Training History</a>&nbsp; &#9474; &nbsp;
        <a class="footNav" href="updateRecord.html">Update Training Record</a>
      </nav>
      </div>
    </footer>

  </body>
</html>