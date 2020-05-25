<form action="" method="post">
    name: <input type="text" name="username" />
    <br />
    Age: <input type="number" name="age" />
    <br />
    <input type="submit" name="submit" value="Save" />

</form>
<?php

//de mo $_SERVER;
//in ra duong dan goc file
echo $_SERVER['SCRIPT_NAME'];
echo "<pre>";
print_r($_SERVER);
echo "</pre>";