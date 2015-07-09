import Home from "pages/home";
import $ from 'jquery';
import UI from "ui/ui";

UI.init();
let page = $('body').data('page');
switch(page) {
    case 'home' :
        Home.init();
        break;
}


