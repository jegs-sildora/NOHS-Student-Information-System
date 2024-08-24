<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOHS Student Information System</title>
  <link rel="stylesheet" href="./styles/output.css">
  <link rel="stylesheet" href="./styles/styles.css">
  <link rel="shortcut icon" href="./assets/favicon/favicon-32x32.png" type="image/x-icon">

  <style>
  .login-bg {
    background-image: url("./assets/image_rizal.png");
  }

  .bg-pos {
    background-position: 76%;
  }
  </style>

</head>

<body class="font-poppins text-maroon-500 text-stroke-white">
  <div class="relative flex justify-center items-center h-screen">
    <div class="absolute inset-0 login-bg bg-cover bg-center bg-pos h-screen opacity-75"></div>
    <div
      class="relative w-10/12 h-1/2 sm:w-7/12 sm:h-3/5 md:h-3/5 lg:h-3/5 xl:h-3/5 2xl:h-3/5 md:w-6/12 lg:w-5/12 xl:w-4/12 backdrop-blur-sm bg-opacity-30 bg-white rounded-xl shadow-2xl border-maroon-500 border-2 flex justify-center items-center flex-col">
      <div class="flex justify-center items-center">
        <img src="./assets/logo.png" class="w-1/5 xl:w-3/12 h-auto mr-2">
        <div class="flex justify-center items-center flex-col">
          <h1 class="text-4xl xl:text-5xl font-black text-stroke-lg">NOHS</h1>
          <h1 class="text-sm xl:text-xl font-bold text-stroke-xsm">Student Information System</h1>
        </div>
      </div>
      <div class="flex flex-col xl:w-96">
        <div class="mt-4">
          <form class="space-y-4" action="index.php" method="POST">
            <div>
              <label for="studentID" class="text-md font-semibold">Student ID :</label>
              <div>
                <input id="studentID" name="studentID" type="text" autocomplete="off" maxlength="11" required
                  placeholder="Enter your student ID"
                  class="w-full rounded-md border-0 py-1.5 px-1.5 shadow-sm ring-1 ring-inset font-semibold sm:text-sm sm:leading-6">
              </div>
            </div>
            <div>
              <div>
                <label for="password" class="text-md font-semibold leading-6">Password :</label>
              </div>
              <div>
                <input id="password" name="password" type="password" autocomplete="off"
                  placeholder="Enter your password" required
                  class="w-full rounded-md border-0 py-1.5 px-1.5 shadow-sm ring-1 ring-inset font-semibold sm:text-sm sm:leading-6">
              </div>
            </div>

            <div>
              <button type="submit"
                class="flex w-full justify-center rounded-md bg-maroon-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-maroon-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-maroon-700">Sign
                in</button>
            </div>
          </form>
        </div>
      </div>
      <h1 class="font-medium mt-6 text-xs xl:text-lg">Updated as of : <span class="font-semibold">August 20, 2024 | 11:18 PM</span></h1>
    </div>
  </div>
</body>

</html>

<?php include 'connect.php'; 

$studentID = $_POST['studentID'];
$password = $_POST['password'];

$userQry = "SELECT * FROM students WHERE studentID = '$studentID' AND password = '$password'";
$result = $conn->query($userQry);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  if ($password === $row["password"]) {
    session_start();
    $_SESSION["session_studentID"] = $studentID;
    header("Location: ./main/dashboard.php");
  } else {
    echo "<script>alert('Invalid ID or Password')</script>";
  }
} 