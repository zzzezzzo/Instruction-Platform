// const { document } = require("postcss")

/*===== EXPANDER MENU  =====*/
const showMenu = (toggleId, navbarId, bodyId) => {
    const toggle = document.getElementById(toggleId),
        navbar = document.getElementById(navbarId),
        bodypadding = document.getElementById(bodyId)

        navbar.classList.toggle('expander')
        if (toggle && navbar) {
            toggle.addEventListener('click', () => {
            navbar.classList.toggle('expander')

            bodypadding.classList.toggle('body-pd')
        })
    }
}
showMenu('nav-toggle', 'navbar', 'body-pd')

/*===== LINK ACTIVE  =====*/
const linkColor = document.querySelectorAll('.nav__link')
function colorLink() {
    linkColor.forEach(l => l.classList.remove('active'))
    this.classList.add('active')
}
linkColor.forEach(l => l.addEventListener('click', colorLink))


/*===== COLLAPSE MENU  =====*/
const linkCollapse = document.getElementsByClassName('collapse__link')
var i

for (i = 0; i < linkCollapse.length; i++) {
    linkCollapse[i].addEventListener('click', function () {
        const collapseMenu = this.nextElementSibling
        collapseMenu.classList.toggle('showCollapse')

        const rotate = collapseMenu.previousElementSibling
        rotate.classList.toggle('rotate')
    })
}
// alert 
const alert = document.getElementById('alert');
const break_line = document.getElementById('break-line');

break_line.style.width = '0%';
let width = 0;
setInterval(()=>{
    width+=2;
    break_line.style.width = width + '%';
    if(width === 100){
        clearInterval(interval);
    }
},70)
if (alert) {
    setTimeout(()=>{
        alert.style.display = 'none';
    },3500)
}


