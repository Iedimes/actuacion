import AppForm from '../app-components/Form/AppForm';

Vue.component('customer-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                ci:  '' ,
                domicilio:  '' ,
                monto:  '' ,
                gasto:  '' ,
                vto:  '' ,
                
            }
        }
    }

});