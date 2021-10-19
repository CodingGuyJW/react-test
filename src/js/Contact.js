// Contact.js
// import 'node-sass';
// import '../css/contact.scss';
import '../css/contact.css';

export default function Contact({funName}){
    funName('headerBgGray');
    return(
        <section className="contContact">
            <h3>Contact Me</h3>
            <div>
                <img src="./img/kakaotalk-open-qr-code.jpg" alt=""/>
                <div className="contentsContact">
                    <a href="https://open.kakao.com/o/sFa6nwCd">kakaotalk open chatting (1:1)</a>
                    <a href="mailto:juice0914@hanmail.net">e-mail : juice0914@hanmail.net</a>
                    <p>I hope to meet you soon!</p>
                </div>
            </div>
        </section>

    );
}
