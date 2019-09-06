<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>
    <script>
        var str_arr = [
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'N',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y',
            'Z',
        ];



        $(document).ready(function() {
            $("#str_source").keyup(function() {
                cipher();
            });
            $("#str_move_step").change(function() {
                cipher();
            })
        });

        function cipher() {
            var source_str = $("#str_source").val();
            // 陣列遞移

            var new_str_arr = new Array();
            var move_step = parseInt($("#str_move_step").val());
            for (var t = 0; t < 26; t++) {
                var new_value = str_arr[t];
                if ((t + move_step) >= 26) {
                    new_str_arr[t + move_step - 26] = new_value;
                } else {
                    new_str_arr[t + move_step] = new_value;
                }
            }
            // 產生加密文
            var source_str_lenth = source_str.length;
            var cipher_str = "";
            for (var t = 0; t < source_str_lenth; t++) {
                var temp_str = "";
                temp_str = source_str.substr(t, 1);
                temp_str = temp_str.toUpperCase();
                if (temp_str != " ") {
                    var ori_index = new_str_arr.indexOf(temp_str);
                    cipher_str += str_arr[ori_index];
                } else {
                    cipher_str += " ";
                }
            }

            $("#str_cipher").text(cipher_str);
        }
    </script>
</head>

<body>
    Caesar cipher
    <hr>
    <div>
        輸入明文
        <input type="number" name="str_move_step" id="str_move_step" min="0" max="25" value="0">
    </div>
    <div>
        輸入明文
        <input type="text" name="str_source" id="str_source" style="width:95%">
    </div>
    <hr>
    <label id="str_cipher" name="str_cipher"></label>
</body>

</html>