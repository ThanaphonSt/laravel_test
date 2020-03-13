
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
            {{-- <div class="colx-xs-12" is="sortColumn":property="buttonSort" >test</div> --}}
        </div>

    </div>

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
<template id="buttonSort">
    <button class="btn btn-default text-center" @click="changeSort">
        Sort by: @{{ property.sort }}
    </button>
</template>

<script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.24/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>
<script type="text/javascript">

    let test2 = Vue.component('sortColumn', {
        template: '#buttonSort',
        props:['buttonSort']
    })

    Vue.component('property', {
        template: '#template-property',
        props: ['property'],
        // 'componentSort': test2
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
                page_url = page_url || '/api/fazwaz/properties'
                this.$http.get(page_url)
                    .then(function (response) {
                        vm.makePagination(response.data.pagination)
                        vm.$set('properties', response.data.data)
                        vm.changeSort(response.data.data)

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
            },
            changeSort: function(data){
                console.log(data)
            }

        }
    });
</script>

</body>
</html>
