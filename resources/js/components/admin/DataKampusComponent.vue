<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Kampus</h3>
            <div class="card-tools">
              <button class="btn btn-success" @click="showModal()">
                Tambah Data Kampus
              </button>
            </div>
          </div>

          <div class="card-body">
            <div class="form-group">
              <div class="table table-responsive">
                <table class="table table-hover">
                  <tr>
                    <th>Nama Kampus</th>
                    <th>Banyak Jurusan</th>
                    <th>Aksi</th>
                  </tr>
                  <tbody>
                    <tr
                      v-for="college in colleges"
                      :key="college.id"
					  @click="goToMajor(college.id)"
                    >
                      <td>{{ college.name }}</td>
                      <td>{{ college.majors_count }}</td>
                      <td>
						  <button class="btn btn-primary" @click.stop="showModalEdit(college)"><i class="fas fa-edit"></i></button>
						  <button class="btn btn-danger" @click.stop="deleteData(college.id)"><i class="fas fa-trash"></i></button> 
					   </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="modalKampus"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modalKampusCreate"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-show="!statusModal" class="modal-title" id="exampleModalLongTitle">
              Tambah Data Kampus
            </h5>
			<h5 v-show="statusModal" class="modal-title" id="exampleModalLongTitle">
              Update Data Kampus
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="statusModal ? ubahData() : simpanData()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  type="text"
                  v-model="form.name"
                  class="form-control"
                  placeholder="Nama Kampus"
                  :class="{ 'is-invalid': validations.name }"
                />
                <div v-if="validations.name">
                  <div v-for="validation in validations.name" :key="validation">
                    <p class="text-danger">{{ validation }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Close
              </button>
              <button type="submit" class="btn btn-primary" :disabled="disabled"> 
				  <i v-show="loading" class="fa fa-spinner fa-spin"></i> 
				   <span v-show="!statusModal">Simpan</span>
				   <span v-show="statusModal">Ubah</span>
				  </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      colleges: {},
      form: new Form({
        id: "",
        name: "",
      }),
      validations: {},
	  loading: false,
	  disabled: false,
	  statusModal: false,
    };
  },
  methods: {
    loadData() {
      axios.get("/api/college").then((colleges) => {
        this.colleges = colleges.data.data;
      });
    },
    goToMajor(id) {
      this.$router.push({ name: "dataJurusan", params: { kampusId: id } });
    },
    showModal() {
		this.statusModal = false;
		this.form.reset();
    	$("#modalKampus").modal("show");
    },
	showModalEdit(college) {
		this.statusModal = true;
		this.form.fill(college);
      	$("#modalKampus").modal("show");
    },
    simpanData() {
		this.$Progress.start();
		this.loading = true;
		this.disabled = true;
		this.form
			.post("/api/college", {
				headers: {
					Accept: "application/json",
					Authorization:
					"Bearer " + "18|A4beNLse14dubiBaTosjXgN5Ay45Cf7tdFVJohKY",
				},
			}).then(() => {
				Fire.$emit("refreshData");
				$("#modalKampus").modal("hide");
				Toast.fire({
					icon: "success",
					title: "Data Berhasil Tersimpan",
				});
				this.loading = false;
				this.disabled = false;
				this.$Progress.finish();
			})
			.catch((error) => {
				this.loading = false;
				this.disabled = false;
				this.$Progress.fail();
				this.validations = error.response.data.data;
			});
	},
	ubahData() {
		this.$Progress.start();
		this.loading = true;
		this.disabled = true;
		this.form.put("api/college/" + this.form.id, {
			headers: {
				Accept: "application/json",
				Authorization: "Bearer " + "18|A4beNLse14dubiBaTosjXgN5Ay45Cf7tdFVJohKY",
			}
		}).then(() => {
			Fire.$emit("refreshData");
			$("#modalKampus").modal("hide");
			Toast.fire({
				icon: "success",
				title: "Data Berhasil Terupdate"
			});
			this.$Progress.finish();
			this.loading = false;
			this.disabled = false;
		}).catch(() => {
			this.$Progress.fail();
			this.loading = false;
			this.disabled = false;
		});
	},
	deleteData(id) {
		Swal.fire({
			title: "Anda Yakin Ingin Menghapus Data Ini ?",
			text: "Klik Batal Untuk Membatalkan Penghapusan",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Hapus"
		}).then(result => {
			if (result.value) {
				this.form.delete("api/college/" + id, {
					headers: {
						Accept: "application/json",
						Authorization: "Bearer " + "18|A4beNLse14dubiBaTosjXgN5Ay45Cf7tdFVJohKY",
					}
				}).then(() => {
					Swal.fire(
						"Terhapus",
						"Data Anda Sudah Tehapus",
						"success"
					);
					Fire.$emit("refreshData");
				}).catch(() => {
					Swal.fire(
						"Gagal",
						"Data Gagal Terhapus",
						"warning"
					);
				});
			}
		});
	}
  },
  created() {
    this.loadData();
    Fire.$on("refreshData", () => {
      this.loadData();
    });
  },
};
</script>
