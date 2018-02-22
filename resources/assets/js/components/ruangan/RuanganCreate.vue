<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Tambah Ruangan</div>
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
    			namaruangan: ''
        },
        url: window.location.origin + (window.location.pathname).replace("home","ruangan"),
        errors: [],
        message: ''
      }
    },
    mounted()  {
    	var app = this;
    },
    methods: {
    	alert(pesan){
    		this.$swal({
    			title: "Data Berhasil Ditambah",
    			text: pesan,
    			icon: "success"
    		});
    	},
    	saveForm(){
    		var newRuangan = this.ruangan;
    		axios.post(this.url,newRuangan)
    		.then((resp) => {
    			this.alert('Berhasil Menambah ' + this.ruangan.namaruangan );
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