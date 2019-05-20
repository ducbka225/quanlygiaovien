<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tim Kiếm Giảng Viên</title>
  <base href="{{asset('')}}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf_token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="source/css/style.css">
  <link rel="stylesheet" type="text/css" href="source/css/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="source/js/jquery-1.11.1.min.js"></script>
  <style type="text/css">
  </style>

</head>
<body>
	@include('header')
	@yield('content')
</body>
</html>
