<?php
$pageTitle = "Module 2 Forms";
$pageDescription = "GET and POST product survey forms for Aunt Lissa's Grace Closet";
$pageKeywords = "PHP forms, GET method, POST method, product survey";
?>
<?php
include("header.php");
include("menu.php");
?>

        <div class="content">
            <h2>PHP, GET, and POST Methods</h2>

            <p>
                PHP is a server-side scripting language that processes form data and creates dynamic web pages.
            </p>
            <p>
                The GET method sends form information through the URL, which makes it useful for simple searches or non-pricate information.
            </p>
            <p>
                The POST method sends form information through the request body instead of the URL, which makes it better for longer form submission or information that should not be displayed in the address bar.
            </p>

            <h2>Product Survey Forms</h2>

            <p>
                Please choose one of the two product survey forms below. Both surveys rank three products that may be used later in the shopping cart projects.
            </p>

            <p><a href="get-poll.php">Complete the GET Product Survey</a></p>
            <p><a href="post-poll.php">Complete the POST Product Survey</a></p>
        </div>

        <?php include 'footer.php'; ?>
    </div>
</body>
</html>