<template>
    <div class="app">
        <div class="heading">
        </div>
        <CrudComponent
        v-for="(crud, index) in cruds"
        v-bind="crud"
        :key="crud.id"
        @update="update"
        @delete="del"
        ></CrudComponent>
        <div>
            <button @click="create()">+</button>
        </div>
    </div>
</template>

<script>
    import CrudComponent from "./CrudComponent"
    import {
        index,
        add,
        modify,
        remove
    } from "../request/request"


    // function Crud({id, color, name}) {
    //     this.id = id;
    //     this.color = color;
    //     this.name = name;
    // }

    export default {
        data() {
            return {
                cruds: []
            }
        },
        methods: {
            create() {
                add().then(data => {
                    this.cruds.push(data.data);
                });
            },
            read() {
                index().then(data => {
                    this.cruds = data.data;
                });
            },
            update(id, color) {
                modify({id:id,color:color}).then(() => {
                    this.cruds.find(crud => crud.id === id).color = color;
                });
            },
            del(id) {
                remove({id:id}).then(() => {
                    let index = this.cruds.findIndex(crud => crud.id === id);
                    this.cruds.splice(index, 1);
                });
            },
            mounted() {
                this.read();
            },
        },
        mounted() {
            this.read();
        },
        components: {
            CrudComponent
        }
    }
</script>
