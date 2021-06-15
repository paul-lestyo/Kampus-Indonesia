<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Data Jurusan di Kampus {{ collegeWithMajor.name }}</div>

                    <div class="card-body">
                        <div class="form-group">
							<div class="table table-responsive">
								<table class="table">
									<tr>
										<th>Nama Jurusan</th>
										<th>Aksi</th>
									</tr>
									<tr v-for="major in collegeWithMajor.majors" :key="major.id" @click="goToMajor(major.id)">
										<td> {{ major.name }} </td>
										<td> Edit | Delete </td>
									</tr>
								</table>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
			return {
				collegeWithMajor: {}
			};
		},
		methods: {
			loadData() {
				this.$Progress.start();
				axios.get('/api/college/' + this.$route.params.kampusId).then((collegeWithMajor) => {
					this.collegeWithMajor = collegeWithMajor.data.data;
				});
				this.$Progress.finish();
			},
			goToMajor() {
				
			}
		},
		created() {
			this.loadData()
		}
    }
</script>
