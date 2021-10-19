// Index.js
// import 'node-sass';
// import '../css/index.scss';
import '../css/index.css';

export default function Index({funName}){
    funName('headerBg');
    function hiddenLink(){
        document.getElementById('db').style.visibility="visible";
        document.getElementById('myadmin').style.visibility="visible";
    }
    return(
        <section className="contIndex">

            <div> {/*hidden link*/}
                <div id="divDB">
                    <a id="db" href="http://jeonguk.dothome.co.kr/admin/login.php" target="_blank" rel="noreferrer">.</a>
                </div>
                <div id="divMyadmin">
                    <a id="myadmin" href="http://jeonguk.dothome.co.kr/myadmin" target="_blank" rel="noreferrer">.</a>
                </div>
            </div>
            {/* tab 10 times:login, tab 11 times:myadmin*/}
            <h2 className="greeting" onClick={hiddenLink} >Hello World!</h2>
            <p className="iam">I'm a web publisher.</p>
            <div className="coverLetter">
                <span className="downTextCont">
                    <small>
                        MY INFORMATION
                    </small>
                    <br/>
                    PDF DOWNLOAD
                </span>
                <span className="downBtn">{'>'}</span>
            </div>
        </section>
    );
}
