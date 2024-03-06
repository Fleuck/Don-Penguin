const toggleBtn = document.querySelector('.toggle')
const toggleIcon = document.querySelector('.toggle i')
const dropDownMenu = document.querySelector('.dropdown_menu')

toggleBtn.onclick = function (){
    dropDownMenu.classList.toggle('open')
    const isOpen = dropDownMenu.classList.contains('open')
    
    toggleIcon.classList = isOpen
        ? 'fa-solid fa-xmark'
        : 'fa-solid fa-bars'
}


