<?php

namespace Html;
class Table {
    public $title = "";
    public $numRows = 0;
    public function message(){
        echo "<p>Table '{$this->title}' has {$this->numRows} rows.</p>";
    }
}
$table = new Table();
$table->title = "My table";
$table->numRows = 5;

// ITERABLES

function printIterable(iterable $myIterable){
    foreach($myIterable as $item){
        echo $item;
    }
}

$arr = ['a', 'b', 'c'];
printIterable($arr);
echo "<br>","<br>";

function getIterable():iterable {
    return ['a', 'b', 'c'];
}

$myIterable = getIterable();
foreach($myIterable as $item){
    echo $item;
}

echo "<br>","<br>";

?>

<!-- <html lang="en">
<body>
    
<?php $table->message(); ?> -->

</body>
</html>
