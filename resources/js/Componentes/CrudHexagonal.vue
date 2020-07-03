<template>
    <div class="content">
        <div class="title m-b-md">
            <div class="row">
                <div class="col-12">
                    Crud con Arquitectura Hexagonal
                </div>
            </div>
        </div>
        <div class="formulario">
            <form action="" @submit.prevent="Guardar" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-5">
                        <input type="text" class="form-control" v-model="title" placeholder="First name">
                        <input type="hidden" class="form-control" v-model="id" placeholder="First name">
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" v-model="content" placeholder="Last name">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="title mt-5">
            <div class="row">
                <div class="col-12">
                    Listar Articulos
                </div>
            </div>
        </div>
        <div class="listado mt-5">
            <div class="row mt-1" v-for="articulo in articulos" :key="articulo.id">
                <div class="col-5">
                    <input type="text" class="form-control" v-model="articulo.title" placeholder="First name">
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" v-model="articulo.content"placeholder="Last name">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CrudHexagonal",
        data() {
            return {
                id: '',
                title: '',
                content: '',
                articulos: [
                    {
                        id: 1,
                        title: 'Probando',
                        content: 'El contenido del articulo'
                    },
                    {
                        id: 2,
                        title: 'Probando 2',
                        content: 'El contenido del articulo 2'
                    },
                ]
            }
        },
        methods: {
            Guardar() {
                let formData = new FormData();
                formData.append("id", this.id);
                formData.append("title", this.title);
                formData.append("content", this.content);

                axios.post('/store', formData).then((response) => {
                    let mensaje = response.data.message;
                    this.$toast.success({
                        title: 'Éxito',
                        message: mensaje,
                    });
                });
            },
        },
    }
</script>

<style>

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .formulario > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .listado > a {
        color: #636b6f;
        padding: 0 25px;
        margin-top: 1500px;
        font-size: 10px;
        font-weight: 400;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
