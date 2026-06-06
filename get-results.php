<?php
$pageTitle = "GET Survey Results";
function cleanInput($value) {
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

function getAnswer($fieldName) {
    if (isset($_GET[$fieldName])) {
        return cleanInput($_GET[$fieldName]);
    } else {
        return "No answer provided";
    }
}

$rankerName = getAnswer("rankerName");
$comments = getAnswer("comments");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title><?php echo $pageTitle; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo filemtime('styles.css'); ?>" />
</head>

<body>
    <div id="container">
        <div class="header">
            <h1>Aunt Lissa's Grace Closet</h1>
            <p class="tagline">GET Survey Results</p>
        </div>

        <div class="content">
            <h2>GET Survey Results Report</h2>

            <p><strong>Ranker Name:</strong> <?php echo $rankerName; ?></p>
            <p><strong>Comments:</strong> <?php echo $comments; ?></p>

            <table class="resultsTable">
                <tr>
                    <th>Product</th>
                    <th>Feature</th>
                    <th>Ranking</th>
                </tr>

                <tr><td>Grace Graphic T-Shirt</td><td>Product Quality</td><td><?php echo getAnswer("tee_quality"); ?></td></tr>
                <tr><td>Grace Graphic T-Shirt</td><td>Price Value</td><td><?php echo getAnswer("tee_price"); ?></td></tr>
                <tr><td>Grace Graphic T-Shirt</td><td>Color and Style</td><td><?php echo getAnswer("tee_color"); ?></td></tr>
                <tr><td>Grace Graphic T-Shirt</td><td>Product Description</td><td><?php echo getAnswer("tee_description"); ?></td></tr>
                <tr><td>Grace Graphic T-Shirt</td><td>Likelihood to buy</td><td><?php echo getAnswer("tee_buy"); ?></td></tr>

                <tr><td>Blessing Basics Clothing Bundle</td><td>Product Quality</td><td><?php echo getAnswer("bundle_quality"); ?></td></tr>
                <tr><td>Blessing Basics Clothing Bundle</td><td>Price Value</td><td><?php echo getAnswer("bundle_price"); ?></td></tr>
                <tr><td>Blessing Basics Clothing Bundle</td><td>Color and Style</td><td><?php echo getAnswer("bundle_color"); ?></td></tr>
                <tr><td>Blessing Basics Clothing Bundle</td><td>Product Description</td><td><?php echo getAnswer("bundle_description"); ?></td></tr>
                <tr><td>Blessing Basics Clothing Bundle</td><td>Likelihood to buy</td><td><?php echo getAnswer("bundle_buy"); ?></td></tr>

                <tr><td>Sunday Best Dress</td><td>Product Quality</td><td><?php echo getAnswer("dress_quality"); ?></td></tr>
                <tr><td>Sunday Best Dress</td><td>Price Value</td><td><?php echo getAnswer("dress_price"); ?></td></tr>
                <tr><td>Sunday Best Dress</td><td>Color and Style</td><td><?php echo getAnswer("dress_color"); ?></td></tr>
                <tr><td>Sunday Best Dress</td><td>Product Description</td><td><?php echo getAnswer("dress_description"); ?></td></tr>
                <tr><td>Sunday Best Dress</td><td>Likelihood to buy</td><td><?php echo getAnswer("dress_buy"); ?></td></tr>
            </table>

            <p><a href="get-poll.php">Return to GET Survey</a></p>
            <p><a href="forms.php">Return to Forms Assignment Page</a></p>
        </div>
    </div>
</body>
</html>