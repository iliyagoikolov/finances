<h1>Show Action</h1>

<?php
use app\components\MyWidget;
//debug($cats);

//echo MyWidget::widget(["name" => "Vasya"]);

MyWidget::begin();
echo "<h2>vasya</h2>";
MyWidget::end();
