<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Test multiple ajax and final result</title>
    <meta name="description" content="Testing jQuery with multiple ajax requests and final result when all got loaded">
    <meta name="viewport" content="width=device-width">
  </head>

  <body>
    <button id = "b1">Load One</button>
    <button id = "b2">Load Two</button>
    <button id = "b3">Load Three</button>
    <button id=  "b4">Load Four</button>

    <p><div id="resultDiv1">Here will be result 1</div>
    <p><div id="resultDiv2">Here will be result 2</div>
    <p><div id="resultDiv3">Here will be result 3</div>
    <p><div id="resultDiv4">Here will be result 4</div>

    <h3>Now the final part</h3>
    <p><div id="resultFinal">Here will be Final result when all 4 buttons are pressed!</div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
    $(document).ready(function() {

      response1 = $.Deferred();
      response2 = $.Deferred();
      response3 = $.Deferred();
      response4 = $.Deferred();

      $("#b1").click(function() {
        console.log("b1 clicked");
        $("#resultDiv1").load("php1.php", function(responseTxt, statusTxt, xhr){
          if(statusTxt == "success") {
            console.log("php1.php External content loaded successfully!");
            response1.resolve(responseTxt);
          }
          if(statusTxt == "error")
            console.log("Error: " + xhr.status + ": " + xhr.statusText);
        });
      });

      $("#b2").click(function() {
        console.log("b2 clicked");
        $("#resultDiv2").load("php1.php", function(responseTxt, statusTxt, xhr){
          if(statusTxt == "success") {
            console.log("php1.php External content loaded successfully!");
            response2.resolve(responseTxt);
          }
          if(statusTxt == "error")
            console.log("Error: " + xhr.status + ": " + xhr.statusText);
        });
      });

      $("#b3").click(function() {
        console.log("b3 clicked");
        $("#resultDiv3").load("php1.php", function(responseTxt, statusTxt, xhr){
          if(statusTxt == "success") {
            console.log("php1.php External content loaded successfully!");
            response3.resolve(responseTxt);
          }
          if(statusTxt == "error")
            console.log("Error: " + xhr.status + ": " + xhr.statusText);
        });
      });

      $("#b4").click(function() {
        console.log("b4 clicked");
        $.getJSON( "php2.php", function( data ) {
          console.log("php2.php - External content loaded successfully!, and took " + data.time + " seconds.");
          $("#resultDiv4").text("Loaded php2, and it took " + data.time + " seconds!");
          response4.resolve(data);
        });
      });

      $.when(response1, response2, response3, response4).done(function (v1, v2, v3, v4) {
        // console.log(v1);
        console.log("All clicked!");
        $("#resultFinal").text("All clicked!");
      });

    });
    </script>
  </body>

</html>
