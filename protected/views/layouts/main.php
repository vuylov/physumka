<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/main.css">
</head>
<body>
    <div id="wrap">
        <div class="row-fluid header">

                <div class="container head-bg"><h1 id="app_name"><?php echo CHtml::encode(Yii::app()->name); ?></h1></div>
        </div>


            <?php echo $content; ?>

        <div id="push"></div>
    </div>
  <div id="footer">
      <div class="row-fluid">
          <div class="span-12">
            footer
          </div>
      </div>
  </div>
</body>
</html>
