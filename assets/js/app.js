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
            <ul>
                <li>PHP</li>
                <li>Javascript</li>
                <li>Apache</li>
                <li>jQuery</li>
                <li>Todo...</li>
            </ul>
        </main>

       <Footer />
       </>
};

render(
    <HTML />,
    document.getElementById('root')
);