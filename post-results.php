<?php
$pageTitle = "POST Survey Results";
function cleanInput($value) {
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

function postAnswer($fieldName) {
    if (isset($_POST[$fieldName])) {
        return cleanInput($_POST[$fieldName]);
    } else {
        return "No answer provided";
    }
}

$rankerName = postAnswer("rankerName");
$comments = postAnswer("comments");
?>
<?php
include("header.php");
include("menu.php");
?>

        <div class="content">
            <h2>POST Survey Results Report</h2>

            <p><strong>Ranker Name:</strong> <?php echo $rankerName; ?></p>
            <p><strong>Comments:</strong> <?php echo $comments; ?></p>

            <table class="resultsTable">
                <tr>
                    <th>Product</th>
                    <th>Feature</th>
                    <th>Ranking</th>
                </tr>

                <tr><td>Grace Graphic T-Shirt</td><td>Product Quality</td><td><?php echo postAnswer("tee_quality"); ?></td></tr>
                <tr><td>Grace Graphic T-Shirt</td><td>Price Value</td><td><?php echo postAnswer("tee_price"); ?></td></tr>
                <tr><td>Grace Graphic T-Shirt</td><td>Color and Style</td><td><?php echo postAnswer("tee_color"); ?></td></tr>
                <tr><td>Grace Graphic T-Shirt</td><td>Product Description</td><td><?php echo postAnswer("tee_description"); ?></td></tr>
                <tr><td>Grace Graphic T-Shirt</td><td>Likelihood to buy</td><td><?php echo postAnswer("tee_buy"); ?></td></tr>

                <tr><td>Blessing Basics Clothing Bundle</td><td>Product Quality</td><td><?php echo postAnswer("bundle_quality"); ?></td></tr>
                <tr><td>Blessing Basics Clothing Bundle</td><td>Price Value</td><td><?php echo postAnswer("bundle_price"); ?></td></tr>
                <tr><td>Blessing Basics Clothing Bundle</td><td>Color and Style</td><td><?php echo postAnswer("bundle_color"); ?></td></tr>
                <tr><td>Blessing Basics Clothing Bundle</td><td>Product Description</td><td><?php echo postAnswer("bundle_description"); ?></td></tr>
                <tr><td>Blessing Basics Clothing Bundle</td><td>Likelihood to buy</td><td><?php echo postAnswer("bundle_buy"); ?></td></tr>

                <tr><td>Sunday Best Dress</td><td>Product Quality</td><td><?php echo postAnswer("dress_quality"); ?></td></tr>
                <tr><td>Sunday Best Dress</td><td>Price Value</td><td><?php echo postAnswer("dress_price"); ?></td></tr>
                <tr><td>Sunday Best Dress</td><td>Color and Style</td><td><?php echo postAnswer("dress_color"); ?></td></tr>
                <tr><td>Sunday Best Dress</td><td>Product Description</td><td><?php echo postAnswer("dress_description"); ?></td></tr>
                <tr><td>Sunday Best Dress</td><td>Likelihood to buy</td><td><?php echo postAnswer("dress_buy"); ?></td></tr>
            </table>

            <p><a href="post-poll.php">Return to POST Survey</a></p>
            <p><a href="forms.php">Return to Forms Assignment Page</a></p>
        </div>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>