/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/global.scss';
import './styles/app.css';
import './styles/styles.css';
import 'bootstrap';

import './scripts.js';
import './mail/jqBootstrapValidation.js';
import './mail/contact_me.js';



// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});
