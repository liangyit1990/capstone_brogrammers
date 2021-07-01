// to reveal menu
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
    nav= document.getElementById(navId)

    // Variable validation
    if (toggle && nav){
        // add show-menu class to the div tagged with nav_menu class
        toggle.addEventListener('click', ()=>{
            nav.classList.toggle('show-menu')
        })
    }
}
showMenu('nav-toggle', 'nav-menu')

// when one of the nav_link is clicked, remove the show-menu

const navLink= document.querySelectorAll('.nav_link')

function linkAction(){
    const navMenu= document.getElementById('nav-menu')
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n=>n.addEventListener('click', linkAction))

// scroll to active section

const sections = document.querySelectorAll('section[id]')


function scrollActive(){
    const scrollY= window.pageYOffset

    sections.forEach(current=>{
        const sectionHeight = current.offsetHeight
        const sectionTop = current.offsetTop - 50;
        sectionId = current.getAttribute('id')

        if(scrollY>sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector('.nav_menu a[href*=' + sectionId + ']').classList.add('active-link')
        }else{
            document.querySelector('.nav_menu a[href*=' + sectionId + ']').classList.remove('active-link')
        }
    })
}
window.addEventListener('scroll', scrollActive)

// change background header
function scrollHeader(){
    const nav = document.getElementById('header')
    //when scroll is above than 200 viewport height, add scroll-header class to header tag
    if(this.scrollY >= 200) nav.classList.add('scroll-header');
    else nav.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)

//show scrollTop

function scrollTop(){
    const scrollTop = document.getElementById('scroll-top')
    //when scroll is above than 550 viewport height, add scroll-header class to header tag
    if(this.scrollY >= 300) scrollTop.classList.add('scroll-top');
    else scrollTop.classList.remove('scroll-top')
}
window.addEventListener('scroll', scrollTop)