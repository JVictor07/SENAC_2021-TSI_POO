<!DOCTYPE html>
<html>
	<head>
		<title>Calculator</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<link href="./styles.css" rel="stylesheet">
	</head>
	<body>
		<div>
      <form method="post" action="calcular.php">
        <input name="number1" placeholder="Number 1" type="text" class="form-control"/>
        <select name="operation" class="form-control" aria-label="Default select example">
          <option value="plus">Plus</option>
          <option value="minus">Minus</option>
          <option value="times">Times</option>
          <option value="divided by">Divided By</option>
        </select>
        <input name="number2" placeholder="Number 2" type="text" class="form-control"/>
        <input name="submit" type="submit" value="Calculate" class="btn btn-primary" />
      </form>
      <span class="result">
        <?php 
          if(isset($_GET["total"])){
            if (is_numeric($_GET["total"])) {
              echo "Result: ".$_GET["total"]."<br><br>";
            } else {
              echo 'Numeric values are required';
            }
          }
        ?>
      </span>
		</div>
	</body>
</html>