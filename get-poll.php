<?php
$pageTitle = "GET Product Survey";
$pageDescription = "Product survey using the GET method";
$pageKeywords = "GET form, product survey, product ranking";
?>
<?php
include("header.php");
include("menu.php");
?>

<body>
    <div id="container">
        <div class="header">
            <h1>Aunt Lissa's Grace Closet</h1>
            <p class="tagline">GET Product Survey</p>
        </div>

        <div class="content">
            <h2>GET Product Survey</h2>
            <p>Please answer the following questions about our products:</p>

            <form action="get-results.php" method="get">
                <p>
                    <label for="rankerName">Your Name:</label>
                    <input type="text" name="rankerName" id="rankerName"/>
                </p>

                <div class="productBox">
                    <h3>Grace Graphic T-Shirt</h3>
                    <img class="productPhoto" src="images/grace-tee.png" alt="Grace Grpahic T-Shirt"/>
                    <p>A soft cotton T-shirt with a simple faith-based design for everday wear.</p>

                    <p><strong>Product Quality:</strong></p>
                    <p>
                        <input type="radio" name="tee_quality" value="Excellent" /> Excellent
                        <input type="radio" name="tee_quality" value="Good" /> Good
                        <input type="radio" name="tee_quality" value="Fair" /> Fair
                        <input type="radio" name="tee_quality" value="Poor" /> Poor
                    </p>

                    <p><strong>Price Value:</strong></p>
                    <p>
                        <input type="radio" name="tee_price" value="Excellent" /> Excellent
                        <input type="radio" name="tee_price" value="Good" /> Good
                        <input type="radio" name="tee_price" value="Fair" /> Fair
                        <input type="radio" name="tee_price" value="Poor" /> Poor
                    </p>

                    <p><strong>Color and style:</strong></p>
                    <p>
                        <input type="radio" name="tee_color" value="Excellent" /> Excellent
                        <input type="radio" name="tee_color" value="Good" /> Good
                        <input type="radio" name="tee_color" value="Fair" /> Fair
                        <input type="radio" name="tee_color" value="Poor" /> Poor
                    </p>

                    <p><strong>Product Description:</strong></p>
                    <p>
                        <input type="radio" name="tee_description" value="Excellent" /> Excellent
                        <input type="radio" name="tee_description" value="Good" /> Good
                        <input type="radio" name="tee_description" value="Fair" /> Fair
                        <input type="radio" name="tee_description" value="Poor" /> Poor
                    </p>

                    <p><strong>Likelihood to buy:</strong></p>
                    <p>
                        <input type="radio" name="tee_buy" value="Excellent" /> Excellent
                        <input type="radio" name="tee_buy" value="Good" /> Good
                        <input type="radio" name="tee_buy" value="Fair" /> Fair
                        <input type="radio" name="tee_buy" value="Poor" /> Poor
                    </p>
                </div>

                <div class="productBox">
                    <h3>Blessing Basics Clothing Bundle</h3>
                    <img class="productPhoto" src="images/blessing-bundle.png" alt="Blessing Basics Clothing Bundle"/>
                    <p>A bundle set of gently used children's basics selected for affordability and daily use.</p>

                    <p><strong>Product Quality:</strong></p>
                    <p>
                        <input type="radio" name="bundle_quality" value="Excellent" /> Excellent
                        <input type="radio" name="bundle_quality" value="Good" /> Good
                        <input type="radio" name="bundle_quality" value="Fair" /> Fair
                        <input type="radio" name="bundle_quality" value="Poor" /> Poor
                    </p>

                    <p><strong>Price Value:</strong></p>
                    <p>
                        <input type="radio" name="bundle_price" value="Excellent" /> Excellent
                        <input type="radio" name="bundle_price" value="Good" /> Good
                        <input type="radio" name="bundle_price" value="Fair" /> Fair
                        <input type="radio" name="bundle_price" value="Poor" /> Poor
                    </p>

                    <p><strong>Color and style:</strong></p>
                    <p>
                        <input type="radio" name="bundle_color" value="Excellent" /> Excellent
                        <input type="radio" name="bundle_color" value="Good" /> Good
                        <input type="radio" name="bundle_color" value="Fair" /> Fair
                        <input type="radio" name="bundle_color" value="Poor" /> Poor
                    </p>

                    <p><strong>Product Description:</strong></p>
                    <p>
                        <input type="radio" name="bundle_description" value="Excellent" /> Excellent
                        <input type="radio" name="bundle_description" value="Good" /> Good
                        <input type="radio" name="bundle_description" value="Fair" /> Fair
                        <input type="radio" name="bundle_description" value="Poor" /> Poor
                    </p>

                    <p><strong>Likelihood to buy:</strong></p>
                    <p>
                        <input type="radio" name="bundle_buy" value="Excellent" /> Excellent
                        <input type="radio" name="bundle_buy" value="Good" /> Good
                        <input type="radio" name="bundle_buy" value="Fair" /> Fair
                        <input type="radio" name="bundle_buy" value="Poor" /> Poor
                    </p>
                </div>

                <div class="productBox">
                    <h3>Sunday Best Dress</h3>
                    <img class="productPhoto" src="images/sunday-dress.png" alt="Sunday Best Dress"/>
                    <p>A modest children's dress designed for church, family events, and special occasions.</p>

                    <p><strong>Product Quality:</strong></p>
                    <p>
                        <input type="radio" name="dress_quality" value="Excellent" /> Excellent
                        <input type="radio" name="dress_quality" value="Good" /> Good
                        <input type="radio" name="dress_quality" value="Fair" /> Fair
                        <input type="radio" name="dress_quality" value="Poor" /> Poor
                    </p>

                    <p><strong>Price Value:</strong></p>
                    <p>
                        <input type="radio" name="dress_price" value="Excellent" /> Excellent
                        <input type="radio" name="dress_price" value="Good" /> Good
                        <input type="radio" name="dress_price" value="Fair" /> Fair
                        <input type="radio" name="dress_price" value="Poor" /> Poor
                    </p>

                    <p><strong>Color and style:</strong></p>
                    <p>
                        <input type="radio" name="dress_color" value="Excellent" /> Excellent
                        <input type="radio" name="dress_color" value="Good" /> Good
                        <input type="radio" name="dress_color" value="Fair" /> Fair
                        <input type="radio" name="dress_color" value="Poor" /> Poor
                    </p>

                    <p><strong>Product Description:</strong></p>
                    <p>
                        <input type="radio" name="dress_description" value="Excellent" /> Excellent
                        <input type="radio" name="dress_description" value="Good" /> Good
                        <input type="radio" name="dress_description" value="Fair" /> Fair
                        <input type="radio" name="dress_description" value="Poor" /> Poor
                    </p>

                    <p><strong>Likelihood to buy:</strong></p>
                    <p>
                        <input type="radio" name="dress_buy" value="Excellent" /> Excellent
                        <input type="radio" name="dress_buy" value="Good" /> Good
                        <input type="radio" name="dress_buy" value="Fair" /> Fair
                        <input type="radio" name="dress_buy" value="Poor" /> Poor
                    </p>
                </div>

                <p>
                    <label for="comments">Comments</label><br />
                    <textarea name="comments" id="comments" rows="5" cols="60"></textarea>
                </p>

                <p>
                    <input type="submit" value="Submit GET Survey" />
                    <input type="reset" value="Clear Form" />
                </p>
            </form>

            <p class="aiNotice">These product images were generated with ChatGPT image generation.</p>
        </div>

        <?php include 'footer.php'; ?>
    </div>
</body>
</html>