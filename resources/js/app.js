require('./bootstrap');

window.Vue = require('vue');

Vue.component('property', require('./components/ExampleComponent.vue').default,);
// Vue.component('property', {
//     template: '#template-property',
//     props: ['property'],
// })
const app = new Vue({
    el: '.container',
    data: {
        properties: [],
        pagination: {},
        sortByBedRoom : true,
        sort: 'bed room'
    },
    ready: function () {
        this.fetchproperties()
    },
    methods: {
        fetchproperties: function (page_url) {
            let vm = this;
            console.log('vm:',vm)
            page_url = page_url || '/api/fazwaz/properties'
            this.$http.get(page_url)
                .then(function (response) {
                    vm.makePagination(response.data.pagination)
                    vm.$set('properties', response.data.data)
                });
        },
        makePagination: function(data){
            let pagination = {
                current_page: data.current_page,
                last_page: data.last_page,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url
            }
            // console.log(data.current_page)
            this.$set('pagination', pagination)
        }
    }
});
});
