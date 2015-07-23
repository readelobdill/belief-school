import IntroSection from 'modules/module-sections/intro';
import VideoSection from 'modules/module-sections/video';
import QuestionsSection from 'modules/module-sections/questions';
import TextSection from 'modules/module-sections/text';
import AccountCreationSection from 'modules/module-sections/account-creation';
import TextWelcomeSection from 'modules/module-sections/text-welcome';
import CongratsSection from 'modules/module-sections/congrats';
import BoomerangSection from 'modules/module-sections/boomerang';
import ChallengeSection from 'modules/module-sections/challenge';
import ResponseSection from 'modules/module-sections/response';
import DreamboardSection from 'modules/module-sections/dreamboard';
import YouToYouSection from 'modules/module-sections/you-to-you';
import FormSection from 'modules/module-sections/form';
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
    Response: ResponseSection,
    Challenge: ChallengeSection,
    Dreamboard: DreamboardSection,
    YouToYou: YouToYouSection,
    Form: FormSection
};



module.exports = function(element, module) {
    var type = $(element).data('type');
    return new sectionTypes[type](element, module);
};