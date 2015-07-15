import $ from "jquery";
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";


class Menu {
    constructor(menu, burger) {
        this.menu = $(menu);
        this.burger = $(burger);
        this.open = false;
        this.setupEventListeners();
    }


    setupEventListeners() {
        this.timeline = new TimelineLite();
        this.timeline.to(this.menu, 0, {display:'block'});
        this.timeline.to(this.menu, 0.3, {x: 0});
        this.timeline.to(this.burger.find('#open-burger'), 0.3, {x: -50}, 0);
        this.timeline.fromTo(this.burger.find('#close-burger'), 0.3, {x: 50}, {x: 0, display: 'block'}, 0);
        this.timeline.pause();
        this.burger.on('click', (e) => {
            if(this.open) {
                this.timeline.reverse();
            } else {
                this.timeline.play();
            }
            this.open = !this.open;

        })
    }
}


module.exports = Menu;