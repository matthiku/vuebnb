<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>Vuebnb</title>

  <link rel="stylesheet" href="{{ cdn('css/style.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ cdn('css/vue-style.css') }}" type="text/css">

  <script type="text/javascript">
    // provide the source URL for assets
    window.cdn_url = "{{ cdn('') }}"

    window.vuebnb_registration_route = "{{ route('register') }}"
    window.vuebnb_login_route = "{{ route('login') }}"
    window.vuebnb_auth_errors = JSON.parse("{!! addslashes($errors) !!}")

    // include the data for this view (resource)
    window.vuebnb_server_data = "{!! addslashes(json_encode($data)) !!}"

    // provide the Anti-CSRF token
    window.csrf_token = "{{ csrf_token() }}"
  </script>

</head>


<body>

  <div id="app"></div>

  <script src="{{ cdn('js/app.js') }}"></script>

</body>

</html>
