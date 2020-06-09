import React from "react";
import { useHistory } from 'react-router';

import "./footer.scss";

const Footer = () => {
  const history = useHistory();

  return (
    <footer className="footer">
      <div className="footer-left">
        <h3>O'School</h3>
        <div className="footer-links">
          <p className="about-p" onClick={() => history.push('/')}>Accueil</p>
          <p className="about-p" onClick={() => history.push('/about')}>A propos</p>
          <p className="about-p">Faq</p>
          <p className="about-p">Contact</p>
        </div>
        <p className="footer-company-name">O'School © 2020</p>
        <div className="footer-icons">
          <a href="/">
            <i className="fa fa-facebook" />
          </a>
          <a href="/">
            <i className="fa fa-twitter" />
          </a>
          <a href="/">
            <i className="fa fa-linkedin" />
          </a>
          <a href="/">
            <i className="fa fa-github" />
          </a>
        </div>
      </div>
      <div className="footer-right">
        <p>Contactez nous</p>
        <form action="#" method="post">
          <input type="text" name="email" placeholder="Email" />
          <textarea name="message" placeholder="Message" defaultValue={""} />
          <button>Envoyer</button>
        </form>
      </div>
    </footer>
  );
}


export default Footer;
