import Home from "pages/home";
import $ from 'jquery';

var page = $('body').data('page');
switch(page) {
    case 'home' :
        Home.init();
        break;
}


