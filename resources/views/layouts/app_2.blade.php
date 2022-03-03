<!DOCTYPE html>

<html lang="en">

<head>

    <title>@yield('page-title') | {{ config('global.siteName') }}</title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ config('global.siteURL') }}{{ config('global.imgLogin') }}/favicon.png"/>

    <link rel="stylesheet" type="text/css" href="{{ config('global.siteURL') }}{{ config('global.vendorLogin') }}/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ config('global.siteURL') }}{{ config('global.fontAwesomeLogin') }}/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ config('global.siteURL') }}{{ config('global.iconicLogin') }}material-design-iconic-font.min.css">

    <link rel="stylesheet" type="text/css" href="{{ config('global.siteURL') }}{{ config('global.vendorLogin') }}/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="{{ config('global.siteURL') }}{{ config('global.vendorLogin') }}/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="{{ config('global.siteURL') }}{{ config('global.vendorLogin') }}/animsition/css/animsition.min.css">

    <link rel="stylesheet" type="text/css" href="{{ config('global.siteURL') }}{{ config('global.vendorLogin') }}/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="{{ config('global.siteURL') }}{{ config('global.vendorLogin') }}/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="{{ config('global.siteURL') }}{{ config('global.cssLogin') }}util.css">

    <link rel="stylesheet" type="text/css" href="{{ config('global.siteURL') }}{{ config('global.cssLogin') }}main.css">

</head>

<body>



    <div class="limiter">

        <div class="container-login100" style="background-image: url('{{ config("global.imgLogin") }}/bg-form.jpg');">

            @yield('content')

        </div>

    </div>

    



    <div id="dropDownSelect1"></div>

    

    <script src="{{ config('global.vendorLogin') }}/jquery/jquery-3.2.1.min.js"></script>

    <script src="{{ config('global.vendorLogin') }}/animsition/js/animsition.min.js"></script>

    <script src="{{ config('global.vendorLogin') }}/bootstrap/js/popper.js"></script>

    <script src="{{ config('global.vendorLogin') }}/bootstrap/js/bootstrap.min.js"></script>

    <script src="{{ config('global.vendorLogin') }}/select2/select2.min.js"></script>

    <script src="{{ config('global.vendorLogin') }}/daterangepicker/moment.min.js"></script>

    <script src="{{ config('global.vendorLogin') }}/daterangepicker/daterangepicker.js"></script>

    <script src="{{ config('global.vendorLogin') }}/countdowntime/countdowntime.js"></script>

    <script src="{{ config('global.jsLogin') }}/main.js"></script>


    <script>
        $(document).ready(function() {
          $('#class_id').change(function(){
              var class_id = this.value;
              $("#subject_id").html('');
              $.ajax({
                  url: "/e-learning/get-subject-by-class",
                  type: "POST",
                  data: {
                      class_id: class_id,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  success: function(result) {
                      subjects = '';
                      $.each(result, function(key,value) {
                        subjects += '<option value="'+value.id+'">'+value.title+'</option>';
                      });
                      $('#subject_id').html(subjects);
                      $('#subject_id').select2({
                        placeholder: "Please Select Subjects"
                      });
                  }
              });
          });            
        });
        $('#subject_id').select2({
          placeholder: "Please Select Subjects"
        });
    </script>
</body>

</html>