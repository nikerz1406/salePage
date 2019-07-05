<?php
function url($page)
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'] . $page;
}

$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : NULL;
$stop = isset($_REQUEST['s']) ? $_REQUEST['s'] : 'n';
if($stop=="n"&&!is_null($uri)) {
    $count = substr_count($uri, '/');
    if ($count > 2) {
        $subArray = explode('/', $uri);
        $mode = array_pop($subArray);
        echo $mode;
        // change domain host here when you update on new hosting
        $subUrl = url("/salePage/index.php?mode=");
        header("location: " . $subUrl . $mode);
    }
}
?>