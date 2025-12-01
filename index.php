<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Azmain Taraqqi">
    <meta name="keywords" content="HTML5, Root Flower, Homepage">
    <meta name="description" content="Homepage for Root Flower">
    <link href="styles/style.css" rel="stylesheet">
    <title>Home - Root Flower</title>
</head>
<body>
    <?php include('header.inc'); ?>

    <main class="content">
        <section class="hero white-text">
            <h1>Welcome to Root Flower.</h1>
            <article>
                <h2></h2>
                We are an organization of florists based in Kuching, Sarawak.<br>
                We provide a variety of flower arrangements for different occasions; which include handmade bouquets, floral wreaths and tasteful decor.<br>
                We also conduct workshops for those who are interested in learning the art of floristry. <br>
                Thank you for visiting our website!
            </article>
        </section>
        <section class="showcase" id="products-showcase">
            <h2>Browse through our catalogue:</h2>
            <div class="products-container">
                <figure class="products-item" id="products-bouquets">
                    <img src="images/Bouquets/handbouquet3.jpg" alt="hand bouquets">
                    <figcaption><a href="product1.php">Handmade Bouquets</a></figcaption>
                </figure>
                <figure class="products-item" id="products-cny">
                    <img src="images/CNY/cny3.jpg" alt="chinese new year themed bouquets">
                    <figcaption><a href="product2.php">Chinese New Year Decorations</a></figcaption>
                </figure>
                <figure class="products-item" id="products-grand-openings">
                    <img src="images/GrandOpening/pd3pic3.png" alt="grand opening bouquets">
                    <figcaption><a href="product3.php">Grand Openings</a></figcaption>
                </figure>
                <figure class="products-item" id="products-graduations">
                    <img src="images/Graduation/Pd4pic4.png" alt="graduation themed bouquets">
                    <figcaption><a href="product4.php">Graduation Ceremonies</a></figcaption>
                </figure>
            </div>
        </section>
        <section class="showcase">
            <h2>Check out our workshops:</h2>
            <figure class="workshops-promo-container">
                <img src="images/Workshops/workshop1.jpg" alt="workshop sample">
                <figcaption>
                    Our <strong>Florist To Be 1</strong> workshop is the perfect program for aspiring florists to get started on their floristry journey.<br>
                    This workhop includes lessons on how to make flower stands, baskets, boutineers and bouquets of various different styles and aesthetics.<br>
                    <a href="workshops.php">Click here for info on this workshop and more!</a>
                </figcaption>
            </figure>
        </section>
        <section class="showcase">
            <h2>Cash in on givaways and discount offers:</h2>
            <figure class="workshops-promo-container">
                <img src="images/Promo/promotions2.png" alt="promo sample">
                <figcaption>
                    Get into the festive spirit with our <strong>Christmas Floral Workshop</strong>!<br>
                    Three lucky winners will enjoy a hands-on floral experience on <strong>23 Dec 2023 (3PM–5PM)</strong>.<br>
                    <a href="promo.php">Click here for more giveaways and offers!</a>
                </figcaption>
            </figure>
        </section>
    </main>

    <?php include('footer.inc'); ?>
</body>
</html>