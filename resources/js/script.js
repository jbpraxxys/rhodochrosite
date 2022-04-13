import { home } from './Scripts/home.js';

let app = {
    init() {
        switch (this.getPageSlug()) {
            case '/':
                    home.init();
                break;
        }
    },

    getPageSlug() {
        let result = window.location.pathname;

        return result;
    }
};

window.onload = function() {
    app.init();
};