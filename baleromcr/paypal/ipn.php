<?
define("SANDBOX", false);

define("PAYPAL_URL", SANDBOX ? "www.sandbox.paypal.com" : "www.paypal.com");
define("REPORT_EMAIL", "josee+balerom@saborstudio.net");
define("REPORT_SUBJECT", "[Balerom IPN]");

define("PARSE_APP_ID", "uzxiJxstUhK1QCVfcH3OtloGrcvhnLMqeGDia7Bx");
define("PARSE_JS_KEY", "f8iumyCsQ1IZzEtWnlAiUCvnCytxQa8sgoCNTRUV");
define("PARSE_BASE_URL", "https://" . PARSE_APP_ID . ":javascript-key=" . PARSE_JS_KEY . "@api.parse.com/1/classes/");

header('HTTP/1.1 200 OK');

require("phpmailer.php");

function verifyWithPayPal($aData) {

  $result = false;

  // read the post from PayPal system and add 'cmd'
  $req = 'cmd=_notify-validate';
  foreach ($aData as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
  }

  // post back to PayPal system to validate
  $header  = "POST /cgi-bin/webscr HTTP/1.0\r\n";
  $header .= "Host: " . PAYPAL_URL . "\r\n";
  $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
  $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

  $fp = fsockopen ('ssl://' . PAYPAL_URL, 443, $errno, $errstr, 30);
  if (!$fp) {
    // HTTP ERROR
    mail(REPORT_EMAIL, REPORT_SUBJECT, "Error de fsockopen");
  }
  else {
    fputs ($fp, $header . $req);
    while (!feof($fp)) {
      $res = fgets ($fp, 1024);

      if (strcmp ($res, "VERIFIED") == 0) {
        $result = true;
      }
      else if (strcmp ($res, "INVALID") == 0) {
        // PAYMENT INVALID & INVESTIGATE MANUALY!
        mail(REPORT_EMAIL, REPORT_SUBJECT, "Invalid transaction!\n\n" . json_encode($aData));
      }
    }
    fclose ($fp);
  }

  return $result;
}

function getCollection($aCollectionId) {
  $res = file_get_contents(PARSE_BASE_URL . "Collection/" . $aCollectionId);
  return json_decode($res);
}
function getSongs($aCollectionId) {
  $query = Array();
  $query['collection'] = Array();
  $query['collection']['__type'] = "Pointer";
  $query['collection']['className'] = "Collection";
  $query['collection']['objectId'] = $aCollectionId;

  $res = file_get_contents(PARSE_BASE_URL . "Song?order=track&where=" . urlencode(json_encode($query)));
  return json_decode($res)->results;
}
function getSong($aSongId) {
  $res = file_get_contents(PARSE_BASE_URL . "Song/" . $aSongId);
  return json_decode($res);
}
function getVideo($aVideoId) {
  $res = file_get_contents(PARSE_BASE_URL . "Video/" . $aVideoId);
  return json_decode($res);
}
function getSingle($aSingleId) {
  $res = file_get_contents(PARSE_BASE_URL . "Singles/" . $aSingleId);
  return json_decode($res);
}

function sendMail($to, $title, $files) {

  $msg = "\n";
  $msg .= "Hola,\n";
  $msg .= "\n";
  $msg .= "Gracias por efectuar tu compra en La Plataforma. Acá tenés los detalles para descargar tu(s) archivo(s).\n";
  $msg .= "\n";
  $msg .= "\n";
  $msg .= $title . "\n";
  $msg .= "\n";

  foreach ($files as $file) {
    $msg .= $file['title'] . "\n";
    $msg .= $file['url'] . "\n";
  }

  $msg .= "\n";
  $msg .= "\n";
  $msg .= "\n";
  $msg .= "- La Plataforma\n";

  $mail = new PHPMailer();
  $mail->Subject = "Tu compra en La Plataforma";
  $mail->Body = $msg;
  $mail->AddAddress($to);
  $mail->SetFrom("noreply@laplataformadebalerom.com", "La Plataforma");
  $result = $mail->Send();
}

if (!verifyWithPayPal($_POST))
  die();

// PAYMENT VALIDATED & VERIFIED!
mail(REPORT_EMAIL, REPORT_SUBJECT, "Verified:\n\n" . json_encode($_POST));

$custom = json_decode(stripslashes($_POST['custom']));
$objectId = $custom->{'id'};
$objectType = $custom->{'type'};
$buyerEmail = $_POST['payer_email'];

$orderTitle = NULL;
$orderFiles = NULL;

if (strcmp($objectType, "collection") == 0) {

  $collection = getCollection($objectId);
  $orderTitle = $collection->title;

  $songs = getSongs($objectId);

  $orderFiles = Array();
  foreach ($songs as $song) {
    $file = Array();
    $file['title'] = $song->track . ". " . $song->title;
    $file['url'] = $song->file;
    $orderFiles[] = $file;
  }
}
else if (strcmp($objectType, "song") == 0) {
  $song = getSong($objectId);
  $orderTitle = $song->title;

  $orderFiles = Array();
  $file = Array();
  $file['title'] = "Single";
  $file['url'] = $song->file;
  $orderFiles[] = $file;
}
else if (strcmp($objectType, "single") == 0) {
  $single = getSingle($objectId);
  $orderTitle = $single->title;

  $orderFiles = Array();
  $file = Array();
  $file['title'] = "Single";
  $file['url'] = $single->file;
  $orderFiles[] = $file;
}
else if (strcmp($objectType, "video") == 0) {
  $video = getVideo($objectId);
  $orderTitle = $video->title;

  $orderFiles = Array();
  $file = Array();
  $file['title'] = "Video";
  $file['url'] = $video->file;
  $orderFiles[] = $file;
}

// Finally, send the email
if (isset($orderTitle) && isset($orderFiles)) {
  sendMail($buyerEmail, $orderTitle, $orderFiles);
  sendMail(REPORT_EMAIL, $orderTitle, $orderFiles);
}

?>
