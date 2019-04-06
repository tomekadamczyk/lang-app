

const showMobileMenu = () => {
    let getMobileMenu = document.getElementById('getMobileMenu');
    let mobileMenu = document.getElementById('mobileMenu');
    const showMenu = (element, clicker) => {
        let click = 0;
        clicker.addEventListener('click', function() {
            element.style.display = 'block';
            clicker.classList.add('active');
            click++;
            
            if(click === 2) {
                element.style.display = 'none';
                clicker.classList.remove('active');
                click = 0;
            }
        });
    }
    return showMenu(mobileMenu, getMobileMenu);
}
    
showMobileMenu();