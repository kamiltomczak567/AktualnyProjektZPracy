<template>
	<div class="component">
		<div v-for="item in items" class="gallery-item" :style='"background-image: url(/img/projects/thumb/"+item.thumb+")"'>
			<a class="transition" href="#" :title="item.name" @click.prevent="showEdit(item)"></a>
		</div>
		
		<div>
			<div class="button">
				<a href="#add" class="transition" @click.prevent="showAdd"><span v-if="saving">ZAPISYWANIE...</span><span v-else>DODAJ PROJEKT</span></a>
			</div>
		</div>

		<transition name="modal" ref="addModal">
			<div class="modal-wrapper" v-if="addModal">
				<div class="modal-mask" @click.prevent="addModal=false"></div>
				<div class="modal-container">
					<div class="modal-header">DODAJ PROJEKT</div>
					<div class="input-field name-field">
						<input type="text" v-model="selectedItem.name">
						<label class="active">Tytuł</label>
					</div>
					<div class="input-field name-field">
						<input type="text" v-model="selectedItem.description">
						<label class="active">Opis</label>
					</div>
					<div>Miniaturka:</div>
					<div class="modal-body">
						<picture-input 
						ref="thumbInput" 
						@change="onChangedThumb" 
						width="200" 
						height="200" 
						margin="16" 
						accept="image/jpeg,image/png" 
						size="10" 
						buttonClass="btn" 
						:hideChangeButton="true" 
						:crop="false" 
						:customStrings="{upload: '<h1>Upload</h1>', drag: 'Kliknij, lub przeciągnij i upuść zdjęcie'}" />
					</div>
					<div>Pełne zdjęcie:</div>
					<div class="modal-body">
						<picture-input 
						ref="pictureInput" 
						@change="onChanged" 
						width="300" 
						height="300" 
						margin="16" 
						accept="image/jpeg,image/png" 
						size="10" 
						buttonClass="btn" 
						:hideChangeButton="true" 
						:crop="false" 
						:customStrings="{upload: '<h1>Upload</h1>', drag: 'Kliknij, lub przeciągnij i upuść zdjęcie'}" />
					</div>
					<div class="button">
						<a href="#upload" class="transition" @click.prevent="create" v-if="(selectedItem.name!='') && newImage && newThumb"><span v-if="saving">ZAPISYWANIE...</span><span v-else>WYŚLIJ</span></a>
					</div>
					<div class="modal-footer">
					</div>
					<a href="#CLOSE" class="modal-close-button" @click.prevent="addModal=false">X</a>
				</div>
			</div>
		</transition>

		<transition name="modal" ref="removeModal">
			<div class="modal-wrapper" v-if="showEditModal">
				<div class="modal-mask" @click.prevent="showEditModal=false"></div>
				<div class="modal-container">
					<div class="modal-header">EDYCJA</div>
					<div class="modal-body">
						<div class="input-field name-field">
							<input type="text" v-model="selectedItem.name">
							<label class="active">Tytuł</label>
						</div>
						<div class="input-field name-field">
							<input type="text" v-model="selectedItem.description">
							<label class="active">Opis</label>
						</div>
						<div>Miniaturka:</div>
						<div class="gallery-item" :style='"background-image: url(/img/projects/"+selectedItem.thumb+")"'></div>
						<div>Pełne zdjęcie:</div>
						<div class="gallery-item" :style='"background-image: url(/img/projects/thumb/"+selectedItem.thumb+")"'></div>
					</div>
					<div class="modal-footer">
						<div class="button">
							<a href="#remove" class="transition" @click.prevent="remove"><span v-if="saving">ZAPISYWANIE...</span><span v-else>USUŃ</span></a>
						</div>
						<div class="button button-right">
							<a href="#save" class="transition" @click.prevent="edit(selectedItem)">ZAPISZ</a>
						</div>
					</div>
					<a href="#CLOSE" class="modal-close-button" @click.prevent="showEditModal=false">X</a>
				</div>
			</div>
		</transition>
	</div>
</template>

<script>
import PictureInput from 'vue-picture-input'

export default {
	components: {
		PictureInput
	},
	props: {
		projects: {},
	},
	data() {
		return {
			items: {},
			saving: false,
			addModal: false,
			showEditModal: false,
			selectedItem: {},
			selectedItemOrg: {},
			newImage: null,
			newThumb: null
		};
	},
	computed: {
	},
	created () {
		this.items = _.cloneDeep(this.projects)
	},
	mounted() {
	},
	methods: {
		showEdit(item) {
			this.showEditModal = true
			this.selectedItem = _.cloneDeep(item)
			this.selectedItemOrg = item
		},
		showAdd() {
			this.newImage = null
			this.addModal = true
			this.selectedItem = {
				'name': '',
				'description': ''
			}
		},
		remove() {
			if (this.selectedItemOrg.id) {
				axios({
					method: 'POST',
					url: '/admin/project/remove',
					dataType: 'JSON',
					data: {
						id: this.selectedItemOrg.id,
					},
				})
				.then( response => {
					if (response.data.status) {
						Materialize.toast('Usunięto!', 2000)
					} else {
						Materialize.toast('Błąd!', 2000)
					}
				})
				.catch(error => {
					Materialize.toast(error, 2000)
				});
			}

			let index = $.inArray(this.selectedItemOrg, this.items);
			if (index != -1) this.items.splice(index, 1);

			this.showEditModal = false
		},
		edit(item) {
			if (!this.saving) {
				this.saving = true
				axios({
					method: 'POST',
					url: '/admin/project/edit',
					dataType: 'JSON',
					data: {
						item: item
					},
				})
				.then( response => {
					if (response.data.status) {
						this.selectedItemOrg.name = response.data.item.name
						this.selectedItemOrg.description = response.data.item.description
						Materialize.toast('Zapisano!', 2000)
					} else {
						Materialize.toast('Błąd!', 2000)
					}
					this.saving = false
				})
				.catch(error => {
					Materialize.toast(error, 2000)
					this.saving = false
				});
				this.showEditModal = false
			}
		},
		create() {
			if (!this.saving) {
				this.saving = true
				var data = new FormData();
				data.append('image', this.newImage);
				data.append('thumb', this.newThumb);
				data.append('name', this.selectedItem.name);
				data.append('description', this.selectedItem.description);
				var config = {};
				axios.post('/admin/project/create', data, config)
				.then( response => {
					if (response.data.status) {
						Materialize.toast('Zapisano!', 2000)
						this.items.push(response.data.item)
						this.addModal = false
					} else {
						Materialize.toast('Błąd!', 2000)
					}
					this.saving = false
				})
				.catch(error => {
					Materialize.toast(error, 2000)
					this.saving = false
				});
			}
		},
		onChanged() {
			if (this.$refs.pictureInput.file) {
				this.newImage = this.$refs.pictureInput.file;
			} else {
				console.log("Old browser. No support for Filereader API");
			}
		},
		onChangedThumb() {
			if (this.$refs.thumbInput.file) {
				this.newThumb = this.$refs.thumbInput.file;
			} else {
				console.log("Old browser. No support for Filereader API");
			}
		},
	}
}
</script>

<style lang="scss" scoped>
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