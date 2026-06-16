<div class="footer">
        <p class="modified">
            Last modified: 
            <?php echo date("F d, Y h:i A", filemtime(__FILE__)); ?>
        </p>

        <?php
        if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
            echo "<p><a href=\"logout.php\">Logout</a></p>";
        }
        ?>

    <div class="validation">
        <p>
            <a href="https://validator.w3.org/check?uri=referer">
                <img src="https://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
            </a>

            <a href="https://jigsaw.w3.org/css-validator/check/referer">
                <img src="https://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" height="31" width="88" />
            </a>
        </p>
    </div>
</div>
    