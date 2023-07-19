<?php
?>

<html lang="en">
<head>
    <script>
        function showCD(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML="";
                return;
            }
            var xmlhttp =XMLHttpRequest();

            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {

                    document.getElementById("txtHint").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","getcd.php?q="+str,true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showResult(str) {
            if (str.length == 0) {
                document.getElementById("livesearch").innerHTML="";

                document.getElementById("livesearch").style.border="0px";
                return;
            }
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {

                    document.getElementById("livesearch").innerHTML=this.responseText;

                    document.getElementById("livesearch").style.border="0px";
                }
            }

            xmlhttp.open("GET","livesearch.php?q="+str,true);
            xmlhttp.send();
        }
    </script>
    <script>
        function getVote(int) {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {

                    document.getElementById("poll").innerHTML=this.responseText;
                }
            }

            xmlhttp.open("GET","poll_vote.php?vote="+int,true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
    <form>Select a CD:
        <select name="cds" onchange="showCD(this.value)">
            <option value="">Select a CD:</option>
            <option value="Bob Dylan">Bob Dylan</option>
            <option value="Bee Gees">Bee Gees</option>
            <option value="Cat Stevens">Cat Stevens</option>
        </select>
    </form>
    <div id="txtHint"><b>CD info will be listed here...</b></div><br>

    <form>
        <input type="text" size="30" onkeyup="showResult(this.value)">
        <div id="livesearch"></div>
    </form><br>

    <div id="poll"></div>
    <h3>Do you like PHP and AJAX so far?</h3>
    <form>
        Yes: <input type="radio" name="vote" value="0" onclick="getVote(this.value)"><br>
        No: <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
    </form>
</body>
</html>
