<template>
    <div>
        <!-- Add Model-->
        <div class="modal fade text-left" id="addModel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary  white">
                        <h4 class="modal-title"> <b>Add User</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                     <form method="POST"  enctype="multipart/form-data" v-on:submit.prevent="store">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6" :class="{'has-danger': (errors.hasOwnProperty('name'))}">
                                    <label><b>Name</b><span class="requiredField">*</span></label>
                                    <input type="text" v-model="form.name" placeholder="Enter Name" class="form-control">
                                    <div class="requiredField" v-if="(errors.hasOwnProperty('name'))">{{ (errors.hasOwnProperty('name')) ? errors.name[0] :'' }}</div>
                                </div>
                                <div class="form-group col-md-6" :class="{'has-danger': (errors.hasOwnProperty('email'))}">
                                    <label>Email</label>
                                    <input type="text" v-model="form.email" placeholder="Enter Email" class="form-control">
                                    <div class="requiredField" v-if="(errors.hasOwnProperty('email'))">{{ (errors.hasOwnProperty('email')) ? errors.email[0] :'' }}</div>
                                </div>
                                <div class="form-group col-md-6" :class="{'has-danger': (errors.hasOwnProperty('username'))}">
                                    <label><b>Username</b><span class="requiredField">*</span></label>
                                    <input type="text" v-model="form.username" placeholder="Enter Username" class="form-control">
                                    <div class="requiredField" v-if="(errors.hasOwnProperty('username'))">{{ (errors.hasOwnProperty('username')) ? errors.username[0] :'' }}</div>
                                </div>
                                <div class="form-group col-md-6" :class="{'has-danger': (errors.hasOwnProperty('role_id'))}">
                                    <label><b>Role</b><span class="requiredField">*</span></label>
                                    <select class="form-control" v-model="form.role_id">
                                        <option value="">--- Select Role ---</option>
                                        <option :value="value.role_id" v-for="(value, index) in roleList" v-text="value.role_name">Active</option>
                                    </select>
                                    <div class="requiredField" v-if="(errors.hasOwnProperty('role_id'))">{{ (errors.hasOwnProperty('role_id')) ? errors.role_id[0] :'' }}</div>
                                </div>
                                <div class="form-group col-md-6" :class="{'has-danger': (errors.hasOwnProperty('password'))}">
                                    <label><b>Password</b><span class="requiredField">*</span></label>
                                    <input type="password" v-model="form.password" placeholder="Enter Password" class="form-control">
                                    <div class="requiredField" v-if="(errors.hasOwnProperty('password'))">{{ (errors.hasOwnProperty('password')) ? errors.password[0] :'' }}</div>
                                </div>
                                <div class="form-group col-md-6" :class="{'has-danger': (errors.hasOwnProperty('password_confirmation'))}">
                                    <label><b>Confirm Password</b><span class="requiredField">*</span></label>
                                    <input type="password" v-model="form.password_confirmation" placeholder="Enter Confirm Password" class="form-control">
                                    <div class="requiredField" v-if="(errors.hasOwnProperty('password_confirmation'))">{{ (errors.hasOwnProperty('password_confirmation')) ? errors.password_confirmation[0] :'' }}</div>
                                </div>
                                <div class="form-group col-md-6" :class="{'has-danger': (errors.hasOwnProperty('status'))}">
                                    <label><b>Status</b><span class="requiredField">*</span></label>
                                    <select class="form-control" v-model="form.status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <div class="requiredField" v-if="(errors.hasOwnProperty('status'))">{{ (errors.hasOwnProperty('status')) ? errors.status[0] :'' }}</div>
                                </div>
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
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary  white">
                        <h4 class="modal-title"> <b>Edit User</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST"  enctype="multipart/form-data" v-on:submit.prevent="update(form.role_id)">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6" :class="{'has-danger': (errors.hasOwnProperty('name'))}">
                                    <label><b>Name</b><span class="requiredField">*</span></label>
                                    <input type="text" v-model="form.name" placeholder="Enter Name" class="form-control">
                                    <div class="requiredField" v-if="(errors.hasOwnProperty('name'))">{{ (errors.hasOwnProperty('name')) ? errors.name[0] :'' }}</div>
                                </div>
                                <div class="form-group col-md-6" :class="{'has-danger': (errors.hasOwnProperty('email'))}">
                                    <label><b>Email</b></label>
                                    <input type="text" v-model="form.email" placeholder="Enter Email" class="form-control">
                                    <div class="requiredField" v-if="(errors.hasOwnProperty('email'))">{{ (errors.hasOwnProperty('email')) ? errors.email[0] :'' }}</div>
                                </div>
                                <div class="form-group col-md-6" :class="{'has-danger': (errors.hasOwnProperty('username'))}">
                                    <label><b>Username</b><span class="requiredField">*</span></label>
                                    <input type="text" v-model="form.username" placeholder="Enter Username" class="form-control">
                                    <div class="requiredField" v-if="(errors.hasOwnProperty('username'))">{{ (errors.hasOwnProperty('username')) ? errors.username[0] :'' }}</div>
                                </div>
                                <div class="form-group col-md-6" :class="{'has-danger': (errors.hasOwnProperty('role_id'))}">
                                    <label><b>Role</b><span class="requiredField">*</span></label>
                                    <select class="form-control" v-model="form.role_id">
                                        <option value="">--- Select Role ---</option>
                                        <option :value="value.role_id" v-for="(value, index) in roleList" v-text="value.role_name">Active</option>
                                    </select>
                                    <div class="requiredField" v-if="(errors.hasOwnProperty('role_id'))">{{ (errors.hasOwnProperty('role_id')) ? errors.role_id[0] :'' }}</div>
                                </div>
                                <div class="form-group col-md-6" :class="{'has-danger': (errors.hasOwnProperty('status'))}">
                                    <label><b>Status</b><span class="requiredField">*</span></label>
                                    <select class="form-control" v-model="form.status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <div class="requiredField" v-if="(errors.hasOwnProperty('status'))">{{ (errors.hasOwnProperty('status')) ? errors.status[0] :'' }}</div>
                                </div>
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
        props:['roleList'],
        data:function(){
            return{
                form:{
                    role_id: '',
                    name: '',
                    username: '',
                    password: '',
                    password_confirmation: '',
                    email: '',
                    status: '1',
                },
                errors: {},
            };
        },

        methods:{
            store:function(){
                axios.post(base_url+'user-registration/store', this.form).then( (response) => {
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
                axios.put(base_url+'user-registration/update/'+id, this.form).then( (response) => {
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
               _this.form = {
                   role_id: '',
                   name: '',
                   username: '',
                   password: '',
                   password_confirmation: '',
                   email: '',
                   status: '1',
               };
           });

            EventBus.$on('update-button-clicked', (id) => {
                _this.errors = {};
                $('#editModel').modal("show");
                axios.get(base_url+'user-registration/edit/'+id).then((response) => {
                    _this.form = response.data.data;
                    console.log(response.data.data);
                });
            });

        },

        created(){

        }

    }
</script>