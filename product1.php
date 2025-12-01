<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Wei Hang Lee, Azmain Taraqqi">
    <meta name="keywords" content="HTML5, Root Flower, Products, Bouquets">
    <meta name="description" content="Product page for Root Flower">
    <link href="styles/style.css" rel="stylesheet">
    <title>Hand Bouquets - Root Flower</title>
</head>
<body>
    <?php include('header.inc'); ?>

    <main class="product-content">
        <h1>Hand Bouquets</h1>
        <section>
            <h2>For everyday displays of love.</h2>
            <p>
                Hand bouquets are timeless gifts that convey emotions and appreciation. 
                At <strong>Root Flower</strong>, our florists carefully curate each bouquet 
                using the freshest seasonal blooms. Perfect for birthdays, anniversaries, 
                or spontaneous gestures of love.
            </p>

            <div class="product-gallery" id="product-gallery">
                <figure>
                    <img src="images/Bouquets/handbouquet1.jpg" alt="Classic Red Rose Bouquet">
                    <figcaption>Classic Red Roses Bouquet — a romantic timeless choice.</figcaption>
                </figure>
                <figure>
                    <img src="images/Bouquets/handbouquet2.jpg" alt="Snow White Bouquet">
                    <figcaption>Snow White Bouquet — soft tones of elegance and charm.</figcaption>
                </figure>
                <figure>
                    <img src="images/Bouquets/handbouquet3.jpg" alt="Sunflower Mix Bouquet">
                    <figcaption>Sunflower Mix Bouquet — bright, cheerful, and full of life.</figcaption>
                </figure>
                <figure>
                    <img src="images/Bouquets/handbouquet4.jpg" alt="Gerbera Mix">
                    <figcaption>Gerbera Mix — a variety of vibrant and bright colors of red, pink, orange, yellow and white.</figcaption>
                </figure>
            </div>
        </section>

        <div class="product-main">
            <aside class="product-aside">
                <h2>Flower Care Tips</h3>
                <p>
                    Trim stems diagonally before placing in water. Change water every 2 days to keep flowers fresh. Avoid direct sunlight or heat exposure.
                </p>
                <p>
                    💐 Join our <a href="workshop_form.php">bouquet-making workshop</a> to learn how to 
                    craft your own floral masterpiece!
                </p>
            </aside>
            <div class="product-align">
                <!-- <section class="product-section">
                    <h2>Popular Hand Bouquet Styles</h2>
                    <div class="product-section-content">
                        <ol>
                            <li>Classic Red Roses Bouquet</li>
                            <li>Snow White Bouquet</li>
                            <li>Sunflower Mix</li>
                            <li>Gerbera Mix</li>
                        </ol>
                    </div>
                </section> -->
                <section class="product-section">
                    <h2>Bouquet Types</h2>
                    <div class="product-section-content">
                        <dl>
                            <dt><strong>Classic Red Rose</strong></dt>
                            <dd>Symbolizes deep love and passion; perfect for romantic occasions.</dd>

                            <dt><strong>Snow White Bouquet</strong></dt>
                            <dd>Soft-toned yellow roses, carnations, blue flaxes and daisies wrapped elegantly in matte paper.</dd>

                            <dt><strong>Sunflower Mix</strong></dt>
                            <dd>Brings warmth and happiness, perfect for celebrations.</dd>

                            <dt><strong>Gerbera Mix</strong></dt>
                            <dd>Earthy and natural style suitable for casual gifting.</dd>
                        </dl>
                    </div>
                </section>
                <section class="product-section">
                    <h2>How to order:</h2>
                    <div class="product-section-content">
                        <ol>
                            <li>Browse through our collections of flower stand designs</li>
                            <li>Select the preferred size, arrangement and color</li>
                            <li>Enter in recipient's details and message card content</li>
                            <li>Complete the payment and select the delivery date</li>
                            <li>A confirmation message will be issued</li>
                        </ol>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <?php include('footer.inc'); ?>
</body>
</html>