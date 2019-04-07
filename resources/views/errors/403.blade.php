<!DOCTYPE html>
<html>
<head>
	<title>403 - Error</title>

	<link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
	<style type="text/css">
		body{
    font-family: 'Ropa Sans', sans-serif;
    margin-top: 120px;
    background-color: #F0CA00;
    background-color: #004d99;
    text-align: center;
    color: #fff;
}
.error-heading{
    margin: 50px auto;
    width: 250px;
    border: 5px solid #fff;
    font-size: 126px;
    line-height: 126px;
    border-radius: 30px;
    text-shadow: 6px 6px 5px #000;
}
.error-heading img{
    width: 100%;
}
.error-main h1{
    font-size: 72px;
    margin: 0px;
    color: #F3661C;
    text-shadow: 0px 0px 5px #fff;
}
.button {
    background-color: #ff6600;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

	</style>
</head>
<body>
	<div class="error-main">
		<h1>Oops!</h1>
		<div class="error-heading">403</div>
		<p>You do not have permission to access the page you requested.</p>

		<button onclick="backtopage()" class="button">Go back</button>
	</div>
	<script>
function backtopage() {

    window.history.back();
}
</script>
</body>
</html>