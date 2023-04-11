<?php

// global variable for the mysql-connection, to get access trough the hole class
function getConnection()
{
    $env = include './env.php';
    $server = $env['host'];
    $user = $env['user'];
    $password = $env['pass'];
    $database = "calculater";

    // creating a new instance of the mysql connection
    $conn = new mysqli($server, $user, $password);

    if ($conn) {
        // echo "Verbindung hergestellt!"; echo disabled because screen would be get to messy
    } else {
        die("Connection failed: " . $conn->connect_error);
    }
    // Create $database if not exists
    $conn->query("CREATE DATABASE IF NOT EXISTS $database");

    // test statement if table 'calculations' exists
//     $result = $conn->query("SELECT * FROM 'calculations'");

    $conn->query("CREATE TABLE IF NOT EXISTS `calculater`.`calculations` (`Addition` INT(255) NOT NULL , `Subtraction` INT(255) NOT NULL ,
    `Multiply` INT(255) NOT NULL , `Divisions` INT(255) NOT NULL , `root` INT(255) NOT NULL , `x2` INT(255) NOT NULL , `x3` INT(255) NOT NULL ,
    `xN` INT(255) NOT NULL , `sin` INT(255) NOT NULL , `cos` INT(255) NOT NULL , `tan` INT(255) NOT NULL , `hexToDec` INT(255) NOT NULL, `decToHex` INT(255) NOT NULL);");


    $conn->query("CREATE TABLE IF NOT EXISTS `calculater`.`executed_calculations` (`Executed` VARCHAR(255) NOT NULL);");

    //     $conn->query("INSERT INTO `calculater`.`calculations`(`Addition`, `Subtraction`, `Multiply`, `Divisions`, `root`, `x2`, `x3`, `xN`, `sin`, `cos`, `tan`, `hexToDec`,`decToHex`) VALUES (0,0,0,0,0,0,0,0,0,0,0,0,0)");


    //     if ($result !== True) { // table does not exist
//                             // 
//                             // echo "<br>Tabelle existierte nicht. Tabelle wurde erstellt!";
//     }

    // return the instance of the mysql connection
    return $conn;
}

// function to add a point when a calculation of $type is made
function addCalculationPoint($type)
{

    // 0 = +, 1 = -, 2 = *, 3 = /, 4 = root, 5 = x2, 6 = x3, 7 = xN, 8 = sin, 9 = cos, 10 = tan

    if ($type == 0) {
        $newAmount = getAmountOfCalculations(0) + 1;
        $query = "UPDATE `calculater`.`calculations` SET Addition=$newAmount";
    } else if ($type == 1) {

        $newAmount = getAmountOfCalculations(1) + 1;
        $query = "UPDATE `calculater`.`calculations` SET Subtraction=$newAmount";
    } else if ($type == 2) {

        $newAmount = getAmountOfCalculations(2) + 1;
        $query = "UPDATE `calculater`.`calculations` SET Multiply=$newAmount";
    } else if ($type == 3) {

        $newAmount = getAmountOfCalculations(3) + 1;
        $query = "UPDATE `calculater`.`calculations` SET Divisions=$newAmount";
    } else if ($type == 4) {

        $newAmount = getAmountOfCalculations(4) + 1;
        $query = "UPDATE `calculater`.`calculations` SET root=$newAmount";
    } else if ($type == 5) {

        $newAmount = getAmountOfCalculations(5) + 1;
        $query = "UPDATE `calculater`.`calculations` SET x2=$newAmount";
    } else if ($type == 6) {

        $newAmount = getAmountOfCalculations(6) + 1;
        $query = "UPDATE `calculater`.`calculations` SET x3=$newAmount";
    } else if ($type == 7) {

        $newAmount = getAmountOfCalculations(7) + 1;
        $query = "UPDATE `calculater`.`calculations` SET xN=$newAmount";
    } else if ($type == 8) {

        $newAmount = getAmountOfCalculations(8) + 1;
        $query = "UPDATE `calculater`.`calculations` SET sin=$newAmount";
    } else if ($type == 9) {

        $newAmount = getAmountOfCalculations(9) + 1;
        $query = "UPDATE `calculater`.`calculations` SET cos=$newAmount";
    } else if ($type == 10) {

        $newAmount = getAmountOfCalculations(10) + 1;
        $query = "UPDATE `calculater`.`calculations` SET tan=$newAmount";
    } else if ($type == 11) {

        $newAmount = getAmountOfCalculations(11) + 1;
        $query = "UPDATE `calculater`.`calculations` SET hexToDec=$newAmount";
    } else if ($type == 12) {

        $newAmount = getAmountOfCalculations(12) + 1;
        $query = "UPDATE `calculater`.`calculations` SET decToHex=$newAmount";
    }

    getConnection()->query($query);
}

function getAmountOfCalculations($type)
{
    // 0 = +, 1 = -, 2 = *, 3 = /
    $resultInt = -1;

    if ($type == 0) {

        $query = "SELECT Addition FROM `calculater`.`calculations`";
        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if ($type == 1) {
        $query = "SELECT Subtraction FROM `calculater`.`calculations`";

        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if ($type == 2) {
        $query = "SELECT Multiply FROM `calculater`.`calculations`";

        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if ($type == 3) {
        $query = "SELECT Divisions FROM `calculater`.`calculations`";

        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if ($type == 4) {
        $query = "SELECT root FROM `calculater`.`calculations`";

        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if ($type == 5) {
        $query = "SELECT x2 FROM `calculater`.`calculations`";

        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if ($type == 6) {
        $query = "SELECT x3 FROM `calculater`.`calculations`";

        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if ($type == 7) {
        $query = "SELECT xN FROM `calculater`.`calculations`";

        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if ($type == 8) {
        $query = "SELECT sin FROM `calculater`.`calculations`";

        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if ($type == 9) {
        $query = "SELECT cos FROM `calculater`.`calculations`";

        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if ($type == 10) {
        $query = "SELECT tan FROM `calculater`.`calculations`";

        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if ($type == 11) {
        $query = "SELECT hexToDec FROM `calculater`.`calculations`";

        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if ($type == 12) {
        $query = "SELECT decToHex FROM `calculater`.`calculations`";

        try {
            if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
                while ($row = $result->fetch_row()) { // iterate over the fetched row
                    $resultStr = $row[0];
                    if ((empty($resultStr)) || (is_null($resultStr))) {
                        $resultInt = 0;
                    } else {
                        $resultInt = (int) $resultStr;
                    }
                }

                $result->close();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    return $resultInt;
}

function getExecutedCalculations()
{
    $executedCalculations = [];
    $index = 0;

    $query = "SELECT Executed FROM `calculater`.`executed_calculations`";

    if ($result = getConnection()->query($query)) { // $result is defined and at the same time used as a bool
        while ($row = $result->fetch_row()) { // iterate over the fetched row

            $executedCalculations[$index] = $row[0];
            $index += 1;

        }

        $result->close();

    }

    return $executedCalculations;

}

function addExecutedCalculations($calculation)
{
    try {
        $query = "INSERT INTO `calculater`.`executed_calculations`(`Executed`) VALUES ('$calculation')";
        getConnection()->query($query);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function correctNumber($number)
{
    //$len = strlen($number);
    $updatedNumber = "";
    for ($i = 0; $i < 10; $i++) {
        $updatedNumber .= $number[$i];
    }
    return $updatedNumber;
}

function printTotalCalculations()
{

    $additionsInt = (int) getAmountOfCalculations(0);
    $subtractionsInt = (int) getAmountOfCalculations(1);
    $multipliesInt = (int) getAmountOfCalculations(2);
    $divisionsInt = (int) getAmountOfCalculations(3);
    $rootInt = (int) getAmountOfCalculations(4);
    $squareInt = (int) getAmountOfCalculations(5);
    $x3Int = (int) getAmountOfCalculations(6);
    $xNInt = (int) getAmountOfCalculations(7);
    $sin = (int) getAmountOfCalculations(8);
    $cos = (int) getAmountOfCalculations(9);
    $tan = (int) getAmountOfCalculations(10);
    $hexToDec = (int) getAmountOfCalculations(11);
    $decToHex = (int) getAmountOfCalculations(12);


    $values = [
        "addition" => $additionsInt,
        "subtraction" => $subtractionsInt,
        "multiply" => $multipliesInt,
        "division" => $divisionsInt,
        "root" => $rootInt,
        "square" => $squareInt,
        "x3" => $x3Int,
        "xn" => $xNInt,
        "sin" => $sin,
        "cos" => $cos,
        "tan" => $tan,
        "hexToDec" => $hexToDec,
        "decToHex" => $decToHex
    ];

    //      arsort($toSortArray);

    echo "Additionen: " . $values["addition"] . "<br>";
    echo "Subtraktionen: " . $values["subtraction"] . "<br>";
    echo "Multiplikationen: " . $values["multiply"] . "<br>";
    echo "Divisionen: " . $values["division"] . "<br>";
    echo "root: " . $values["root"] . "<br>";
    echo "x2: " . $values["square"] . "<br>";
    echo "x3: " . $values["x3"] . "<br>";
    echo "xN: " . $values["xn"] . "<br>";
    echo "sin: " . $values["sin"] . "<br>";
    echo "cos: " . $values["cos"] . "<br>";
    echo "tan: " . $values["tan"] . "<br>";
    echo "hexToDec: " . $values["hexToDec"] . "<br>";
    echo "decToHex: " . $values["decToHex"] . "<br>";

}

/* End of functions */

if (isset($_POST["firstNumber"]) && isset($_POST["secondNumber"]) && isset($_POST["calculationType"])) {
    $firstNumber = $_POST["firstNumber"];
    $secondNumber = $_POST["secondNumber"];
    $calculationType = $_POST["calculationType"];

    if (strlen($firstNumber) > 10) {
        $firstNumber = correctNumber($firstNumber);
    }

    if (strlen($secondNumber) > 10) {
        $secondNumber = correctNumber($secondNumber);
    }

    settype($firstNumber, "int");
    settype($secondNumber, "int");

    $ergebnis = "(NOT SET)";

    include 'math.php';
    if ($calculationType == "addition") {
        if (empty($secondNumber)) {
            echo "<p>Der zweite Wert muss gegeben sein.</p>";
        } else {
            $ergebnis = addition($firstNumber, $secondNumber);
            addCalculationPoint(0);
            addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");
        }

    } else if ($calculationType == "subtraction") {
        if (empty($secondNumber)) {
            echo "<p>Der zweite Wert muss gegeben sein.</p>";
        } else {
            $ergebnis = subtract($firstNumber, $secondNumber);
            addCalculationPoint(1);
            addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");
        }

    } else if ($calculationType == "multiply") {
        if (empty($secondNumber)) {
            echo "<p>Der zweite Wert muss gegeben sein.</p>";
        } else {
            $ergebnis = multiply($firstNumber, $secondNumber);
            addCalculationPoint(2);
            addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");
        }

    } else if ($calculationType == "divisions") {
        if (empty($secondNumber)) {
            echo "<p>Der zweite Wert muss gegeben sein.</p>";
        } else {
            $ergebnis = divide($firstNumber, $secondNumber);
            addCalculationPoint(3);
            addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");
        }

    } else if ($calculationType == "root") {

        $ergebnis = root($firstNumber);
        addCalculationPoint(4);
        addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");

    } else if ($calculationType == "square") {

        $ergebnis = square($firstNumber);
        addCalculationPoint(5);
        addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");

    } else if ($calculationType == "powerOf3") {

        $ergebnis = powerOf3($firstNumber);
        addCalculationPoint(6);
        addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");

    } else if ($calculationType == "powerOfN") {

        if (empty($secondNumber)) {
            echo "<p>Der zweite Wert muss gegeben sein.</p>";
        } else {

            $ergebnis = powerOfN($firstNumber, $secondNumber);
            addCalculationPoint(7);
            addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");
        }

    } else if ($calculationType == "sin") {

        $ergebnis = sin($firstNumber);
        addCalculationPoint(8);
        addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");

    } else if ($calculationType == "cos") {

        $ergebnis = cos($firstNumber);
        addCalculationPoint(9);
        addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");

    } else if ($calculationType == "tan") {

        $ergebnis = tan($firstNumber);
        addCalculationPoint(10);
        addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");

    } else if ($calculationType == "hexToDec") {

        settype($firstNumber, "string");
        $ergebnis = hexdec($firstNumber);
        addCalculationPoint(11);
        addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");

    } else if ($calculationType == "decToHex") {

        $ergebnis = dechex($firstNumber);
        addCalculationPoint(12);
        addExecutedCalculations("$firstNumber $calculationType $secondNumber = $ergebnis");

    }

    if (!($ergebnis == "(NOT SET)") || ($ergebnis == 0)) {
        echo "Ergebnis: $ergebnis <br>";
    }


}

?>
<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Taschenrechner</title>
</head>

<body>
    <form id="form" class="" action="index.php" method="post">

        <!-- firstNumber must be type of text because of the hex functions -->
        <input type="text" name="firstNumber" placeholder="Erster Wert">
        <input type="number" name="secondNumber" placeholder="Zweiter Wert">

        <label for="calculationTypes">W&auml;hle eine Rechenart: </label>
        <select name="calculationType" id="calculationTypes" form="form">
            <option value="addition">Addition</option>
            <option value="subtraction">Subtrahieren</option>
            <option value="multiply">Multiplizieren</option>
            <option value="divisions">Dividieren</option>
            <option value="root">Wurzel</option>
            <option value="square">x2</option>
            <option value="powerOf3">x3</option>
            <option value="powerOfN">xN</option>
            <option value="sin">sin</option>
            <option value="cos">cos</option>
            <option value="tan">tan</option>
            <option value="hexToDec">hexToDec</option>
            <option value="decToHex">decToHex</option>
        </select>

        <input type="submit" name="" value="Berechnen">

    </form>

    <p><b>Hinweis:</b> Wenn du x2 oder x3 benutzt wird nur der erste Wert benutzt, der zweite Wert wird ignoriert.
        <br>Wenn du xN benutzt wird der zweite Wert als N gewertet.
    </p>

    <div>
        <h3>Durchgef&uuml;hrte Rechnungen (Anzahl)</h3>
        <p>
            <?php printTotalCalculations(); ?>
        </p>
    </div>

    <div>
        <h3>Durchgef&uuml;hrte Rechnungen</h3>
        <p>
            <?php

            foreach (getExecutedCalculations() as $calcuation) {
                echo "$calcuation<br>";
            }

            ?>
        </p>
    </div>

</body>

</html>