<template>
	<div>
		<div class="input-field">
			<input v-if="options.type==1" type="text" v-model="itemData.value" :class="{ notsaved: (itemData.value!=itemOrg.value), notvalid: (itemData.value=='') }" :required="options.required" @keyup.enter.prevent="save">
			<textarea v-if="options.type==2" class="materialize-textarea" v-model="itemData.value" :class="{ notsaved: (itemData.value!=itemOrg.value), notvalid: (itemData.value=='') }" :required="options.required"></textarea>
			<!-- <label :data-error="options.error" :data-success="options.ok">{{ options.description }}</label> -->
			<label>{{ options.description }}</label>
			<transition name="fade" mode="out-in">
				<i class="material-icons transition reload" @click.prevent="reload" title="Odrzuć" v-if="itemData.value!=itemOrg.value && !saving">cancel</i>
			</transition>
			<transition name="fade" mode="out-in">
				<i class="material-icons transition save" @click.prevent="save" title="Zapisz" v-if="!saving && itemData.value!=itemOrg.value">save</i>
				<i class="material-icons transition save loading" title="Zapisz" v-if="saving">loop</i>
			</transition>
		</div>
	</div>
</template>
<script>

export default {
	components: {
	},
	props: {
		item: {},
		options: {}
	},
	data() {
		return {
			itemOrg: {},
			itemData: {},
			saving: false
		};
	},
	computed: {
	},
	created () {
		this.itemOrg = _.cloneDeep(this.item)
		this.itemData = _.cloneDeep(this.item)
	},
	mounted() {
	},
	methods: {
		reload() {
			this.itemData.value=this.itemOrg.value
		},
		save() {
			if (this.saving == false && this.itemData.value!=this.itemOrg.value) {
				if (this.options.required && this.itemData.value=='') {
					return
				}

				this.saving = true
				axios({
					method: 'POST',
					url: '/admin/setting/change',
					dataType: 'JSON',
					data: {
						id: this.itemData.id,
						value: this.itemData.value
					},
				})
				.then( response => {
					if (response.data.status) {
						this.itemOrg = _.cloneDeep(this.itemData)
						this.saving = false
						Materialize.toast('Zapisano!', 2000)
					} else {
						Materialize.toast('Błąd!', 2000)
					}
				})
				.catch(error => {
					this.saving = false
					Materialize.toast(error, 2000)
				});
			}
		}
	}
}
</script>

<style lang="scss" scoped>
.input-field {
	margin: 30px auto;
	.reload {
		position: absolute;
		top: 0;
		right: 32px;
		cursor: pointer;
		&:hover {
			color: #f7e813;
		}
	}
	.save {
		position: absolute;
		top: 0;
		right: 0;
		cursor: pointer;
		&:hover {
			color: #f7e813;
		}
	}
}
</style>