import AppForm from '../app-components/Form/AppForm';

Vue.component('diploma-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                number:  '' ,
                url:  '' ,
                
            }
        }
    }

});