<!DOCTYPE html>
<html>
  <head>
    <title>
      your contract </title>
    
      <link rel="stylesheet" href="{{asset('css/contract.css')}}">
    <link rel="stylesheet" href="css/contract.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Nunito+Sans:wght@300;400&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap"
      rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Nunito+Sans:wght@300;400&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap"
      rel="stylesheet">
    <link rel="stylesheet" href="css/normalise.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  </head>

  <body>
    <div class="container">
      <embed src="{{asset('contract/contract.pdf')}}" data-aos="zoom-in" data-aos-delay="150">
    </div>

    <!-- <div class="row justify-content-center">
      <iframe src="{{ asset('contract/contract.pdf') }}" width="50%" height="600">
              This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('contract/contract.pdf') }}">Download PDF</a>
      </iframe>
    </div> -->
  
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 800,
      });
    </script>
  </body>

</html>