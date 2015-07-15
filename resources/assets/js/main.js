import Home from "pages/home";
import Welcome from "pages/welcome";
import Boomerang from "pages/boomerang";
import UnStuck from "pages/un-stuck";
import Visualise from "pages/visualise";
import $ from 'jquery';
import UI from "ui/ui";

UI.init();
let page = $('body').data('page');
switch(page) {
    case 'home' :
        Home.init();
        break;
    case 'welcome' :
        Welcome.init();
        break;
    case 'boomerang':
        Boomerang.init();
        break;
    case 'un-stuck':
        UnStuck.init();
        break;
    case 'visualise':
        Visualise.init();
        break;


}


