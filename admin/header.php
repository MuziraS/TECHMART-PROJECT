<?php
include_once("../model/model.php");
include_once("../functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | <?php echo $title; ?></title>
    <link rel="icon" href="../icons/title_icon.svg">
    <style>
        div.form_row{
            margin-bottom: 10px;
        }
        td{
            padding-right: 50px;
        }
        div#form{
            border: 2px solid black;
            border-radius: 15px;
            padding: 20px;
            /* background-color: rgb(250, 250,250); */
            width: 300px;
        }
        div.form_row>*{
            font-size: 18px;
            width: 100%;
        }
        table{
            margin-top: 50px;
        }
        button{
            border: none;
            background-color: orange;
            border-radius: 5px;
        }
        input, textarea, select{
            border-radius: 5px;
        }
        legend{
            font-size: 30px;
            font-weight: bold;
            text-align: center;
        }
        .form-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    table#admin_products{
        border-spacing: 0px;
    }
    table#admin_products th {
  position: sticky;
  top: 0;
  background-color: rgb(150,150,150); /* Adjust the desired background color */
  margin-top:0px;
  height: 50px;
  color: white;
  padding: 20px;
}
    table#admin_products td {
  padding: 20px;
  
}
table#admin_products td {
  font-size: large;
}
table#admin_products th{
    font-size: larger;
}
table#admin_products tr:nth-child(even) {
  background-color: #f2f2f2; /* Background color for even rows */
}

table#admin_products tr:nth-child(odd) {
  background-color: #ffffff; /* Background color for odd rows */
}
table#admin_products div.options button{
width: 100px;
height: 25px;
margin-bottom: 10px;
}
    </style>
</head><body>