<!DOCTYPE html>

  <html>
    <body>

      <pre id="json"></pre>

      <?php require "vendor/autoload.php";
      /* Our PHP script exists as an HTML tag within the body of the script.
      The opening tag also loads our dependencies*/
      // Include our functions:
      include_once "includes/functions.php";

      // Pull the POST values from our html form:
      $_method = $_POST["method"];
      $_from = chkPrefix($_POST["from"]);
      $_data = chkPrefix($_POST["data"]);
      $_to = chkPrefix($_POST["to"]);
      $_id = '2';

      // Create an array containing all of our string parameters:
      $txData = array('jsonrpc' => jsonRPC, 'method' => $_method, 'id' => $_id, 'params' => array(['from' => $_from, 'data' => $_data, 'to' => $_to]));
      // Call our Guzzle Client and capture the results:
      $json = SethGuzzleClient($txData);
      // Display the results on our webpage:
      // echo $json;

      ?>
    </body>

    <script type="text/javascript">
      
      var data = <?php echo $json; ?>

      document.getElementById("json").innerHTML = JSON.stringify(data, undefined, 2);
    </script>
  </html>
