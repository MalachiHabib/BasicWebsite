
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


    <h1 class="faqheader"> INFO </h1>


    <div class="faqside">
        <a href="account.php">Account</a>
        <a href="privacypolicy.php">Privacy Policy</a>
        <a href="RefundsandReturns.php">Returns + Refunds</a>
    </div>


    <div class="faq-info">
        <div class="faq-info-1">
            <h1> Accounts </h1>
            <ul> <button type="button" class="collapsible">Account Help</button>
                <div class="content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce lectus turpis, facilisis eget porttitor eget, ultricies ut purus. Donec bibendum lorem eget ultricies interdum. Cras in congue odio, at malesuada ipsum. Aenean dignissim feugiat viverra. Nam imperdiet eget magna in tempor. Aenean eros arcu, eleifend vitae fermentum sed, eleifend sed massa. Nulla facilisi. Duis semper accumsan ante, egestas sagittis lacus imperdiet ac. Maecenas nunc velit, condimentum id malesuada vel, rutrum quis purus. Suspendisse potenti. Vestibulum condimentum, justo vel mattis euismod, nibh augue pulvinar urna, eget aliquam dui velit quis tellus. Donec venenatis quis diam non euismod. Curabitur at tincidunt nulla, a semper purus. Ut venenatis arcu at diam accumsan bibendum. Nam et dui in diam fringilla consequat. Integer tincidunt, lacus ut congue scelerisque, dolor ex aliquet tellus, non condimentum ex risus at ante.</p>
                </div>

                <button type="button" class="collapsible">Security</button>
                <div class="content">
                    <p>Nulla consequat pulvinar arcu non condimentum. Integer quis commodo velit, sed scelerisque lectus. Vestibulum ultricies rutrum fermentum. Phasellus viverra purus et nibh fermentum iaculis. In hac habitasse platea dictumst. Curabitur non lectus quis mi scelerisque eleifend et quis diam. Donec maximus mollis nisi, nec euismod nisl. Proin posuere nunc quis justo mollis volutpat. Donec volutpat, urna ut consequat finibus, sem sem convallis tellus, eu tincidunt nisi ligula ut sapien. Fusce at porta urna, ut tempus lacus.</p>
                </div>

                <button type="button" class="collapsible">Paswords</button>
                <div class="content">
                    <p>Sed fermentum libero nec gravida feugiat. Quisque convallis vehicula aliquet. Phasellus sodales ligula tristique consequat porttitor. Sed gravida eleifend nisi eget consectetur. Donec malesuada sollicitudin nulla ac tempus. Morbi felis nisi, posuere ut sapien condimentum, porta semper dui. Cras et faucibus elit, eu mattis risus. Morbi egestas, ligula eu aliquet facilisis, nisl leo laoreet urna, porta viverra quam enim sit amet arcu. Vivamus tincidunt nibh erat, nec varius augue egestas vitae. In non tellus dictum, porttitor ipsum volutpat, congue magna. Cras at nulla eros. Quisque elementum elit tincidunt arcu efficitur, vel sollicitudin massa interdum. Nam sed arcu non velit ultricies ornare vel nec mauris. Vestibulum vel ipsum in eros malesuada luctus. Proin sodales velit id vestibulum feugiat.</p>
                </div>
            </ul>


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
<?php  require_once "footer.php";?>
</body>

</html>
