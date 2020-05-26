import React from 'react';

// import style
import './style.css';

const Description = () => {
    return (
        <div className="description">
            <h1>Bienvenue</h1>
            <div className="description_main">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and .</p>
                <img className="img_description" src={image_description}></img>
            </div>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

</p>
        </div>
    );
};

const image_description = "https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png"

export default Description;