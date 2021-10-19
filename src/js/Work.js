// Work.js
// import 'node-sass';
// import '../css/work.scss';
import '../css/work.css';
import {useEffect, useState} from 'react';
import WorkView from './WorkView';

export default function Work({funName}){
    funName('headerBgGray');
    // data fetch
    let [work,setWork] = useState();
    let [data,setData] = useState();
    
    useEffect(()=>{
        fetch('./data/data.json')
        .then(res => res.json())
        .then(w => {
            setWork(w);
        });
    },[])
    
    // project view
    let [bool,setBool] = useState(false);
    function viewProject(n){
        setData(work[n]);
        isDone(true);
    }
    function isDone(b){
        setBool(b);
    }

    return(
        <>
        {work && <section className="contWork">
            {work.map((v, k)=>(
                <figure key={k} className="project" onClick={()=>{viewProject(k)}}>
                    <img src={`./admin/files/${v.thumbnail}`} alt=""/>
                    <figcaption>{v.title}</figcaption>
                    <p>({v.category})</p>
                </figure>
            ))
            }
            {bool && <WorkView data={data} isDone={isDone}/>}
        </section>
        }
        </>
    );
}
