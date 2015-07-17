import Home from "pages/home";
import Welcome from "pages/welcome";
import Boomerang from "pages/boomerang";
import UnStuck from "pages/un-stuck";
import Visualise from "pages/visualise";
import YouToYou from "pages/you-to-you";
import FearCourage from "pages/fear-courage";
import Giving from "pages/giving";
import Gratitude from "pages/gratitude";
import SustainableChange from "pages/sustainable-change";
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
    case 'you-to-you':
        YouToYou.init();
        break;
    case 'fear-courage':
        FearCourage.init();
        break;
    case 'giving':
        Giving.init();
        break;
    case 'gratitude':
        Gratitude.init();
        break;
    case 'sustainable-change':
        SustainableChange.init();
        break;



}


