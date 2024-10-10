<?php
  require '../vendor/autoload.php';
  use Endroid\QrCode\Builder\Builder;
  use Endroid\QrCode\Encoding\Encoding;
  use Endroid\QrCode\ErrorCorrectionLevel;
  use Endroid\QrCode\Label\LabelAlignment;
  use Endroid\QrCode\Label\Font\NotoSans;
  use Endroid\QrCode\RoundBlockSizeMode;
  use Endroid\QrCode\Writer\PngWriter;
  
  $result = Builder::create()
      ->writer(new PngWriter())
      ->writerOptions([])
      ->data('Esto está muy alto')
      ->encoding(new Encoding('UTF-8'))
      ->errorCorrectionLevel(ErrorCorrectionLevel::High)
      ->size(300)
      ->margin(10)
      ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
      ->labelText('This is a test')
      ->labelFont(new NotoSans(35))
      ->labelAlignment(LabelAlignment::Center)
      ->validateResult(false)
      ->build();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prueba de práctica</title>
</head>
<body>
  <h1>Prueba</h1>
  <p>El texto:</p>
  <p>
    <img src="<?= $result->getDataUri() ?>" alt="código QR generado">
  </p>
</body>
</html>