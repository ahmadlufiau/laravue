<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Edit Ruangan</div>
                    <div class="card-body">
                    <form v-on:submit.prevent="saveForm()">
					  <div class="form-group">
					    <label>Nama Ruangan</label>
					    <input type="text" class="form-control" placeholder="Nama Ruangan" v-model="ruangan.namaruangan" required="">
					    <span v-if="errors.namaruangan" class="label label-danger"> {{ errors.nama[0]}}</span>
					  </div>
  						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
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
      	ruangan: {
        	namaruangan: '',
        },
        ruanganId : null,
        url: window.location.origin + (window.location.pathname).replace("home","ruangan"),
        errors: [],
        message: ''
      }
    },
    mounted()  {
    	var app = this;
    	this.ruanganId = this.$route.params.id;
    	axios.get(app.url+'/'+this.ruanganId+ '/edit')
    	.then((resp) => {
    		this.ruangan =  resp.data;
    	})
    	.catch((resp) => {
    		alert("Something Goes Wrong");    
    	});
    },
    methods: {
    	alert(pesan) {
        this.$swal({
          title: "Data Berhasil Diubah",
          text: pesan,
          icon: "success"
        });
    },
    saveForm(){
    	var newRuangan = this.ruangan;
        axios.patch(this.url + '/' + this.ruanganId, newRuangan)
        .then((resp) => {
        	this.alert('Berhasil Mengubah Ruangan ' + this.ruangan.namaruangan );
        	this.$router.replace('/ruangan/');
        })
        .catch((resp) =>{
        	if(resp.response.status == 500) alert('Something Goes Wrong');
          	this.errors = resp.response.data.errors;
          	console.log(resp);
        });
      }
    }
}
</script>
