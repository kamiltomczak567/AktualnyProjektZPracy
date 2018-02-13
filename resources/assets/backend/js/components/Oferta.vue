<template>
	<div class="component">

		<h4>Zdjęcie 1</h4>
		<div class="row">
			<div class="col l6 s12">
				<div>Miniaturka</div>
				<picture-input 
				ref="thumbInput1" 
				@change="onChangedThumb1" 
				width="200" 
				height="200" 
				margin="16" 
				accept="image/jpeg,image/png" 
				size="10" 
				buttonClass="btn" 
				:hideChangeButton="true" 
				:crop="false" 
				prefill="/img/offer/1_thumb.jpg" 
				:customStrings="{upload: '<h1>Upload</h1>', drag: 'Kliknij, lub przeciągnij i upuść zdjęcie'}" />
				<div class="button">
					<a v-if="thumb1" href="#zapisz" class="transition" @click.prevent="sendThumb1"><span v-if="savingThumb1">ZAPISYWANIE...</span><span v-else>ZAPISZ</span></a>
				</div>
			</div>
			<div class="col l6 s12">
				<div>Zdjęcie</div>
				<picture-input 
				ref="imageInput1" 
				@change="onChangedImage1" 
				width="200" 
				height="200" 
				margin="16" 
				accept="image/jpeg,image/png" 
				size="10" 
				buttonClass="btn" 
				:hideChangeButton="true" 
				:crop="false" 
				prefill="/img/offer/1.jpg" 
				:customStrings="{upload: '<h1>Upload</h1>', drag: 'Kliknij, lub przeciągnij i upuść zdjęcie'}" />
				<div class="button">
					<a v-if="image1" href="#zapisz" class="transition" @click.prevent="sendImage1"><span v-if="savingImage1">ZAPISYWANIE...</span><span v-else>ZAPISZ</span></a>
				</div>
			</div>
		</div>

		<h4>Zdjęcie 2</h4>
		<div class="row">
			<div class="col l6 s12">
				<div>Miniaturka</div>
				<picture-input 
				ref="thumbInput2" 
				@change="onChangedThumb2" 
				width="200" 
				height="200" 
				margin="16" 
				accept="image/jpeg,image/png" 
				size="10" 
				buttonClass="btn" 
				:hideChangeButton="true" 
				:crop="false" 
				prefill="/img/offer/2_thumb.jpg" 
				:customStrings="{upload: '<h1>Upload</h1>', drag: 'Kliknij, lub przeciągnij i upuść zdjęcie'}" />
				<div class="button">
					<a v-if="thumb2" href="#zapisz" class="transition" @click.prevent="sendThumb2"><span v-if="savingThumb2">ZAPISYWANIE...</span><span v-else>ZAPISZ</span></a>
				</div>
			</div>
			<div class="col l6 s12">
				<div>Zdjęcie</div>
				<picture-input 
				ref="imageInput2" 
				@change="onChangedImage2" 
				width="200" 
				height="200" 
				margin="16" 
				accept="image/jpeg,image/png" 
				size="10" 
				buttonClass="btn" 
				:hideChangeButton="true" 
				:crop="false" 
				prefill="/img/offer/2.jpg" 
				:customStrings="{upload: '<h1>Upload</h1>', drag: 'Kliknij, lub przeciągnij i upuść zdjęcie'}" />
				<div class="button">
					<a v-if="image2" href="#zapisz" class="transition" @click.prevent="sendImage2"><span v-if="savingImage2">ZAPISYWANIE...</span><span v-else>ZAPISZ</span></a>
				</div>
			</div>
		</div>

	</div>
</template>

<script>
import PictureInput from 'vue-picture-input'

export default {
	components: {
		PictureInput
	},
	props: {
	},
	data() {
		return {
			thumb1: null,
			image1: null,
			thumb2: null,
			image2: null,
			savingThumb1: false,
			savingImage1: false,
			savingThumb2: false,
			savingImage2: false
		};
	},
	computed: {
	},
	created () {

	},
	mounted() {
	},
	methods: {
		onChangedThumb1() {
			if (this.$refs.thumbInput1.file) {
				this.thumb1 = this.$refs.thumbInput1.file;
			} else {
				console.log("Old browser. No support for Filereader API");
			}
		},
		onChangedImage1() {
			if (this.$refs.imageInput1.file) {
				this.image1 = this.$refs.imageInput1.file;
			} else {
				console.log("Old browser. No support for Filereader API");
			}
		},
		onChangedThumb2() {
			if (this.$refs.thumbInput2.file) {
				this.thumb2 = this.$refs.thumbInput2.file;
			} else {
				console.log("Old browser. No support for Filereader API");
			}
		},
		onChangedImage2() {
			if (this.$refs.imageInput2.file) {
				this.image2 = this.$refs.imageInput2.file;
			} else {
				console.log("Old browser. No support for Filereader API");
			}
		},
		sendThumb1() {
			if (!this.savingThumb1) {
				this.savingThumb1 = true
				var data = new FormData();
				data.append('image', this.thumb1);
				data.append('name', "1_thumb.jpg");
				var config = {};
				axios.post('/admin/oferta/upload/thumb', data, config)
				.then( response => {
					if (response.data.status) {
						Materialize.toast('Zapisano!', 2000)
					} else {
						Materialize.toast('Błąd!', 5000)
					}
					this.savingThumb1 = false
				})
				.catch(error => {
					Materialize.toast(error, 5000)
					this.savingThumb1 = false
				});
			}
		},
		sendImage1() {
			if (!this.savingImage1) {
				this.savingImage1 = true
				var data = new FormData();
				data.append('image', this.image1);
				data.append('name', "1.jpg");
				var config = {};
				axios.post('/admin/oferta/upload/image', data, config)
				.then( response => {
					if (response.data.status) {
						Materialize.toast('Zapisano!', 2000)
					} else {
						Materialize.toast('Błąd!', 5000)
					}
					this.savingImage1 = false
				})
				.catch(error => {
					Materialize.toast(error, 5000)
					this.savingImage1 = false
				});
			}
		},
		sendThumb2() {
			if (!this.savingThumb2) {
				this.savingThumb2 = true
				var data = new FormData();
				data.append('image', this.thumb2);
				data.append('name', "2_thumb.jpg");
				var config = {};
				axios.post('/admin/oferta/upload/thumb', data, config)
				.then( response => {
					if (response.data.status) {
						Materialize.toast('Zapisano!', 2000)
					} else {
						Materialize.toast('Błąd!', 5000)
					}
					this.savingThumb2 = false
				})
				.catch(error => {
					Materialize.toast(error, 5000)
					this.savingThumb2 = false
				});
			}
		},
		sendImage2() {
			if (!this.savingImage2) {
				this.savingImage2 = true
				var data = new FormData();
				data.append('image', this.image2);
				data.append('name', "2.jpg");
				var config = {};
				axios.post('/admin/oferta/upload/image', data, config)
				.then( response => {
					if (response.data.status) {
						Materialize.toast('Zapisano!', 2000)
					} else {
						Materialize.toast('Błąd!', 5000)
					}
					this.savingImage2 = false
				})
				.catch(error => {
					Materialize.toast(error, 5000)
					this.savingImage2 = false
				});
			}
		}
	}
}
</script>

<style lang="scss" scoped>

h4 {
	margin-top: 100px;
}
.component {
	text-align: center;
	.gallery-item {
		display: inline-block;
		width: 200px;
		height: 140px;
		border: 2px solid #000;
		margin: 20px;
		background-size: cover;
		background-position: center center;

		a {
			display: inline-block;
			width: 100%;
			height: 100%;
			background-color: #fff;
			opacity: 0;

			&:hover {
				opacity: 0.25;
			}
		}
	}
}
.modal-container {
	background: rgb(61, 66, 71);
	color:#fff;
	.modal-footer {
		text-align: left;
	}
}

.button {
	margin: 10px;
	display: inline-block;
	font-size: 14px;
	font-weight: 700;
	background-color: #f7ea5d;
	min-height: 45px;
	a {
		display: block;
		padding: 12px 20px;
		color: #000;
		&:hover {
			background-color: #ffca58;
		}
	}
	&.canceled {
		background-color: #ff3333;
	}
	&.button-right {
		float: right;
	}
}
</style>