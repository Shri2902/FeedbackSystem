<?php

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Feedback</title>
</head>
<body>
<?php require 'nav1.php' ?>

<section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Help Us Improve</h2>
          <p>Let us know how we can improve our services.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <div class="image">
              <img src="{{url_for('static',filename='img/about.svg')}}" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3 ">
              <h3>How to respond to feedback</h3>
              <ul>
                <li><i class="bx bx-check-double"></i> Fill out all required fields.</li>
                <li><i class="bx bx-check-double"></i> Write about what you feel for the particular.</li>
                <li><i class="bx bx-check-double"></i> Suggestions if any.</li>
              </ul>
              <p>
                As good and effective educators, we always want to improve. Improvement is something we instill in our students and 
                it would be hypocritical to not expect the same from ourselves. Students are the center of our classroom and they are 
                where we can find the most relevant information about how to be better at our jobs. 
                If we are not delivering effectively to the students how can we ever expect better satisfaction hopefully.
              </p>

              <a href="#services"><input class="btn btn-success" type="button" value="Send us feedback"></a>

            </div>
          </div>
        </div>

      </div>
    </section>
</body>