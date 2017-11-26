<?php
//echo "<pre>";
//print_r($this->exe);
//echo "</pre>";
if(!empty($this->exe)){
    for($i=0;$i<count($this->exe);$i++) {
        echo $this->exe[$i][0]['name'] . "<br/>";
    }
}
else{
    echo "Bạn chưa chọn phần tử!";
}

?>