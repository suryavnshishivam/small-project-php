<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Image Slider</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<!-- Image slider start -->
<div class=" slider">
<div class="slides">
    <!--radio button start-->
    <input type="radio" name="radio-btn" id="radio1">
    <input type="radio" name="radio-btn" id="radio2">
    <input type="radio" name="radio-btn" id="radio3">
    <input type="radio" name="radio-btn" id="radio4">
    
    <!--radio button end-->
    <!--slide image start-->
    <div class="slider first">
        <img src="image/menu4" alt="">
 </div>
    <div class="slide">
        <img src="image/logo" alt="">
    </div>
    <div class="slide">
        <img src="image/menu" alt="">
    </div>
    <div class="slide">
        <img src="image/menu3" alt="">
    </div>
    <!--slide image end-->
    <!-- automatic navigation start-->
    <div class="navigation-auto">
        <div class="auto-btn1"></div>
        <div class="auto-btn2"></div>
        <div class="auto-btn3"></div>
        <div class="auto-btn4"></div>

    </div>
    <!-- automatic navigation end-->

</div>
<!-- manual navigation start-->
<div class="navigation-manual">
<label for="radio1" class="manual-btn"></label>
<label for="radio2" class="manual-btn"></label>
<label for="radio3" class="manual-btn"></label>
<label for="radio4" class="manual-btn"></label>
</div>
<!-- manual navigation end-->
</div>
<!-- Image slider end -->

<script type="text/javascript">
var counter = 1;
setInterval(function(){
    document.getElementById('radio'+ counter) .checked=true;
    counter++;
    if (counter>4){
        counter=1;
    }
},1000);
</script>

</body>
</html>