

class HomeStore {
    constructor() {
        this.questions = {};
    }



    setQuestion(key, value) {
        this.questions[key] = value;
    }

    submit() {

    }
}



module.exports = HomeStore;