<?php
if (!isset($pageTitle)) {
    $pageTitle = "Aunt Lissa's Grace Closet";
}

if (!isset($pageDescription)) {
    $pageDescription = "Aunt Lissa's Grace Closet web assignment page.";
}

if (!isset($pageKeywords)) {
    $pageKeywords = "PHP, web development, Aunt Lissa's Grave Closet";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title><?php echo $pageTitle; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="<?php echo $pageDescription; ?>" />
    <meta name="keywords" content="<?php echo $pageKeywords; ?>" />
    <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo filemtime('styles.css'); ?>" />
</head>

<body>
    <div id="container">
        <div class="header">
            <h1><?php echo $pageTitle; ?></h1>
            <p class="tagline">Providing clothing and support to those in need</p>
        </div>