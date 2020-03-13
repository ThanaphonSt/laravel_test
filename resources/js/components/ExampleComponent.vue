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

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
