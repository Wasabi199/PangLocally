<?php
session_start();
include '../includes/dbconfig.php';
echo($_SESSION['uid']);

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
?>
<!--CSS - Make Two DIVs Left and Right Aligned inside Main DIV.-->
<html>
    <head>
        <title>PangLocally Dashboard</title>
        <!--Example CSS-->

        <style>
            /* *{
                box-sizing: border-box;
            } */
            .outerDiv {
                background-color: white;
                color: #fff;
                height: 100%;
                width: 100%;
                margin: 0px auto;
                padding: 5px;
            }
            .leftDiv {
                background-color: #808283;
                color: #000;
                height: 100%;
                width: 20%;
                float: left;
                border-radius: 2%;
            }
            .rightDiv {
                background-color: #efefef;
                color: #000;
                height: 100%;
                width: 80%;
                float: right;
                border-radius: 1%;
                
            }
            .button1,.button2, .button3, .button4, .button5{
                display: block;
                width: 115px;
                height: 25px;
                background: #02649B;
                padding: 10px;
                text-align: center;
                border-radius: 5px;
                color: white;
                font-weight: bold;
                line-height: 25px;
                margin: 5% auto;
                text-decoration: none;
            }
            .button1:hover,.button2:hover, .button3:hover, .button4:hover, .button5:hover{
                background: #D1AC08;
            }
            .button1{
                background: #D1AC08;
            }
            .right-container1{
                text-align: left;
                margin-left: 5%;
            }
            .right-container2{
                text-align: left;
                margin-left: 5%;
                width: 100%;
                
            }
            .right-container3{
                text-align: left;
                margin-left: 5%;
                
            }
            .left-card-container1,.left-card-container2  {
                box-shadow: 4px 4px 8px 4px rgba(0,0,0,0.2);
                width:20%;
                height: 35%;
                border-radius: 10%;
                padding: 2%;
                text-align: center;
                float: left;
            }
            .left-card-container2{
                margin-left: 1%;
            }
            img{
                border-radius: 5%;
            }
            .right-card-container2{
                box-shadow: 4px 4px 8px 4px rgba(0,0,0,0.2);
                width:40%;
                height: 35%;
                border-radius: 10%;
                padding: 2%;
                text-align: center;
                float: left;
                margin-left: 1%;
            }
            .right-card-container{
                box-shadow: 4px 4px 8px 4px rgba(0,0,0,0.2);
                width:40%;
                height: 35%;
                border-radius: 10%;
                padding: 2%;
                text-align: center;
                float: left;
                margin: 2% ;
            }
            .right-container3{
            width: 100%;
        }
        .right-card-container-statistic{
            box-shadow: 4px 4px 8px 4px rgba(0,0,0,0.2);
                width:85%;
                height: 15%;
                border-radius: 10%;
                padding: 2%;
                text-align: center;
                float: left;
                margin: 2% ;
        }
        
        </style>
    </head>
    <body style="text-align: center;">
        <!-- <h1>CSS - Make Two DIVs Left and Right Aligned inside Main DIV.</h1> -->
        <div class="outerDiv">
            <div class="leftDiv">
                <a href="#" class="button1">DASHBOARD</a>
                <a href="#" class="button2">ACCOUNTS</a>
                <a href="#" class="button3">APPLICATION</a>
                <a href="#" class="button4">BUSSINESS</a>
                <a href="#" class="button5">LOCATION</a>
            </div>
            <div class="rightDiv">
                <div class="right-container1">
                    <div class="name">
                        <h5>Hello and Welcome!</h5>
                        <h3>Juan Delacruz</h3>
                    </div>
                </div >
                <div class="right-container2">
                    <h3>Trending Location</h3>
                    <div class="left-card-container1">
                        <img src="../placeholder/hundred.jpg" alt="placeholder" style="width: 100%;">
                        
                    </div>
                    <div class="left-card-container2">
                        <img src="../placeholder/hundred.jpg" alt="placeholder" style="width: 100%;">
                        
                    </div>
                    <div class="right-card-container2">

                    <div class="right-card-container">
                        <img src="../placeholder/hundred.jpg" alt="placeholder" style="width: 100%;">
                        
                    </div>
                    <div class="right-card-container">
                        <img src="../placeholder/hundred.jpg" alt="placeholder" style="width: 100%;">
                        
                    </div>
                    <div class="right-card-container">
                        <img src="../placeholder/hundred.jpg" alt="placeholder" style="width: 100%;">
                        
                    </div>
                    <div class="right-card-container">
                        <img src="../placeholder/hundred.jpg" alt="placeholder" style="width: 100%;">
                        
                    </div>    
                    </div>
                </div>

                <div class="right-container3">
                    <h3>Statistics</h3>
                    <div class="right-card-container-statistic">
                        <img src="../placeholder/hundred.jpg" alt="placeholder" style="width: 10%;">
                        
                    </div> 
                </div>
            </div>
          
        </div>
    </body>
</html>