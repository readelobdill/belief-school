import $ from 'jquery';


class Sharer {
    constructor() {
        this.findShares();
    }

    findShares() {
        $('body').on('click', '[data-share]', (e) => {
            e.preventDefault();
            const winWidth  = window.screen.width;
            const winHeight = window.screen.height;
            const width = 500;
            const height = 500;
            const winLeft = (winWidth / 2) - ((width / 2));
            const winTop = (winHeight / 2) - ((height / 2));
            console.log(winLeft,winTop);
            const windowFeatures = 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width='+width+',height='+height;
            const target = $(e.currentTarget);
            const url = target.attr('href');
            window.open(url, 'Share', windowFeatures);


        })
    }
}


export default {
    init() {
        const sharer = new Sharer();
    }
}