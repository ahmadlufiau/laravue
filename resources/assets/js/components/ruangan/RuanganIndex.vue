<template>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Data Ruangan</div>
                    <div class="card-body">
                        <div class="form-group">
                            <router-link :to="{name: 'CreateRuangan'}" class="btn btn-md btn-primary"> 
                            Tambah Ruangan
                            </router-link>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Pencarian ..." v-model="pencarian">
                        </div>
                        <table class="table">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Option</th>
                            </tr>
                          </thead>
                          <tbody v-if="ruangan.length">
                            <tr v-for="items,index in ruangan">
                              <th>{{ items.id }}</th>
                              <td>{{ items.namaruangan }}</td>
                              <td>
                                <router-link :to="{name:'EditRuangan' ,params:{id: items.id}}" class="btn btn-xs btn-primary">Edit</router-link>
                                <button class="btn btn-xs btn-danger" v-on:click="konfirmasiHapus(items.id,index,items.namaruangan)">Hapus</button>
                              </td>
                            </tr>
                          </tbody>
                          <tbody v-else>
                            <tr>
                                <td colspan="2"><center>Tidak Ada Data</center></td>
                            </tr>
                          </tbody>
                        </table>
                        <vue-pagination :data="ruanganData" v-on:pagination-change-page="getResults" :limit="4">
                        </vue-pagination>
                        <vue-simple-spinner v-if="loading" message="Loading..."></vue-simple-spinner>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data: function() {
        return {
            ruangan: [],
            ruanganData: {},
            url: window.location.origin + (window.location.pathname).replace("home","ruangan"),
            pencarian: '',
            loading: true
        }
    },
    mounted() {
        var app = this;
        app.getResults();
    },
    watch: {
        pencarian: function(newSearch) {
            this.getHasilPencarian();
        }  
    },
    methods: {
        getResults(page){
        var app = this;
        if(typeof page == 'undefined'){
            page = 1;
        }
        axios.get(app.url + '/view?page=' + page)
        .then(function(resp){
            app.ruangan = resp.data.data;
            app.ruanganData = resp.data;
            app.loading = false;
        })
        .catch(function(resp){
            console.log(resp);
            app.loading = false;
        })
      },
      getHasilPencarian(page) {  
        var app = this;
        if(typeof page == 'undefined') {
            page = 1;
        }
        axios.get(app.url + '/search?q='+app.pencarian+'&page=' + page)
        .then(function(resp) {
            app.ruangan = resp.data.data;
            app.ruanganData = resp.data;
            app.loading = false;
        })
        .catch(function(resp){
            console.log(resp);
            app.loading = false;
        })
      },
      deleteEntry(id,index,namaRuangan){
          axios.delete(this.url + '/' + id)
          .then((resp) => {
            this.getResults();
            this.alert("Data Berhasil Menghapus","Berhasil Menghapus Ruangan " + namaRuangan);
          })
          .catch((resp) =>{
            alert("Something Goes Wrong")
            console.log(resp);
          })
      },
      konfirmasiHapus(id,index,namaRuangan){
        this.$swal({
          title: "Yakin Ingin Menghapus Ruangan " + namaRuangan + "?",
          text: "Data yang di hapus tidak akan bisa di kembalikan lagi",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            this.deleteEntry(id,index,namaRuangan);
          }
        })  
      },
      alert(title,pesan){
        this.$swal({
          title: title,
          text: pesan,
          icon: "success"
        });
      }
    }
}
</script>