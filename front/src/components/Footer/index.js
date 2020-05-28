import React, { Component } from "react";
import "./footer.scss";

class Footer extends Component {
  render() {
    return (
      <footer className="footer">
        <div className="footer-left">
          <h3>O'School</h3>
          <p className="footer-links">
            <a href="/">Accueil</a>-<a href="/">A propos</a>-<a href="/">Faq</a>
            -<a href="/">Contact</a>
          </p>
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
}

export default Footer;
