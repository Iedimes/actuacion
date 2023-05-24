import AppForm from '../app-components/Form/AppForm';

Vue.component('custumer-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});