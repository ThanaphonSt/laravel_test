
<!DOCTYPE html>
<html>
<head>
    <title>Fazwaz Property</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

</head>
<style>
.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}
</style>
<body>

<div class="container">
    <div class="col-xs-12 text-center">
        <h1>Properties</h1>
    </div>
    <div class="col-xs-12 text-center">
        <div class="col-xs-4" style="padding:30px;" v-for="property in properties" is="property" :property="property" >

        </div>
    </div>
    <template id="template-property">
        <div class="card">
            <div class="card-title">@{{property.title}}</div>
            <!-- <div class="card-subtitle mb-2 text-muted">@{{property.project_name}}</div>
            <p class="card-text"> @{{property.description}}</p> -->
        </div>
    </template>
    <div class="text-right">
        <div class="pagination">
            <button class="btn btn-default" @click="fetchproperties(pagination.prev_page_url)"
                    :disabled="!pagination.prev_page_url">
                Previous
            </button>
            <span>Page @{{pagination.current_page}} of @{{pagination.last_page}}</span>
            <button class="btn btn-default" @click="fetchproperties(pagination.next_page_url)"
                    :disabled="!pagination.next_page_url">Next
            </button>
        </div>
    </div>
</div>

<v-paginator :resource.sync="stories" :resource_url="api/stories"></v-paginator>
<script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.24/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>
<script type="text/javascript">
    Vue.component('property', {
        template: '#template-property',
        props: ['property'],
    })

    new Vue({
        el: '.container',
        data: {
            properties: [],
            pagination: {}
        },
        ready: function () {
            this.fetchproperties()
        },
        methods: {
            fetchproperties: function (page_url) {
                let vm = this;
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
</script>

</body>
</html>