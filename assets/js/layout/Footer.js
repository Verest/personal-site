import React from 'react';

const Footer = () => {
    return (
        <footer>
            <div class="container">
                <div class="row pv-vr">
                    <div class="col-s-6">
                        <a class='footer-item' target="_blank" href="https://github.com/Verest">My Github</a>
                    </div>

                    <div class="col-s-6 text-right">
                        <a class='footer-item' href="mailto:richie@richieblack.me">
                            Email: richie@richieblack.me
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    );
};

export default Footer;