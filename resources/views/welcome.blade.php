
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

<div class="container" id="app">
    <div class="col-xs-12 text-center">
        <h1>Properties</h1>
    </div>
    <div class="col-xs-12 text-center">
        <div class="col-xs-4" style="padding:30px;" v-for="property in properties" is="property" :property="property" >

        </div>
    </div>
    <template id="template-property">
        <div class="card text-left">
            <div class="card-title text-center"><b>@{{property.title}}</b></div>
            <div class="card-text"><b>Project Name :</b>@{{property.project_name}}</div>
            <div class="card-text"><b>Property type: </b> @{{property.property_type}}</div>
            <div class="card-text"><b>Description: </b> @{{property.description}}</div>
            <div class="card-text"><b>Country: </b> @{{property.country}}</div>

            <div class="card-text"><b>Status: </b> @{{property.status}}</div>
            <div class="card-text"><b>For Sale: </b> @{{property.for_sale}}</div>
            <div class="card-text"><b>For Rent: </b> @{{property.for_rent}}</div>
            <div class="card-text"><b>Bedroom: </b> @{{property.bedroom}}</div>
            <div class="card-text"><b>Bathroom: </b> @{{property.bathroom}}</div>
        </div>
    </template>
    <div class="col-xs-12">
        <div class='row'>

            <div class="text-right col-xs-12 pagination text-center">
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
</script>

</body>
</html>
