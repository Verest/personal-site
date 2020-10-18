import React from 'react';
import { render } from 'react-dom';

const HTML = () => {
    return [
        <header>
            <div class="container">
                <h1>
                    <svg id="logo" version="1.1" viewBox="8.485185451185714 6.674214553520983 291.167 291.16700000000003"
                        stroke="white" stroke-width="25px" fill="none">
                            
                        <path d="M282.65 290.34L15.99 290.34L15.99 23.67L272.78 23.67L272.78 213.67L188.04 213.67L143.47 157.01L188.04 157.01L188.04 85.34L102.44 85.34L102.44 224.83" id="d18dkHyrW6"></path>
                    </svg>

                    <span>
                        <span class="hidden">R</span>ichie Black
                    </span>
                </h1>
            </div>
        </header>,

        <main class='container'>
            <h1>About Me</h1>
            <p>
                I am a Full Stack Developer with a passion for personal development. I am constantly changing, growing, and 
                finding new and better ways go move throughout my life. I am commonly learning new things, reading,
                journaling, socializing, or engaging in men's work.
            </p>

            <h2>Site Purpose</h2>
            <p>
                The purpose of this site is largely to practice hosting on AWS, setting up my own server configurations, etc.
                As always, this might change in the future.
            </p>
        </main>,

        <footer>
            <div class="container">
            Todo: footer content
            </div>
        </footer>
    ];
};

render(
    <HTML />,
    document.getElementById('root')
);