const div = document.querySelector('tab-content tab-content-carousel just-action-icons-sm')

document.querySelector('.comida').addEventListener('click',() => {
  div.classList.add('div_hide')
})

document.querySelector('.show').addEventListener('click',() => {
  div.classList.remove('div_hide')
})