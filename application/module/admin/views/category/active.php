<?php
<<<<<<< HEAD
//echo "<pre>";
//print_r($this->exe);
//echo "</pre>";
if(!empty($this->exe)){
    for($i=0;$i<count($this->exe);$i++) {
        echo $this->exe[$i][0]['name'] . "<br/>";
    }
}
else{
    echo "Bạn chưa chọn tên!";
}

=======
echo "<pre>";
print_r($this->exe);
echo "</pre>";
foreach ($this->exe as $value){
    echo $value;
}
>>>>>>> 581958087cb608a3178d3dd2cf853f940a56e34b
?>