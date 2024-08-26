import './bootstrap';
// import jquery
import Alpine from 'alpinejs'
import Chart from 'chart.js/auto';
import $ from 'jquery';


window.jQuery = window.$ = $
Alpine.start();
window.Alpine = Alpine;
window.Chart = Chart;

console.log(jQuery);
