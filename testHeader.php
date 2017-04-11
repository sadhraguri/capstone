<?php include "include/config.php";
if(isset($_GET['testid'])) {
    $tid = mysqli_real_escape_string($conn, $_GET['testid']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/style_font.css"/>
    <link rel="stylesheet" href="css/inspec.css"/>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400&lang=en" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/inspec.js"></script>
    <style>

        body{

            background-attachment: scroll;
            background-repeat: no-repeat;
            margin: 0;
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
        }
        .header_top{
            position: relative;
            background-color: #ffffff;
            height: 10%;

            line-height: 10%;
            overflow: hidden;
            z-index: 1;
        }
        .header_lower{
            position: static;

            font-size: 17px;
            background-color: #5f5f5f;
            color: #f1f1f1;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            width: 100%;
            padding: 0;
            float: left;
            box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
            letter-spacing: 1px;
        }
        .header_lower a{

            float: left;
            z-index: 2;
            font-size: 17px;
            text-decoration: none;
            color: #f1f1f1;
            padding: 0.8%;
            position: static;

            letter-spacing: 1px;
        }
        .header_lower a:hover{

            padding: 0.8%;
            -moz-transition:
                background-color 800ms ease-in,
                color 500ms linear;
            -webkit-transition:
                background-color 800ms ease-in,
                color 500ms linear;
            -o-transition:
                background-color 800ms linear,
                color 500ms linear;
            transition:
                background-color 800ms linear,
                color 500ms linear;
            background-color:#000000;


        }

    </style>
    <script>
        var s=59;
        var ms=59;
        var m;
        var hex;
        var test_hex;
        function time_counter()
        {
            //alert(m);
            var f=0;
            if(m<5)
            {
                document.getElementById('timer').style.color="red";
            }
            if(s==0)
            {
                m--;
                s=59;
                //updatetimeInfo(m);
            }

            s--;
            document.getElementById('timer').innerHTML="<b>00:"+m.toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false})+":"+s.toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false})+"</b>";
            if(m!=0)
            {

                setTimeout('time_counter()',1000);
                f=1;
            }
            if(f==0)
            {
                if(s!=0)
                {
                    setTimeout('time_counter()',1000);
                }
            }
            if(m==0&&s==0)
            {
                window.onbeforeunload=close_me();
            }
        }

    </script>
</head>
<body>
<?php

?>

    <script>

        m=5;


    </script>


    <div class="header_top">
        <h1 style="margin-top:6px; margin-bottom: 1px;"><img style="margin-left:5%;" src="Pics/logo3.png">
            <span class="class_time" style="background-color: #888888; color: #ffffff; padding: 0.4%; border-radius: 5px; font-size: 0.6em; top: 30%; left: 10%; "><b>Test Name:</b><?=$_SESSION['tname']?></span>
            <span class="class_time" id="timer" style=" top:0; left: 47%; font-size: 1em; background-color: #f0f0f0; padding-top: 0.5%; padding-left: 0.2%; padding-right: 0.2%; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;  padding-bottom: 0.7%; position: absolute;"></span><p style=" float:right; overflow:hidden; font-size: 1vw;" ><button class="btn_S" style="padding: 1%; border-radius: 2px;" onclick="end_test()">End</button> &nbsp;&nbsp;Welcome,<?=$_SESSION['user_full_name']?>

            </p></h1>

    </div>
    <script>
        function updatetimeInfo(min)
        {



            var url="update_test_time.jsp?hex=<%=h%>&test_hex=<%=test_hex%>&duration="+min;

            if(window.XMLHttpRequest){
                request=new XMLHttpRequest();
            }
            else if(window.ActiveXObject){
                request=new ActiveXObject("Microsoft.XMLHTTP");
            }

            try{
                request.onreadystatechange=gettimeInfo;
                request.open("GET",url,true);
                request.send();
            }catch(e){alert("Unable to connect to server");}
        }


        function gettimeInfo(){
            if(request.readyState==4){
                var val=request.responseText;
//alert(val);
            }
        }</script>
</body>

</html>
