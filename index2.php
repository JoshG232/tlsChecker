<?php 

// $output = exec('python3 C:\xampp\htdocs\testing\testing.py')

// echo $output;
$url = "jcgeorgiou88@gmail.com";
echo $url;

$command = exec("python3 C:\\xampp\\htdocs\\testing\\testing.py $url", $output);
// $output = shell_exec($command);
print_r($output);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>