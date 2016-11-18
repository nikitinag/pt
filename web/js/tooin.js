$(document).ready(function(){

//Определение IE
var controlIE=0;
if(navigator.userAgent.search(/MSIE 8./) > 0) controlIE=1;


function id(element){return document.getElementById(element);};
var type=0;
//Выбор типа  
$('#list li').mouseup(function(){
    $('#calculator-result').html('');
    type=this.value;
    var myForm="";
    var Button="<button type='submit' id='work' class='btn btn-default btn active'>Расчитать</button>";
    if(controlIE==0){
      switch(type){
        case 1:myForm='<div class="input-group"><input type="text"  id="cluch1" class="form-control" placeholder="Введите диаметр" aria-describedby="basic-addon2"><span class="input-group-addon" id="basic-addon2">миллиметр</span></div>';break;
        case 2:myForm='<div class="input-group"><input type="text"  id="cluch1" class="form-control" placeholder="Номер шестигранника под ключ" aria-describedby="basic-addon2"><span class="input-group-addon" id="basic-addon2">номер</span></div>';break;
        case 3:myForm='<div class="input-group"><input type="text"  id="cluch1" class="form-control" placeholder="Толщина листа" aria-describedby="basic-addon2"><span class="input-group-addon" id="basic-addon2">миллиметр</span></div><div class="input-group"><input type="text"  id="cluch2" class="form-control" placeholder="Длинна листа" aria-describedby="basic-addon2"><span class="input-group-addon" id="basic-addon2">метр</span></div><div class="input-group"><input type="text"  id="cluch3" class="form-control" placeholder="Ширина листа" aria-describedby="basic-addon2"><span class="input-group-addon" id="basic-addon2">метр</span></div>';break;
        case 4:myForm='<div class="input-group"><input type="text"  id="cluch1" class="form-control" placeholder="Внешний диаметр" aria-describedby="basic-addon2"><span class="input-group-addon" id="basic-addon2">миллиметр</span></div><div class="input-group"><input type="text"  id="cluch2" class="form-control" placeholder="Толщина стенки" aria-describedby="basic-addon2"><span class="input-group-addon" id="basic-addon2">миллиметр</span></div>';break;
        case 5:myForm='<div class="input-group"><input type="text"  id="cluch1" class="form-control" placeholder="Сторона А" aria-describedby="basic-addon2"><span class="input-group-addon" id="basic-addon2">миллиметр</span></div><div class="input-group"><input type="text"  id="cluch2" class="form-control" placeholder="Сторона Б" aria-describedby="basic-addon2"><span class="input-group-addon" id="basic-addon2">миллиметр</span></div><div class="input-group"><input type="text"  id="cluch3" class="form-control" placeholder="Толщина стенки" aria-describedby="basic-addon2"><span class="input-group-addon" id="basic-addon2">миллиметр</span></div>';break;
        default:myForm="";break;
      }
    }else{
        //дл IE
      switch(type){
        case 1:myForm='<div class="input-group"><p>Введите диаметр в миллиметрах</p><input type="text"  id="cluch1" class="form-control" placeholder="Введите диаметр" aria-describedby="basic-addon2"></div>';break;
        case 2:myForm='<div class="input-group"><p>Номер шестигранника под ключ</p><input type="text"  id="cluch1" class="form-control" placeholder="Номер шестигранника под ключ" aria-describedby="basic-addon2"></div>';break;
        case 3:myForm='<div class="input-group"><p>Толщина листа в миллиметрах</p><input type="text"  id="cluch1" class="form-control" placeholder="Толщина листа" aria-describedby="basic-addon2"></div><div class="input-group"><p>Длинна листа в метрах</p><input type="text"  id="cluch2" class="form-control" placeholder="Длинна листа" aria-describedby="basic-addon2"></div><div class="input-group"><p>Ширина листа в метрах</p><input type="text"  id="cluch3" class="form-control" placeholder="Ширина листа" aria-describedby="basic-addon2"></div>';break;
        case 4:myForm='<div class="input-group"><p>Внешний диаметр в миллиметрах</p><input type="text"  id="cluch1" class="form-control" placeholder="Внешний диаметр" aria-describedby="basic-addon2"></div><div class="input-group"><p>Толщина стенки в миллиметрах</p><input type="text"  id="cluch2" class="form-control" placeholder="Толщина стенки" aria-describedby="basic-addon2"></div>';break;
        case 5:myForm='<div class="input-group"><p>Сторона А в миллиметрах</p><input type="text"  id="cluch1" class="form-control" placeholder="Сторона А" aria-describedby="basic-addon2"></div><div class="input-group"><p>Сторона Б в миллиметрах</p><input type="text"  id="cluch2" class="form-control" placeholder="Сторона Б" aria-describedby="basic-addon2"></div><div class="input-group"><p>Толщина стенки в миллиметрах</p><input type="text"  id="cluch3" class="form-control" placeholder="Толщина стенки" aria-describedby="basic-addon2"></div>';break;
        default:myForm="";break;
      }
      $("#calculator-form").addClass("calculator-form-IE");
    }
    
    
    
    
    $('#list li').removeClass('activeelement');
    $(this).addClass('activeelement');
    $("#calculator-form").html('<form action="#" method="get">'+myForm+Button+'</form>');
});
    
//Расчёт
$("#calculator-form").on("click",function(e){
    e.preventDefault();
    if(e.target.id=='work'){
        var result=new Array;
        var density=7.85;var pi=Math.PI;
        var number1=0;var number2=0;var number3=0;
        switch(type){
            case 1:number1=parseData(id('cluch1').value);result[0]='Вес 1 метра ';result[1]=number1*number1*density*pi/4000;break;
            case 2:number1=parseData(id('cluch1').value);result[0]='Вес 1 метра ';result[1]=number1*number1*density*0.87/1000;break;
            case 3:number1=parseData(id('cluch1').value);number2=parseData(id('cluch2').value);number3=parseData(id('cluch3').value);result[0]='Вес 1 листа ';result[1]=number1*number2*number3*density;break;
            case 4:number1=parseData(id('cluch1').value);number2=parseData(id('cluch2').value);result[0]='Вес 1 метра ';result[1]=(number1-number2)*number2*pi*density/1000;break;
            case 5:number1=parseData(id('cluch1').value);number2=parseData(id('cluch2').value);number3=parseData(id('cluch3').value);if(number3<number1&&number3<number2){result[0]='Вес 1 метра ';result[1]=(number1+number2-2*number3)*number3*0.0157;}else{result[1]=0;}break;
            default:result[1]=0;break;
        }
        if(isNaN(result[1])||result[1]<=0){
            $('#calculator-result').html("<span class='calculator-bad'>Неверно введены данные.</span>");
        }else{
            $('#calculator-result').html("<span class='calculator-good'>"+result[0]+Math.round(result[1]*40)/40+" кг.</span>");
        }
        $('#cluch1').focus();
    }
});

//Парсер
function parseData(i){   
    pd=parseFloat(i.replace(',','.'));
    return pd;
}
 
//Показ для мобильных устройств
$('#link-calculator').click(function(){
   $('#calculator').toggleClass('hidden-xs');
});


    
    
    
    
    
    
});