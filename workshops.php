<?php include('header.inc'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Dhirrenraj Vijayaraj, Azmain Taraqqi">
  <meta name="keywords" content="HTML5, Root Flower, Workshops">
  <meta name="description" content="Workshops for Root Flower">
  <link href="styles/style.css" rel="stylesheet" />
  <title>Workshops - Root Flower</title>
</head>

<body>
  

  <main class="content">
    <h1>Floral Workshops</h1>

      <section class="workshop-grid">

        <div class="workshop-row">
          <div class="workshop-box left">
            <img src="images/Workshops/workshop1.jpg" alt="Florist To Be 1" class="chat-img">
            <div class="chat-bubble">
              <h2>Florist To Be 1</h2>
              <p>Learn the essentials of floral design and create stunning bouquets for all occasions.</p>
              <ul>
                <li>Korean Bouquet</li>
                <li>Russian Bouquet</li>
                <li>Mix Flowers Bouquet</li>
                <li>Bridal Bouquet</li>
                <li>Boutineer</li>
                <li>Flowers Basket</li>
                <li>Centerpiece</li>
                <li>Flowers Stand</li>
              </ul>
            </div>
          </div>


          <div class="workshop-box right">
            <img src="images/Workshops/workshop2.jpg" alt="Florist To Be 2" class="chat-img">
            <div class="chat-bubble">
              <h2>Florist To Be 2 (Advanced)</h2>
              <p>Advance your skills with professional florist techniques and unique arrangement styles.</p>
              <ul>
                <li>Natural Design Bouquet</li>
                <li>Spiral Handtied Layers</li>
                <li>Korean Bouquet</li>
                <li>Russian Bouquet</li>
                <li>Bridal Bouquet</li>
                <li>Flowers Basket</li>
                <li>Flowers Box</li>
                <li>Mirror Flowers Stand</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="workshop-row">
          <div class="workshop-box left">
            <img src="images/Workshops/workshop3.jpg" alt="Handtied Bouquet" class="chat-img">
            <div class="chat-bubble">
              <h2>Handtied Bouquet</h2>
              <p>Focuses on mastering bouquet wrapping and layering to create elegant hand-tied designs.</p>
              <ul>
                <li>Spiral Handtied – Round Layers</li>
                <li>Single Stalk Bouquet</li>
                <li>Classic Layers Bouquet</li>
                <li>Korean Bouquet</li>
                <li>Russian Bouquet</li>
                <li>Mix Flowers Bouquet</li>
              </ul>
            </div>
          </div>

          <div class="workshop-box right">
            <img src="images/Workshops/workshop4.jpg" alt="Hobby Class" class="chat-img">
            <div class="chat-bubble">
              <h2>Hobby Class</h2>
              <p>Casual classes for those who love flowers and wish to explore creative floral art each month.</p>
              <ul>
                <li>Mix Flowers Bouquet</li>
                <li>Flowers Basket</li>
                <li>Centerpiece</li>
                <li>Flowers Box</li>
                <li>Monthly Themed Arrangements</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section class="course-table-section">
        <h2>Types of Flower Art in Each Workshop</h2>
        <table class="course-table">
          <thead>
            <tr>
              <th>Workshop Course</th>
              <th>Flower Arrangements & Crafts Offered</th>
            </tr>
          </thead>
          <tbody>
            <tr id="handtied-row">
              <td>Hand-Tied Bouquet</td>
              <td>
                Spiral Handtied - Round Layers<br />
                Single Stalk Bouquet<br />
                Spiral Handtied - Classic Layers<br />
                Korean Bouquet<br />
                Russian Bouquet<br />
                Mix Flowers Bouquet
              </td>
            </tr>
            <tr id="florist-row">
              <td>Florist-To-Be 1 & 2</td>
              <td>
                Korean Bouquet<br />
                Spiral Handtied - Round Layers<br />
                Russian Bouquet<br />
                Mix Flowers Bouquet<br />
                Spiral Handtied - Classic Layers<br />
                Single Stalk Bouquet<br />
                Bridal Bouquet<br />
                Boutineer<br />
                Flowers Basket<br />
                Centerpiece<br />
                Flowers Stand<br />
                Flowers Box<br />
                Mirror Flowers Stand
              </td>
            </tr>
            <tr id="hobby-row">
              <td>Hobby Class</td>
              <td>
                Mix Flowers Bouquet<br>
                Seasonal Arrangement (varies monthly)
              </td>
            </tr>
          </tbody>
        </table>
      </section>

      <aside class="float-aside" id="gradient-buttons">
        <h2>Join & Save 🌸</h2>
        <p>Register now to secure your spot for our next workshop!</p>
        <a href="workshop_form.html" class="aside-btn">Workshop Registration</a>
        <p>Members enjoy exclusive offers and rewards!</p>
        <a href="promo.html" class="aside-btn">See Our Promotions</a>
      </aside>
      <br>
      <br>

  </main>

  <?php include('footer.inc'); ?>
</body>
</html>
