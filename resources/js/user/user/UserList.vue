<template>
    <div>
        <div class="card-content collapse show">
            <div class="card-body card-dashboard">
                <div class="item-show-limit">
                    <span>Show</span>
                    <select name="per_page" class="per_page" @change="changePerPage" v-model="perPage">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                    <span>Entries</span>
                </div>

                <table class="table table-striped table-bordered table-hover">
                    <thead class="table_head">
                    <tr>
                        <th class="width-200">S/L</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role Name</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody v-if="resultData.data !=''">
                        <tr v-for="(value,index) in resultData.data">
                            <td>{{++index}}</td>
                            <td>{{value.name}}</td>
                            <td>{{value.email}}</td>
                            <td>{{value.username}}</td>
                            <td>{{value.role ? value.role.role_name : ''}}</td>
                            <td>
                                <div v-if="value.status == 1" class="badge badge-primary badge-round ">
                                    <i class="fa fa-check font-medium-2"></i><span>Active</span>
                                </div>
                                <div v-if="value.status == 0" class="badge badge-danger badge-round ">
                                    <i class="fa fa-ban font-medium-2"></i><span>Inactive</span>
                                </div>
                            </td>
                            <td  class="width-200 text-center">
                                <a v-if="permissions.indexOf('user-registration.destroy') !=-1"  @click="deleteData(value.id)" class="btn btn-danger btn-sm"><i aria-hidden="true" class="fa fa-trash-o btnColor"></i></a>
                                <a v-if="permissions.indexOf('user-registration.edit') !=-1" @click="openUpdateModal(value.id)" class="btn btn-primary btn-sm"><i aria-hidden="true" class="fa fa-pencil-square-o btnColor"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="text-center col-md-12" >
                        <pagination :resultData="resultData" @clicked="index" :mid-size="9"></pagination>
                    </div>
                </div>

            </div>
        </div>

        <AddUser :role-list="roleList"></AddUser>
    </div>
</template>

<script>

    import { EventBus } from './../../vue-assets';
    import AddUser from './AddUser.vue';
    import Pagination from  './../../components/Pagination.vue';

    export default {
        components: {
            AddUser,
            Pagination
        },

        props:['permissions','roleList'],

        data: function(){
            return {
                resultData: {},
                perPage: 10
            };
        },

        methods: {
                index(pageNo,perPage){
                    if(pageNo){ pageNo = pageNo; }else{pageNo = this.resultData.current_page; }
                    if(perPage){ perPage = perPage;}else{ perPage = this.perPage;}

                    axios.get(base_url+"user-registration/get/?page="+pageNo+"&perPage="+perPage).then((response) => {
                       this.resultData = response.data;
                    });
                },

                deleteData: function(id){
                    var _this = this;
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this file!",
                        icon: "warning",
                        showCancelButton: true,
                        buttons: {
                            cancel: {
                                text: "No, cancel pls!",
                                value: null,
                                visible: true,
                                className: "btn-warning",
                                closeModal: true,
                            },
                            confirm: {
                                text: "Yes, delete it!",
                                value: true,
                                visible: true,
                                className: "",
                                closeModal: true
                            }
                        }
                    }).then(isConfirm => {
                        if (isConfirm) {
                            axios.get(base_url+'user-registration/delete/'+id).then((response) => {
                                _this.index(1);
                                 _this.showMassage(response.data);
                            }).catch((error)=>{
                                 _this.showMassage(response.data);
                            });
                        }
                    });
                },

                showMassage(data) {
                    if (data.status == 'success') {
                        toastr.success(data.message, 'Success Alert', {timeOut: 5000});
                    } else {
                        toastr.error(data.message, 'Error Alert', {timeOut: 5000});
                    }
                },

                openUpdateModal(id){
                    EventBus.$emit('update-button-clicked', id);
                },

                changePerPage(){
                    var vm = this;
                    vm.index(1,vm.perPage);
                },

            },

            created() {
               var _this = this;
               _this.index(1);
                EventBus.$on('new-data-created', function () {
                    _this.index(1);
                });
            }

    }
</script>
