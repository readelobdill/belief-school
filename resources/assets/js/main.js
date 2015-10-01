import es6Promise from 'es6-promise';
/*Modules*/
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
import Dashboard from 'dashboard/dashboard';
import Account from 'auth/account';




/*Misc Pages*/
import Forum from "forum/forum";
import TagCloudForm from 'pages/tag-cloud-form';
import About from 'pages/about';

/*Utility*/
import $ from 'jquery';
import UI from "ui/ui";
import Loading from 'util/loading';
import Arc from 'ui/arc';
import Forms from 'ui/forms';
import Sharer from 'ui/share'
import IntroVideo from 'ui/intro-video';

es6Promise.polyfill();


$(function() {
    UI.init();
    Loading.init();
    Arc.init();
    Forms.init();
    Sharer.init();

    const page = $('body').data('page');
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
        case 'forum':
            Forum.init();
            break;
        case 'dashboard':
            Dashboard.init();
            break;
        case 'account':
            Account.init();
            break;
        case 'tag-cloud-form':
            TagCloudForm.init();
            break;
        case 'about':
            About.init();
            break;


    }
});



