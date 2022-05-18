<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/headerfooterstyle.css?v=<?php echo time(); ?>">
    <title>FAQ</title>
    <?php require_once "header.php"; ?>


</head>

<body>
    <h1 class="faqheader"> FAQS </h1>
    <div class="faqside">
        <a href="account.php">Account</a>
        <a href="info/privacypolicy.php">Privacy Policy</a>
        <a href="info/RefundsandReturns.php">Returns + Refunds</a>
    </div>


    <div class="faq-info">
        <div class="faq-info-1">

            <h1> Frequently Asked Questions </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In venenatis bibendum egestas. Etiam arcu tortor, malesuada at pulvinar nec, dictum at mi. Nulla non diam nec neque cursus volutpat a maximus mi. Sed vestibulum bibendum maximus. Suspendisse vel vehicula neque, nec congue est. Sed purus sapien, porttitor ut lorem ut, sollicitudin ullamcorper odio. Aliquam a ligula sit amet nisl lacinia finibus. Praesent tempus nisl ac eros sollicitudin elementum.
            </p>

            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In venenatis bibendum egestas. Etiam arcu tortor, malesuada at pulvinar nec, dictum at mi. Nulla non diam nec neque cursus volutpat a maximus mi. Sed vestibulum bibendum maximus. Suspendisse vel vehicula neque, nec congue est. Sed purus sapien, porttitor ut lorem ut, sollicitudin ullamcorper odio. Aliquam a ligula sit amet nisl lacinia finibus. Praesent tempus nisl ac eros sollicitudin elementum.
            </p>

            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In venenatis bibendum egestas. Etiam arcu tortor, malesuada at pulvinar nec, dictum at mi. Nulla non diam nec neque cursus volutpat a maximus mi. Sed vestibulum bibendum maximus. Suspendisse vel vehicula neque, nec congue est. Sed purus sapien, porttitor ut lorem ut, sollicitudin ullamcorper odio. Aliquam a ligula sit amet nisl lacinia finibus. Praesent tempus nisl ac eros sollicitudin elementum.
            </p>

            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In venenatis bibendum egestas. Etiam arcu tortor, malesuada at pulvinar nec, dictum at mi. Nulla non diam nec neque cursus volutpat a maximus mi. Sed vestibulum bibendum maximus. Suspendisse vel vehicula neque, nec congue est. Sed purus sapien, porttitor ut lorem ut, sollicitudin ullamcorper odio. Aliquam a ligula sit amet nisl lacinia finibus. Praesent tempus nisl ac eros sollicitudin elementum.
            </p>

            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In venenatis bibendum egestas. Etiam arcu tortor, malesuada at pulvinar nec, dictum at mi. Nulla non diam nec neque cursus volutpat a maximus mi. Sed vestibulum bibendum maximus. Suspendisse vel vehicula neque, nec congue est. Sed purus sapien, porttitor ut lorem ut, sollicitudin ullamcorper odio. Aliquam a ligula sit amet nisl lacinia finibus. Praesent tempus nisl ac eros sollicitudin elementum.
            </p>
        </div>
    </div>


    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
    <?php require_once "footer.php"; ?>
</body>

</html>