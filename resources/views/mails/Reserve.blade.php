<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?php

	$name 		= Session::get('email_nama_menu');
	$email 		= Session::get('email_bank');
	$no_guest 	= Session::get('email_harga');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        .container {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .invoice-head {
            width: 100%;
            border-collapse: collapse;
            margin-left: 20px;
            font-size: 18px;
        }

        .invoice-head td {
            padding: 8px 0;
            border-bottom: 1px solid #ccc;
        }

        .invoice-head td:first-child {
            width: 40%;
            font-weight: bold;
            text-align: right;
        }

        .invoice-head td:last-child {
            text-align: left;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Confirm Menu</h2>

        <table class="invoice-head">
            <tbody>
                <tr>
                    <td><strong>Nama Menu</strong></td>
                    <td>: {{ $name }}</td>
                </tr>

                <tr>
                    <td><strong>From Bank</strong></td>
                    <td>: {{ $email }}</td>
                </tr>

                <tr>
                    <td><strong>Harga</strong></td>
                    <td>: {{ $no_guest }}</td>
                </tr>
            </tbody>
        </table>

        <div style="text-align: center; margin-top: 20px;">
            <a href="#" class="button">Success</a>
        </div>
    </div>
</body>
</html>
