<template>
    <div>
        <!-- Add Model-->
        <div class="modal fade text-left" id="addModel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary  white">
                        <h4 class="modal-title" id="myModalLabel9"> <b>Add Role</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                     <form method="POST"  enctype="multipart/form-data" v-on:submit.prevent="store">
                        <div class="modal-body">
                            <div class="form-group" :class="{'has-danger': (errors.hasOwnProperty('role_name'))}">
                                <label><b>Role Name</b><span class="requiredField">*</span></label>
                                <input type="text" v-model="form.role_name" placeholder="Enter Role Name" class="form-control">
                                <div class="requiredField" v-if="(errors.hasOwnProperty('role_name'))">{{ (errors.hasOwnProperty('role_name')) ? errors.role_name[0] :'' }}</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><i class="fa fa-refresh"></i> <b>Close</b></button>
                            <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1"><i class="fa fa-check"></i> <b>Save</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Model-->
        <div class="modal fade text-left" id="editModel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary  white">
                        <h4 class="modal-title" id="myModalLabel9"> <b>Edit Role</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST"  enctype="multipart/form-data" v-on:submit.prevent="update(form.role_id)">
                        <div class="modal-body">
                            <div class="form-group" :class="{'has-danger': (errors.hasOwnProperty('role_name'))}">
                                <label><b>Role Name</b><span class="requiredField">*</span></label>
                                <input type="text" v-model="form.role_name" placeholder="Enter Role Name" class="form-control">
                                <div class="requiredField" v-if="(errors.hasOwnProperty('role_name'))">{{ (errors.hasOwnProperty('role_name')) ? errors.role_name[0] :'' }}</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><i class="fa fa-refresh"></i> <b>Close</b></button>
                            <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1"><i class="fa fa-pencil-square-o"></i> <b>Update</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { EventBus } from './../../vue-assets';

    export default {

        data:function(){
            return{
                form:{
                    role_name: ''
                },
                errors: {},
            };
        },

        methods:{
            store:function(){
                axios.post(base_url+'role/store', this.form).then( (response) => {
                    $('#addModel').modal('hide');
                    this.showMassage(response.data);
                    EventBus.$emit('new-data-created');
                })
                .catch(error => {
                    if(error.response.status == 422){
                        this.errors = error.response.data.errors;
                    }else{
                        this.showMassage(error);
                    }
                });
            },

            update:function (id) {
                axios.put(base_url+'role/update/'+id, this.form).then( (response) => {
                    $('#editModel').modal('hide');
                    this.showMassage(response.data);
                    EventBus.$emit('new-data-created');
                })
                .catch(error => {
                    if(error.response.status == 422){
                        this.errors = error.response.data.errors;
                    }else{
                        this.showMassage(error);
                    }
                });
            },

            showMassage(data){
                if(data.status == 'success'){
                    toastr.success(data.message, 'Success');
                }else if(data.status == 'error'){
                    toastr.error(data.message, 'Error');
                }else{
                    toastr.error(data.message, 'Error');
                }
            },

        },

        mounted(){
           var _this = this;
           $('#addModel,#editModel').on('hidden.bs.modal', function(){
               _this.errors = {};
               _this.form = {'role_name':''};
           });

            EventBus.$on('update-button-clicked', (id) => {
                _this.errors = {};
                $('#editModel').modal("show");
                axios.get(base_url+'role/edit/'+id).then((response) => {
                    _this.form = response.data.data;
                });
            });

        },

        created(){

        }

    }
</script>