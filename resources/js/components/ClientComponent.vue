<template>
    <div class="px-5">
        <div class="d-flex justify-content-center bg-dark">
            <h1 class="text-success">Friends Fun Teste</h1>
        </div>
        <button type="button" class="btn btn-primary m-3   " @click="modificar=false; abrirModal();" >
            Cadastrar Novo Cliente
        </button>
        <div class="modal modal-lg" :class="{mostrar:modal}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">{{tituloModal}}</h5>
                        
                    </div>
                    <div class="modal-body">
                            <div class="d-flex justify-content-center">
                             <!--   <img :src="this.client.avatar" alt="" width="100px"><img :src="imagenav" alt="" class="rounded-circle" width="30px">-->
                             <img :src="imagenav" alt="" class="rounded-circle" width="100px">
                            </div>    
                            <form class="row" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input v-model="client.nome" type="text" class="form-control" id="nome" placeholder="Fulano">
                                    <span class="text-danger" v-if="errores.nome">{{errores.nome[0]}}</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="sobrenome" class="form-label">Sobrenome</label>
                                    <input v-model="client.sobrenome" type="text" class="form-control" id="sobrenome" placeholder="de Tal">
                                    <span class="text-danger" v-if="errores.sobrenome">{{errores.sobrenome[0]}}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="NRG" class="form-label">RG</label>
                                    <input v-model="client.rg" type="text" class="form-control" id="NRG">
                                    <span class="text-danger" v-if="errores.rg">{{errores.rg[0]}}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="ntelefone" class="form-label">Telefone</label>
                                    <input v-model="client.telefone" type="text" class="form-control" id="ntelefone" placeholder="(61)123456789">
                                    <span class="text-danger" v-if="errores.telefone">{{errores.telefone[0]}}</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="Email" class="form-label">Email</label>
                                    <input v-model="client.email" type="email" class="form-control" id="Email" placeholder="fulano@exemplo.com">
                                    <span class="text-danger" v-if="errores.email">{{errores.email[0]}}</span>
                                </div>
                                <h3 class="py-3">Endereço</h3>
                                <div class="col-md-6">
                                    <label for="cep" class="form-label">CEP</label>
                                    <input v-model="client.cep" type="text" class="form-control" id="cep" >
                                    <span class="text-danger" v-if="errores.cep">{{errores.cep[0]}}</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="des_rua" class="form-label">Rua</label>
                                    <input v-model="client.rua" type="text" class="form-control" id="rua" >
                                    <span class="text-danger" v-if="errores.rua">{{errores.rua[0]}}</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="numero" class="form-label">Numero</label>
                                    <input v-model="client.numero" type="text" class="form-control" id="numero" >
                                    <span class="text-danger" v-if="errores.numero">{{errores.numero[0]}}</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="complemento" class="form-label">Complemento</label>
                                    <input v-model="client.complemento" type="text" class="form-control" id="complemento" >
                                </div>
                                <div class="col-md-6">
                                    <label for="barrio" class="form-label">Barrio</label>
                                    <input v-model="client.barrio" type="text" class="form-control" id="barrio">
                                    <span class="text-danger" v-if="errores.barrio">{{errores.barrio[0]}}</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input v-model="client.cidade" type="text" class="form-control" id="cidade">
                                    <span class="text-danger" v-if="errores.cidade">{{errores.cidade[0]}}</span>
                                </div>
                                <div>
                                    <input type="file" name="image" value="" @change="captureImg"  accept="image/*" ref="fileupload">
                                    
                                </div>
                                    
                            </form>                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="cerrarModal()">Fechar</button>
                        <button type="button" @click="salvar();" class="btn btn-success">{{dialogBtn}}</button>
                    </div>
                </div>
            </div>
        </div>  
        <div>
            <table class="table px-2 mx-2">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">RG</th>
                         
                        
                        <th scope="col" colspan="2" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr v-for="cl in Clients" :key ="cl.id">
                        <th scope="row">{{cl.id}}</th>
                        <td><img :src="cl.avatar" alt="" width="25px" height="auto"></td>
                        <td>{{cl.nome}}</td>
                        <td>{{cl.sobrenome}}</td>
                        <td>{{cl.rg}}</td>
                        
                        
                        <td>
                            <button class="btn btn-warning mx-auto" @click="modificar=true; abrirModal(cl);">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-danger mx-auto" @click="remover(cl.id);">Remover</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    
    data(){
        return{ 
            client:{
                nome:"",
                sobrenome:"",
                rg:"",
                telefone:"",
                email:"",
                avatar:null,
                cep:"",
                rua:"",
                numero:"",
                complemento:"",
                barrio:"",
                cidade:"",


            },
            imagenmn:"",
            id:0,
            modificar:true,
            modal:0,
            tituloModal:'',
            dialogBtn:'',
            Clients:[],
            errores:{},
        }
    },
    methods:{
        async list(){
            const resp = await axios.get('/Client');
            this.Clients = resp.data;
        },
        async remover(id){
            console.log(id);
            
            const resp = await axios.delete('/Client/'+id).then(
                res =>{
                    console.log(res.status);
                }
            ).catch(
                err=>{
                    console.log(err)
                }
            );
            
            this.list();
        },
        async salvar(){
            let data1=new FormData();
            data1.append('nome',this.client.nome);
            data1.append('sobrenome',this.client.sobrenome);
            data1.append('rg',this.client.rg);
            data1.append('telefone',this.client.telefone);
            data1.append('email',this.client.email);
            data1.append('cep',this.client.cep);
            data1.append('rua',this.client.rua);
            data1.append('numero',this.client.numero);
            data1.append('complemento',this.client.complemento);
            data1.append('barrio',this.client.barrio);
            data1.append('cidade',this.client.cidade);
            console.log(this.client.cidade);
            if(this.client.avatar===""){
                    this.client.avatar="/image/usericon.png"
                    console.log("hola")
                    data1.append('avatar',this.client.avatar);
                }
             data1.append('avatar',this.client.avatar);
             console.log(data1);
            try{
                if(this.modificar){
                    data1.append('_method','PUT');
                    console.log(this.id);
                    console.log(this.client);
                    const resp = await axios.post('/Client/'+this.id,data1)/*.then(
                    res =>{
                        console.log(res.data);
                    }
                    ).catch(
                    err=>{
                    console.log(err.reponse.data)
                    }
                    )*/;
            
                }
                else{
                
                    console.log(this.client.avatar);
                    const resp = await axios.post('/Client/',data1);
                    console.log(resp.data.json);
                    
                }
                this.cerrarModal();
                this.list();
            }catch(error){
                console.log(error.response.data);
                if(error.response.data){
                    this.errores=error.response.data.errors
                }
            }
            
            
        },
        abrirModal(data={}){
            this.modal=1;
            if(this.modificar){
                this.$refs.fileupload.value = null;
                this.tituloModal="Editar Dados do Cliente";
                this.dialogBtn="Salvar Mudanças";
                this.id=data.id;
                this.imagenmn=data.avatar;
                this.client.nome=data.nome;
                this.client.sobrenome=data.sobrenome;
                this.client.rg=data.rg;
                this.client.telefone=data.telefone;
                this.client.email=data.email;
                this.client.avatar=data.avatar;
                this.client.cep=data.cep;
                this.client.rua=data.rua;
                this.client.numero=data.numero;
                this.client.complemento=data.complemento;
                this.client.barrio=data.barrio;
                this.client.cidade=data.cidade;
            }
            else{
                this.$refs.fileupload.value = null;
                this.tituloModal="Cadastrar Cliente";
                this.dialogBtn="Salvar Cadastro";
                this.imagenmn="";
                this.id=0;
                this.client.nome="";
                this.client.sobrenome="";
                this.client.rg="";
                this.client.telefone="";
                this.client.email="";
                this.client.avatar="";
                this.client.cep="";
                this.client.rua="";
                this.client.numero="";
                this.client.complemento="";
                this.client.barrio="";
                this.client.cidade="";
            }

        },
        cerrarModal(){
            this.modal=0;
            this.errores={};        
        },
        captureImg(e){
            //this.client.avatar=e.target.files[0];
            var fi=e.target.files[0];
            this.client.avatar=fi;
            this.carregarImg(fi);
        },
        carregarImg(file){
            var reader = new FileReader;
            reader.onload=(e)=>{
                this.imagenmn=e.target.result;
            }
            reader.readAsDataURL(this.client.avatar);
        }
    },
    computed:{
        imagenav(){
           return this.imagenmn
        }
    },
    created(){
        this.list();
    },
}
</script>
<style>
.mostrar{
    display: list-item;
    opacity: 1;
    background: rgba(10, 3, 72,0.5);
}    
</style>