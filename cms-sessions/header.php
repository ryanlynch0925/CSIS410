<?php

if (!isset($pageTitle)) {
    $pageTitle = "Grace Bridge Missions";
}

if (!isset($pageDescription)) {
    $pageDescription = "Grace Bridge Missions is a fictional Christian misson organization serving communities through outreach, discipleship, and Christian resources";
}

if (!isset($pageKeywords)) {
    $pageKeywords = "Christian missions, outreach, discipleship, e-commerce, ministry";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo $pageTitle; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?php echo $pageDescription; ?>" />
        <meta name="keywords" content="<?php echo $pageKeywords; ?>" />
        <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo filemtime('styles.css'); ?>" />
    </head>

    <body>
        <div id="container">
            <div class="header">
                <h1>Grace Bridge Missions</h1>
                <p class="tagline">Sharing Christ through service, discipleship, and global outreach.</p>
            </div>