const texts = document.querySelectorAll('.text');
texts.forEach(text => {
    text.innerHTML = text.textContent.replace(/\S/g, "<span>$&</span>");
    const elements = text.querySelectorAll('span');
    for (let i = 0; i < elements.length; i++) {
        elements[i].style.transform = "rotate(" + i * (360 / elements.length) + "deg)";
    }
});