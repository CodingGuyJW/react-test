// WorkView.js
import { useEffect } from "react";

export default function WorkView({data,isDone}){
    // projectView
    function GoToList(){
        isDone(false);
    }

    // go to top button
    function GoToTop(){
        window.scrollTo(0,0);
    }

    useEffect(()=>{
        const contents = document.getElementsByClassName('contents')[0];
        const projectIntro = document.getElementsByClassName('projectIntro')[0];
        contents.innerHTML = data.contents;
        projectIntro.innerHTML = data.projectIntro;
    },[data]);

    return(
        <article className="projectView">
            <h3 className="projectTitle">{data.title}</h3>
            <h4 className="projectDate">{data.dateStart} ~ {data.dateEnd}</h4>
            <div className="projectIntro">
            {data.projectIntro}
            </div>
            <div className="contents"></div>
            <div className="projectBtn">
                <span onClick={GoToList}>LIST</span>
                <span onClick={GoToTop}>TOP</span>
            </div>
        </article>
    );
}