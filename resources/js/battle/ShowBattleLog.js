export default class ShowBattleLog {
    constructor(obj) {
        this.apiData = [];
        this.mainWrapper = $('#' + obj[0].id);
    }

    setData(apiData = []) {
        this.apiData = apiData;
    }

    buildElement(battleable = {battleable_name: '', action_type: '', action_value: ''}) {
        return $(`<h4 class="py-0 my-0" ><span class="text-success">${battleable.battleable_name}</span>
                            { ${battleable.action_type} }
                            ${battleable.action_value} ${this.getLabel(battleable.action_type)}</h4>`);
    }

    getLabel(action_type = '') {
        switch (action_type) {
            case 'attack':
                return 'DMG';
            case 'survive':
                return 'HP LEFT';
            default:
                return action_type;
        }
    }

    showLogs() {
        this.mainWrapper.find('.alert').empty();
        this.mainWrapper.removeClass('d-none');
        const alertWrapper = this.mainWrapper.find('.alert');

        this.apiData.forEach((e) => {
            alertWrapper.append(this.buildElement(e));
        });
    }
}
