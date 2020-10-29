import React from 'react';
import { render } from 'react-dom';
import Header from './layout/Header';
import Footer from './layout/Footer';

const HTML = () => {
    return <>
        <Header />

        <main class='container'>
            <h1>About Me</h1>
            <p>
                I am a Full Stack Developer with a passion for personal development. I am constantly changing, growing, and 
                finding new and better ways go move throughout my life. I am commonly learning new things, reading,
                journaling, socializing, engaging in men's work, or practicing music.
            </p>

            <h2>Site Purpose</h2>
            <p>
                The purpose of this site is largely to practice hosting on AWS, setting up my own server configurations, etc.
                As always, this might change in the future.
            </p>

            <h2>My Tech Stack</h2>
            <div className="row">
                <div className="col-6">
                    <h3>Languages n Libraries</h3>
                    <ul>
                        <li>PHP</li>
                        <li>Javascript/jQuery</li>
                        <li>Bash</li>
                        <li>MySQL</li>
                        <li>SASS/CSS</li>
                        <li>PHPUnit</li>
                    </ul>
                </div>

                <div className="col-6">
                     <h3>Development Tools</h3>
                     <ul>
                        <li>Webpack</li>
                        <li>Gulp</li>
                        <li>Git</li>
                        <li>PHPStorm</li>
                        <li>VsCode</li>
                    </ul>
                </div>

                <div className="col-6">
                     <h3>Frameworks</h3>
                     <ul>
                        <li>Laravel</li>
                        <li>React</li>
                    </ul>
                </div>

                <div className="col-6">
                     <h3>Server Related</h3>
                     <ul>
                        <li>Linux</li>
                        <li>Apache</li>
                    </ul>
                </div>

                <div className="col-6"></div>
            </div>
            
        </main>

       <Footer />
       </>
};

render(
    <HTML />,
    document.getElementById('root')
);