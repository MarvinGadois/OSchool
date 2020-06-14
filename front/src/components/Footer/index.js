import React from "react";
import { useHistory } from 'react-router';
import Logo4 from "src/assets/VersionClaire.png";


import "./footer.scss";

const Footer = () => {
  const history = useHistory();

  return (
    <footer className="footer">
      <div className="footer-content">
        <div className="footer-links">
          <p id="p_1" className="about-p" onClick={() => history.push('/')}>Accueil</p>
          <p id="p_3" className="about-p" onClick={() => history.push('/about')}>À propos</p>
          <p className="footer-company-name">O'School © 2020</p>
        </div>
        <h3 className="about-p" onClick={() => history.push('/')}>O'School</h3>
        <p className="about-p" onClick={() => history.push('/')}>
          <img id="footer_img" className="logo" src={Logo4} alt="logo" />
        </p>
      </div>

    </footer>
  );
}


export default Footer;
