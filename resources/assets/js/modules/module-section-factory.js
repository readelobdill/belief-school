import IntroSection from 'modules/module-sections/intro';
import VideoSection from 'modules/module-sections/video';
import QuestionsSection from 'modules/module-sections/questions';
import TextSection from 'modules/module-sections/text';
import AccountCreationSection from 'modules/module-sections/account-creation';
import TextWelcomeSection from 'modules/module-sections/text-welcome';
import CongratsSection from 'modules/module-sections/congrats';
import BoomerangSection from 'modules/module-sections/boomerang';
import IAmSection from 'modules/module-sections/i-am';
import AffirmationsSection from 'modules/module-sections/affirmations';
import DreamboardSection from 'modules/module-sections/dreamboard';
import $ from 'jquery';

var sectionTypes = {
    Intro: IntroSection,
    Video: VideoSection,
    Questions: QuestionsSection,
    Text: TextSection,
    AccountCreation: AccountCreationSection,
    TextWelcome: TextWelcomeSection,
    Congrats: CongratsSection,
    Boomerang: BoomerangSection,
    Affirmations: AffirmationsSection,
    IAm: IAmSection,
    Dreamboard: DreamboardSection
};



module.exports = function(element, module) {
    var type = $(element).data('type');
    return new sectionTypes[type](element, module);
};