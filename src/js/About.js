// About.js
// import 'node-sass';
// import '../css/about.scss';
import '../css/about.css';

export default function About({funName}){
    funName('headerBgGray');
    return(
        <div className="contAbout">
            <section className="contLeftAbout">
                <h2>ABOUT ME</h2>
                <p className="whoIam">
                    "안녕하세요, 신입 웹 퍼블리셔 전정욱입니다."<br/>
                </p>
                <p className="whoIamContent">
                    빠르게 변화하는 다양한 개발환경
                    속에서 끊임없이 연구하고 고민하여
                    사용자 경험을 중심으로 화면을
                    구현하는 웹 퍼블리셔가 되겠습니다.
                </p>
                <div className="likeImg">
                    <span>LEARNING</span>
                    <span>USER EXPERIENCE</span>
                    <span>IMPLEMENT</span>
                </div>
            </section>
            <section className="contRightAbout">
                <h3 className="doTitle">WHAT I DO</h3>
                <p className="doContent">
                    User Interface와 User Experience를 깊게 생각하고 어떤 기기에서도 볼 수 있는 웹 페이지를 제작합니다. <br/>
                </p>
                <h3 className="canTitle">
                    <br/>WHAT I CAN<br/><br/>
                </h3>
                <figure className="canHTML">
                    <img src="./img/icon-html5.png" alt=""/>
                    <figcaption className="bar">
                        <div className="skills">HTML</div>
                        <div className="skillsVal">90%</div>
                    </figcaption>
                </figure>
                <figure className="canCSS">
                    <img src="./img/icon-css3.png" alt=""/>
                    <figcaption className="bar">
                        <div className="skills">CSS</div>
                        <div className="skillsVal">80%</div>
                    </figcaption>
                </figure>
                <figure className="canJS">
                    <img src="./img/icon-js.png" alt=""/>
                    <figcaption className="bar">
                        <div className="skills">JavaScript</div>
                        <div className="skillsVal">70%</div>
                    </figcaption>
                </figure>
                <figure className="canJquery">
                    <img src="./img/icon-jquery.png" alt=""/>
                    <figcaption className="bar">
                        <div className="skills">jQuery</div>
                        <div className="skillsVal">50%</div>
                    </figcaption>
                </figure>
                <figure className="canSASS">
                    <img src="./img/icon-sass.png" alt=""/>
                    <figcaption className="bar">
                        <div className="skills">SCSS</div>
                        <div className="skillsVal">50%</div>
                    </figcaption>
                </figure>
                <figure className="canReact">
                    <img src="./img/icon-react.png" alt=""/>
                    <figcaption className="bar">
                        <div className="skills">React</div>
                        <div className="skillsVal">30%</div>
                    </figcaption>
                </figure>
                
                <h3 className="whereTitle"><br/>WHERE I WAS</h3>
                <ul className="whereContent">
                    <li>UI/UX design web publisher & front-end developer class</li>
                    <li>Doo-yang Industries (production line)</li>
                    <li>한국타이어 경기대리점</li>
                </ul>

            </section>
        </div>
    );
}
