<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/index.css">

    <title>Infinite Computing | Test nav</title>
</header>

<body onchange="widthwatch()" onload="widthwatch()">
    <nav>
        <div class="nav-content">
            <div class="logo">
                <a href="#">Infinite Computing</a>
            </div>
            <div class="compnav" id="navb">
                <div class="homebtn">
                    <a onclick="displaynav()">&#8801;</a>
                </div>
                <div class="nav" id="nav">
                    <div class="items">
                        <div class="itemh"><a href="#">Home</a></div>
                        <div class="itemh"><a href="#">Arena</a></div>
                        <div class="itemh"><a href="#">Messages</a></div>
                        <div class="itemh"><a href="#">Cart</a></div>
                        <div class="itemh"><a href="#">Profile</a></div>
                    </div>
                </div>
            </div>
            <div class="nav-items" id="navc">
                <div class="item"><a href="#">Home</a></div>
                <div class="item"><a href="#">Arena</a></div>
                <div class="item"><a href="#">Messages</a></div>
                <div class="item"><a href="#">Cart</a></div>
                <div class="profile"><a href="#" onclick="displaydrop()"><img src="/Images/index.jpeg" alt="profile"></a>
                    <div class="drop" id="drop">
                        <a href="#">
                            <li>Profile&#926;&#8801;</li>
                        </a>
                        <a href="#">
                            <li>Preferences</li>
                        </a>
                        <a href="#">
                            <li>Feed back</li>
                        </a>
                        <a href="#">
                            <li>Logout</li>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="cont">
        <div class="item">

        </div>

    </div>

    <script>
        function widthwatch() {

            var width = window.innerWidth;


            if (width <= 720) {
                document.getElementById("navb").style.display = "block";
                document.getElementById("navc").style.display = "none";
            } else {
                document.getElementById("navb").style.display = "none";
                document.getElementById("navc").style.display = "contents";
            }

        }

        function displaydrop() {
            var btn = document.getElementById("drop").style.display;
            if (btn == "none") {
                document.getElementById("drop").style.display = "block";
            } else {
                document.getElementById("drop").style.display = "none";
            }
        }

        function displaynav() {
            var btn = document.getElementById("nav").style.display;
            if (btn == "none") {
                document.getElementById("nav").style.display = "flex";
            } else {
                document.getElementById("nav").style.display = "none";
            }
        }
    </script>
</body>


</html>
