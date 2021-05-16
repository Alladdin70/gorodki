<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="main.js"></script>
    </head>
    <body>
        <div id="list"></div>
        <script language="javascript">
            window.onload = function(){
                setTimeout(()=>{
                    showTables();
                },500);
                getTables();
            }            
        </script>
    </body>
</html>
