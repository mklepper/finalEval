<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Car Form</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    
    <body class="container">
    	<form method="POST" action="./script.php">
    		<label for="make">Brand</label>
    		<input class="form-control" name="make" type="text" />
    		<br/>
    		<label for="model">Model</label>
    		<input class="form-control" name="model" type="text" />
    		<br/>
            <label for="year">Year</label>
    		<input class="form-control" name="year" type="text" />
    		<br/>
    		<label for="color">Colour</label>
    		<select class="form-control" name="color">
    			<option value="blue">Blue</option>
    			<option value="red">Red</option>
    			<option value="green">Green</option>
    			<option value="yellow">Yellow</option>
                <option value="black">Black</option>
                <option value="white">White</option>
    		</select>
    		<br/>
    		<button class="btn btn-success" type="button">submit</button>
    	</form>
    	
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>