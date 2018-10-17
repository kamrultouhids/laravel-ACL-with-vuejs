<template>
    <ul class="pagination justify-content-center" v-if="resultData.last_page > 1">
        <li :class="'page-item '+[ ((resultData.current_page == 1) ? 'disabled' : '') ]">
            <a :href="'?page='+resultData.current_page" @click.prevent="pageClicked(resultData.current_page-1)" aria-label="Previous" v-if="resultData.current_page != 1" class="page-link">
                <span aria-hidden="true">«</span>
            </a>
            <a v-else class="page-link">
                <span  aria-hidden="true">«</span>
            </a>
        </li>
        <li v-for="pageNo in range(paginateLoop, numberOfPage)"
            :class="'page-item '+[ ((resultData.current_page == pageNo) ? 'active' : '') ]">
            <a :href="'?page='+pageNo" @click.prevent="pageClicked(pageNo)" class="page-link">{{ pageNo }}</a>
        </li>
        <li :class="'page-item '+[ ((resultData.current_page == resultData.last_page) ? 'disabled' : '') ]" >
            <a  :href="'?page='+resultData.current_page" @click.prevent="pageClicked(resultData.current_page+1)" aria-label="Next" v-if="resultData.current_page != resultData.last_page" class="page-link">
                <span aria-hidden="true">»</span>
            </a>
            <a v-else class="page-link">
                <span  aria-hidden="true">»</span>
            </a>
        </li>
    </ul>
</template>

<script>
    export default {
        props: {
            resultData: {
                required: true,
                type: Object
            },
            midSize: {
                required: false,
                type: Number,
                default: 5
            }
        },

        data(){
            return {

            };
        },

        methods: {
            range(start, count) {
                return Array.apply(0, Array(count))
                    .map(function (element, index){
                        return index + start;
                    });
            },
            pageClicked(pageNo){
                this.$emit('clicked', pageNo);
            },
        },

        computed: {
            paginateLoop(){
                let results = this.resultData;
                if(results.last_page > this.midSize){
                    if((results.last_page - ((this.midSize - 1) / 2) ) <= results.current_page){
                        return results.last_page - (this.midSize - 1);
                    }

                    if( results.current_page > (((this.midSize - 1) / 2) + 1) ){
                        return results.current_page - ((this.midSize - 1) / 2);
                    }
                }
                return 1;
            },

            numberOfPage(){
                let results = this.resultData;
                if(results.last_page < this.midSize){
                    return results.last_page;
                }else{
                    return this.midSize;
                }
            }
        },
    };
</script>