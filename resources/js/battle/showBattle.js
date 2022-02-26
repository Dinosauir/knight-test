import ShowBattleLog from "./ShowBattleLog";

let init = null;

$.fn.extend({
    initBattleClass: function () {
        init = new ShowBattleLog(this);
    },
    setData: (apiData) => {
        if (init) {
            init.setData(apiData);
        }
    },
    showLogs: (route) => {
        if (init && init.apiData !== []) {
            axios.get(route)
                .then((response) => {
                    init.setData(response.data.data);

                    init.showLogs();
                }).catch(error => {
                console.log(error);
            });
        }
    }
});

