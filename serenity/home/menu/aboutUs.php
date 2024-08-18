<head>

    <link href="https://fonts.cdnfonts.com/css/perpetua-titling-mt" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="serenity/static/css/menu/aboutUs.css">
</head>


<section class="about">
    <div class="us">
        <div class="TEXT">
            <h1>Our Story</h1>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed dolorum repellendus
                quibusdam corrupti mollitia vitae nobis illo suscipit libero, commodi debitis error voluptate
                neque unde
                quo sequi excepturi! Nisi, veritatis. Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Quis, sunt, voluptates dicta labore modi eum fugit quaerat voluptatum vero minima ut, aliquid
                nam
                facilis mollitia accusantium architecto. Nihil, possimus similique.</p>
        </div>
        <div class="grpImg">
        </div>
    </div>
    <div class="abtImg">
        <div class="hairstyle">
        </div>
        <div class="makeup">
        </div>
    </div>


</section>
<section class="values">
    <h3>OUR VALUES</h3>
    <div class="path">
        <div class="circular">
            <h1 class="text">circular text with animation</h1>
        </div>
        <div class="circular">
            <h1 class="text">circular text with animation</h1>
        </div>
        <div class="circular">
            <h1 class="text">circular text with animation</h1>
        </div>
        <div class="circular">
            <h1 class="text">circular text with animation</h1>
        </div>
    </div>

</section>

<section class="interior">
    <h3>Interior</h3>
    <div>
        <div class="rep"></div>
        <div class="nailstud"></div>
        <div class="hairCut"></div>
    </div>

</section>
<section class="meet">
    <h3>Meet The Team</h3>
    <div>
        <div class="team mem1" id="barb">
            <p>Name:sarah <br>
                Position: </p>
        </div>
        <div class="team mem2" id="mua">
            <p>Name:sarah <br>
                Position: </p>
        </div>
        <div class="team mem1" id="lash">
            <p>Name:sarah <br>
                Position: </p>
        </div>
        <div class="team mem2" id="nail">
            <p>Name:sarah <br>
                Position: </p>
        </div>
    </div>
</section>
<script>
    const texts = document.querySelectorAll('.text');
    texts.forEach(text => {
        text.innerHTML = text.textContent.replace(/\S/g, "<span>$&</span>");
        const elements = text.querySelectorAll('span');
        for (let i = 0; i < elements.length; i++) {
            elements[i].style.transform = "rotate(" + i * (360 / elements.length) + "deg)";
        }
    });
</script>