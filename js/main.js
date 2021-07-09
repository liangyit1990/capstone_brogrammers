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

//menu modal
// $(document).ready(function() {  
//     $('#noodlecart').modal('show');
//   });


// dark light theme 
const themeButton = document.getElementById('theme-button')
const darkTheme = 'dark-theme'
const iconTheme = 'bx-sun'

// Previously selected theme (if selected)
const selectedTheme = localStorage.getItem('selected-theme')
const selectedIcon = localStorage.getItem('selected-icon')

// We obtain the current theme that the interface has by validating the dark-theme class
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'bx-moon' : 'bx-sun'

// We validate if the user previously chose a theme
if (selectedTheme) {
  // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
  document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
  themeButton.classList[selectedIcon === 'bx-moon' ? 'add' : 'remove'](iconTheme)
}

// Activate / deactivate the theme manually with the button
themeButton.addEventListener('click', () => {
    // Add or remove the dark / icon theme
    document.body.classList.toggle(darkTheme)
    themeButton.classList.toggle(iconTheme)
    // We save the theme and the current icon that the user chose
    localStorage.setItem('selected-theme', getCurrentTheme())
    localStorage.setItem('selected-icon', getCurrentIcon())
})


//cart
let carts = document.querySelectorAll('.add-cart');

let products = [
    {
        name: "Ebi Fry Bento",
        tag: "ebifry",
        calories: 510,
        price: 6,
        inCart: 0,
    },
    {
        name: "Karaage Bento",
        tag: "karaage",
        calories: 530,
        price: 6,
        inCart: 0,
    }
];

for (let i = 0; i<carts.length; i++){
    carts[i].addEventListener('click', () => {
        cartNumbers(products[i]);
        totalCost(products[i])
    })
}

function onLoadCartNumbers(){
    let productNumbers = localStorage.getItem('cartNumbers');

    if(productNumbers){
        document.querySelector('.cart span').textContent = productNumbers;
    }
}

function cartNumbers(products){
    
    let productNumbers = localStorage.getItem('cartNumbers');

    productNumbers = parseInt(productNumbers);
    if( productNumbers ){
        localStorage.setItem('cartNumbers', productNumbers + 1);
        document.querySelector('.cart span').textContent = productNumbers + 1;
    } else{
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.cart span').textContent = 1;
    }
    setItems(products);

}
    function setItems(products){
        let cartItems = localStorage.getItem('productsInCart');
        cartItems = JSON.parse(cartItems);
        

        if(cartItems !=null){
            if (cartItems[products.tag] == undefined){
                cartItems ={
                    ...cartItems,
                    [products.tag]: products
                }
            }
            cartItems[products.tag].inCart += 1;
        } else{
            products.inCart = 1;

            cartItems = {
                [products.tag]:products
            }
        }

        
        
        localStorage.setItem("productsInCart", JSON.stringify (cartItems));
    }
    function totalCost(products){
        //console.log("price is", products.price);
        let cartCost = localStorage.getItem("totalCost");
        

        if(cartCost != null){
            cartCost = parseInt(cartCost);
            localStorage.setItem("totalCost", cartCost + products.price);
        }else{
            localStorage.setItem("totalCost", products.price);
        }

        
    }

onLoadCartNumbers();