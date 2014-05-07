<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pruebas</title>
<link href="css/foundation.min.css" rel="stylesheet" type="text/css">
</head>
<body>

<div ng-app="">
	<input type="text" ng-model="data.message">
	<!--<h1>{{data.message}}</h1>-->
    <div class="{{data.message}}">
    Wrap me as a foundation
    </div>
</div>




<script src="js/angular.min.js"></script>
</body>
</html>