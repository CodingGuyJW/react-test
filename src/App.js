// import logo from './logo.svg';
import './App.css';
import {HashRouter, Route, Switch, Link } from "react-router-dom";
import Index from './js/Index';
import About from './js/About';
import Work from './js/Work';
import Contact from './js/Contact';
import { useEffect,useState } from 'react';
// import Helmet from 'react-helmet';
const useTitle = (initialTitle) => {
  const [title, setTitle] = useState(initialTitle);
  const updateTitle = () => {
    const htmlTitle = document.querySelector("title");
    htmlTitle.innerText = title;
  };
  useEffect(updateTitle, [title])
  return setTitle;
};
// 출처: https://fenderist.tistory.com/418 [Devman]

function App() {
  // header background
  let [headerBg,setHeaderBg] = useState(0);
  function headerClass(name){
    setTimeout(function(){
      setHeaderBg(name);
    },100)
  }

  // document title change
  const titleUpdater = useTitle("Loading...");
  setTimeout(() => titleUpdater("JJW's Portfolio"), 1000);
  // 출처: https://fenderist.tistory.com/418 [Devman]

  // theme change
  const body=document.body;
  useEffect(()=>{
    body.className='dark';
  },[body])
 
  function changeTheme(){
    const cvs=document.querySelector('#space');
    const logo=document.querySelector('.logo');
    body.className = (body.className === "dark") ? "light" : "dark";

  // switch
    switch(body.className){
      case 'dark':
        cvs.style.visibility = 'visible';
        logo.src='./img/logo_light.png';
        break;
      default:
        cvs.style.visibility = 'hidden';
        logo.src='./img/logo_dark.png';
        break;
    }
/* 원래 쓰던 것 
    if(cvs.style.visibility === 'hidden') {
      body.className = (body.className === "dark") ? "light" : "dark";
      cvs.style.visibility = 'visible';
      logo.src='./img/logo_light.png';
    }else{
      body.className = (body.className === "dark") ? "light" : "dark";
      cvs.style.visibility = 'hidden';
      logo.src='./img/logo_dark.png';
    }
*/
  }

  // close navigation menu
  let burgerMenu = document.getElementsByClassName('menu')[0];
  let burgerNav = document.getElementsByClassName('navMenu')[0];
  function closeNav(){
    burgerNav.classList.remove('open');
    burgerMenu.classList.remove('open');
  }

  // menu mouse enter & leave event
  useEffect(()=>{
    const navLink = document.getElementsByClassName('navLink');

    navLink[0].addEventListener('mouseenter', function(){
      navLink[1].style.opacity="0.3";
      navLink[2].style.opacity="0.3";
      this.childNodes[0].style.textDecoration="line-through 3px #888";
    })
    navLink[0].addEventListener('mouseleave',function(){
      navLink[1].style.opacity="1";
      navLink[2].style.opacity="1";
      this.childNodes[0].style.textDecoration="none";
    })

    navLink[1].addEventListener('mouseenter', function(){
      navLink[0].style.opacity="0.3";
      navLink[2].style.opacity="0.3";
      this.childNodes[0].style.textDecoration="line-through 3px #888";;
    })
    navLink[1].addEventListener('mouseleave',function(){
      navLink[0].style.opacity="1";
      navLink[2].style.opacity="1";
      this.childNodes[0].style.textDecoration="none";
    })

    navLink[2].addEventListener('mouseenter', function(){
      navLink[1].style.opacity="0.3";
      navLink[0].style.opacity="0.3";
      this.childNodes[0].style.textDecoration="line-through 3px #888";;
    })
    navLink[2].addEventListener('mouseleave',function(){
      navLink[1].style.opacity="1";
      navLink[0].style.opacity="1";
      this.childNodes[0].style.textDecoration="none";
    })
  },[])

  // onload function
  window.onload=function() {
    // canvas background
    var canvas, context, screenH, screenW;
    var stars = [];
    var fps = 50;
    var numStars = 500;

    function isMobile() {
      return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }
    if (isMobile()) {
      // 모바일이면 실행될 코드 들어가는 곳
      numStars = 100;
    }

    screenH = window.innerHeight;
    screenW = window.innerWidth;
    canvas = document.querySelector('#space');
    canvas.setAttribute('height', screenH);
    canvas.setAttribute('width', screenW);
    context = canvas.getContext('2d');
    for(var i = 0; i < numStars; i++) {
      var x = Math.round(Math.random() * screenW);
      var y = Math.round(Math.random() * screenH);
      var length = 1 + Math.random() * 2;
      var opacity = Math.random();
      var star = new Star(x, y, length, opacity);
      stars.push(star);
    }
    setInterval(animate, 1000 / fps);
    function animate() {
      context.clearRect(0, 0, screenW, screenH);
      stars.forEach(function(el) {
        el.draw(context);
      })
    }
    function Star(x, y, length, opacity) {
      this.x = parseInt(x);
      this.y = parseInt(y);
      this.length = parseInt(length);
      this.opacity = opacity;
      this.factor = 1;
      this.increment = Math.random() * .03;
    }
    Star.prototype.draw = function() {
      context.rotate((Math.PI * 1 / 10));
      context.save();
      context.translate(this.x, this.y);
      if(this.opacity > 1) {
        this.factor = -1;
      }
      else if(this.opacity <= 0) {
        this.factor = 1;
        this.x = Math.round(Math.random() * screenW);
        this.y = Math.round(Math.random() * screenH);
      }
      this.opacity += this.increment * this.factor;
      context.beginPath()
      for (var i = 5; i--;) {
        context.lineTo(0, this.length);
        context.translate(0, this.length);
        context.rotate((Math.PI * 2 / 10));
        context.lineTo(0, - this.length);
        context.translate(0, - this.length);
        context.rotate(-(Math.PI * 6 / 10));
      }
      context.lineTo(0, this.length);
      context.closePath();
      context.fillStyle = "rgba(255, 255, 200, " + this.opacity + ")";
      context.shadowBlur = 5;
      context.shadowColor = '#ffff33';
      context.fill();
      context.restore();
    }

    // burger menu
    burgerMenu = document.getElementsByClassName('menu')[0];
    burgerNav = document.getElementsByClassName('navMenu')[0];
    burgerMenu.addEventListener('click',function toggleClasses(){
      this.classList.toggle('open');
      burgerNav.classList.toggle('open');
    })

    // close Nav when 1024px over innerWidth
    window.matchMedia("(min-width: 1024px)").addListener(function(e){
      // 뷰포트 너비가 1024 픽셀 이상
      if (e.matches) {
        closeNav(); 
      }
    })
  };

  return (
    <HashRouter>
      {/* <Helmet title="JJW's Portfolio"/> */}
      <header className={headerBg}>
          <Link to="/" className="home" onClick={closeNav}><img className="logo" src="./img/logo_light.png" alt=""/>JJW's Portfolio</Link>
          
          <p className="logoMent">
            <br/>WANT YOUR BRAND STORY?
          </p>
          <nav className="navMenu">
            <Link to="/About" className="navLink" onClick={closeNav}>
              <span>ABOUT</span>
            </Link>
            <Link to="/Work" className="navLink" onClick={closeNav}>
              <span>WORK</span>
            </Link>
            <Link to="/Contact" className="navLink" onClick={closeNav}>
              <span>CONTACT</span>
            </Link>
          </nav>
          <div className="menu">
            <div className="bar"></div>
            <div className="bar"></div>
            <div className="bar"></div>
          </div>
          <span className="themeBtn" onClick={changeTheme}></span>
      </header>
      <main>
        <Switch>
          <Route exact path="/"> <Index funName={headerClass}/> </Route>
          <Route path="/About"> <About funName={headerClass} /> </Route>
          <Route path="/Work"> <Work funName={headerClass}/> </Route>
          <Route path="/Contact"> <Contact funName={headerClass}/> </Route>
        </Switch>
        <canvas id="space">This browser doesn't support canvas.</canvas>
      </main>
      <footer>
        <figure>
          <a href="https://github.com/CodingGuyJW" target="_blank" rel="noreferrer"><img src="./img/git.png" alt=""/></a>
          <a href="mailto:juice0914@hanmail.net"><img src="./img/email.png" alt=""/></a>
        </figure>
        <p>juice0914@hanmail.net</p>
        <p>© 2021. Jeon Jeonguk. All rights reserved.</p>
      </footer>
    </HashRouter>
  );
}

export default App;
