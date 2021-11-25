var turnoverOfJanuaryOfSchool = document.getElementById('turnoverOfJanuaryOfSchool');
var turnoverOfFebruaryOfSchool = document.getElementById('turnoverOfFebruaryOfSchool');
var turnoverOfMarchOfSchool = document.getElementById('turnoverOfMarchOfSchool');
var turnoverOfAprilOfSchool = document.getElementById('turnoverOfAprilOfSchool');
var turnoverOfMayOfSchool = document.getElementById('turnoverOfMayOfSchool');
var turnoverOfJuneOfSchool = document.getElementById('turnoverOfJuneOfSchool');
var turnoverOfJuilyOfSchool = document.getElementById('turnoverOfJuilyOfSchool');
var turnoverOfAugustOfSchool = document.getElementById('turnoverOfAugustOfSchool');
var turnoverOfSeptemberOfSchool = document.getElementById('turnoverOfSeptemberOfSchool');
var turnoverOfOctoberOfSchool = document.getElementById('turnoverOfOctoberOfSchool');
var turnoverOfNovemberOfSchool = document.getElementById('turnoverOfNovemberOfSchool');
var turnoverOfDecemberOfSchool = document.getElementById('turnoverOfDecemberOfSchool');


var turnoverOfJanuaryOfStudio = document.getElementById('turnoverOfJanuaryOfStudio');
var turnoverOfFebruaryOfStudio = document.getElementById('turnoverOfFebruaryOfStudio');
var turnoverOfMarchOfStudio = document.getElementById('turnoverOfMarchOfStudio');
var turnoverOfAprilOfStudio = document.getElementById('turnoverOfAprilOfStudio');
var turnoverOfMayOfStudio = document.getElementById('turnoverOfMayOfStudio');
var turnoverOfJuneOfStudio = document.getElementById('turnoverOfJuneOfStudio');
var turnoverOfJuilyOfStudio = document.getElementById('turnoverOfJuilyOfStudio');
var turnoverOfAugustOfStudio = document.getElementById('turnoverOfAugustOfStudio');
var turnoverOfSeptemberOfStudio = document.getElementById('turnoverOfSeptemberOfStudio');
var turnoverOfOctoberOfStudio = document.getElementById('turnoverOfOctoberOfStudio');
var turnoverOfNovemberOfStudio = document.getElementById('turnoverOfNovemberOfStudio');
var turnoverOfDecemberOfStudio = document.getElementById('turnoverOfDecemberOfStudio');


var turnoverOfJanuaryOfOther = document.getElementById('turnoverOfJanuaryOfOther');
var turnoverOfFebruaryOfOther = document.getElementById('turnoverOfFebruaryOfOther');
var turnoverOfMarchOfOther = document.getElementById('turnoverOfMarchOfOther');
var turnoverOfAprilOfOther = document.getElementById('turnoverOfAprilOfOther');
var turnoverOfMayOfOther = document.getElementById('turnoverOfMayOfOther');
var turnoverOfJuneOfOther = document.getElementById('turnoverOfJuneOfOther');
var turnoverOfJuilyOfOther = document.getElementById('turnoverOfJuilyOfOther');
var turnoverOfAugustOfOther = document.getElementById('turnoverOfAugustOfOther');
var turnoverOfSeptemberOfOther =document.getElementById('turnoverOfSeptemberOfOther');
var turnoverOfOctoberOfOther = document.getElementById('turnoverOfOctoberOfOther');
var turnoverOfNovemberOfOther = document.getElementById('turnoverOfNovemberOfOther');
var turnoverOfDecemberOfOther = document.getElementById('turnoverOfDecemberOfOther');

var turnoverOfJanuary = turnoverOfJanuaryOfOther.value + turnoverOfJanuaryOfSchool.value + turnoverOfJanuaryOfStudio.value;
var turnoverOfFebruary = turnoverOfFebruaryOfOther + turnoverOfFebruaryOfSchool + turnoverOfFebruaryOfStudio;
var turnoverOfMarch = turnoverOfMarchOfOther + turnoverOfMarchOfSchool + turnoverOfMarchOfStudio;
var turnoverOfApril = turnoverOfAprilOfOther + turnoverOfAprilOfSchool + turnoverOfAprilOfStudio;
var turnoverOfMay = turnoverOfMayOfOther + turnoverOfMayOfSchool + turnoverOfMayOfStudio;
var turnoverOfJune = turnoverOfJuneOfOther + turnoverOfJuneOfSchool + turnoverOfJuneOfStudio;
var turnoverOfJuily = turnoverOfJuilyOfOther + turnoverOfJuilyOfSchool + turnoverOfJuilyOfStudio;
var turnoverOfAugust = turnoverOfAugustOfOther + turnoverOfAugustOfSchool + turnoverOfAugustOfStudio;
var turnoverOfSeptember = turnoverOfSeptemberOfOther + turnoverOfSeptemberOfSchool + turnoverOfSeptemberOfStudio;
var turnoverOfOctober = turnoverOfOctoberOfOther + turnoverOfOctoberOfSchool + turnoverOfOctoberOfStudio;
var turnoverOfNovember = turnoverOfNovemberOfOther + turnoverOfNovemberOfSchool + turnoverOfNovemberOfStudio;
var turnoverOfDecemberr = turnoverOfDecemberOfOther + turnoverOfDecemberOfSchool + turnoverOfDecemberOfStudio;




var month = document.getElementById('month');
month.addEventListener('change', function (event) {
  console.log(month.value)
})
var source = document.getElementById('source');
source.addEventListener('change', function (event) {
  console.log(source.value)
})
var amount = document.getElementById('amount')
amount.addEventListener('input', function (){
  console.log(amount.value)
})
var monthSelect = document.getElementById('monthSelect')


switch (month.value) {
  case '1':
    monthSelect = turnoverofJanuary
    break;
  case '2':
    monthSelect = turnoverofFebruary
    break;
  case '3':
    monthSelect = turnoverofMarch
    break;
  case '4':
    monthSelect = turnoverofApril
    break;
  case '5':
    monthSelect = turnoverofMay
    break;
  case '6':
    monthSelect = turnoverofJune
    break;
  case '7':
    monthSelect = turnoverofJuily
    break;
  case '8':
    monthSelect = turnoverOfAugust
    break;
  case '9':
    monthSelect = turnoverOfSeptember
    break;
  case '10':
    monthSelect = turnoverOfOctober
    break;
  case '11':
    monthSelect = turnoverOfNovember
    break;
  case '12':
    monthSelect = turnoverOfDecember
    break;
  default:
         
};






























































/*
  



function selectionOfTheSource () {
  var source = document.getElementById('source');
  source.addEventListener('change', function (event) {
      switch (source.value) {
        case '1':
          console.log('14')
          break;
        case '2':
          console.log('15')
          break;
        case '3':
          console.log('16')
          break;
        default:
      };
    });
};


function addNewAmount () {
  var newAmmount = document.getElementById('newAmmount')
  newAmmount.addEventListener('input', function (){
    console.log(newAmmount.value)
  })
}*/

