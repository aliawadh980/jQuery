<?PHP
  header("Content-Type: application/json; charset=UTF-8");

  $myObj = array(
    'name' => "Ali",
    'age'  => 39,
    'city' => "Manama",
    'time' => 3
  );

  sleep($myObj['time']);

  $myJSON = json_encode($myObj);

  echo $myJSON;
?>
