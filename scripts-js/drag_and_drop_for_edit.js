const plusButton = document.querySelectorAll('.plus-icon');
const cont = document.getElementById('elements');
const elements = document.querySelectorAll('.dragging_elements');
const xmarks = document.querySelectorAll('.clear');
const submit = document.querySelector('.formr');
const elementsHTML = elements[0].innerHTML;
let a = 3;
let aa = 3;
let aaa = 3;
let pol;

const infoBut = document.querySelectorAll('.fa-info');
const fontBut = document.querySelectorAll('.fa-font');

const resultsObj = [
  {
    link: null,
    caption: null,
    type: null,
  },
  {
    link: null,
    caption: null,
    type: null,
  },
  {
    link: null,
    caption: null,
    type: null,
  },
];

function onDragStart(event) {
  event.dataTransfer.setData('text/plain', event.target.id);
}

function onDragOver(event) {
  event.preventDefault();
}

function onDrop(event) {
  const ids = event.dataTransfer.getData('text');
  const draggableElement = document.getElementById(ids);
  if (event.target.innerHTML) {
    const dropzone = event.target;
    let id = dropzone.getAttribute('id');
    id = id.replace('el', '');
    pol = id;
    if (dropzone.getAttribute('class') == 'drag_here') {
      dropzone.appendChild(draggableElement);
      draggableElement.setAttribute('id', 'photo_ready');
      draggableElement.setAttribute('rel', id);
      draggableElement.setAttribute('href', ids);
      draggableElement.setAttribute('draggable', false);
      draggableElement.setAttribute('ondragstart', '');
      dropzone.innerHTML += `<i class="fa-solid fa-xmark clear" id="${id}"></i>`;
      elements[0].innerHTML = elementsHTML;
      const infoBut2 = document.querySelectorAll('.fa-info');
      infoBut2.forEach(btn => {
        if (
          btn.parentNode.parentNode.parentNode.getAttribute('class') !=
          'dragging_elements'
        ) {
          btn.addEventListener('click', addInfo);
        }
      });

      const fontBut2 = document.querySelectorAll('.fa-font');
      fontBut2.forEach(btn => {
        if (
          btn.parentNode.parentNode.parentNode.getAttribute('class') !=
          'dragging_elements'
        ) {
          btn.addEventListener('click', addFont);
        }
      });

      const xmarks2 = document.querySelectorAll('.clear');
      xmarks2.forEach(btn => {
        btn.addEventListener('click', clear);
      });
    }
  }
  event.dataTransfer.clearData();
}

function createRow() {
  for (let i = 0; i < 3; i++) {
    cont.innerHTML += `<div id="el${a}" class="drag_here" ondrop="onDrop(event);"> </div>`;
    a++;
  }

  for (let l = 0; l < 3; l++) {
    resultsObj[aa] = {
      link: null,
      caption: null,
      type: null,
    };
    aa++;
  }

  for (let l = 0; l < 3; l++) {
    document.querySelector(
      '.conteiner'
    ).innerHTML += `<div class="hidden_info_div" id="${aaa}">
      <div class="conts">
        <span class="contsheading">Paste here information about photo</span>
        <i class="fa-solid fa-xmark close" id="1"></i>
        <label for="link" id="hideit">Paste here a URL</label>
        <input type="text" placeholder="ENTER URL" name="link" id="link">
        <label for="caption" id="hideit2">Paste here photo caption (optional)</label>
        <input type="text" placeholder="ENTER CAPTION (optional)" name="caption" id="caption">
        <button type="button" id="sub_info">SUBMIT</button>
      </div>
    </div>`;
    aaa++;
  }

  const xmarks = document.querySelectorAll('.clear');

  xmarks.forEach(btn => {
    btn.addEventListener('click', clear);
  });
}

function clear() {
  const el = document.querySelectorAll('.drag_here');
  const now = this.getAttribute('id');
  el[now].innerHTML = ` `;
  resultsObj[`${now}`] = {
    link: null,
    caption: null,
    type: null,
  };
  console.log(resultsObj);
}

function addInfo() {
  const div = document.querySelectorAll('.hidden_info_div');
  const id = this.parentNode.parentNode.getAttribute('rel');
  if (div[id].getAttribute('id') == id) {
    div[id].classList.add('open_info_div');
    const close = document.querySelectorAll('.close');
    const sub = document.querySelectorAll('#sub_info');
    sub[id].setAttribute('rel', this.parentNode.parentNode.getAttribute('rel'));
    sub[id].setAttribute(
      'href',
      this.parentNode.parentNode.getAttribute('href')
    );
    close[id].addEventListener('click', closeFun);
    sub[id].addEventListener('click', submitValue);
  }
}

function addFont() {
  const div = document.querySelectorAll('.hidden_info_div');
  const id = this.parentNode.parentNode.getAttribute('rel');
  if (div[id].getAttribute('id') == id) {
    div[id].classList.add('open_info_div');
    const close = document.querySelectorAll('.close');
    const sub = document.querySelectorAll('#sub_info');
    const input = document.querySelectorAll('#link');
    const caption = document.querySelectorAll('#caption');
    const label = document.querySelectorAll('#hideit');
    const labeltochange = document.querySelectorAll('#hideit2');
    const header = document.querySelectorAll('.contsheading');
    header[id].innerHTML = 'Paste here text';
    caption[id].placeholder = 'ENTER TEXT';
    input[id].classList.add('hide');
    label[id].classList.add('hide');
    labeltochange[id].innerHTML = 'Paste your text here';
    sub[id].setAttribute('rel', this.parentNode.parentNode.getAttribute('rel'));
    sub[id].setAttribute(
      'href',
      this.parentNode.parentNode.getAttribute('href')
    );
    close[id].addEventListener('click', closeFun);
    sub[id].addEventListener('click', submitValueFont);
  }
}

function closeFun() {
  const div = document.querySelectorAll('.hidden_info_div');
  const id = this.parentNode.parentNode.getAttribute('id');
  if (div[id].getAttribute('id') == id) {
    const input = document.querySelector('#link');
    const label = document.querySelector('#hideit');
    div[id].classList.remove('open_info_div');
    input.classList.remove('hide');
    label.classList.remove('hide');
  }
}

function submitValue() {
  const div = document.querySelectorAll('.hidden_info_div');
  const id = this.parentNode.parentNode.getAttribute('id');
  if (div[id].getAttribute('id') == id) {
    const input1 = document.querySelectorAll('#link');
    const input2 = document.querySelectorAll('#caption');
    const ids = this.getAttribute('rel');
    const href = this.getAttribute('href');
    resultsObj[`${ids}`] = {
      link: input1[id].value,
      caption: input2[id].value,
      type: href,
    };
    div[id].classList.remove('open_info_div');
  }
}

function submitValueFont() {
  const div = document.querySelectorAll('.hidden_info_div');
  const id = this.parentNode.parentNode.getAttribute('id');
  if (div[id].getAttribute('id') == id) {
    const input = document.querySelectorAll('#caption');
    const id = this.getAttribute('rel');
    const href = this.getAttribute('href');
    resultsObj[`${id}`] = {
      link: null,
      caption: input[id].value,
      type: href,
    };
    div[id].classList.remove('open_info_div');
  }
}

function subform(e) {
  e.preventDefault();
  const ready = JSON.stringify(resultsObj);
  const theme = Number(document.querySelector('.themeimg').getAttribute('id'));
  const themenum = theme + 1;
  const name = document.querySelector('#name').value;
  const header = document.querySelector('#h').value;
  const main = document.querySelector('#fc').value;
  const addon = document.querySelector('#sc').value;
  const font = document.querySelector('#font').value;
  window.location.href = `../../scripts-php/creategallery.php?elements=${ready}&theme=${themenum}&name=${name}&header=${header}&main=${main}&addon=${addon}&font=${font}`;
}

xmarks.forEach(btn => {
  btn.addEventListener('click', clear);
});

infoBut.forEach(btn => {
  if (
    btn.parentNode.parentNode.parentNode.getAttribute('class') !=
    'dragging_elements'
  ) {
    btn.addEventListener('click', addInfo);
  }
});

fontBut.forEach(btn => {
  if (
    btn.parentNode.parentNode.parentNode.getAttribute('class') !=
    'dragging_elements'
  ) {
    btn.addEventListener('click', addFont);
  }
});

submit.addEventListener('submit', subform);

plusButton[0].addEventListener('click', createRow);
