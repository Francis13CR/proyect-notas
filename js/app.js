//nuevo vue
var  vApp = new Vue({
    el: '#vApp',
    data: {
        showAdd: false,
        notaTitulo: '',
        notaDescripcion: '',
        notaFecha: '',
        notaColor: '',
        notas :[],
    },methods: {
        saveNote() {
            console.log('saveNote');
            this.notas.push({
                titulo: this.notaTitulo,
                descripcion: this.notaDescripcion,
                fecha: this.notaFecha,
                color: this.notaColor
            });
        }
        

    }
})

