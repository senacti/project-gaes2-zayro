
const app = new Vue({
	el: "#app",
	data: {
		items: [
			{ name: "Hombre araña", cost: 130000, quantity: 1 },
			{ name: "Hulk", cost: 120000, quantity: 1 },
			{ name: "Enfermera", cost: 150000, quantity: 1 }]
	},

	methods: {
		addItem() {
			this.items.push({
				name: "disfraz",
				cost: 0,
				quantity: 1
			});

		},
		removeItem(index) {
			this.items.splice(index, 1);
		}
	},

	computed: {
		subTotal() {
			return this.items.reduce((accumulate, item) => accumulate + item.cost * item.quantity, 0);
		},
		salesTax() {
			return this.subTotal * 0.08875;
		},
		totalDue() {
			return this.subTotal + this.salesTax;
		}
	},

	filters: {
		currency(value) {
			return value.toFixed(2);
		}
	}
});