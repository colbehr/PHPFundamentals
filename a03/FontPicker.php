<?php
if (!empty($_GET['message']))
    $message = $_GET['message'];
else
    $message = "Grumpy wizards make toxic brew for the evil Queen and Jack";
?>

<html>
<head>
    <title>Funky Font Message</title>
    <link href="/sandvig/mis314/assignments/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        //onload reset radiobutton list to selected item
        function selectRadioButton() {
            //retrive selected item from querystring
            var querystring = document.location.search.substring(1);
            var selectedFont = querystring.match(/font=.*&/i);
            selectedFont = selectedFont[0].replace("font=", "").replace("&", "");

            //check the appropriate radio button
            var radio = document.getElementsByName("font");
            for (i = 0; i < radio.length; i++) {
                if (radio[i].value == selectedFont) {
                    radio[i].checked = true;
                }
            }
        }
    </script>


</head>
<body onload="selectRadioButton()">
<div class="pageContainer centerText" style="width: 800px;">

    <form>
        <p>Please select a font and enter a message:</p>
        <div class="inputBlock">
            <input type="radio" name="font" required value="ChunkRed">Chunk Red
            <input type="radio" name="font" value="DecoBlue">Deco Blue
            <input type="radio" name="font" value="Animals">Animals
            <input type="radio" name="font" value="ElegantRed">Elegant Red
            <input type="radio" name="font" value="Funky">Funky
            <input type="radio" name="font" value="TapePunch">TapePunch
        </div>
        <br>
        <input type="text" name="message" required size="50"
               value="Grumpy wizards make toxic brew for the evil Queen and Jack">
        <input type="submit" Value="Send"><br>
    </form>


    <?php
    $font = $_GET['font'];
    //parse individual characters from $message and display character image
    for ($i = 0;
         $i < strlen($message);
         ++$i) {
        //grab the next character
        $char = substr($message, $i, 1);
        // display <br> tags for spaces
        if ($char != " ") {
            if (ctype_alnum($char)) {
                if ($font == "ChunkRed") {
                    echo "<img src='/sandvig/Images/Alphabet/chunk/red/{$char}9.jpg'>\n";
                } elseif ($font == "DecoBlue") {
                    echo "<img src='/sandvig/Images/Alphabet/deco/blue/{$char}1.gif'>\n";
                } elseif ($font == "Animals") {
                    echo "<img src='/sandvig/Images/Alphabet/animals/{$char}4.gif'>\n";
                } elseif ($font == "ElegantRed") {
                    echo "<img src='/sandvig/Images/Alphabet/elegant/red/4{$char}.gif'>\n";
                } elseif ($font == "Funky") {
                    echo "<img src='/sandvig/Images/Alphabet/funky/{$char}3.jpg'>\n";
                } elseif ($font == "TapePunch") {
                    echo "<img src='/sandvig/Images/Alphabet/punch/black/{$char}7.gif'>\n";
                }
            }
        } else {
            echo "<br />\n";
        }
    }
    ?>
</div>
<body>
</html>