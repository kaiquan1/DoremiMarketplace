<style>
div .product_list::-webkit-scrollbar {
    height: 4px;
}

div .product_list::-webkit-scrollbar-track {
    border-radius: 10px;
    background: #f1f1f1;
}

div .product_list::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background-color: #666666;
}

div .product_list::-webkit-scrollbar-thumb:hover {
    background-color: black;
}

div .product_list .btn:hover {
    background-color: white;
}

div .product_list .prev {
    background-color: white;
    color: black;
    font-size: 30px;
    position: -webkit-sticky;
    position: sticky;
    bottom: 50%;
    left: 0.3%;
    padding: 0px 10px;
    border-radius: 60%;
}

div .product_list .next {
    background-color: white;
    color: black;
    font-size: 30px;
    position: -webkit-sticky;
    position: sticky;
    left: 97.8%;
    bottom: 50%;
    padding: 0px 10px;
    border-radius: 60%;
}

div .product_list img:hover {
    opacity: 0.7;
}
</style>
<div style="text-align: center">
    <h1>Welcome to Doremi,</h1>
    <h1 style="text-align: center; margin: 0 0 5rem 0; font-size: 30px">Your favourite online keyboard marketplace.</h1>
</div>
<div class="container">
    <div class="slider">
        <div class="slides">
            <!--radio buttons start-->
            <input type="radio" name="radio-btn" id="radio1" checked>
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            <!--radio buttons end-->
            <!--slide images start-->
            <div class="slide first">
                <a href="#lf001">
                    <img src="photo/Lofree.webp" alt="Lofree 1% Dual Mode Transparent">
                </a>
            </div>
            <div class="slide">
                <a href="#jd001">
                    <img src="photo/JAMESDONKEY.jpg" alt="JAMESDONKEY A3">
                </a>
            </div>
            <div class="slide">
                <a href="#al001">
                    <img src="photo/aula.jpg" alt="AULA F87">
">
                </a>
            </div>
            <div class="slide">
                <a href="#fk001">
                    <img src="photo/FEKER.jpg" alt="FEKER K75">
                </a>
            </div>
            <!--slide images end-->
            <!--automatic navigation start-->
            <div class="slideshow-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
            </div>
            <!--automatic navigation end-->
        </div>
        <!--manual navigation start-->
        <div class="slideshow-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>
        <!--manual navigation end-->
    </div>
    <!--image slider end-->
</div>