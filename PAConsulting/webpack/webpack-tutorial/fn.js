const btn = document.querySelector('.btn');
const title = document.querySelector('.title');
import './style.css';
import fan from './fan.jpg';

let active = false;

const img = document.createElement('img');
img.src = fan;

title.appendChild(img);


function changeColor() {
    
    active = !active
    if (active) {
        btn.className = 'gold'
        title.style.color = 'red'
    } else {
        title.style.color = 'green'
    }
}

export default changeColor