<?PHP
  require "./vendor/autoload.php";

  use GuzzleHttp\Client;
  use GuzzleHttp\Psr7\Request;

  // Create a Constant for our JSON version and our seth-rpc URL:
  const jsonRPC = '2.0';
  const SETH_RPC_URL = "http://{your_seth-rpc_url}:3030";
  function chkPrefix($input)
  {
     if (strlen($input) < 2) {
     $input = '0x'.$input;
     return $input;
     };
    $str = '';
    for ($i =0; $i <2; $i++)
    {
      $str = $str.$input[$i];
     };
    if ($str === '0x') {
      return $input;
    }else {
      $input = '0x'.$input;
      return $input;
      };
    }



    $params = [];
    function SethGuzzleClient($params)
      {
        $client = new \GuzzleHttp\Client(["base_uri" => SETH_RPC_URL]);

        $headers = ['Content-type' => 'application/json'];
        $dataToJson = (json_encode($params));
        $request = new Request('POST', SETH_RPC_URL, $headers, $dataToJson);
        $response = $client->send($request, ['timeout' => 2]);

        $result = $response->getBody()->getContents();
        return $result;
      };
?>
