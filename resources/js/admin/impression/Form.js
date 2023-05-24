import AppForm from '../app-components/Form/AppForm';

Vue.component('impression-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                doc_id:  '' ,
                cli_id:  '' ,
                
            }
        }
    }

});