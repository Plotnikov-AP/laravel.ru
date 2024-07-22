class Pyatnashka {
    array=new Array();
    current;
    right_step = new Object({
        11 : [12, 21],
        12 : [11, 13, 22],
        13 : [12, 23],
        21 : [11, 22, 31],
        22 : [12, 21, 23, 32],
        23 : [13, 22, 33],
        31 : [21, 32],
        32 : [22, 31, 33],
        33 : [23, 32]
    });
    array_result= new Object({
        11 : 1,
        12 : 2,
        13 : 3,
        21 : 4,
        22 : 5,
        23 : 6,
        31 : 7,
        32 : 8,
        33 : 0
    });
    constructor(array) {
        this.array=array;
        this.current=23;
    }
    get_current() {
        return this.current;
    }
    set_current(current) {
        this.current=current;
    }
    get_array() {
        return this.array;
    }
    set_array(array) {
        this.array=array;
    }
    //первоначальная картинка
    show() {
        let array=this.get_array();
        for (let i=1; i<=3; i++) {
            for (let j=1; j<=3; j++) {
                if (array[i+''+j]==0) {
                   document.write('<div class="null" id="'+i+j+'"></div>');
                } else {
                    document.write('<div class="pyatnashka" id="'+i+j+'">'+array[i+''+j]+'</div>');
                }
            }
        }
    }
    //вызов ходов пятнашки
    hod() {
        let array=this.get_array();
        let current=this.get_current();
        let right_step=this.right_step;
        let array_result=this.array_result;
        for (let i=1; i<=3; i++) {
            for (let j=1; j<=3; j++) {
                let elem = document.getElementById(''+i+j);
                let id=Number(elem['id']);
                //обрабатываем событие click
                elem.onclick=function() {
                    if (id==current) {
                        Swal.fire('Такой ход невозможен!!!');
                    } else {
                        if (right_step[current].includes(id)) {
                            //ход возможен
                            //меняем значения двух div
                            document.getElementById(current).innerHTML=array[id];
                            document.getElementById(current).setAttribute('class', 'pyatnashka');
                            document.getElementById(id).innerHTML='';
                            document.getElementById(id).setAttribute('class', 'null');
                            //меняем элементы array местам
                            array[current]=array[id];
                            array[id]=0;
                            current=id;
                            if (JSON.stringify(array) === JSON.stringify(array_result)) {
                                Swal.fire('Вы выиграли!!! Молодец!!!');
                            }
                        } else {
                            Swal.fire('Такой ход невозможен!!!');
                        }
                    }
                }
            }
        }
    }
}

let array=new Object({
    11 : 3,
    12 : 5,
    13 : 8,
    21 : 7,
    22 : 1,
    23 : 0,
    31 : 6,
    32 : 2,
    33 : 4
});
pyatnashka= new Pyatnashka(array);
pyatnashka.show();
pyatnashka.hod();