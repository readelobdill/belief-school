import Video from "modules/video";
import createSection from 'modules/module-section-factory';
import $ from 'jquery';


class Module {
    constructor(container) {
        this.container = $(container);
        this.sections = this.container.find('section').map((index, section) => {
            return createSection(section, this);
        }).get();

        var currentStep = parseInt(this.container.data('step'));
        var skip = this.container.data('skip');
        let newIndex = 0;
        if(currentStep == 0 && !!parseInt(skip)) {
            newIndex = skip;
        } else {
            newIndex = this.container.find('[data-step="'+currentStep+'"]').index();
        }

        if(newIndex > 0 && this.sections[0].jump) {
            this.sections[0].jump();
        }
        this.goToSection(newIndex);



        this.setupEventListeners();
    }

    submitAndNextSection() {
        if(this.sections[this.currentSection].submit !== undefined) {
            return this.sections[this.currentSection].submit();
        } else {
            this.nextSection();
        }
    }

    nextSection() {
        return this.goToSection(this.currentSection + 1);
    }
    previousSection() {
        return this.goToSection(this.currentSection - 1);
    }
    goToSection(section) {
        window.history.replaceState(null, null, `${window.location.pathname}?skip=${section}`);
        $('body').attr('data-current-section', section);

        if(this.currentSection !== section && this.sections[section]) {
            if(this.sections[this.currentSection]) {
               return this.sections[this.currentSection].close().then(() => {
                    this.currentSection = section;
                    return this.sections[this.currentSection].open();
                });
            } else {
                this.currentSection = section;
                return this.sections[this.currentSection].open();
            }
        }

    }

    setupEventListeners() {
        $('body').on('click', '[data-back]', e => {
            e.preventDefault();
            this.previousSection();
        });
        $('body').on('click', '[data-forward]', e => {
            e.preventDefault();
            this.submitAndNextSection();
        });

        $("#module-summaries").on("click", "button", function() {
            var $module = $(this).parent().parent();
            $module.toggleClass('expanded');
            if($module.hasClass('expanded')){
                $module.find('button.explore').text('Collapse Module');
            } else {
                $module.find('button.explore').text('Explore Module');
            }
        });

        $("#modules-unpacked").on("mouseover", "li", function() {
            var i = $(this).index();
            var li = $("#modules-unpacked li");
            var c = $("#modules-unpacked .content");
            var t = $(li[i]).position().top + 10;

            $(c).removeClass("active");
            $(li).removeClass("active");
            $(li[i]).addClass("active");
            $(c[i]).addClass("active");

            $("#modules-unpacked .visual .arrow").css("top", t);
        });
    }

    getUpdateUrl() {
        return this.container.data('update-url');
    }

    getCompleteUrl() {
        return this.container.data('complete-url');
    }

    isComplete() {
        return !!this.container.data('is-complete');
    }
    setComplete(complete) {
        this.container.data('is-complete', complete);
    }

    setData(data) {
        this.data = data;
    }
    getData() {
        return this.data;
    }

}


module.exports = Module;

