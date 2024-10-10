<?php
  require '../vendor/autoload.php';
  use Endroid\QrCode\Builder\Builder;
  use Endroid\QrCode\Encoding\Encoding;
  use Endroid\QrCode\ErrorCorrectionLevel;
  use Endroid\QrCode\Label\LabelAlignment;
  use Endroid\QrCode\Label\Font\NotoSans;
  use Endroid\QrCode\RoundBlockSizeMode;
  use Endroid\QrCode\Writer\PngWriter;
  
  $data = $_POST['data'];
  $label = $_POST['label'];
  $filename = $_POST['filename'];

  $result = Builder::create()
      ->writer(new PngWriter())
      ->writerOptions([])
      ->data($data)
      ->encoding(new Encoding('UTF-8'))
      ->errorCorrectionLevel(ErrorCorrectionLevel::High)
      ->size(300)
      ->margin(10)
      ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
      ->labelText($label)
      ->labelFont(new NotoSans(15))
      ->labelAlignment(LabelAlignment::Center)
      ->validateResult(false)
      ->build();

      $result->saveToFile(__DIR__.'/img/'. $filename . '.png');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generador de códigos QR</title>
</head>
<body>
  <h1>Código QR generado</h1>

  <p>
    <img src="<?= $result->getDataUri() ?>" alt="código QR generado">
  </p>
</body>
</html>