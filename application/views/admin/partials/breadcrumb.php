<?php
    $segment = $this->uri->segment_array();
    $uri = base_url();
    $uriCount = count($segment);
    $i = 1;
    foreach ($segment as $s)
    {
    $uri = $uri.$s.'/';
    echo '<a href="'.$uri.'">'.ucfirst($s).'</a>';
    if($i != $uriCount){
        echo " » ";
    }
    $i++;
    }
?>


